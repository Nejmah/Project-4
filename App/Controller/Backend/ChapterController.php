<?php
namespace App\Controller\Backend;

use App\Controller\Controller;
use App\Manager\ChapterManager;
use App\Model\Chapter;

class ChapterController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/");
        $this->manager = new ChapterManager();
    }

    public function create() {
        $this->response('create', [
            'titleValue' => $this->hasInputs('title'),
            'contentValue' => $this->hasInputs('content'),
            'errors' => $_SESSION['errors']
        ]);
    }

    public function table() {
        $this->response('table', [
            'chapters' => $this->manager->all()
        ]);
    }

    public function store() {
        $chapter = new Chapter([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);

        if (!$chapter->isValid()) {
            // On redirige sur le formulaire (pré-rempli)
            return $this->create();
        }

        $chapter = $this->manager->add($chapter);
        // On vide errors & inputs
        $this->emptyErrorsAndInputs();
        $this->table();
    }

    public function edit($id) {
        // Afficher le formulaire pour le modifier
        $chapter = $this->manager->find($id);
        $this->response('edit', [
            'chapter' => $chapter
        ]);
    }
    
    public function update($id) {
        $chapter = $this->manager->find($id);

        $chapter->setTitle($_POST['title']);
        $chapter->setContent($_POST['content']);

        $this->manager->update($chapter);

        $this->table();
    }

    public function delete($id) {
        $chapter = $this->manager->find($id);

        $this->manager->delete($chapter);

        $this->table();
    }
}
?>