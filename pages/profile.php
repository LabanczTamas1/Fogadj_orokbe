<?php
require_once __DIR__ . '/../lib/autoload.php';
use App\Helper;

new App\Template('chooseOption','empty');

if (!Helper::isAuth()) header('Location: /');


if (isset($_POST['passwordupdate'])) {
    Helper::user()->updateUserPassword($_POST);

}
if(isset($_POST['userupdate'])){
    Helper::user()->updateProfileData($_POST);

}

?>

<div class="petsandshelter">
    <?php if(Helper::user()->type=='Shelter') {?>
    <a href="/../pets/create" class="shelter-upload-link">+ Kisállat hozzáadása</a>
    <a href="/../shelters/create" class="shelter-upload-link">+ Menhely hozzáadása</a>
    <a href="/../user/uploads" class="shelter-upload-link">Feltöltött</a>

    <?php }?>
    <?php if(Helper::user()->type === "User") {?>
        <a href="/../user/messages" class="shelter-upload-link">Üzeneteim</a>
     <?php }?>

</div>

<div class="container-profile">
    <div class="settings-container">
    <form class="upload-form" method="post" enctype="multipart/form-data">
        <h5 class="h5s">Felhasználónév megváltoztatása</h5>
        <input type="text" name="username" class="form-input" placeholder="<?=Helper::user()->username?>" required/>
        <button type="submit" name="userupdate" class="upload-buttons">Megváltoztatása</button>
    </form>
    <form class="upload-form" method="post" enctype="multipart/form-data">
        <h5 class="h5s">Jelszó megváltoztatása</h5>
        <input type="password" name="password" class="form-input" placeholder="Jelszó" required/>
        <button type="submit" name="passwordupdate" class="upload-buttons">Megváltoztatása</button>
    </form>
    
</div>

    <button type="submit" name="accountdelete" class="profile-delete-button">Fiókom törlése</button>
</div>