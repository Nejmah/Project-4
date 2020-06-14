<?php

use App\Controller\Frontend;
use App\Controller\Backend;
use App\lib\Route;

/*----------------------------------------------
                    FRONTEND
----------------------------------------------*/

/*Home*/
$router->add(new Route('GET', '/', function() {
    $controller = new Frontend();
    $controller->homePage();
}));

$router->add(new Route('GET', '/home', function() {
    $controller = new Frontend();
    // $controller = new App\Controller\Frontend();
    $controller->homePage();
}));

// $routes[] = new Route('GET', '/', 'Frontend', 'homePage');

/*About*/
$router->add(new Route('GET', '/about', function () {
    $controller = new App\Controller\Frontend();
    $controller->aboutPage();
}));

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
    $controller = new App\Controller\Backend();
    $controller->loginPage();
}));

/*Loinn-chekc*/
$router->add(new Route('POST', '/login-check', function() {
    // $controller = new Backend();
    $controller = new App\Controller\Backend();
    $controller->loginCheck();
}));

/*Admin-pae*/
$router->add(new Route('GET', '/admin', function() {
    // $controller = new Backend();
    $controller = new App\Controller\Backend();
    $controller->adminPage();
}));

// $routes[] = new Route('GET', '/login', 'Backend', 'loginPage');

?>