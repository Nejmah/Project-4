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

    // Met à jour un commentaire
    public function update(Comment $comment) {
        $req = $this->db->prepare('UPDATE comments SET author = :author, content = :content, is_reported = :isReported, is_approved = :isApproved WHERE id = :id');
        
        $req->execute(array(
            'id' => $comment->getId(),
            'author' => $comment->getAuthor(),
            'content' => $comment->getContent(),
            'isReported' => $comment->getReportedCount(),
            'isApproved' => $comment->getIsApproved()
        ));

        return $comment;
    }

    // Supprime un commentaire
    public function delete(Comment $comment) {
        $req = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($comment->getId()));
    }

    // Retourne la liste de tous les commentaires
    public function all() {
        $comments = [];

        $req = $this->db->query('SELECT id, chapter_id AS chapterId, author, content, is_reported AS isReported, is_approved AS isApproved, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM comments ORDER BY created_at');

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans le tableau $chapters
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    // Retourne la liste de tous les commentaires signalés
    public function allReported() {
        $comments = [];

        $req = $this->db->query('SELECT id, chapter_id AS chapterId, author, content, is_reported AS isReported, is_approved AS isApproved, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM comments WHERE is_reported > 0 ORDER BY created_at');

        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans le tableau $chapters
            $comments[] = new Comment($data);
        }

        return $comments;
    }
    
    // Retourne le nombre de signalements
    public function getReportedTotal() {
        $req = $this->db->query('SELECT COUNT(*) AS total FROM comments WHERE is_reported > 0');
        $result = $req->fetch();
        $total = $result['total'];
        return $total;
    }

    // Retourne un commentaire
    public function find($id) {
        $req = $this->db->prepare('SELECT id, chapter_id AS chapterId, author, content, is_reported AS isReported, is_approved AS isApproved,DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM comments WHERE id = ?');
        $req->execute(array($id));
        $result = $req->fetch(\PDO::FETCH_ASSOC);
        
        $comment = new Comment($result);

        return $comment;
    }

    // Retourne tous les commentaires associés à un chapitre
    public function forChapter($chapterId) {
        $comments = [];

        $req = $this->db->prepare('SELECT id, chapter_id AS chapterId, author, content,  is_reported AS isReported, is_approved AS isApproved, DATE_FORMAT (created_at, \'%d/%m/%y\') AS createdAt FROM comments WHERE chapter_id = ? ORDER BY created_at');
        $req->execute(array($chapterId));
        
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }
}
?>