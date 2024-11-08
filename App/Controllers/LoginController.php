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
                        header('Location: /pages/chooseOption');
                    }else{
                        header('Location: /');
                    }
                };
            } else {
                $wrongpassword = "Nem megfelelő a jelszó!";
                Tools::FlashMessage($wrongpassword, 'danger');
            }
        } else {
            $wrongusername = "Nincsen ilyen felhasználó!";
            Tools::FlashMessage($wrongusername, 'danger');
        }
     
    }
}