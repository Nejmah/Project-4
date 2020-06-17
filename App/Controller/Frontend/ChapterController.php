<?php
namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Manager\ChapterManager;

class ChapterController extends Controller {

    protected $manager;

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/frontend/");
        $this->manager = new ChapterManager();
    }

    public function chapters() {     
        // $manager = new ChapterManager();

        // $chapters = $manager->all();

        $this->response('chapters', [
            // 'metaTitle' => "Chapitres",
            'chapters' => $this->manager->all()
        ]);
    }

    public function chapter($id) {
        // $manager = new ChapterManager();

        // $chapter = $manager->find($id);

        $this->response('chapter', [
            // 'metaTitle' => "Chapitres",
            'chapter' => $this->manager->find($id)
        ]);
    }
}
?>