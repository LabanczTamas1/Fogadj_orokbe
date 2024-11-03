<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('upload_pet','empty');

use App\Controllers\PostController;

$continents = new App\Models\Continents;

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

    <input type="text" name="post_name" class="form-input" placeholder="Cím" required/>

    <select id="continent" class="filter-select" name="select">
        <option value="0">Összes Kontinens</option>
        <?php foreach ($continents->all() as $continent) : ?>
            <option value="<?= $continent->id ?>" class="dropdown-text"><?= $continent->continent_name ?></option>
        <?php endforeach ?>
    </select>

    <input type="text" name="country" class="form-input" placeholder="Ország" required/>
    <input type="text" name="city" class="form-input" placeholder="Város" required/>
    <textarea name="description" class="form-input" placeholder="Leírás" required></textarea>

    <input type="submit" name="submit" class="upload-button" value="Feltöltés">
</form>

<script src="../files/js/image-preview.js"></script>
