<?php
namespace App\Controller\Backend;

use App\Controller\Controller;
use App\Manager\CommentManager;

class BackController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/");
        $this->manager = new CommentManager();

        // On vérifie la connexion
        $this->isConnected();
    }

    public function admin() {
        $this->response('admin', [
            'title' => "Bienvenue dans votre espace",
            'totalReported' => $this->manager->getReportedTotal()
        ]);
    }

    public function disconnect()
    {
        unset($_SESSION['admin-connected']);
        header('Location: /Project-4');
    }
}
?>