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
            }
            else {
                // Si le mot de passe est incorrect,
                // on redirige sur la page de connexion avec un message d'erreur
                $this->render('login', [
                    'metaTitle' => "Connexion",
                    'error' => "invalid-password"
                ]);
            }
        }
    }

    public function adminPage() {
        if (isset($_SESSION['admin-connected'])) {
            $this->render('admin', [
                'metaTitle' => "Administration"
            ]);
        }
        else {
            header('Location: /Project-4/login');
        }
    }

    public function createPage() {
        $this->render('create', [
            'metaTitle' => "Administration"
        ]);
    }

    public function saveChapter() {
        if (!empty($POST_['title']) && !empty($POST_['content'])) {

            $manager = new ChapterManager();

            $chapter = new Chapter([
                'title' => $POST_['title'],
                'content' => $POST_['content']
            ]);
            $manager->add($chapter);


            $manager->add($POST_['title'], $POST_['content']);

        }
        $this->render('saved', [
            'metaTitle' => "Administration"
        ]);
    }

    public function readChapterPage() {

    }

    public function updateChapterPage() {
        
    }

    public function deleteChapterPage() {
        
    }

    function disconnect()
    {
        unset($_SESSION['admin-connected']);
        header('Location: /Project-4');
    }
}
?>