<?php
global $user;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('_', 'empty');
$petModel = new App\Models\Pet;
$pet= $petModel->getItemBy('slug',$_GET['slug']);

$shelterModel = new App\Models\Shelter;
$shelter = $shelterModel->getItemBy('id',$pet->shelter_id);
require_once '../views/components/shelterCard.php';

?>


<div class="container-pet">
<?= $pet->postname;?>
<?= $pet->pet_name;?>
<?= $pet->pet_gender;?>
<?= $pet->pet_breed;?>
<?= $pet->pet_age;?>
<?= $pet->description;?>
<?= $pet->postname;?>
<img src="<?= '../files/pet_image/'.$pet->img;?>." alt="">
</div>
<hr>
<div class="container">
<?php
    if($shelter){
        $ownsByTheUserBool = $user ? $pet->ownsByTheUser($user->id) : false;
        $type = $user ? $user->type :false;
            shelter_card([
                'shelter_name' => $shelter->shelter_name,
                'city' => $shelter->city,
                'img' => $shelter->img,
                'slug' => $shelter->shelter_slug,
                'auth' => $ownsByTheUserBool,
                'type' => $type
            ]);
        
    }else{
        echo 'Nincsen megjelníthető menhely!';
    }
?>
</div>