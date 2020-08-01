<main class="login-page">
    <div>
        <form class="login-form" method="post" action="<?= env("URL_PREFIX") ?>/login">
            <div class="form-row justify-content-center">
                <div class="col-lg-3 col-md-4 col-6">
                    <?php
                    if (isset($error) && $error == 'invalid-password') {
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
                <div class="col-lg-1 col-2">
                    <button class="btn btn-primary" type="submit">Entrez</button>
                </div>
            </div>
        </form>
    </div>
</main>