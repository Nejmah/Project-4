<form class="password-form" method="post" action="<?= env("URL_PREFIX") ?>/auth/password/update">
    <div class="form-row justify-content-center">
        <div class="col-md-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe" required>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary" type="submit">Valider</button>
        </div>
    </div>
</form>