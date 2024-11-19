<?php
namespace App\Controllers;
use App\Image;
use App\Tools;
use App\Models\Shelter;
use App\Helper;
class ShelterController {
    public function shelterUpload($post) {
        global $errors;
        $data['shelter_name'] = str_replace("'", "",$post['shelter_name']);
        $data['city'] = str_replace("'", "",$post['city']);
        $data['description'] = str_replace("'", "",$post['description']);
        $data['shelter_slug'] = Tools::slugify($data['shelter_name']);
        $data['user_id'] = Helper::user()->id;
        $img = Image::ImageUpload($_FILES, '/files/shelter_image/');
        if (is_array($img)) {
            $errors = array_merge($errors, $img);
        } else {
            $data['img'] = $img;
        }

        try {
            $shelter = new Shelter($data);
            if ($shelter->save()) {
                Tools::FlashMessage($data['shelter_name'] . ' hozzáadva', 'success');
                session_write_close(); 
                header('Location: /');
                exit;
            }
        } catch (\Exception $e) {
            Tools::FlashMessage("Hiba történt: " . $e->getMessage(), 'danger');
        }
        return false;
    }
    public function selterUpdate($arr){
        global $user;
        $shelterModel = new Shelter;
        $shelter=$shelterModel->getItemById($arr['id']);
        $shelter->set('shelter_name',str_replace("'", "",$arr['shelter_name']));
        $shelter->set('shelter_slug',Tools::slugify($arr['shelter_name']));
        $shelter->set('city',str_replace("'", "",$arr['city']));
        $shelter->set('description',str_replace("'", "",$arr['description']));
        $shelter->set('user_id',Helper::user()->id);

        if ($_FILES && $_FILES['img']['name'] != "") {

            $newImage = Image::UpdateImage($shelter->img, $_FILES, '/files/shelter_image');

            if (is_array($newImage)) {
                $errors = $newImage;

                Tools::FlashMessage('Hiba a feltöltéssel: ' . $errors[0], 'danger');
                return false;
            }
            $shelter->set('img', $newImage);
        }else{
            $shelter->set( 'img',$shelter->img);
        }

        try {
            if ($shelter->update()) {
                Tools::FlashMessage($shelter->shelter_name . ' módosítva', 'success');
                header("Location: /");
            }
        } catch (\Exception $e) {
            die();
        }
    }
}
