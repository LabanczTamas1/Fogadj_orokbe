<?php
function shelter_card(array $array)
{
?>
    <div class="shelter-card" onclick="document.navigateTo('/shelters/<?= $array['slug'] ?>')">
        <img src="/../../files/shelter_image/<?=$array['img']?>" alt="<?=$array['shelter_name']?>">
        <div class="shelter-information">
            <div class="shelter-name">
            <?=$array['shelter_name']?>
            </div>
            <div class="shelter-location">
            <?=$array['city']?>
            </div>
        </div>
        <div class="linky">
        <button href="/../pages/pets" class="shelter-button">x darab kisállat</button>
    </div>
    </div>
<?php
}