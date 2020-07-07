<div class="chapter-page">

    <h1>Billet simple pour l'Alaska</h1>

    <p class="return">
        <a href="/Project-4/chapters">Retour à la liste des chapitres</a>
    </p>

    <div class="chapter-title">
        <h3><?= htmlspecialchars($chapter->getTitle()); ?></h3>
        <p>Publié le <?= $chapter->getCreatedAt(); ?></p>
    </div>

    <div class="chapter-content">
        <p><?= $chapter->getContent(); ?></p>
    </div>

    <h3 class="comments">Commentaires</h3>

    <?php
    foreach ($comments as $comment) {
    ?>
    <div class="comments-list">
        <div class="comment-author">
            <h3><?= htmlspecialchars($comment->getAuthor()); ?></h3>
            <p>Publié le <?= $comment->getCreatedAt(); ?></p>
        </div>

        <div class="comment-content">
            <?= $comment->getContent(); ?>
        </div>
    </div>
    <?php
    }
    ?>

    <h3 class="add-comment">Ajouter un commentaire</h3>
    
    <form class="comment-form" method="post" action="/Project-4/comments">
        <input type="hidden" name="chapter_id" value="<?= $chapter->getId();?>">
        <input class="comment-title-input" type="text" name="author" id="author" placeholder="Votre pseudo" required />
        <textarea class="comment-content-input" name="content" rows="3" cols="100" placeholder="Votre commentaire" required></textarea>
        <input class="publish-button btn btn-secondary" type="submit" value="Publier">
    </form>

</div>