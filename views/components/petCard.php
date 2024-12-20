<?php
function post_item(array $pet_card)
{
?>
    <div class="pet-card">
    <img src="/../../files/pet_image/<?=$pet_card['img']?>" alt="Person holding a dog" onclick="document.navigateTo('/pets/<?= $pet_card['slug'] ?>')">
    <div class="pet-information">
    <div class="pet-name"><?=$pet_card['pet_name']?></div>
            <div class="pet-breed">Faj: <?=$pet_card['pet_breed']?></div>
            <div class="pet-gender">Nem: <?=$pet_card['pet_gender']?></div>
            <div class="pet-age">Kor: <?=$pet_card['pet_age']?></div>
            <div class="description" style="color: white;">Leírás: <?=$pet_card['pet_description']?></div>
            <div class="linky-pet">
            <button onclick="document.navigateTo('/pets/<?= $pet_card['slug'] ?>/form'); return false;" class="shelter-button">Örökbefogadás</button>

            </div>
            <?php if ($pet_card['auth'] || $pet_card['type'] == 'Developer'): ?>
                <div id="card-buttons" style="display: flex; justify-content: space-between; width: 100%;">
                <button onclick="document.navigateTo('/pets/<?= $pet_card['slug'] ?>/edit'); return false;" class="shelter-button">módosítás ↻</button>
                <button onclick="document.navigateTo('/pets/<?= $pet_card['slug'] ?>/delete'); return false;" class="shelter-button">🗑</button>
            </div>
                <?php endif ?>
        </div>
    </div>
<?php
}
?>
