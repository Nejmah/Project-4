<?php
namespace App\lib;

class Renderer {
    protected $viewsPath; // "views/frontend/" ou "views/backend/"
    protected $metaTitles = [
        'home' => "Accueil",
        'about' => "A propos",
        'chapters' => "Chapitres",
        'chapter' => "Chapitres"
    ];

    public function setViewsPath($viewsPath) {
        $this->viewsPath = $viewsPath;
    }

    public function render(string $viewName, array $args) {
        foreach($args as $key => $value)
        {
            $$key = $value;
        }

        if (array_key_exists($viewName, $this->metaTitles)) {
            $metaTitle = $this->metaTitles[$viewName];
        }
        
        ob_start();
        $viewPath = $this->viewsPath . $viewName . '.php';
        require($viewPath);
        $content = ob_get_clean();

        $templatePath = $this->viewsPath . 'template.php';
        require($templatePath);
    }
}
?>