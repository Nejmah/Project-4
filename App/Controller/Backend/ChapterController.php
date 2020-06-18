<?php
namespace App\Controller\Backend;

use App\Controller\Controller;
use App\Manager\ChapterManager;

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

    public function saveChapter() {
        if (!empty($POST_['title']) && !empty($POST_['content'])) {

            $manager = new ChapterManager();

            $chapter = new Chapter([
                'title' => $POST_['title'],
                'content' => $POST_['content']
            ]);
             
            if (!$chapter->isValid()) {
                die('Donnée invalide'); // Faire une rédirection sur le formulaire sur lequel il était
                return; // Empêche que le reste de la fonction s'exécute ; la fonction s'arrête 
            }
            $chapter = $manager->add($chapter);


            // $manager->add($POST_['title'], $POST_['content']);

        }
        $this->render('saved', [
            'metaTitle' => "Administration"
        ]);
    }

    public function readChapterPage() {

    }

    public function updateChapterPage() {
        
    }

    public function deleteChapterPage() {
        
    }
}
?>