<?php
require_once __DIR__ . '/../lib/autoload.php';
use App\Helper;

new App\Template('chooseOption','empty');


?>


<div class="container-choose">
        <!-- Left Card for Menhelyek -->
        <a href="../shelters">
            <div class="card-u">
                <div class="title">Menhelyek</div>
                <img src="/files/img/image1.png" alt="Shelter Image">
            </div>
        </a>

        <!-- Right Card for Örökbefogadásra váró állatok -->
        <a href="../pets">
        <div class="card-u">
                <div class="title">Örökbefogadásra váró állatok!</div>
                <img src="/files/img/image2.png" alt="Animals waiting for adoption">
        </div>
    </a>
</div>