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
}
?>