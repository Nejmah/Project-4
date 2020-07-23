<main class="login-page">
    <form class="login-form" method="post" action="/Project-4/connexion">
        <div class="form-row justify-content-center">
            <div class="col-md-3">
                <?php
                if (isset($error) && $error == 'invalid-password')
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
</main>