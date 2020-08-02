<div class="return-button">
    <a href="<?= env("URL_PREFIX") ?>" data-toggle="tooltip" title="Retour au site">
        <img class="moutain-img" src="<?= env("URL_PREFIX") ?>/assets/img/mountain.png" alt="mountain">
    </a>
</div>

<div class="admin-nav">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link moderate-comments" href="<?= env("URL_PREFIX") ?>/admin/comments/moderate">
                <?php 
                if ($totalReported < 2) {
                ?>
                    <?= $totalReported ?> commentaire à modérer</a>
                <?php
                }
                else {
                ?>
                    <?= $totalReported ?> commentaires à modérer</a>
                <?php
                }
                ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= env("URL_PREFIX") ?>/admin/chapters/create">Ajouter un chapitre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= env("URL_PREFIX") ?>/admin/chapters/manage">Gérer les chapitres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= env("URL_PREFIX") ?>/auth/password/edit">Modifier le mot de passe</a>
        </li>
        <li class="nav-item">
            <form method="post" action="<?= env("URL_PREFIX") ?>/logout">
                <button class="btn large-logout-button" type="submit" data-toggle="tooltip">
                    Déconnexion
                </button>
            </form>
        </li>
    </ul>
</div>