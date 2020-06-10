<div class="container home-page">
    <h1>Billet simple pour l'Alaska</h1>
    <div class="presentation">
        <p class="under-title">Découvrez le nouveau roman de Jean Forteroche</p>
        <!-- <img src="assets/img/book4.png" alt="book"> -->
    </div>
    <?php
    // Si l'utilisateur n'est pas connecté
    if (!isset($_SESSION['admin-connected'])) {
    ?>
        <!-- On affiche le bouton de connexion -->
        <a class="btn btn-outline-primary login-button" href="<?= $loginPageUrl ?>">Connexion</a>
    <?php
    }
    else {
    ?>
        <!-- Sinon, on affiche un bouton pour accéder au backend -->
        <a class="btn btn-outline-primary login-button" href="index.php?action=admin-index">Administration</a>
    <?php
    }
    ?>

    <div>
        <div>
            <!-- <img src="assets/img/book.jpeg" alt="book"> -->
        </div>    
        <div class="author-presentation">
            <p class="text-presentation">Acteur et écrivain français, <strong>Jean Forteroche</strong> est passionné d'alpinisme.
            Après avoir écrit <em>Tragédie à l'Everest</em>, récit qui lui a valu sa notoriété et
            qui fut adapté dans le film Everest en 2015, Jean Forteroche travaille actuellement
            sur un nouveau roman : <em>Billet simple pour l'Alaska</em>, récit qui retrace
            l'histoire véridique d'un jeune homme qui a troqué la civilisation pour un retour
            à la vie sauvage... Découvrez ses aventures chapitre par chapitre sur son blog...</p>
        </div>
        <p class="chapters-button text-center">
                <a class="text-chapters-button btn btn-secondary btn-lg" href="<?= $loginPageUrl ?>">Chapitres</a>
        </p>
    </div>
</div>