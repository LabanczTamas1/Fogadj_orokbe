<?php
namespace App\Controllers;
use App\Image;
use App\Models\Pet;
use App\Tools;
use App\Helper;
class PetController {
    public function insertPet($arr){
        global $errors;
        $data['postname'] = str_replace("'", "",$arr['postname']);
        $data['pet_name'] =str_replace("'", "",$arr['pet_name']);
        $data['pet_gender'] =str_replace("'", "",$arr['pet_gender']);
        $data['pet_breed'] = str_replace("'", "",$arr['pet_breed']);
        $data['pet_age'] =intval($arr['pet_age']);
        $data['pet_status'] = false;
        $data['description'] = str_replace("'", "",$arr['description']);
        $data['shelter_id'] = $arr['shelter_id'];
        $data['slug'] = Tools::slugify($arr['postname']);
        $data['user_id'] = Helper::user()->id;
        $img = Image::ImageUpload($_FILES, '/files/pet_image/');
        if (is_array($img)) {
            $errors = array_merge($errors, $img);
        } else {
            $data['img'] = $img;
        }
        $pet = new Pet($data);
        try {
            if ($pet->save()) {
                Tools::FlashMessage($data['postname'] . ' hozzáadva', 'success');
                header("Location: /");
                exit;
            }
        } catch (\Exception $e) {
            Tools::FlashMessage("Hiba történt: " . $e->getMessage(), 'danger');
           return false;
        }
    }
	
	public function updatePet($arr){
        global $user;
        $petModel = new Pet();
        $pet = $petModel->getItemById($arr['id']);
        $pet->set('postname' ,str_replace("'", "", $arr['postname']));
        $pet->set('slug', Tools::slugify($arr['postname']));
        $pet->set('shelter_id' ,intval( $arr['shelter_id']));
        $pet->set('user_id', $user->id);
        $pet->set('pet_name' ,str_replace("'", "", $arr['pet_name']));
        $pet->set('pet_gender' ,str_replace("'", "", $arr['pet_gender']));
        $pet->set('pet_breed' ,str_replace("'", "", $arr['pet_breed']));
        $pet->set('pet_status', intval($arr['pet_status']));
        $pet->set('pet_age', intval($arr['pet_age']));
        $pet->set('description', str_replace("'", "", $arr['description']));


        if ($_FILES && $_FILES['img']['name'] != "") {

            $newImage = Image::UpdateImage($pet->img, $_FILES, '/files/pet_image');

            if (is_array($newImage)) {
                $errors = $newImage;

                Tools::FlashMessage('Hiba a feltöltéssel: ' . $errors[0], 'danger');
                return false;
            }
            $pet->set('img', $newImage);
        }else{
            $pet->set( 'img',$pet->img);
        }

        try {
            if ($pet->update()) {
                Tools::FlashMessage($pet->postname . ' módosítva', 'success');
                header("Location: /");
            }
        } catch (\Exception $e) {
            die();
        }


    }
}