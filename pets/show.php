<?php
global $user;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('_', 'empty');
$petModel = new App\Models\Pet;
$pet= $petModel->getItemBy('slug',$_GET['slug']);

$shelterModel = new App\Models\Shelter;
$shelter = $shelterModel->getItemBy('id',$pet->shelter_id);
$petCount = $petModel->count('shelter_id',$shelter->id);
require_once '../views/components/shelterCard.php';

?>


<div class="container-pet" style="background-color: #305C60; height: 80vh !important;">
<img src="<?= '../files/pet_image/'.$pet->img;?>." style="height: 70% !important;" alt="">
<div style="padding: 1rem;">
<div style="color: white; font-size: 2rem;"><?= $pet->pet_name;?></div>
<div style="color: white; font-size: 1rem;">Nem: <?= $pet->pet_gender;?></div>
<div style="color: white; font-size: 1rem;">Faj: <?= $pet->pet_breed;?></div>
<div style="color: white; font-size: 1rem;">Életkor: <?= $pet->pet_age;?></div>
<div style="color: white; font-size: 1rem;">Leírása: <?= $pet->description;?></div>
</div>

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
                'type' => $type,
                'count' => $petCount
            ]);
        
    }else{
        echo 'Nincsen megjelníthető menhely!';
    }
?>
</div>