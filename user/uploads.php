<?php
require_once __DIR__ . '/../lib/autoload.php';
include __DIR__ . '/../views/components/card.php';
new App\Template('empty');

?>

<main class="container">
<!-- Üdvözlő üzenet -->
<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>

<div class="account-container" style="background-color: black;margin-bottom: 10px; color:white;  width: 200px; border-radius: 100px;">
<a class="navbar-brand" href="/../pets/create.php" style="display:flex; justify-content: space-evenly; text-decoration: none; color: white;"></a>
</div>
<h3 class="section-title">Feltöltések:</h3>

</main>