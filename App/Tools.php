<?php
namespace App;

class Tools
{
    public static function Crypt(string $password): string
    {
        $options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public static function FlashMessage(string $message, string $type='primary')
    {
        if(isset($_SESSION['flash_message']))
            unset($_SESSION['flash_message']);
        $_SESSION['flash_message'] = ['message' => $message,'type' => $type];
    }

}