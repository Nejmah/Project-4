<form class="update-chapter-form" method="post" action="<?= env("URL_PREFIX") ?>/admin/chapters/<?= $chapter->getId(); ?>/update">
    <div class="form-row">
        <div class="form-group col-md-12">
            <input class="title-zone" type="text" name="title" 
                placeholder="Titre du chapitre" 
                value="<?= $chapter->getTitle() ?>" 
                required >

                <?php if (isset($errors['title'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errors['title'] ?>
                </div>
                <?php } ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 text-right">
            <!-- rows ? cols ? placeholder ? -->
            <textarea name="content" rows="20" cols="100" placeholder="Texte">
                <?= $chapter->getContent() ?>
            </textarea>
            
            <?php if (isset($errors['content'])) { ?>
            <div class="alert alert-danger text-left" role="alert">
                <?= $errors['content'] ?>
            </div>
            <?php } ?>

            <button type="submit" class="btn btn-primary button-form-post">Enregistrer</button>
        </div>
    </div>
</form>