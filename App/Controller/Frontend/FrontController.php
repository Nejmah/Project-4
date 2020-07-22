<?php
namespace App\Controller\Frontend;

use App\Controller\Controller;
use App\Manager\UserManager;

class FrontController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/frontend/");
        $this->manager = new UserManager();
    }

    public function home() {
        $this->response('home');
    }

    public function about() {
        $this->response('about');
    }

    public function login() {
        $this->response('login');
    }

    public function connect() {
        // Si le mot de passe est correct,
        if (isset($_POST['password'])) {
            $hash = $this->manager->getPassword();

            if (password_verify($_POST['password'], $hash)) {
                // On ouvre une session
                $_SESSION['admin-connected'] = true;
                // et on affiche la page pour l'administrateur
                header('Location: /Project-4/admin');
                // $this->response('admin');
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
}
?>