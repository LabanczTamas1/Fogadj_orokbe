<?php
function shelter_card(array $array)
{
    if(empty($array["count"])){
        $array["count"] = "Nincsen kisállat!";
    }
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
        <button onclick="document.navigateTo('/shelters/<?= $array['slug'] ?>')" class="shelter-button" ><?=$array["count"]?></button>
        </div>
        <?php if (($array['auth'] || $array['type'] == 'Developer') ): ?>
            <div id="card-buttons" style="display: flex; justify-content: space-between; width: 100%;">
                <button onclick="document.navigateTo('/shelters/<?= $array['slug']?>/edit')" class="shelter-button">módosítás ↻</button>
                <button onclick="document.navigateTo('/shelters/<?= $array['slug']?>/delete')" class="shelter-button">🗑</button>
            </div>
        <?php endif ?>
    </div>
<?php
}