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

<style>
    #message-label{
        color: white;
    }

    .container-pet{
        color: white;
    }
</style>

<div class="container-pet" style="display: flex; flex-direction: row !important; width: 100%; height:20rem;">
    <img src="<?= '../../files/pet_image/'.$pet->img; ?>" alt="Person holding a dog" onclick="document.navigateTo('/pets/<?= $pet->slug ?>')" style="width: auto; height:20rem;">
    <div class="pet-information">
                    <div class="pet-name"><?= $pet->pet_name; ?></div>
                    <div class="pet-breed">Faj: <?= $pet->pet_breed; ?></div>
                    <div class="pet-gender">Nem: <?= $pet->pet_gender; ?></div>
                    <div class="pet-age">Kor: <?= $pet->pet_age; ?></div>
                    <div class="description" style="color: white;">Leírás: <?= $pet->description; ?></div>
    </div>
</div>

<form class="upload-form" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center; justify-content: center; height: 50vh; width:100%;">
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <input type="text" name="user_id" class="form-input" value="<?=Helper::user()->id;?>" required hidden/>
        <input type="text" name="shelter_id" class="form-input" value="<?=$shelter->id;?>" required hidden />
        <input type="text" name="pet_id" class="form-input" value="<?=$pet->id;?>" required hidden />
        
        <label id="message-label">Neved (Automatikusan kitöltve)</label>
        <input type="text" name="fullname" class="form-input" value="<?=Helper::user()->username;?>" required readonly="true" style="margin:0px !important;"/>
        <label id="message-label">Emailed (Automatikusan kitöltve)</label>
        <input type="text" name="email" class="form-input" value="<?=Helper::user()->email;?>" required readonly="true" style="margin:0px;"/>
        <label id="message-label">Üzenet a menhelynek</label>
        <textarea name="message" class="form-input"  placeholder="Üzenet a menhely számára: " style="width: 240px;
    height: 100%;
    color: black;
    background-color: rgba(256, 256, 256, 0.48);
    border-radius: 8px;
    padding: 16px;
    
    border: 1px rgb(217, 217, 217) solid;" required></textarea>
    </div>

    <input type="submit" name="submit" class="upload-button" value="Elküldés">
</form>