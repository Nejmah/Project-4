<?php
namespace App\Manager;

use App\lib\DataBase;

class ChapterManager extends Manager {
    public function add(Chapter $chapter) {
        // Préparation de la requête d'insertion
        // Assignation des valeurs pour l'id, la date de création, le titre et le contenu
        // Exécution de la requête

        if (!empty($POST_['title']) && !empty($POST_['content'])) {
            // On transforme la date dans le bon format
            // (DateTime et DateTimeZone sont des classes PHP
            // qui ne sont pas dans mon namespace d'où \ devant)
            $now = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
            $date = $now->format('Y-m-d H:i:s'); // exemple : "2019-12-31 23:30:59"

            $req = $this->db->prepare('INSERT INTO chapters(created_at, title, content) VALUES (:creation_date, :title, :content)');
            $req->execute(array(
                'creation_date' => $date,
                'title' => $title, 
                'content' => $content
            ));
            return "ok";
        }
        return "error";
    }

    public function delete(Chapter $chapter) {
        // Exécute une requête de type DELETE
    }

    // Retourne un chapitre
    public function getChapter($id) {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT (created_at, \'%d/%m/%y\') AS creation_date_fr FROM chapters WHERE id = ?');
        $req->execute(array($id));
        $chapter = $req->fetch();

        return $chapter;

    }

    // Retourne la liste de tous les chapitres
    public function getList() {
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