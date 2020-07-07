<?php
namespace App\Manager;

use App\Model\Comment;

class CommentManager extends Manager {

    // Ajoute un commentaire à la BDD
    public function add(Comment $comment) {
        $now = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
        $date = $now->format('Y-m-d H:i:s');

        $req = $this->db->prepare('INSERT INTO comments (chapter_id, created_at, author, content) VALUES (:chapter_id, :creation_date, :author, :content)');
        $req->execute(array(
            'chapter_id' => $comment->getChapterId(),
            'creation_date' => $date,
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent()
        ));
    }

    // Retourne la liste de tous les commentaires
    public function all() {
        $comments = [];

        $req = $this->db->query('SELECT id, author, content, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM comments ORDER BY created_at');

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans le tableau $chapters
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    // Retourne tous les commentaires associés à un chapitre
    public function forChapter($chapterId) {
        $comments = [];

        $req = $this->db->prepare('SELECT id, author, content, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM comments WHERE chapter_id = ? ORDER BY created_at');
        $req->execute(array($chapterId));
        
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }
}
?>