<div class="return-button">
    <a href="<?= env("URL_PREFIX") ?>" data-toggle="tooltip" title="Retour au site">
        <img class="moutain-img" src="<?= env("URL_PREFIX") ?>/assets/img/mountain.png" alt="mountain">
    </a>
</div>

<div class="admin-nav">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link moderate-comments" href="<?= env("URL_PREFIX") ?>/admin/comments/moderate"><?= $totalReported ?> commentaires à modérer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= env("URL_PREFIX") ?>/admin/chapters/create">Ajouter un chapitre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= env("URL_PREFIX") ?>/admin/chapters/manage">Gérer les chapitres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= env("URL_PREFIX") ?>/auth/password/edit">Changer le mot de passe</a>
        </li>

    </ul>
</div>