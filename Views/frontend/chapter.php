<div class="chapter-page">

    <h1>Billet simple pour l'Alaska</h1>

    <p class="return">
        <a href="/Project-4/chapters">Retour à la liste des chapitres</a>
    </p>

    <div class="title-chapter">
        <h3><?= htmlspecialchars($chapter->getTitle()); ?></h3>
        <p>Publié le <?= $chapter->getCreatedAt(); ?></p>
    </div>

    <div class="content-chapter">
        <p><?= htmlspecialchars($chapter->getContent()); ?></p>
    </div>

</div>