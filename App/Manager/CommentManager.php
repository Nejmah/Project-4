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
}
?>