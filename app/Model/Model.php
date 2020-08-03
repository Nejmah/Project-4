<?php
namespace App\Model;

abstract class Model {

    protected $errors = [];
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe
            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($value);
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