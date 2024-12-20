<?php
use App\Helper;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('upload_pet','empty');

use App\Controllers\PetController;
if(!Helper::isAuth() && App\Helper::user()->type != 'Shelter'){
    header('Location: /');
}
if (isset($_POST["submit"])) {
    $pet = new PetController();
    $pet->insertPet($_POST);
}
$sheltersModel= new App\Models\Shelter;
$shelters = $sheltersModel->getItemsBy('user_id',App\Helper::user()->id);
?>

<style>
main{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
</style>

<h6 style="color: white; font-size: 32px;">Feltöltés</h6>

<form class="upload-form" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
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
            <input type="file" name="img" id="image-upload" required/>
        </label>
        <div id="preview-container">
    <img id="preview-image" src="" alt="Image Preview" style="display:none; max-width: 100%; height: auto;"/>
    </div>

    </div>

    <input type="text" name="postname" class="form-input" placeholder="Cím" required/>
    <input type="text" name="pet_name" class="form-input" placeholder="Kisállat neve" required/>
    <input type="text" name="pet_gender" class="form-input" placeholder="Kisállat neme" required/>
    <input type="text" name="pet_breed" class="form-input" placeholder="Kisállat fajtája" required/>
    <input type="number" name="pet_age" class="form-input" placeholder="Kisállat életkora" required/>
    <select id="shelter_id"  name="shelter_id">
            <?php foreach($shelters as $shelter): ?>
                <option value="<?=$shelter->id?>" ><?=$shelter->shelter_name?></option>
            <?php endforeach;?>
    </select>
    <textarea name="description" class="form-input-description" placeholder="Kisállat története" required></textarea>
    <input type="submit" name="submit" class="upload-button" value="Feltöltés">
</form>
<script src="../files/js/image-preview.js"></script>
