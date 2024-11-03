<?php
require_once __DIR__ . '/../lib/autoload.php';
use App\Helper;

new App\Template('shelters','empty');

if (Helper::isAuth()) header('Location: /');

if (isset($_POST["userlogin"])) {
    $LoginController = new App\Controllers\LoginController;

    $LoginController->Get_user($_POST['email'], $_POST['passwd']);
}
?>

<?php $this->include('components/shelterCard') ?>
