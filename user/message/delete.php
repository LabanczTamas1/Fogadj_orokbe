<?php
Use App\Tools;
use App\Helper;
require_once __DIR__. '/../../lib/autoload.php';
$formModel = new App\Models\Form;
$form = $formModel->getItemById($_GET["id"]);
if(Helper::user()->id != $form->user_id){
    header("Lcoation:/");
    Tools::FlashMessage("Not authorized","danger");
    exit();
}
$db = new App\Database;
try{
   if($form){
    $db->delete_all("form","id",$form->id);
    Tools::FlashMessage("Message has been deleted.","success");
    header("Location:/user/messages");
   }
    

}catch(Exception $e){
    Tools::FlashMessage("Something went wrong","danger");
}
