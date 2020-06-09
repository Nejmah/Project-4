<?php
namespace App\Controller;

// use App\Model\Chapter;
use App\Manager\ChapterManager;

class Frontend extends Controller {

    public function __construct() {
        parent::__construct();
        $this->viewsPath .= "frontend/";
    }

    public function homePage() {
        $this->render('home', [
            'loginPageUrl' => "/login", // TODO: trouver un moyen d'utiliser le Router
            'metaTitle' => "Accueil"
        ]);
    }

    public function chaptersPage() {     
        $manager = new ChapterManager();

        $chapters = $manager->getList();

        $this->render('chapters', [
            'loginPageUrl' => "/chapters",
            'metaTitle' => "Chapitres",
            'chapters' => $chapters 
        ]);
    }
}
?>