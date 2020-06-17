<?php
namespace App\Manager;

use App\lib\DataBase;

class ChapterManager extends Manager {
    public function add(Chapter $chapter) {
        // Préparation de la requête d'insertion
        // Assignation des valeurs pour l'id, la date de création, le titre et le contenu
        // Exécution de la requête
        // Retourne une instance du chapitre créé
    }

    public function delete(Chapter $chapter) {
        // Exécute une requête de type DELETE
    }

    // Retourne un chapitre
    public function find($id) {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT (created_at, \'%d/%m/%y\') AS creation_date_fr FROM chapters WHERE id = ?');
        $req->execute(array($id));
        $chapter = $req->fetch();

        return $chapter;

    }

    // Retourne la liste de tous les chapitres
    public function all() {
        $chapters = [];

        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM chapters ORDER BY created_at DESC LIMIT 0, 3');

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
}
?>