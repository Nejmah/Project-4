<?php
namespace App\Model;

class Chapter {

    private $_id;
    private $_createdAt;
    private $_updatedAt;
    private $_title;
    private $_content;
    
    // Méthode d'hydratation
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' .ucfirst($key); // Met le premier caractère en majuscule

            // Si le setter correspondant existe
            if (method_exists($this, $method)) { // Vérifie si la méthode existe pour l'objet $this, cad Chapter
                // On appelle le setter
                $this->$method($value); // En passant la valeur en paramètre
            }
        }
    }

    // GETTERS
    // Renvoie la valeur d'un attribut

    public function getId() {
        return $this->_id;
    }

    public function getCreatedAt() {
        return $this->_createdAt;
    }

    public function getUpdatedAt() {
        return $this->_updatedAt;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getContent() {
        return $this->_content;
    }

    // SETTERS
    // Assigne une valeur à un attribut

    public function setId($id) {
        // On convertit l'argument en nombre entier
        // Si c'en était déjà un, rien ne change ; sinon, la conversion donnera 0
        $id = (int) $id;
        // On vérifie si ce nombre est bien strictement positif
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setTitle($title) {
        // On vérifie s'il s'agit bien d'une chaîne de caractères
        if (is_string($title))
        {
            $this->_title = $title;
        }
    }

    public function setContent($content) {
        // On vérifie s'il s'agit bien d'une chaîne de caractères
        if (is_string($content))
        {
            $this->_content = $content;
        }
    }
}
?>