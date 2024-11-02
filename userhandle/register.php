<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('register','sign_layout');

if (isset($_POST["regist"])) {
    $user = new RegisterController();
    $user -> InsertUser($_POST);
}
?>

<div id="for-middle-container">
<form method="post" enctype="multipart/form-data">
<p class="sign-type">Regisztáció</p>
    <div>
        <input type="email" name="email" id="email_value" placeholder="Email" required>
    </div>
    <div>
        <input type="text" name="username" id="username_value" placeholder="Felhasználónév" required>
    </div>
    <div>
        <input type="password" name="passwd1" id="passwd1_value" placeholder="Jelszó" required>
    </div>
    <div>
        <input type="password" name="passwd2" id="passwd2_value" placeholder="Jelszó megerősítése" required>
    </div>
    <div>
        <button type="submit" class="sign-button" name="regist">Regisztráció</button>
    </div>
    <div class="linky">
        <a href="login.php">Bejelentkezés</a>
    </div>
</form>
</div>