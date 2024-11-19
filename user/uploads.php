<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('uploads','empty');
use App\Helper;
if(!Helper::isAuth() && App\Helper::user()->type != 'Shelter'){
    header('Location: /');
}

$shelterModel = new App\Models\Shelter;
$petModel = new App\Models\Pet;
$userPets = $petModel->getItemsBy('user_id',Helper::user()->id);
$userShelters = $shelterModel->getItemsBy('user_id',Helper::user()->id);
$userPets = $petModel->getItemsBy('user_id',Helper::user()->id);
require_once '../views/components/shelterCard.php';
require_once '../views/components/petCard.php';


?>

<main class="container">

<div class="account-container" style="background-color: black;margin-bottom: 10px; color:white;  width: 200px; border-radius: 100px;">
</div>
<h3 class="h3s">Menhelyek:</h3>
<?php
if($userShelters){
    foreach ($userShelters as $shelter) {
        $ownsByTheUserBool = $user ? $shelter->ownsByTheUser($user->id) : false;
        $type = $user ? $user->type :false;
        shelter_card([
            'shelter_name' => $shelter->shelter_name,
            'city' => $shelter->city,
            'img' => $shelter->img,
            'slug' => $shelter->shelter_slug,
            'auth' => $ownsByTheUserBool,
            'type' => $type
        ]);
    }
}else{
    echo 'Nincsen megjelníthető menhely!';
}
?>

<hr>
<h3 class="h3s">Kisállatok:</h3>
<?php
if($userPets){
    foreach ($userPets as $pet) {
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
</main>
