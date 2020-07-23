<div class="chapters-page">
    <h1>Billet simple pour l'Alaska</h1>
    <?php
    foreach ($chapters as $chapter) {
        ?>
        <div class="chapter-title">
            <h3><?= htmlspecialchars($chapter->getTitle()); ?></h3>
            <p>Publié le <?= $chapter->getCreatedAt(); ?></p>
        </div>
        <div class="chapter-content">
            <!-- Limite le texte à 500 caractères -->
            <?= substr($chapter->getContent(), 0, 500); ?>

            <div class="read-more-button">
                <a class="btn btn-secondary" 
                    href="/Project-4/chapters/<?= $chapter->getId(); ?>">
                    Lire la suite
                </a>
            </div>
        </div>
        <?php
    }
    ?>
</div>