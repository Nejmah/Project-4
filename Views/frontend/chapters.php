<?php
    if (empty($chapters)) {
        ?>
        <p class="no-chapter-msg">Désolé, il n'y a pas de chapitres publiés pour le moment...</p>
        <?php
    }
    else {
        foreach ($chapters as $chapter) {
            ?>
            <div class="title-chapter">
                <h3><?= htmlspecialchars($chapter->getTitle()); ?></h3>
                <p>Publié le <?= $chapter->getCreatedAt(); ?></p>
            </div>
            <div class="content-chapter">
                <div class="row">
                    <div class="col-md-10">
                        <!-- Limite le texte à 250 caractères -->
                        <?= substr($chapter->getContent(), 3, 250); ?>
                    </div>
                    <div class="col-md-2 read-more-button">
                        <a class="btn btn-secondary" href="/Project-4/chapters/<?= $chapter->getId(); ?>">Lire la suite</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>