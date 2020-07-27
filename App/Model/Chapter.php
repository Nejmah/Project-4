<?php
namespace App\Model;

use App\Model\Model;

class Chapter extends Model {

    private $id;
    private $createdAt;
    private $title;
    private $content;
    
    // GETTERS
    // Renvoie la valeur d'un attribut

    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    // SETTERS
    // Assigne une valeur à un attribut

    public function setId($id) {

        // On convertit l'argument en nombre entier
        // Si c'en était déjà un, rien ne change ; sinon, la conversion donnera 0
        $id = (int) $id;

        // On vérifie si ce nombre est bien strictement positif
        if ($id > 0) {

            $this->id = $id;
        }
    }

    public function setTitle($title) {

        if (empty($title)) {
            $this->errors['title'] = "Veuillez remplir tous les champs.";
        }

        if (strlen($title) < 3) {
            $this->errors['title'] = "Le titre n'est pas assez long.";
        }

        $this->title = $title;
    }

    public function setContent($content) {

        if (empty($content)) {
            $this->errors['content'] = "Veuillez remplir tous les champs.";
        }

        if (strlen($content) < 50) {
            $this->errors['content'] = "Le texte n'est pas assez long.";
        }

        if (strlen($content) > 5000) {
            $this->errors['content'] = "Le texte est trop long.";
        }

        $this->content = $content;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }
}
?>