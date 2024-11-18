<?php
function post_item(array $pet_card)
{
?>
    <div class="cta">
        <img src="/../../files/pet_image/<?=$pet_card['img']?>" alt="Person holding a dog" onclick="document.navigateTo('/pets/<?= $pet_card['slug'] ?>')">
        <div class="cta__text-column">
            <div class="pet-name"><?=$pet_card['pet_name']?></div>
            <div class="pet-breed"><?=$pet_card['pet_breed']?></div>
            <div class="pet-gender"><?=$pet_card['pet_gender']?></div>
            <div class="pet-age"><?=$pet_card['pet_age']?></div>
            <div class="description"><?=$pet_card['pet_description']?></div>
            <div class="linky">
            <button onclick="document.navigateTo('/../pages/pets'); return false;" class="shelter-button">Örökbefogadás</button>

            </div>
            <?php if ($pet_card['auth'] || $pet_card['type'] == 'Developer'): ?>
                <button onclick="document.navigateTo('/pets/<?= $pet_card['slug'] ?>/edit'); return false;">módosítás</button>
                <button onclick="document.navigateTo('/pets/<?= $pet_card['slug'] ?>/delete'); return false;">törlés</button>
            <?php endif ?>
        </div>
    </div>
<?php
}
?>
