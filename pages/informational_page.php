<?php
require_once __DIR__ . '/../lib/autoload.php';
use App\Helper;

new App\Template('chooseOption','empty');

?>

<div class="information">
<section class="about">
        <div class="container">
            <h2>A menhelyről</h2>
            <p>Menhelyünk célja, hogy biztonságos és szeretetteljes otthont biztosítsunk elhagyott vagy bántalmazott állatoknak, míg új családot nem találnak.</p>
            <div class="show-images">
                <img src="/../files/img/SPEEDY2-768x1253.jpg" alt="Menhelyi állatok" height="250px">
                <img src="/../files/img/SPEEDY2-768x1253.jpg" alt="Menhelyi állatok" height="250px">
                <img src="/../files/img/SPEEDY2-768x1253.jpg" alt="Menhelyi állatok" height="250px">
            </div>
        </div>
    </section>

    <section class="information">
    <section class="intro">
        <div class="container">
            <h2>Üdvözöljük a Menhelyek és Örökbefogadók Platformján!</h2>
            <p>Ez az oldal segít összekötni a menhelyeket az örökbefogadni vágyó személyekkel. Menhelyek regisztrálhatják magukat, és feltölthetik az örökbefogadásra szánt állatokat. Az örökbefogadók pedig könnyedén kereshetnek és örökbefogadhatnak.</p>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
            <h2>Hogyan működik?</h2>
            <div class="steps">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <h3>Menhelyek regisztrációja</h3>
                <p>Ha menhelyet üzemeltetsz, egyszerűen regisztrálj a platformon! Miután sikeresen regisztráltál, hozzáadhatod az állataidat, akik szeretnének új otthonra találni.</p>
            </div>
            <div class="flip-card-back">
                <a href="../userhandle/register">Kattints ide a regisztrációhoz</a>
            </div>
        </div>
    </div>
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
            <h3>Állatok hozzáadása</h3>
            <p>Menhelyek adhatnak hozzá állatokat a rendszerhez, részletes információkkal és fényképekkel, hogy a potenciális örökbefogadók könnyebben választhassanak.</p>
            </div>
            <div class="flip-card-back">
                <a href="../userhandle/register">Kattints ide a regisztrációhoz</a>
            </div>
        </div>
    </div>
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
            <h3>Örökbefogadás</h3>
            <p>Örökbefogadók böngészhetnek a regisztrált állatok között, és egyszerűen kapcsolatba léphetnek a menhellyel az örökbefogadás megkezdéséhez.</p>
            </div>
            <div class="flip-card-back">
                <a href="../userhandle/register">Kattints ide a regisztrációhoz</a>
            </div>
        </div>
    </div>


            </div>
        </div>
    </section>

    <section class="information">
        <div class="container">
            <h2>Fontos információk</h2>
            <div class="info">
                <h3>Kapcsolat</h3>
                <p>Ha bárminemű kérdésed van, keresd fel ügyfélszolgálatunkat: </p>
                <p>Email: info@allatmenhely.hu</p>
                <p>Telefon: +36 1 234 5678</p>
            </div>
        </div>
    </section>
</div>