<?php
namespace App\lib;

class Route {

    protected $verb;
    protected $uri;
    protected $controller;
    protected $action;

    public function __construct($verb, $uri, $controller, $action) {
        $this->verb = $verb;
        $this->uri = $uri;
        $this->controller = $controller;
        $this->action = $action;
    }

    // GETTERS
    // Renvoie la valeur d'un attribut

    public function getVerb() {
        return $this->verb;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }
}
?>