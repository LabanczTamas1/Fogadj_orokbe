<?php
global $user;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('_', 'empty');
use App\Helper;
$shelterModel = new App\Models\Shelter;
$shelter = $shelterModel->getItemBy('shelter_slug',$_GET['slug']);
if(!Helper::isAuth() && App\Helper::user()->type != 'Shelter'){
    header('Location: /');
}
?>


<div class="form-container">
<h6 id="upload-name">Menhely Módosítása</h6>

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
            <input type="file" name="img" id="image-upload" value="<?=$shelter->img?>" required/>
        </label>
        <div id="preview-container">
    <img id="preview-image" src="" alt="Image Preview" style="display:none; max-width: 100%; height: auto;"/>
    </div>
    </div>
    <input type="text" name="shelter_name" class="form-input" placeholder="<?=$shelter->shelter_name?>"  value="<?=$shelter->img?>" required/>

    <input type="text" name="city" class="form-input" placeholder="<?=$shelter->city?>"  value="<?=$shelter->city?>" required/>

    <textarea name="description" class="form-input-description" placeholder="<?=$shelter->description?>"  value="<?=$shelter->description?>" required></textarea>

    <input type="submit" name="submit" class="upload-button" value="Feltöltés">
</form>
</div>
