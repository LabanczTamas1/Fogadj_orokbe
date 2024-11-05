<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template();
use App\Helper;

global $user;
if (!Helper::isAuth()) header('Location: /');


if (isset($_POST['passwordupdate'])) {
    $user->UpdateUserPassword($_POST);
}
if(isset($_POST['userupdate'])){
    $user->UpdateProfileData($_POST);
}

?>

<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
<h6>Fiók műveletek</h6>

<div class="settings-container">
<form class="upload-form" method="post" enctype="multipart/form-data">
<h5>Felhasználónév megváltoztatása</h5>
<input type="text" name="username" class="form-input" placeholder="<?=$user->username?>" required/>
<button type="submit" name="userupdate" class="upload-button">Megváltoztatása</button>
</form>
<div class="line"></div>
<form class="upload-form" method="post" enctype="multipart/form-data">
<h5>Jelszó megváltoztatása</h5>
<input type="password" name="password" class="form-input" placeholder="Jelszó" required/>
<button type="submit" name="passwordupdate" class="upload-button">Megváltoztatása</button>
</form>
</div>
<button type="submit" name ="delete_user" class="upload-button" id="account-delete-button"><a href="/user/delete.php">Fiókom törlése</a></button>
