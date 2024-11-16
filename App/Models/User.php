<?php
namespace App\Models;

use App\Model;

class User extends Model
{
    public string $table = "users";

    public array $attributes = [
        'id' => 'int',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'type' => 'string',
        'shelter_name' => 'string'
    ];

    public function updateUserPassword($post){
        if($post){
            $data['password'] =  \App\Tools::Crypt($post['password']);
            $this->set('password', $data['password']);
            try {
                if ($this->update()) {
                    $destroy = new SessionController;
                    $destroy->destroy();
                    header("Location:/");
                    \App\Tools::FlashMessage('Sikeresen megváltoztatta jelszavát.', 'success');
                }
            } catch (\Exception $e) {
                \App\Tools::FlashMessage("Valami hiba történt.");
                echo $e;
                return false;
            }
        } else {
            \App\Tools::FlashMessage('Hiba.', 'danger');
            return false;
        }

    }

    public function updateProfileData($post){
        if ($post) {
            $this->set('username', $post['username']);
            try {
                print_r($this);
                if ($this->update()) {
                    $destroy = new SessionController;
                    $destroy->destroy();
                    header("Location:/");
                    \App\Tools::FlashMessage('Sikeresen megváltoztatta jelszavát.', 'success');
                }
            } catch (\Exception $e) {
                \App\Tools::FlashMessage("Valami hiba történt.");
                echo $e;
                return false;
            }
        }else {
            \App\Tools::FlashMessage('Hiba.', 'danger');
            return false;
        }
    }
}
