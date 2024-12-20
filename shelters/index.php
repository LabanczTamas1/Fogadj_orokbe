<?php

require_once __DIR__ . '/../lib/autoload.php';

new App\Template('Elérhető menhelyek', 'empty');
require_once '../views/components/shelterCard.php';

$shelterModel = new App\Models\Shelter();
$shelters = $shelterModel->all(); 
$petModel = new App\Models\Pet;

?>

<div class="container my-5">
<?php
    if($shelters){
        foreach ($shelters as $shelter) {
            $petCount = $petModel->count("shelter_id",$shelter->id);
            $ownsByTheUserBool = $user ? $shelter->ownsByTheUser($user->id) : false;
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
        }
    }else{
        echo '<div style="color: white;">Nincsen megjelníthető menhely!</div>';
    }
?>
</div>
