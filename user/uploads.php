<?php
require_once __DIR__ . '/../lib/autoload.php';
include __DIR__ . '/../views/components/card.php';
new App\Template('login', 'empty');

$countries = new App\Models\Country;
$continents = new App\Models\Continents;
$cities = new App\Models\City;
$posts = new App\Models\Posts;
$post_collection = null;
$comments = new App\Models\Comment;
$like = new App\Models\Recommend;
$dislike = new App\Models\Unrecommend;


$continent_filter = isset($_GET['continents']) ? $_GET['continents'] : 0;
$country_filter = isset($_GET['countries']) ? $_GET['countries'] : 0;
$city_filter = isset($_GET['cities']) ? $_GET['cities'] : 0;


$filter = $continent_filter || $country_filter || $city_filter;
$filters = [];

if ($filter) {
    if ($continent_filter) {
        $filters['continent_id'] = $continent_filter;
    }
    if ($country_filter) {
        $filters['country_id'] = $country_filter;
    }
    if ($city_filter) {
        $filters['city_id'] = $city_filter;
    }

    $post_collection = $posts->filter($filters);
} else {
    $post_collection = $posts->getItemsBy('user_id', $user->id);
}

?>

<main class="container">
<!-- Üdvözlő üzenet -->
<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>

<!-- Új poszt gomb -->
<div class="account-container" style="background-color: black;margin-bottom: 10px; color:white;  width: 200px; border-radius: 100px;">
<a class="navbar-brand" href="/../posts/create.php" style="display:flex; justify-content: space-evenly; text-decoration: none; color: white;">
<h4 style="padding-top:8px; padding-left:8px;">Új poszt</h4>
</a>
</div>

<!-- Posztok szekció címe -->
<h3 class="section-title">Posztjaim</h3>



<!-- Szűrők szekció -->
<div class="filter-section">
<div class="filter-container">
<form method="get" class="form">
<select id="continent" class="filter-select">
<option value="0">Összes Kontinens</option>
<?php foreach ($continents->all() as $continent) : ?>
<option value="<?= $continent->id ?>" class="dropdown-text"><?= $continent->continent_name ?></option>
<?php endforeach ?>
</select>
</form>
</div>

<div class="filter-container">
<form method="get" class="form">
<select id="country" class="filter-select">
<option value="0">Összes Ország</option>
<?php foreach ($countries->all() as $country) : ?>
<option value="<?= $country->id ?>" class="dropdown-text"><?= $country->country_name ?></option>
<?php endforeach ?>
</select>
</form>
</div>

<div class="filter-container">
<form method="get" class="form">
<select id="city" class="filter-select">
<option value="0">Összes Város</option>
<?php foreach ($cities->all() as $city) : ?>
<option value="<?= $city->id ?>" class="dropdown-text"><?= $city->city_name ?></option>
<?php endforeach ?>
</select>
</form>
</div>
</div>

<div class="posts-section">
<?php
if ($post_collection){
    foreach ($post_collection as $post) {
        $ownsByTheUserBool = $user ? $post->ownsByTheUser($user->id) : false;
        $type = $user ? $user->type :false;
        post_item([
            'img' => '/files/blog_image/'.$post->image,
            'title' => $post->postname,
            'description' => $post->description,
            'city'=> $cities->getItemBy('id',$post->city_id)->city_name,
                  'slug' =>'/posts/'. $post->slug,
                  'auth' => $ownsByTheUserBool,
                  'like_count' => $like->count('post_id', $post->id),
                  'dislike_count' => $dislike->count('post_id', $post->id),
                  'comment_count' =>$comments->count('post_id', $post->id),
                  'type' => $type
        ]);
    }
}else{
    echo'<p>Nincs több megjeleníthető Blog.</p>';
}
?>
</div>
</main>
