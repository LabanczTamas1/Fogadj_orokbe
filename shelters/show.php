<?php
global $user;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('_', 'empty');
$shelterModel = new App\Models\Shelter;
$shelter = $shelterModel->getItemBy('shelter_slug',$_GET['slug']);
$petModel = new App\Models\Pet;
$pets= $petModel->getItemsBy('shelter_id',$shelter->id);
require_once '../views/components/petCard.php';

?>

<div>
    <img src="<?= '../files/shelter_image/'.$shelter->img?>">
    <?=$shelter->shelter_name?>
    <?=$shelter->city?>
</div>
<hr>
<div class="container my-5">
<?php
    if($pets){
        foreach ($pets as $pet) { 
            post_item([
                'img' => $pet->img,
                'pet_name' => $pet->pet_name,
                'pet_breed' => $pet->pet_breed,
                'pet_gender' => $pet->pet_gender,
                'pet_age' => $pet->pet_age,
                'pet_description' => $pet->description,
                'slug' => $pet->slug
            ]);
        }
    }else{
        echo 'Nincsen megjelníthető menhely!';
    }
?>
</div>