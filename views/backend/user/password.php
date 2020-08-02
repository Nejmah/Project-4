<div class="password-form-instructions">
    <p>Votre mot de passe doit contenir :</p>
    <ul>
        <li>un minimum de 8 caractères</li>
        <li>une lettre majuscule</li>
        <li>un chiffre</li>
        <li>un caractère spécial</li>
    </ul>
</div>

<form class="password-form" method="post" action="<?= env("URL_PREFIX") ?>/auth/password/update">
    <div class="form-row justify-content-center">
        <div class="col-lg-3 col-sm-6 col-9">
            <?php
            if (isset($error) && $error == 'invalid-password') {
            ?>
                <input type="password" class="form-control is-invalid" id="password" name="password" placeholder="Mot de passe" required>
                <div class="invalid-feedback">
                    Mot de passe pas assez fort !
                </div>
            <?php
            }
            else {
            ?>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe" required>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-1 text-center">
            <button class="btn btn-primary button-passwordform-post" type="submit">Valider</button>
        </div>
    </div>

    <!-- Report-Alert : message de succès -->
    <?php
    if (isset($passwordUpdated)) {
    ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Votre mot de passe a bien été enregistré.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    }
    ?>

</form>