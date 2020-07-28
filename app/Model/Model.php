<?php
namespace App\Model;

abstract class Model {

    protected $errors = [];
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst($key); // Met le premier caractère en majuscule

            // Si le setter correspondant existe
            if (method_exists($this, $method)) { // Vérifie si la méthode existe pour l'objet $this, cad Chapter
                // On appelle le setter
                $this->$method($value); // En passant la valeur en paramètre
            }
        }
    }

    public function isValid() {
        $hasErrors = count($this->errors) > 0;
        if ($hasErrors) {
            $_SESSION['errors'] = $this->errors;
            $_SESSION['inputs'] = $_POST;
            return false;
        }
        return true;
    }
}
?>