<?php
require_once __DIR__ . '/../../lib/autoload.php';
new App\Template('login','empty');
?>
 <main class="container">
 <h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
    <a href="/../user/uploads.php">Új poszt</a>
    <a href="/../user/modify.php">módosítás</a>

    
    <h3>Összes Poszt<h3>
    <div class="filter-container">
            <div class="continent-container">
            <label for="continent">Kontinens: </label>
            <select id="continent" class="filter-select">
                <option value="Európa">Európa</option>
                <option value="Ázsia">Ázsia</option>
                <option value="Afrika">Afrika</option>
                <option value="Észak-Amerika">Észak-Amerika</option>
                <option value="Dél-Amerika">Dél-Amerika</option>
                <option value="Ausztrália">Ausztrália</option>
                <option value="Antarktisz">Antarktisz</option>
            </select>
    </div>

            <label for="country">Ország: </label>
            <input type="text" id="country" class="search-input" placeholder="Search...">

            <label for="city">Város: </label>
            <input type="text" id="city" class="search-input" placeholder="Search...">
        </div>


        </div>
    </main>
