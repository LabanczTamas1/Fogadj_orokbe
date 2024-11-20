<?php
Use App\Tools;
require_once __DIR__. '/../lib/autoload.php';
$petModel = new App\Models\Pet;
$pet = $petModel->getItemBy('slug',$_GET['slug']);
$db = new App\Database;
try{
    \App\Image::RemoveUploadedImage('/files/pet_image/'.$pet->img);
    Tools::FlashMessage('Sikeresen Törölve lett','success');
    header('Location:/');
    if($pet){
        $pet->delete();
    }
}catch(Exception $e){
    Tools::FlashMessage('Hiba: '.$e,'danger');
    header('Location: /');
}
?>