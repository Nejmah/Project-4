<?php
namespace App\Manager;

class ChapterManager {
    private $_db; // Instance de PDO (PHP Data Objetcs)

    // Création d'un constructeur pour assigner à l'attribut $_db un objet PDO
    // dès l'instanciation du manager
    public function __construct($db) {
        // Setter pour pouvoir modifier l'attribut $_db
        $this->setDb($db);
    }

    public function add(Chapter $chapter) {
        // Préparation de la requête d'insertion
        // Assignation des valeurs pour l'id, la date de création, le titre et le contenu
        // Exécution de la requête
    }

    public function delete(Chapter $chapter) {
        // Exécute une requête de type DELETE
    }

    public function get($id) {
        // Exécute une requête de type SELECT avec une clause WHERE et retourne un objet de type Chapter
    }

    // Retourne la liste de tous les chapitres
    public function getList() {
        $chapters = [];

        $req = $this->_db->query('SELECT id, title, content, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM chapters ORDER BY created_at DESC LIMIT 0, 3');

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans le tableau $chapters
            $chapters[] = new Chapter($data);
        }

        return $chapters;
    }

    public function update(Chapter $chapter) {
        // Prépare une requête de type UPDATE
        // Assignation des valeur à la requête
        // Exécution de la requête
    }

    public function setDB(\PDO $db) {
        $this->_db = $db;
    }
}
?>