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
            'metaTitle' => "Connexion",
            'loginPageUrl' => "/Project-4" // A changer...
        ]);
    }
}
?>