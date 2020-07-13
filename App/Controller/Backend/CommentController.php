<?php
namespace App\Controller\Backend;

use App\Controller\Controller;
use App\Manager\CommentManager;
use App\Model\Comment;

class CommentController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/");
        $this->manager = new CommentManager();
    }

    public function store() {
        $comment = new Comment([
            'chapterId' => $_POST['chapter_id'],
            'author' => $_POST['author'],
            'content' => $_POST['content']
        ]);

        if ($comment->isValid()) {
            $this->manager->add($comment);
            // On vide errors & inputs
            $this->emptyErrorsAndInputs();    
        }
        header('Location: /Project-4/chapters/' . $_POST['chapter_id']);
    }
}
?>