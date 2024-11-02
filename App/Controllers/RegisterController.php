<?php
namespace App\Controllers;
use App\Models\User;
use App\Tools;

class RegisterController
{
    protected $user;

    public function __construct(User $user = null)
    {
        $this->user = $user ?? new User();
    }

    public function InsertUser($post)
    {
        $dataarray['username'] = str_replace("'", "", $post['username']);
        $dataarray['email'] = str_replace("'", "", $post['email']);
        $dataarray['type'] = "User";

        if(empty($dataarray['username']) || empty($dataarray['email'])) {
            Tools::FlashMessage("Adjon meg helyes adatokat!", 'danger');
            return false;
        } else {
            if ($post['passwd1'] == $post['passwd2']) {
                $dataarray['password'] = Tools::Crypt($post['passwd1']);
            } else {
                Tools::FlashMessage("A jelszavak nem egyeznek!", 'danger');
                return false;
            }

        // Check for existing username and email
        if ($this->user->getItemBy('username', $dataarray['username'])) {
            Tools::FlashMessage("Username already exists.", 'danger');
            return false;
        } elseif ($this->user->getItemBy('email', $dataarray['email'])) {
            Tools::FlashMessage("Email already exists.", 'danger');
            return false;
        }
            $userNamespace = new User;

            if ($userNamespace -> getItemBy('username', $dataarray['username'])) {
                Tools::FlashMessage("Már létezik ilyen nevű felhasználó!", 'danger');
                return false;
            }

            if ($userNamespace -> getItemBy('email', $dataarray['email'])) {
                Tools::FlashMessage("Már létezik ilyen email cím!", 'danger');
                return false;
            }

        // Create and save the user
        $dataarray['password'] = Tools::Crypt($post['passwd1']);
        $user = new User($dataarray);
        if ($user->save()) {
            Tools::FlashMessage("Successful registration!", 'success');
            $this->redirect('/userhandle/login');  // Use a method for redirection
            return true;
        } else {
            Tools::FlashMessage("Error occurred during registration.", 'danger');
            return false;
            $user = new User($dataarray);
            
            if ($user -> save()) {
                Tools::FlashMessage("Sikeres regisztráció!", 'success');
                header('Location: /userhandle/login');
            }
        }
    }

    // Add a method for redirection that can be mocked in tests
    function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}
