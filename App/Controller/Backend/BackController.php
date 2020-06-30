<?php
namespace App\Controller\Backend;

use App\Controller\Controller;

class BackController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/");

        // On vérifie la connexion
        $this->isConnected();
    }

    private function isConnected() {
        // S'il y a une session,
        if ($_SESSION['admin-connected'] == false) {
            // Sinon, on redirige sur la page de connexion
            header('Location: /Project-4/login');
        }
    }

    public function admin() {
            $this->response('admin');
    }

    public function disconnect()
    {
        unset($_SESSION['admin-connected']);
        header('Location: /Project-4');
    }
}
?>