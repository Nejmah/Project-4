<div class="container">
    <h1>Billet simple pour l'Alaska</h1>

    <?php
    // Si l'utilisateur n'est pas connecté
    if (!isset($_SESSION['admin-connected'])) {
    ?>
        <!-- On affiche le bouton de connexion -->
        <a class="btn btn-outline-primary login-button" href="">Connexion</a>
    <?php 
    }
    else {
    ?>
        <!-- Sinon, on affiche un bouton pour accéder au backend -->
        <a class="btn btn-outline-primary login-button" href="">Administration</a>
    <?php
    }
    ?>
        
    <a class="btn btn-outline-light home-button" href="">Accueil</a>
    <p class="return"><a href="">Retour à la liste des billets</a></p>

    <div class="title-chapter">
        <h3><?= htmlspecialchars($chapter['title']); ?></h3>
        <p>Publié le <?= htmlspecialchars($chapter['creation_date_fr']); ?></p>
    </div>
    <div class="content-chapter">
        <p><?= $chapter['content']; ?></p>
    </div>
</div>