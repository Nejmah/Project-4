<?php

use App\lib\Route;

$routes = [];

// 1) Déclaration des routes du Frontend
// -------------------------------------

// Page d'accueil
$routes[] = new Route('GET', '/', 'Frontend', 'homePage');

// Page liste des chapitres
$routes[] = new Route('GET', '/chapters', 'Frontend', 'chaptersPage');

// $router->add('GET', '/chapters', function() {
//     $frontend = new Frontend();
//     $frontend->chaptersPage();
// }, 'chapters');


// 2) Déclaration des routes du Backend
// ------------------------------------


foreach ($routes as $route) {
    $router->add($route);
}

?>