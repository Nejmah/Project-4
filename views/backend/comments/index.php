<?php
    foreach ($comments as $comment) {
    ?>
    <div class="row comments-table align-items-center">

        <div class="col-md-9 comment-title-table">
            <?= htmlentities($comment->getContent()); ?>
        </div>

        <div class="col-md-3 text-right">
            <?php
            $url = env("URL_PREFIX") . "/admin/comments/" . $comment->getId();
            ?>
            <form method="post" action="<?= $url; ?>/approve">
                <input type="hidden" name="from" value="backend">
                <button class="btn btn-secondary" type="submit">
                    Approuver
                </button>
            </form>
            <form method="post" action="<?= $url; ?>/delete">
                <button class="btn btn-danger delete-comment-button" type="button"
                    data-toggle="modal" data-target="#deleteCommentModal" 
                    data-delete-url="<?= $url; ?>/delete">
                    Supprimer
                </button>
            </form>
        </div>
        
    </div>
    <?php
    }
?>

<!-- Popup pour confirmer la suppression d'un billet -->
<div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Attention</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                Voulez-vous vraiment supprimer ce commentaire ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form method="post" action="#" class="delete-form">
                    <button class="btn btn-danger delete-link" type="submit">
                        Confirmer
                    </button>
                </form>            
            </div>
        </div>
    </div>
</div>