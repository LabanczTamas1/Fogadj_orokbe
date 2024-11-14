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
}