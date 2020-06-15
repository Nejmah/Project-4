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

/*About*/
$router->add(new Route('GET', '/about', function () {
    $controller = new App\Controller\Frontend();
    $controller->aboutPage();
}));

/*Chapters*/
$router->add(new Route('GET', '/chapters', function() {
    $controller = new App\Controller\Frontend();
    $controller->chaptersPage();
}));

/*Chapter*/
$router->add(new Route('GET', '/chapters/[id]', function($id) {
    $controller = new App\Controller\Frontend();
    $controller->chapterPage($id);
}));

/*----------------------------------------------
                    BACKEND
----------------------------------------------*/

/*Login*/
$router->add(new Route('GET', '/login', function() {
    $controller = new App\Controller\Backend();
    $controller->loginPage();
}));

/*Login-check*/
$router->add(new Route('POST', '/login-check', function() {
    $controller = new App\Controller\Backend();
    $controller->loginCheck();
}));

/*Logout*/
$router->add(new Route('GET', '/logout', function() {
    $controller = new App\Controller\Backend();
    $controller->disconnect();
}));


/*Admin-page*/
$router->add(new Route('GET', '/admin', function() {
    $controller = new App\Controller\Backend();
    $controller->adminPage();
}));

/*Create-chapter-page*/
$router->add(new Route('GET', '/create', function() {
    $controller = new App\Controller\Backend();
    $controller->createPage();
}));

/*Add-chapter*/
$router->add(new Route('POST', '/chapters', function() {
    $controller = new App\Controller\Backend();
    $controller->add();
}));

/*Update-chapter*/

/*Delete-chapter*/

?>