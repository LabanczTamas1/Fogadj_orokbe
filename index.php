<?php
require_once __DIR__ . '/lib/autoload.php';
include './views/components/shelterCard.php';
new App\Template('Főoldal', 'home_layout');

?>

<div class="card">
    <img src="files/img/SPEEDY2-768x1253.jpg" alt="Person holding a dog" width="0px" height="600px">
    <div class="shelter information">
        <div class="shelter-name">
            Name of the menhely
        </div>
        <div class="shelter-loation">
            Location
        </div>
    </div>
</div>