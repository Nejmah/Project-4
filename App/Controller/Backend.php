<?php
namespace App\Controller;

use App\Model\Chapter;
use App\Manager\ChapterManager;

class Backend extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->viewsPath .= "backend/";
    }

    public function loginPage() {
        $this->render('login', [
            'metaTitle' => "Connexion"
        ]);
    }

    public function loginCheck() {
        // Si le mot de passe est correct,
        if (isset($_POST['password'])) {
            if ($_POST['password'] == "Alaska"){
                // On ouvre une session
                $_SESSION['admin-connected'] = true;
                // et on affiche la page pour l'administrateur
                $this->render('admin', [
                    'metaTitle' => "Administration",
                    'bodyClasses' => "admin-page"
                ]);
        
                // header('Location: /Project-4/admin');
                // require('view/backend/adminIndexView.php');
            }
            else {
                
                // Si le mot de passe est incorrect, on redirige sur la page de connexion avec un message d'erreur
                $this->render('login', [
                    'metaTitle' => "Connexion",
                    'error' => "invalid-password"
                ]);
            }
        }
        // Quand on est déjà connecté
        elseif (isset($_SESSION['admin-connected'])) {
            require('view/backend/adminIndexView.php');
        } 
        else {
            // S'il n'y a pas de mot de passe, on redirige sur la page de connexion
            header('Location: index.php?action=login');
        }
    }

    public function adminPage() {
        $this->render('admin', [
            'metaTitle' => "Administration"
        ]);
    }
}
?>