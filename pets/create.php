<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('upload_pet','empty');

use App\Controllers\PostController;

if (isset($_POST["submit"])) {
    $upload = new PostController();
    $upload->InsertPost($_POST);
}
?>

<!-- Add back the form structure here -->
<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
<h6>Feltöltés</h6>

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

    <input type="text" name="shelter_name" class="form-input" disabled/>
    <input type="text" name="shelter_id" class="form-input" hidden/>

    <input type="text" name="pet_name" class="form-input" placeholder="Kisállat neve" required/>
    <input type="text" name="pet_gender" class="form-input" placeholder="Kisállat neme" required/>
    <input type="text" name="pet_breed" class="form-input" placeholder="Kisállat fajtája" required/>
    <input type="number" name="pet_age" class="form-input" placeholder="Kisállat életkora" required/>
    <textarea name="description" class="form-input" placeholder=" Kisállat története" required></textarea>

    <input type="submit" name="submit" class="upload-button" value="Feltöltés">
</form>

<script src="../files/js/image-preview.js"></script>
