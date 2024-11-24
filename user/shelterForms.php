<?php 
use App\Helper;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('messages','empty');
if(!Helper::isAuth() && App\Helper::user()->type != 'Shelter'){
    header('Location: /');
}

require_once '../views/components/messageCard.php';
$shelterModel = new App\Models\Shelter;
$shelter = $shelterModel->getItemBy('user_id',Helper::user()->id);
if($shelter) {
    $formModel = new App\Models\Form;
    $forms = $formModel->getItemsBy('shelter_id',$shelter->id);
}else {
    $forms = "";
}
?>
<h1 style="color:#E1E8EA!important;">Beérkezett üzenetek: <?=Helper::user()->username;?> </h1>

<div class="container my-5">
    <?php 
        if($forms) {
            foreach($forms as $form){
                $ownsByTheUserBool = $user ? $form->ownsByTheUser($user->id) : false;
                $type = $user ? $user->type :false; 
                message_card([
                    'fullname' => $form->fullname,
                    'email' => $form->email,
                    'message' => $form->message,
                    'slug' => $form->slug,
                    'auth' => $ownsByTheUserBool,
                    'type' => $type,
                    'id' => $form->id
                ]);
            }
        }else{
            echo '<div style="color: white;">Nincsenek elküldött üzenetei!</div>';
        }
    ?>
</div>