<?php
use App\Controllers\SessionController;
Use App\Tools;
require_once __DIR__ . '/../lib/autoload.php';
if(!\App\Helper::isAuth()){
    header('Location: /');
}
$postItems = new App\Models\Posts;
$comments = new App\Models\Comment;
$recoms = new App\Models\Recommend;
$decoms = new App\Models\Unrecommend;
$db = new App\Database;

$postItems = $postItems->getItemsBy('user_id',$user->id);
$comments = $comments->getItemsBy('user_id', $user->id);
$recoms = $recoms->getItemsBy('user_id', $user->id);
$decoms = $decoms->getItemsBy('user_id', $user->id);
try{
    if($decoms){
        $db->delete_all('unrecommended_post','user_id', $user->id);
    }
    if($recoms){
        $db->delete_all('recommended_post','user_id', $user->id);
    }
    if($comments){
        $db->delete_all('comment','user_id', $user->id);
    }
    if($postItems){
        foreach($postItems as $postItem){
            $db->delete_all('comment','post_id', $postItem->id);
            $db->delete_all('unrecommended_post','post_id', $postItem->id);
            $db->delete_all('recommended_post','post_id', $postItem->id);
            $db->delete_all('posts','id', $postItem->id);
        }
    }
    $db->delete('users',$user->id);
    $destroy = new SessionController;
    $destroy->destroy();
    Tools::FlashMessage('Sikeresen Törölve lett','success');
    header('Location:/');
}catch(Exception $e){
    Tools::FlashMessage('Hiba: '.$e,'danger');
    header('Location: /');
}
?>
