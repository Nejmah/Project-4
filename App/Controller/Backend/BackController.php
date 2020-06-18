<?php
namespace App\Controller\Backend;

use App\Controller\Controller;

class BackController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/");

        // Faire la vérifiction de la connexion
        $this->loginCheck();
    }

    private function loginCheck() {
        // S'il y a une session,
        if ($_SESSION['admin-connected'] == true) {
                // on affiche la page pour l'administrateur
                $this->response('admin');
            }
            else {
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