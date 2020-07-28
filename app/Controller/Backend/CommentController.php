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
            'comments' => $this->manager->commentsToModerate()
        ]);
    }

    public function approve($id) {
        $comment = $this->manager->find($id);
        // On modifie la propriété isApproved
        $comment->isApproved = 1;
        $this->manager->update($comment);

        // On retourne sur la page du chapitre où le commentaire a été signalé
        $chapterId = $comment->getChapterId();

        if (isset($_POST['from']) && $_POST['from'] == "backend") {
            header('Location: /Project-4/admin/comments/moderate');
        }
        else {
            header('Location: /Project-4/chapters/' . $chapterId);
        }
    }

    public function delete($id) {
        $comment = $this->manager->find($id);
        $this->manager->delete($comment);

        // On retourne sur la page du chapitre où le commentaire a été signalé
        $chapterId = $comment->getChapterId();
        header('Location: /Project-4/chapters/' . $chapterId);
    }
}
?>