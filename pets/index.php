<?php

use App\Models\Pet;
require_once __DIR__ . '/../lib/autoload.php';

new App\Template('Elérhető kisállatok', 'empty');
require_once '../views/components/petCard.php';
$petsModel = new Pet;
$pets = $petsModel->all();

?>

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
                'pet_description' => $pet->description
            ]);
        }
    }else{
        echo 'Nincsen megjelníthető menhely!';
    }
?>
</div>
