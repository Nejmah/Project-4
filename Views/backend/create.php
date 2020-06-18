<h1>Ajouter un nouveau chapitre</h1>

<form class="create-chapter-form" method="post" action="/Project-4/chapters">
    <!-- Message d'erreur si le champ texte n'est pas complété -->
    <?php
        if (isset($contentError)){
    ?>
        <p class="alert alert-danger">Tous les champs sont obligatoires.</p>
    <?php    
        }
    ?>
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <input class="title-zone" type="text" name="title" placeholder="Titre du chapitre" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 text-right">
            <!-- rows ? cols ? placeholder ? -->
            <textarea name="content" rows="20" cols="100" placeholder="Texte"></textarea>
            <button type="submit" class="btn btn-primary button-form-post">Enregistrer</button>
        </div>
    </div>
</form>