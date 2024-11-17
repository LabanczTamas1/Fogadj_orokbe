<?php
Use App\Tools;
require_once __DIR__. '/../lib/autoload.php';
$shelterModel = new App\Models\Shelter;
$petModel = new App\Models\Pet;
$shelter = $shelterModel->getItemBy('shelter_slug',$_GET['slug']);
$pets = $petModel->getItemsBy('shelter_id',$shelter->id);
$db = new App\Database;

try{
    \App\Image::RemoveUploadedImage('/files/shelter_image/'.$shelter->img);
    if($pets){
        $db->delete_all('pet_posts','shelter_id',$shelter->id);
    }
    if($shelter){
        $shelter->delete();
    }
    Tools::FlashMessage('Sikeresen Törölve lett','success');
    header('Location:/');
}catch(Exception $e){
    Tools::FlashMessage('Hiba: '.$e,'danger');
    header('Location: /');
}

?>