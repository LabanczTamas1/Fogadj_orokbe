<?php
require_once __DIR__ . '/../lib/autoload.php';

if ($session->destroy()) {
    App\Tools::FlashMessage('Sikeresen kijelentkezett!', 'success');
    header('Location: /');
}else{
    App\Tools::FlashMessage('Nem sikerült kijelentkezni!', 'danger');
    header('Location: /');
}