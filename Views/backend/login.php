<div class="container">
    <a class="btn btn-outline-light home-button" href="<?= $loginPageUrl ?>">Accueil</a>

    <form class="login-form" method="post" action="index.php?action=admin-index">
        <div class="form-row justify-content-center">
            <div class="col-md-3">
                <?php
                // Si la variable existe dans le tableau et si sa valeur c'est invalid
                if (isset($_GET['error']) && $_GET['error'] == 'invalid')
                {
                ?>
                    <input type="password" class="form-control is-invalid" id="password" name="password" placeholder="Mot de passe" required>
                    <div class="invalid-feedback">
                        Mot de passe incorrect !
                    </div>
                <?php
                }
                else {
                ?>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                <?php
                }
                ?>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit">Entrez</button>
            </div>
        </div>
    </form>
</div>