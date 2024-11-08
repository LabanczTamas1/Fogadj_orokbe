<?php
function post_item(array $pet_card)
{
?>
    <div class="pet-card">
        <img src="/../../files/pet_image/<?=$pet_card['img']?>" alt="Person holding a dog">
        <div class="pet-information">
            <div class="pet-name">
                <?=$pet_card['pet_name']?>
            </div>
            <div class="pet-">
                <?=$pet_card['pet_breed']?>
            </div>
            <div class="pet-gender">
                <?=$pet_card['pet_gender']?>
            </div>
            <div class="pet-age">
                <?=$pet_card['pet_age']?>
            </div>
            <div class="description">
                <?=$pet_card['pet_description']?>
            <div class="linky">
        <button href="/../pages/pets" class="shelter-button">Örökbefogadás</button>
    </div>
        </div>
    </div>
    </div>
<?php
}
?>