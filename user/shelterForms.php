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
$formModel = new App\Models\Form;
$forms = $formModel->getItemsBy('shelter_id',$shelter->id);
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
                    'message' => substr($form->message,0,39).'....',
                    'slug' => $form->slug,
                    'auth' => $ownsByTheUserBool,
                    'type' => $type
                ]);
            }
        }else{
            echo '<div style="color: white;">Nincsenek elküldött üzenetei!</div>';
        }
    ?>
</div>