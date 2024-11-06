<?php
namespace App\Controllers;

class ShelterController {
    public function shelterUpload($post) {
        $data['shelter_name'] = str_replace("'", "",$post['shelter_name']);
        $data['city'] = str_replace("'", "",$post['city']);
        $data['description'] = str_replace("'", "",$post['description']);

        $img = Image::ImageUpload($_FILES, '/files/shelter_image/');
        if (is_array($img)) {
            $errors = array_merge($errors, $img);
        } else {
            $data['img'] = $img;
        }
        
        $shelter = new Shelter($data);
        try {
            if ($shelter->save()) {
                Tools::FlashMessage($data['postname'] . ' hozzáadva', 'success');
                header("Location: /");
                exit;
            }
        } catch (\Exception $e) {
            Tools::FlashMessage("Hiba történt: " . $e->getMessage(), 'danger');
            print_r($data);
            die();
        }
        return false;
    }
}