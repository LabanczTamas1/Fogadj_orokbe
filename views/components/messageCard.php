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
            
            <div class="message-actions">
                <a href="/message/<?= $array['slug'] ?>/edit" class="message-btn message-edit" title="Módosítás">
                    ✏️
                </a>
                <a href="/message/<?= $array['slug'] ?>/delete" class="message-btn message-delete" title="Törlés">
                    🗑️
                </a>
            </div>
        </div>
        <!-- Szöveg középen alul -->
        <div class="message-text">
            <p><?= nl2br($array['message']) ?></p>
        </div>
    </div>
<?php
}
?>
