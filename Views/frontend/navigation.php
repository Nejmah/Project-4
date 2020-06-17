<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="/Project-4"><img class="moutain-img" src="/Project-4/assets/img/mountain.png" alt="mountain"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/Project-4">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Project-4/about">A PROPOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Project-4/chapters">CHAPITRES</a>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['admin-connected']) 
                && $_SESSION['admin-connected'] == true) {
                ?>
                    <a class="nav-link" href="/Project-4/admin">ADMINISTRATION</a>
                <?php
                }
                else {
                ?>
                    <a class="nav-link" href="/Project-4/login">CONNEXION</a>
                <?php
                }
                ?>
            </li>
        </ul>
    </div>
</nav>