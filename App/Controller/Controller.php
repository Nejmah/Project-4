<?php
namespace App\Controller;

use App\lib\Renderer;

abstract class Controller {

    protected $renderer;
    protected $manager;

    public function __construct() {
        $this->renderer = new Renderer();
    }

    public function response($viewName, $args = []) {
        $this->renderer->render($viewName, $args);
    }

    public function emptyErrorsAndInputs(){
        $_SESSION['errors'] = [];
        $_SESSION['inputs'] = [];
    }

    /*
     $key : title ou content
     */
    public function hasInputs($key) {
        if ($_SESSION['inputs']) {
            if ($_SESSION['inputs'][$key]) {
                return $_SESSION['inputs'][$key];
            }
        }
        return false;
    }
}
?>