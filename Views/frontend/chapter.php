<div class="chapter-page">

    <h1>Billet simple pour l'Alaska</h1>

    <p class="return"><a href="">Retour à la liste des billets</a></p>

    <div class="title-chapter">
        <h3><?= htmlspecialchars($chapter['title']); ?></h3>
        <p>Publié le <?= htmlspecialchars($chapter['creation_date_fr']); ?></p>
    </div>

    <div class="content-chapter">
        <p><?= $chapter['content']; ?></p>
    </div>

</div>
