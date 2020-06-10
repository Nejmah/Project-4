<?php

use App\Controller;
use App\lib\Route;

/*----------------------------------------------
                    FRONTEND
----------------------------------------------*/

/*Home*/
$router->add(new Route('GET', '/', function() {
    // $controller = new Frontend();
    $controller = new App\Controller\Frontend();
    $controller->homePage();
}));

// $routes[] = new Route('GET', '/', 'Frontend', 'homePage');

/*Chapters*/
$router->add(new Route('GET', '/chapters', function() {
    // $controller = new Frontend();
    $controller = new App\Controller\Frontend();
    $controller->chaptersPage();
}));

// $route = new Route('GET', '/chapters', 'Frontend', 'chaptersPage');

/*Chapter*/
$router->add(new Route('GET', '/chapters/[id]', function($id) {
    // $controller = new Frontend();
    $controller = new App\Controller\Frontend();
    $controller->chapterPage($id);
}));

/*----------------------------------------------
                    BACKEND
----------------------------------------------*/

/*Login*/
$router->add(new Route('GET', '/login', function() {
    // $controller = new Backend();
    $controller = new App\Controller\Frontend();
    $controller->loginPage();
}));

// $routes[] = new Route('GET', '/login', 'Backend', 'loginPage');

?>