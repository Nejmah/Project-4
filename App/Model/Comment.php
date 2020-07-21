<?php
namespace App\Model;

use App\Model\Model;

class Comment extends Model {

    private $id;
    private $chapterId;
    private $createdAt;
    private $author;
    private $content;
    private $isReported;
    private $isApproved;
    
    // GETTERS
    // Renvoie la valeur d'un attribut

    public function getChapterId() {
        return $this->chapterId;
    }

    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getContent() {
        return $this->content;
    }

    public function getIsReported() {
        return $this->isReported;
    }

    public function getIsApproved() {
        return $this->isApproved;
    }

    // SETTERS
    // Assigne une valeur à un attribut

    public function setChapterId($id) {
        $this->chapterId = $id;
    }

    public function setId($id) {
        // On convertit l'argument en nombre entier
        // Si c'en était déjà un, rien ne change ; sinon, la conversion donnera 0
        $id = (int) $id;
        // On vérifie si ce nombre est bien strictement positif
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setAuthor($author) {

        if (empty($author)) {
            $this->errors['author'] = "Veuillez remplir tous les champs.";
        }

        if (strlen($author) < 2) {
            $this->errors['author'] = "Votre pseudo n'est pas assez long.";
        }

        $this->author = $author;
    }

    public function setContent($content) {

        if (empty($content)) {
            $this->errors['content'] = "Veuillez remplir tous les champs.";
        }

        if (strlen($content) < 2) {
            $this->errors['content'] = "Votre commentaire est trop court !";
        }

        if (strlen($content) > 50) {
            $this->errors['content'] = "Votre commentaire est trop long !";
        }

        $this->content = $content;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setIsReported($total) {
        $this->isReported = $total;
    }

    // Méthode qui inncrémente le champ isReported
    public function addNewReport() {
        // $this->isReported = $this->isReported + 1;
        $this->isReported++;
    }

    public function setIsApproved($isApproved) {
        $this->isApproved = $isApproved;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $methodName = "set" . ucfirst($name);
            $this->$methodName($value);    
        }
    }
}
?>