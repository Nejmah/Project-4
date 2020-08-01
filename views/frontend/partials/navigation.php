<nav class="navbar navbar-expand-lg navbar-light" id="navigation">
    <a class="navbar-brand" href="<?= env("URL_PREFIX") . "/" ?>">
        <img class="moutain-img" src="<?= env("URL_PREFIX") ?>/assets/img/mountain.png" alt="mountain">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?php if ($metaTitle == 'Accueil') {echo 'active';} ?>">
                <a class="nav-link" href="<?= env("URL_PREFIX") . "/" ?>">ACCUEIL</a>
            </li>
            <li class="nav-item <?php if ($metaTitle == 'A propos') {echo 'active';} ?>">
                <a class="nav-link" href="<?= env("URL_PREFIX") ?>/about">A PROPOS</a>
            </li>
            <li class="nav-item <?php if ($metaTitle == 'Chapitres') {echo 'active';} ?>">
                <a class="nav-link" href="<?= env("URL_PREFIX") ?>/chapters">CHAPITRES</a>
            </li>
            <li class="nav-item <?php if ($metaTitle == 'Connexion') {echo 'active';} ?>">
                <?php
                if (isset($_SESSION['admin-connected']) 
                    && $_SESSION['admin-connected'] == true) {
                ?>
                    <a class="nav-link" href="<?= env("URL_PREFIX") ?>/admin">ADMINISTRATION</a>
                <?php
                }
                else {
                ?>
                    <a class="nav-link" href="<?= env("URL_PREFIX") ?>/login">CONNEXION</a>
                <?php
                }
                ?>
            </li>
        </ul>
    </div>
</nav>