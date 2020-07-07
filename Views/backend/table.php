<h1 class="chapters-table-title">Gérer les chapitres</h1>

<?php
    foreach ($chapters as $chapter) {
    ?>
    <div class="row chapters-table align-items-center">
        <div class="col-md-9 chapter-title-table">
            <?= htmlspecialchars($chapter->getTitle()); ?>
        </div>
        <div class="col-md-3 text-right">
            <a class="btn btn-secondary"
                href="/Project-4/chapters/<?= $chapter->getId(); ?>/edit">
                Modifier
            </a>
            <button type="button" class="btn btn-danger delete-post-button" 
                data-toggle="modal" data-target="#deleteModal" 
                data-delete-url="/Project-4/chapters/<?= $chapter->getId(); ?>/delete">
                Supprimer
            </button>
        </div>
    </div>
    <?php
    }
?>

<!-- Popup pour confirmer la suppression d'un billet -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
            <a class="btn btn-danger delete-link" href="#">Confirmer</a>
        </div>
        </div>
    </div>
</div>