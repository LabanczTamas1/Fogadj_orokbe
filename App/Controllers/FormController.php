<?php
namespace App\Controllers;

use App\Models\Form;
use App\Tools;

class FormController
{
    protected $form;

    public function __construct(Form $form = null)
    {
        $this->form = $form;
    }

    public function formSend($data)
    {
        $arr['fullname'] = $data['fullname'];
        $arr['email'] = $data['email'];
        $arr['message'] = $data['message'];
        $arr['pet_id'] = intval($data['pet_id']);
        $arr['shelter_id'] = intval($data['shelter_id']);
        $arr['user_id'] = intval($data['user_id']);
        $arr['slug'] = Tools::slugify($data['fullname']);
    
        $form = $this->form ?: new Form($arr);
    
        try {
            var_dump("Attempting to save...");
            if ($form->save()) {
                var_dump("Save successful.");
                Tools::FlashMessage($data['postname'] . ' hozzáadva', 'success');
                session_write_close();
                $this->redirect("/");
                exit;
            }
        } catch (\Exception $e) {
            var_dump("Error: ", $e->getMessage());
            Tools::FlashMessage("Hiba történt: " . $e->getMessage(), 'danger');
            return false;
        }
    }

    public function updateMessage($post)
    {
        $formModel = $this->form ?: new Form();
        $form = $formModel->getItemById($post["id"]);
        
        if (!$form) {
            Tools::FlashMessage("Üzenet nem található.", 'danger');
            $this->redirect("/user/messages");
            return false;
        }

        $form->set('message', $post["message"]);

        try {
            if ($form->update()) {
                Tools::FlashMessage("Üzenet sikeresen frissítve.", 'success');
                session_write_close();
                $this->redirect("/user/messages");
            } else {
                Tools::FlashMessage("Az üzenet frissítése nem sikerült.", 'danger');
                $this->redirect("/user/messages");
            }
        } catch (\Exception $e) {
            Tools::FlashMessage("Kivétel történt: " . $e->getMessage(), 'danger');
            $this->redirect("/user/messages");
        }
    }

    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}
