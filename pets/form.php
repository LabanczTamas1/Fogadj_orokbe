<?php
use App\Helper;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('upload_pet','empty');
$petModel = new App\Models\Pet;
$pet = $petModel->getItemBy('slug',$_GET['slug']);
$shelterModel = new App\Models\Shelter;
$shelter = $shelterModel->getItemById($pet->shelter_id);
if (App\Helper::user()->type != 'User'){
    header('Location: /');
}
if(isset($_POST['submit'])){
    $formCont = new App\Controllers\FormController;
    $formCont->formSend($_POST);
}
?>

<div class="container-pet">
<?= $pet->postname;?>
<?= $pet->pet_name;?>
<?= $pet->pet_gender;?>
<?= $pet->pet_breed;?>
<?= $pet->pet_age;?>
<?= $pet->description;?>
<?= $pet->postname;?>
<img src="<?= '../files/pet_image/'.$pet->img;?>." alt="">
</div>
<hr>

<form class="upload-form" method="POST" enctype="multipart/form-data">
    <div>
        <input type="text" name="user_id" class="form-input" value="<?=Helper::user()->id;?>" required hidden/>
        <input type="text" name="shelter_id" class="form-input" value="<?=$shelter->id;?>" required hidden />
        <input type="text" name="pet_id" class="form-input" value="<?=$pet->id;?>" required hidden />

        <input type="text" name="fullname" class="form-input" value="<?=Helper::user()->username;?>" required readonly="true"/>
        <input type="text" name="email" class="form-input" value="<?=Helper::user()->email;?>" required readonly="true"/>
        <textarea name="message" class="form-input"  placeholder="Üzenet a menhely számára: "required></textarea>
    </div>

    <input type="submit" name="submit" class="upload-button" value="Elküldés">
</form>