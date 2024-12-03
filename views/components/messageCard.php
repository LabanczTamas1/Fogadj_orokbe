<?php
function message_card(array $array)
{
?>
    <div class="message-card custom-shadow">
        <div class="message-body">
            <div class="message-info">
                <p class="message-name"><?=$array['fullname'] ?></p>
                <p class="message-email"><?= $array['email']?></p>
            </div>
            <?php if (($array['auth'] || $array['type'] == 'Developer') ): ?>  
            <div class="message-actions">
            <button onclick="document.navigateTo('/user/message/<?= $array['id']?>/edit')" message-btn message-delete>✏️ </button> 

                <a href="/message/<?= $array['id'] ?>/edit" class="message-btn message-edit" title="Módosítás">
                </a>
              <button onclick="document.navigateTo('/user/message/<?= $array['id']?>/delete')" message-btn message-delete> 🗑️ </button> 
            </div>
            <?php endif ?>
            <a href="#" data-toggle="modal" data-target="#messag<?= $array['id']?>">Több..</a>
        </div>
        <!-- Szöveg középen alul -->
        <div class="message-text">
            <p><?= nl2br($array['message']) ?></p>
        </div>
    </div>
    <div class="modal" id = "messag<?= $array['id']?>">
        <div class="model-dialog modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><?=$array['fullname'] ?></h2>
                </div>
                <div class="modal-body">
                    <?= nl2br($array['message']) ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
