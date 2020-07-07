<?php
namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Manager\ChapterManager;
use App\Manager\CommentManager;

class ChapterController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/frontend/");
        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();
    }

    public function chapters() {   
        $this->response('chapters', [
            'chapters' => $this->chapterManager->all()
        ]);
    }

    public function chapter($id) {
        $this->response('chapter', [
            'chapter' => $this->chapterManager->find($id),
            'comments' => $this->commentManager->forChapter($id)
        ]);
    }
}
?>