<?php
namespace App\Controller;

use App\Model\Chapter;
use App\Manager\ChapterManager;

abstract class Controller {

    protected $viewsPath;

    public function __construct() {
        $this->viewsPath = "views/";
    }
    
    public function render(string $viewname, array $args) {
        foreach($args as $key => $value)
        {
            $$key = $value;
        }
        ob_start();
        require($this->viewsPath . $viewname . '.php');
        $content = ob_get_clean();
        require('views/template.php');
    }
}
?>