<?php
namespace App\Controllers;
use App\Models\User;
use App\Tools;

class LoginController {
    public function Get_user($post) {
        global $session;
        $users = new User;

        $email = $post['email'];
        $password = $post['passwd'];

        $concrateUser = $users -> getItemBy('email', $email);
        if ($concrateUser) {
            $passwordpass = $concrateUser -> password;

            if (password_verify($password, $passwordpass)) {
                if ($session->create($concrateUser -> id)) {
                    Tools::FlashMessage('Sikeres bejelentkezés! Üdv ' . $concrateUser -> fullname, 'success');
                    if($concrateUser->type === 'User'){
                        session_write_close();
                        $this->redirect("/pages/chooseOption");
                    }else{
                        session_write_close();
                        $this->redirect("/");
                    }
                };
            } else {
                $wrongpassword = "Nem megfelelő a jelszó!";
                Tools::FlashMessage($wrongpassword, 'danger');
                session_write_close();
                $this->redirect("/");
            }
        } else {
            $wrongusername = "Nincsen ilyen felhasználó!";
            Tools::FlashMessage($wrongusername, 'danger');
            session_write_close();
            $this->redirect("/");
        }
     
    }
    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}