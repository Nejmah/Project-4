<?php
namespace App\lib;

class Route {

    protected $verb;
    protected $uri;
    protected $callback;
    protected $hasParam;
    protected $parts = [];
    protected $paramIndex;
 
    public function __construct($verb, $uri, $callback) {
        $this->verb = $verb;
        $this->uri = $uri;
        $this->callback = $callback;
        $this->hasParam = $this->hasParam();
        $this->parts = $this->uriToArray($uri);
        $this->paramIndex = $this->findParamIndex();
    }

    public function hasParam() {
        return (strpos($this->uri, '[id]') > 0);
    }
    
    public static function uriToArray($uri) {
        $parts = explode('/', $uri);

        // Enlève le premier élément du tableau s'il est vide
        if ($parts[0] === '') {
            array_shift($parts);
        }

        return $parts;
    }

    public function findParamIndex() {
        foreach(explode('/', $this->uri) as $index => $part) {
			if ($part === '[id]'){
				return $index - 1;
			}
		}

		return null;
    }

    // GETTERS
    // Renvoie la valeur d'un attribut

    public function getVerb() {
        return $this->verb;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getCallback() {
        return $this->callback;
    }

    public function getHasParam() {
        return $this->hasParam;
    }

    public function getParts() {
        return $this->parts;
    }

    public function getParamIndex() {
		return $this->paramIndex;
    }
}
?>