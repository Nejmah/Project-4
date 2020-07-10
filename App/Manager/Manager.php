<?php
namespace App\Manager;

use App\lib\Database;

abstract class Manager {
    protected $db; // Instance de PDO (PHP Data Objects)

    // Création d'un constructeur pour assigner à l'attribut $db un objet PDO
    // dès l'instanciation du manager
    public function __construct() {
        $this->db = Database::getInstance();
    }
}
?>