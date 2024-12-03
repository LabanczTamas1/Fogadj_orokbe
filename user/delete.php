<?php
Use App\Tools;
use App\Helper;
require_once __DIR__. '/../lib/autoload.php';
$user = Helper::user();
if($user->email != $_GET["email"]){
    Tools::FlashMessage("Not authorized","danger");
    header("Location: /");
    exit();
}
$formModel = new App\Models\Form;
$forms = $formModel->getItemsBy('user_id',$user->id);
if ($user->type == "Shleter"){
    $shelterModel = new App\Models\Shelter;
    $shelters = $shelterModel->getItemsBy('user_id',$user->id);
    $petModel = new App\Models\Pet;
    $pets = $petModel->getItemsBy('user_id',$user->id);
}
$session = new App\Controllers\SessionController;
$db = new App\Database;
try{
    if($user){
        if($forms){ 
            $db->delete_all("form","user_id",$user->id);
        }if($shelters){
            $db->delete_all("shelter","user_id",$user->id);
        }if($pets){
            $db->delete_all("pet_posts","user_id",$user->id);
        }
        $user->delete();
        Tools::FlashMessage("User deleted","success");
        $session->destroy();
        header("Location:/");
    }
    

}catch(Exception $e){
    Tools::FlashMessage("Something went wrong","danger");
}
