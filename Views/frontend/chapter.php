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

    <h3>Commentaires</h3>

    <?php
    $str = "Un 'apostrophe' en <strong>gras</strong>.";
    echo ($str);
    ?>
    </br>
    <?php
    echo htmlentities($str);
    ?>
    </br>
    <?php
    echo htmlentities($str, ENT_QUOTES); // Marche pas
    ?>
    
    <div class="comments-list">
        <?php
        foreach ($comments as $comment) {
        ?>
        <div class="comment">
            <div class="comment-author">
                <h5><?= htmlspecialchars($comment->getAuthor()); ?></h5>
                <p>Publié le <?= $comment->getCreatedAt(); ?></p>
            </div>

            <div class="row comment-content">
                <div class="comment-text col-md-10">
                    <?= $comment->getContent(); ?>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-secondary" href="">Signaler</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <h3 class="add-comment">Ajouter un commentaire</h3>
    
    <form class="comment-form" method="post" action="/Project-4/comments">
        <input type="hidden" name="chapter_id" value="<?= $chapter->getId();?>">
        <input class="comment-title-input" type="text" name="author" id="author" 
            placeholder="Votre pseudo" value="<?= $authorValue ?>"required />
        
        <?php if (isset($errors['author'])) { ?>
        <div class="alert alert-danger text-left" role="alert">
            <?= $errors['author'] ?>
        </div>
        <?php } ?>
        
        <textarea class="comment-content-input" name="content" rows="3" cols="100" 
            placeholder="Votre commentaire" required>
            <?= $contentValue ?> 
        </textarea>

        <?php if (isset($errors['content'])) { ?>
        <div class="alert alert-danger text-left" role="alert">
            <?= $errors['content'] ?>
        </div>
        <?php } ?>

        <input class="publish-button btn btn-secondary" type="submit" value="Publier">
    </form>

</div>