<?php
function message_card(array $array)
{
?>
    <div class="shelter-card" >
        <div class="shelter-information">
            <div class="user-fullname">
            <?=$array['fullname']?>
            </div>
            <div class="user-email">
            <?=$array['city']?>
            </div>
        </div>
        <div class="message">
            <?=$array['message']?>
        </div>
        <?php if (($array['auth'] || $array['type'] == 'Developer') ): ?>
                <button onclick="document.navigateTo('/message/<?= $array['slug']?>/edit')"> módosítás</button> 
                <button onclick="document.navigateTo('/message/<?= $array['slug']?>/delete')">törlés</button>
        <?php endif ?>
    </div>
<?php
}