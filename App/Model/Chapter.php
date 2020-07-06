<?php
namespace App\Model;

class Chapter {

    private $id;
    private $createdAt;
    private $updatedAt;
    private $title;
    private $content;
    private $errors = [];
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst($key); // Met le premier caractère en majuscule

            // Si le setter correspondant existe
            if (method_exists($this, $method)) { // Vérifie si la méthode existe pour l'objet $this, cad Chapter
                // On appelle le setter
                $this->$method($value); // En passant la valeur en paramètre
            }
        }
    }

    public function isValid() {
        $hasErrors = count($this->errors) > 0;
        if ($hasErrors) {
            $_SESSION['errors'] = $this->errors;
            $_SESSION['inputs'] = $_POST;
            return false;
        }
        return true;
    } 

    // GETTERS
    // Renvoie la valeur d'un attribut

    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
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

        if (strlen($content) < 10) {
            $this->errors['content'] = "Le texte n'est pas assez long.";
        }

        if (strlen($content) > 1000) {
            $this->errors['content'] = "Le texte est trop long.";
        }

        $this->content = $content;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }
}
?>