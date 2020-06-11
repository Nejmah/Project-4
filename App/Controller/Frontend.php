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
            'loginPageUrl' => "/login",
            'metaTitle' => "Accueil"
        ]);
    }

    public function aboutPage() {
        $this->render('about', [
            'metaTitle' => "A propos"
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

    public function chapterPage($id) {
        $manager = new ChapterManager();

        $chapter = $manager->getChapter($id);

        $this->render('chapter', [
            'loginPageUrl' => "/chapters/[id]",
            'metaTitle' => "Chapitres",
            'chapter' => $chapter
        ]);


    }
}
?>