<?php
namespace App\Manager;

use App\lib\DataBase;
use App\Model\Chapter;

class ChapterManager extends Manager {

    // Ajoute un chapitre à la BDD
    public function add(Chapter $chapter) {
        // On transforme la date dans le bon format
        // (DateTime et DateTimeZone sont des classes PHP
        // qui ne sont pas dans mon namespace d'où \ devant)
        $now = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
        $date = $now->format('Y-m-d H:i:s'); // exemple : "2019-12-31 23:30:59"

        $req = $this->db->prepare('INSERT INTO chapters (created_at, title, content) VALUES (:creation_date, :title, :content)');
        $req->execute(array(
            'creation_date' => $date,
            'title' => $chapter->getTitle(),
            'content' => $chapter->getContent()
        ));
        // Retourne une instance du chapitre créé
        $id = $this->db->lastInsertId();
        return $this->find($id);
    }

    // Retourne un chapitre
    public function find($id) {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM chapters WHERE id = ?');
        $req->execute(array($id));
        $result = $req->fetch(\PDO::FETCH_ASSOC);
        
        $chapter = new Chapter($result);

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

    // Met à jour un chapitre
    public function update(Chapter $chapter) {
        $req = $this->db->prepare('UPDATE chapters SET title = :title, content = :content WHERE id = :id');
        
        $req->execute(array(
            'id' => $chapter->getId(),
            'title' => $chapter->getTitle(),
            'content' => $chapter->getContent()
        ));

        return $chapter;
    }

    // Supprime un chapitre
    public function delete(Chapter $chapter) {
        $req = $this->db->prepare('DELETE FROM chapters WHERE id = ?');
        $req->execute(array($chapter->getId()));
    }
}
?>