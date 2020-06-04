<?php
namespace App\lib;

use App\lib\Route;
use App\Controller\Frontend;

class Router {

    protected $parts = [];
    protected $route;
    protected $routes = []; //Tableau de routes (chaque route est un objet)
    protected $uri;
    protected $verb;

    public function __construct() {
        $this->uri = $_SERVER['REQUEST_URI'];
        // Fix pour site en local
        $this->uri = str_replace("/Project-4", "", $this->uri);

        $this->verb = $_SERVER['REQUEST_METHOD'];
        $this->parts = $this->uriToArray($this->uri);
    }

    public function add(Route $route) {
        array_push($this->routes, $route);
    }

    public function match() {
        //echo $this->uri . "<br>" . $this->verb; exit;
        foreach ($this->routes as $route) {
            //print_r($route);
            if ($route->getUri() == $this->uri && $route->getVerb() == $this->verb) {
                $this->route = $route;
                return true;
            }
        }

        return false;
    }

    public function go() {
        // 1) On instancie le controller (Frontend ou Backend)
        $controllerName = $this->route->getController(); 
        //$controller = new $controllerName(); // Ne marche pas...
        if ($controllerName == "Frontend") {
            $controller = new Frontend();
        }
        else {
            // $controller = new Backend();
        }

        // 2) On exécute l'action
        $actionName = $this->route->getAction();
        $controller->$actionName();
    }

    private function uriToArray($uri) {
        $parts = explode('/', $uri);

        // Enlève le premier élément du tableau s'il est vide
        if ($parts[0] === '') {
            array_shift($parts);
        }

        return $parts;
    }
}

?>