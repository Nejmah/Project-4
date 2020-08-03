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

    public function isConnected() {
        // Si on n'est pas connecté,
        if ($_SESSION['admin-connected'] == false) {
            // On redirige sur la page de connexion
            header('Location:' . env("URL_PREFIX") . '/login');
        }
    }

    public function emptyErrorsAndInputs(){
        $_SESSION['errors'] = [];
        $_SESSION['inputs'] = [];
    }

    // Pré-remplir les formulaires (dans les cas où il y a des erreurs)
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