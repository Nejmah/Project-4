<?php
namespace App\lib;

use App\lib\Route;
use App\Controller\Frontend;
use App\Controller\Backend;

class Router {

    protected $parts = [];
    protected $currentRoute;
    protected $routes = [];
    protected $uri;
    protected $verb;

    public function __construct() {
        $this->uri = $_SERVER['REQUEST_URI'];

        // Fix pour site en local
        $this->uri = str_replace("/Project-4", "", $this->uri);

        $this->verb = $_SERVER['REQUEST_METHOD'];
        $this->parts = Route::uriToArray($this->uri);
    }

    public function add(Route $route) {
        array_push($this->routes, $route);
    }

    public function match() {
        foreach ($this->routes as $route) {
            if ($route->getVerb() == $this->verb) {
                if ($route->getUri() == $this->uri && !$route->getHasParam()) {
                    $this->currentRoute = $route;
                    return true;
                }
            }

            if ($route->getHasParam()) {
                $routeParts = $route->getParts();
                if (count($this->parts) == count($routeParts)) {
                    $isTheSame = true;
                    foreach($this->parts as $index => $part) {
                        if ($part != $routeParts[$index] && $index != $route->getParamIndex()) {
                            $isTheSame = false;
                            break;
                        }
                    } 
                            
                    if ($isTheSame) {
                        $this->currentRoute = $route;
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function go() {
        $param = $this->parts[$this->currentRoute->getParamIndex()];
		
		call_user_func($this->currentRoute->getCallback(), $param);
    }
}
?>