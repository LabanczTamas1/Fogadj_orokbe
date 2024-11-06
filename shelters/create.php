<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('upload_shelter','empty');

use App\Controllers\ShelterController;

if (isset($_POST["submit"])) {
    $upload = new ShelterController();
    $upload->InsertPost($_POST);
}
?>

<!-- Add back the form structure here -->
<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>

<div class="form-container">
<h6 id="upload-name">Menhely feltöltése</h6>

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
    <input type="text" name="shelter_name" class="form-input" placeholder="Menhely neve" required/>

    <input type="text" name="city" class="form-input" placeholder="Város" required/>

    <input type="submit" name="submit" class="upload-button" value="Feltöltés">
</form>
</div>

<script src="../files/js/image-preview.js"></script>
