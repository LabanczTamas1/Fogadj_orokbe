<?php
require_once __DIR__ . '/../lib/autoload.php';
use App\Helper;

new App\Template('chooseOption','empty');


?>


<div class="container-profile">
    <a href="/../pets/create.php">+ Kisállat hozzáadása</a>

    <a href="/../shelters/create.php">+ Menhely hozzáadása</a>

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
</div>