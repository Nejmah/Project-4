<?php
namespace App\lib;

use App\lib\Route;
use App\Controller\Frontend;
use App\Controller\Backend;

class Router {

    protected $parts = [];
    protected $route;
    protected $routes = [];
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
        foreach ($this->routes as $route) {
            if ($route->getUri() == $this->uri && $route->getVerb() == $this->verb) {
                $this->route = $route;
                return true;
            }
        }

        return false;
    }

    public function go() {
        // On instancie le controller (Frontend ou Backend)
        $controllerName = $this->route->getController(); 
        //$controller = new $controllerName(); // Ne marche pas...
        if ($controllerName == "Frontend") {
            $controller = new Frontend();
        }
        else {
            $controller = new Backend();
        }

        // On exécute l'action
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