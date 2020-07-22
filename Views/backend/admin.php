<h1>Bienvenue dans votre espace</h1>

<div class="return-button">
    <a href="/Project-4" data-toggle="tooltip" title="Retour au site">
        <img class="moutain-img" src="/Project-4/assets/img/mountain.png" alt="mountain">
    </a>
</div>

<div class="admin-nav">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link moderate-comments" href="/Project-4/moderate"><?= $totalReported ?> commentaires à modérer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Project-4/create">Ajouter un chapitre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Project-4/manage">Gérer les chapitres</a>
        </li>
    </ul>
</div>

<div class="logout-button">
    <a href="/Project-4/logout" data-toggle="tooltip" title="Déconnexion">
        <img src="/Project-4/assets/img/logout.png" alt="logout">
    </a>
</div>