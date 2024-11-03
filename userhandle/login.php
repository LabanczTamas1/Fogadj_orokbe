<?php
require_once __DIR__ . '/../lib/autoload.php';
use App\Helper;


new App\Template('login','sign_layout');

if (Helper::isAuth()) header('Location: /');

if (isset($_POST["userlogin"])) {
    $loginCon = new App\Controllers\LoginController;
    $loginCon->Get_user($_POST);
}
?>

<div id="for-middle-container">
    <p class="sign-type">Bejelentkezés</p>
    <form method="POST" id="login_form">
        <div>
            <input type="email" name="email" id="email_value" placeholder="Email" required>
        </div>
        <div>
            <input type="password" name="passwd" id="passwd_value" placeholder="Jelszó" required>
        </div>
        <button type="submit" class="sign-button" name="userlogin">Bejelentkezés</button>
        <div class="linky">
            <a href="register.php">Regisztráció</a>
        </div>
    </form>
</div>
