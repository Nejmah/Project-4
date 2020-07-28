<?php
    foreach ($chapters as $chapter) {
    ?>
    <div class="row chapters-table align-items-center">
        <div class="col-md-9 chapter-title-table">
            <?= htmlspecialchars($chapter->getTitle()); ?>
        </div>
        <div class="col-md-3 text-right">
            <?php
            $url = env("URL_PREFIX") . "/admin/chapters/" . $chapter->getId();
            ?>
            <a class="btn btn-secondary"
                href="<?= $url; ?>/edit">
                Modifier
            </a>
            <button type="button" class="btn btn-danger delete-chapter-button" 
                data-toggle="modal" data-target="#deleteChapterModal" 
                data-delete-url="<?= $url; ?>/delete">
                Supprimer
            </button>
        </div>
    </div>
    <?php
    }
?>

<!-- Popup pour confirmer la suppression d'un billet -->
<div class="modal fade" id="deleteChapterModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Attention</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-dark">
            Voulez-vous vraiment supprimer ce chapitre ?
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