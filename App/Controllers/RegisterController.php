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
        global $session;
        $data['username'] = str_replace("'", "",$post['username']);
        $data['email'] = str_replace("'", "",$post['email']);
        $data['type'] = $post['type'];
        $data['shelter_name'] = "NaN";

        if (empty($data['username']) || empty($data['email'])) {
            Tools::FlashMessage("Please provide valid username and email.", 'danger');
            return false;
        } elseif ($post['passwd1'] !== $post['passwd2']) {
            Tools::FlashMessage("Passwords do not match.", 'danger');
            return false;
        }

        if ($this->user->getItemBy('username', $data['username'])) {
            Tools::FlashMessage("Username already exists.", 'danger');
            return false;
        } elseif ($this->user->getItemBy('email', $data['email'])) {
            Tools::FlashMessage("Email already exists.", 'danger');
            return false;
        }

        $data['password'] = Tools::Crypt($post['passwd1']);
        $user = new User($data);
        if ($user->save()) {
            Tools::FlashMessage("Successful registration!", 'success');
            $get_user = $user->getItemBy('username',$user->username);
            if($session->create($get_user->id)){
                header("Location: /");
                return true;
           }else{

                Tools::FlashMessage("Error occurred during login.", 'danger');
               return false;
            }
           
        } else {
            Tools::FlashMessage("Error occurred during registration.", 'danger');
            return false;
        }
    }


}
