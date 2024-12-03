<?php
use App\Helper;
use App\Tools;
require_once __DIR__ . '/../../lib/autoload.php';
new App\Template('message_edit','empty');
$formModel = new App\Models\Form;
$form = $formModel->getItemById($_GET["id"]);
if(Helper::user()->id != $form->user_id){
header("Location: /");
Tools::FlashMessage("Not Authorized","danger");
} 
if(isset($_POST["submit"])){
        $formControllerModel = new App\Controllers\FormController;
        $formControllerModel->updateMessage($_POST);
}
?>
<form  method="POST">
        <input type="text" name="id" class="form-input" value="<?=$form->id;?>" required hidden/>
        <input type="text" name="user_id" class="form-input" value="<?=Helper::user()->id;?>" required hidden/>
        <input type="text" name="shelter_id" class="form-input" value="<?=$form->shelter_id;?>" required hidden />
        <input type="text" name="pet_id" class="form-input" value="<?=$form->pet_id;?>" required hidden />

        <input type="text" name="fullname" class="form-input" value="<?=Helper::user()->username;?>" required readonly="true"/>
        <input type="text" name="email" class="form-input" value="<?=Helper::user()->email;?>" required readonly="true"/>
        <textarea name="message" class="form-input" required><?=$form->message?></textarea>
        <input type="submit" name="submit" class="upload-button" value="Módosít">
</form>