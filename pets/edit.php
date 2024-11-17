<?php
use App\Helper;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('upload_pet','empty');
if(!Helper::isAuth() && App\Helper::user()->type != 'Shelter'){
    header('Location: /');
}

$sheltersModel= new App\Models\Shelter;
$shelters = $sheltersModel->getItemsBy('user_id',App\Helper::user()->id);
$petModel = new App\Models\Pet;
$pet = $petModel->getItemBy('slug',$_GET['slug']);
if(isset($_POST['submit'])){
    $petController = new App\Controllers\PetController;
    $petController->updatePet($_POST);
    header("Location:/");
}
?>

<!-- Add back the form structure here -->
<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
<h6>Feltöltés</h6>

<form class="upload-form" method="POST" enctype="multipart/form-data">
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger">
                <?= is_array($error) ? implode(', ', $error) : $error ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="upload-container">
        <label for="image-upload" class="upload-box">
            <i class="upload-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></i>
            <span>Kép feltöltése</span>
            <input type="file" name="img" id="image-upload" value="<?=$pet->img;?>" />
        </label>
        <div id="preview-container">
    <img id="preview-image" src="" alt="Image Preview" style="display:none; max-width: 100%; height: auto;"/>
    </div>

    </div>

    <input type="text" name="postname" class="form-input" value="<?=$pet->postname;?>" required/>
    <input type="text" name="user_id" class="form-input" value="<?=$pet->user_id;?>" required hidden/>
    <input type="text" name="pet_status" class="form-input" value="<?=$pet->pet_status;?>" required hidden/>
    <input type="text" name="id" class="form-input" value="<?=$pet->id;?>" required hidden/>
    <input type="text" name="user_id" class="form-input" value="<?=$pet->user_id;?>" required hidden/>
    <input type="text" name="pet_name" class="form-input" value="<?=$pet->pet_name;?>" required/>
    <input type="text" name="pet_gender" class="form-input" value="<?=$pet->pet_gender;?>" required/>
    <input type="text" name="pet_breed" class="form-input" value="<?=$pet->pet_breed;?>" required/>
    <input type="number" name="pet_age" class="form-input" value="<?=$pet->pet_age;?>" required/>
    <select id="shelter_id"  name="shelter_id">
            <?php foreach($shelters as $shelter): ?>
                <option <?php if($pet->shelter_id == $shelter->id) echo 'selected'?> value="<?=$shelter->id?>" ><?=$shelter->shelter_name?></option>
            <?php endforeach;?>
    </select>
    <textarea name="description" class="form-input" value="<?=$pet->description;?>" required><?=$pet->description;?></textarea>
    <input type="submit" name="submit" class="upload-button" value="Feltöltés">
</form>
<script src="../files/js/image-preview.js"></script>