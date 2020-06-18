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
        $this->response('create');
    }

    public function save() {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {

            $chapter = new Chapter([
                // Tableau $data
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);

            if (!$chapter->isValid()) {
                // TO DO
                // Redirection sur le formulaire sur lequel il était
                die('Donnée invalide');
                return;
            }

            $newChapter = $this->manager->add($chapter);
            header('Location: /Project-4/chapters/' . $newChapter->getId());
        }
        // Retourner sur le formulaire ?
        die('Veuillez remplir tous les champs');
        return;
    }

    public function update() {
        
    }

    public function delete() {
        
    }
}
?>