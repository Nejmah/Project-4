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

    <div class="comments-list">
        <?php
        foreach ($comments as $comment) {
        ?>
        <div class="comment">
            <div class="comment-author">
                <h5><?= htmlentities($comment->getAuthor()); ?></h5>
                <p>Publié le <?= $comment->getCreatedAt(); ?></p>
            </div>

            <div class="row comment-content">
                <div class="comment-text col-md-9">
                    <?= htmlentities($comment->getContent()); ?>
                </div>
                <div class="col-md-3 text-right">
                    <?php
                    $url = "/Project-4/comments/" . $comment->getId();

                    if (isset($_SESSION['admin-connected']) 
                        && $_SESSION['admin-connected'] == true) {
                        // L'administrateur est connecté
                        
                        if ($comment->getIsReported()
                            && $comment->getIsApproved() != 1) {
                            // Commentaire déjà signalé mais pas approuvé
                        ?>
                            <form method="post" action="<?= $url; ?>/approve">
                                <button class="btn btn-secondary" type="submit">Approuver</button>
                            </form>
                            <form method="post" action="<?= $url; ?>/delete">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        <?php
                        }
                    }
                    else { // Non connecté : on affiche le bouton Signaler si le commentaire n'est pas approuvé
                        if ($comment->getIsApproved() != 1) {
                        ?>
                            <form method="post" action="<?= $url; ?>/report">
                                <button class="btn btn-secondary" type="submit">Signaler</button>
                            </form>
                        <?php
                        }
                    }
                    ?>
                </div>

                <!-- Report-Alert : message de succès -->
                <?php
                if ($comment->getIsReported()) {
                    ?>
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        Le commentaire a été signalé.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>

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
        
        <textarea class="comment-content-input" name="content" 
            rows="3" cols="100" 
            placeholder="Votre commentaire" 
            required><?= $contentValue ?></textarea>

        <?php if (isset($errors['content'])) { ?>
        <div class="alert alert-danger text-left" role="alert">
            <?= $errors['content'] ?>
        </div>
        <?php } ?>

        <input class="publish-button btn btn-secondary" type="submit" value="Publier">
    </form>

</div>