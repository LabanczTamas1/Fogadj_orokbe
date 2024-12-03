<?php
namespace App\Controllers;
use App\Models\Form;
use App\Tools;
class FormController{
    public function formSend($data){
        $arr['fullname'] = $data['fullname'];
        $arr['email'] = $data['email'];
        $arr['message'] = $data['message'];
        $arr['pet_id'] = intval($data['pet_id']);
        $arr['shelter_id'] = intval($data['shelter_id']);
        $arr['user_id'] = intval($data['user_id']);
        $arr['slug'] = Tools::slugify('fullname');

        $form = new Form($arr);
        try {
            if ($form->save()) {
                Tools::FlashMessage($data['postname'] . ' hozzáadva', 'success');
                session_write_close(); 
                header("Location: /");
                exit;
            }
        } catch (\Exception $e) {
            Tools::FlashMessage("Hiba történt: " . $e->getMessage(), 'danger');
           return false;
        }


    }
    public function updateMessage($post){
        $formModel = new Form();
        $form = $formModel->getItemById($post["id"]);
        $form->set('message',$post["message"]);
        try {
            if ($form->update()) {
                Tools::FlashMessage("Updated Message", 'success');
                session_write_close(); 
                $this->redirect("/user/messages");
            }
        } catch (\Exception $e) {
            Tools::FlashMessage("Something Went Wrong", 'danger');
            $this->redirect("/");
        }


    }
    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}