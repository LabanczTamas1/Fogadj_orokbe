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
    <h3>Regisztráció</h3>
    <div>
        <label for="email_value">Email cím: </label>
        <input type="email" name="email" id="email_value" required>
    </div>
    <div>
        <label for="username_value">Felhasználónév: </label>
        <input type="text" name="username" id="username_value" required>
    </div>
    <div>
        <label for="passwd1_value">Jelszó: </label>
        <input type="password" name="passwd1" id="passwd1_value" required>
    </div>
    <div>
        <label for="passwd2_value">Jelszó megerősítése: </label>
        <input type="password" name="passwd2" id="passwd2_value" required>
    </div>
    <div>
        <button type="submit" name="regist">Regisztráció</button>
    </div>
    <div>
        <a href="login.php">Bejelentkezés</a>
    </div>
</form>
</div>