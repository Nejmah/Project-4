<?php
namespace App\Controller\Backend;

use App\Controller\Controller;
use App\Manager\CommentManager;
use App\Model\Comment;

class CommentController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/comments/");
        $this->manager = new CommentManager();

        // On vérifie la connexion
        $this->isConnected();
    }

    public function index() {
        $this->response('index', [
            'title' => "Modérer les commentaires",
            'comments' => $this->manager->toModerate()
        ]);
    }

    public function approve($id) {
        $comment = $this->manager->find($id);
        // On modifie la propriété isApproved
        $comment->isApproved = 1;
        $this->manager->update($comment);

        $chapterId = $comment->getChapterId();
        $this->redirect($chapterId);
    }

    public function delete($id) {
        $comment = $this->manager->find($id);
        $this->manager->delete($comment);

        $chapterId = $comment->getChapterId();
        $this->redirect($chapterId);
    }

    private function redirect($chapterId) {
        if (isset($_POST['from']) && $_POST['from'] == "backend") {
            $this->index();
        }
        else {
            header('Location:' . env("URL_PREFIX") . '/chapters/' . $chapterId);
        }
    }
}
?>