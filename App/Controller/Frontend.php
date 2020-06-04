<?php
namespace App\Controller;

use App\Model\Chapter;
use App\Manager\ChapterManager;

class Frontend {
    
    public function render(string $viewname, array $args) {
        foreach($args as $key => $value)
        {
            $$key = $value;
        }
        ob_start();
        require('views/' . $viewname . '.php');
        $content = ob_clean();
        require('views/template.php');
    }

    public function chaptersPage()
    {
        $db = new \PDO('mysql:host=localhost;dbname=project_4;charset=utf8', 'root', 'root');
        $manager = new ChapterManager($db);

        $chapters = $manager->getList();

        require "views/chapters.php";
    }

    // private function getPosts() {
    //     $posts = array();

    //     // req BD
    //     // On admet que $db est un objet PDO
    //     $request = $db->query('SELECT id, title, content FROM posts');
            
    //     while ($post = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array
    //     {
    //     echo 'Le chapitre ', $post['id'], ' a pour titre ', $perso['title'], $perso['content'];
    //     }

    //     return $posts;
    // }
}
?>