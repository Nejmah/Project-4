<?php
namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Manager\ChapterManager;

class ChapterController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/frontend/");
        $this->manager = new ChapterManager();
    }

    public function chapters() {     
        $this->response('chapters', [
            'chapters' => $this->manager->all()
        ]);
    }

    public function chapter($id) {
        $this->response('chapter', [
            'chapter' => $this->manager->find($id)
        ]);
    }
}
?>