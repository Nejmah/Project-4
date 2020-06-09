<?php

use App\lib\Route;

$routes = [];

// 1) Déclaration des routes du Frontend
// -------------------------------------

// Page d'accueil
$routes[] = new Route('GET', '/', 'Frontend', 'homePage');

// Page de la liste des chapitres
$routes[] = new Route('GET', '/chapters', 'Frontend', 'chaptersPage');

// Page d'un chapitre
// ...

// 2) Déclaration des routes du Backend
// ------------------------------------

// Page de connexion
$routes[] = new Route('GET', '/login', 'Backend', 'loginPage');

foreach ($routes as $route) {
    $router->add($route);
}

?>