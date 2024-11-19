<?php

use App\Models\Pet;
require_once __DIR__ . '/../lib/autoload.php';

new App\Template('Elérhető kisállatok', 'empty');
require_once '../views/components/petCard.php';
$shelters = new App\Models\Shelter;
$shelter_filter = isset($_GET['shelters']) ? $_GET['shelters'] : 0;
$petsModel = new Pet;
if($shelter_filter ){
    $shelters_filter['shelter_id'] =$shelter_filter;
    $pets = $petsModel->filter($shelters_filter);
}else{
    $pets = $petsModel->all();
}

?>
<form method="get" class="form filter_form">
    <div class="filter-section">
    <div class="filter-container">
        <select id="shelter" class="form-select" name="shelters">
            <option value="0">Összes Menhely</option>
            <?php foreach ($shelters->all() as $shelter) : ?>
                <option value="<?= $shelter->id ?>" class="dropdown-text" <?php if($shelter_filter == $shelter->id) echo 'selected' ?>><?= $shelter->shelter_name?></option>
            <?php endforeach ?>
        </select>
    </div>
</form>
<div class="container-pet">
<?php
    if($pets){
        foreach ($pets as $pet) { 
            $ownsByTheUserBool = $user ? $pet->ownsByTheUser($user->id) : false;
            $type = $user ? $user->type :false;
            post_item([
                'img' => $pet->img,
                'pet_name' => $pet->pet_name,
                'pet_breed' => $pet->pet_breed,
                'pet_gender' => $pet->pet_gender,
                'pet_age' => $pet->pet_age,
                'pet_description' => $pet->description,
                'slug' => $pet->slug,
                'auth' => $ownsByTheUserBool,
                'type' => $type
            ]);
        }
    }else{
        echo 'Nincsen megjelníthető menhely!';
    }
?>
</div>
