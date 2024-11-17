<?php
function shelter_card(array $array)
{
?>
    <div class="shelter-card" >
        <img src="/../../files/shelter_image/<?=$array['img']?>" alt="<?=$array['shelter_name']?>" onclick="document.navigateTo('/shelters/<?= $array['slug'] ?>')">
        <div class="shelter-information">
            <div class="shelter-name">
            <?=$array['shelter_name']?>
            </div>
            <div class="shelter-location">
            <?=$array['city']?>
            </div>
        </div>
        <div class="linky">
        <button onclick="document.navigateTo('/shelters/<?= $array['slug'] ?>')" class="shelter-button" >x darab kisállat</button>
        </div>
        <?php if (($array['auth'] || $array['type'] == 'Developer') ): ?>
                <button onclick="document.navigateTo('/shelters/<?= $array['slug']?>/edit')"> módosítás</button> 
                <button onclick="document.navigateTo('/shelters/<?= $array['slug']?>/delete')">törlés</button>
        <?php endif ?>
    </div>
<?php
}