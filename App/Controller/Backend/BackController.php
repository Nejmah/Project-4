<?php
namespace App\Controller\Backend;

use App\Controller\Controller;

class BackController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/");
    }

    public function loginCheck() {
        // Si le mot de passe est correct,
        if (isset($_POST['password'])) {
            if ($_POST['password'] == "Alaska"){
                // On ouvre une session
                $_SESSION['admin-connected'] = true;
                // et on affiche la page pour l'administrateur
                $this->response('admin');
            }
            else {
                // Si le mot de passe est incorrect,
                // on redirige sur la page de connexion avec un message d'erreur
                $this->response('login', [
                    'error' => "invalid-password"
                ]);
            }
        }
    }

    public function admin() {
        if (isset($_SESSION['admin-connected'])) {
            $this->response('admin');
        }
        else {
            header('Location: /Project-4/login');
        }
    }

    public function disconnect()
    {
        unset($_SESSION['admin-connected']);
        header('Location: /Project-4');
    }
}
?>