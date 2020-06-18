<?php

use App\lib\Route;
use App\Controller\Frontend\FrontController;
use App\Controller\Backend\BackController;

// use App\Controller\Frontend\ChapterController as FrontChapterManager;

/*----------------------------------------------
                    FRONT
----------------------------------------------*/

/*Home*/
$router->add(new Route('GET', '/', function() {
    $controller = new FrontController();
    $controller->home();
}));

/*About*/
$router->add(new Route('GET', '/about', function () {
    $controller = new FrontController();
    $controller->about();
}));

/*Login*/
$router->add(new Route('GET', '/login', function() {
    $controller = new FrontController();
    $controller->login();
}));

/*----------------------------------------------
                    BACK
----------------------------------------------*/

/*Login-check*/
$router->add(new Route('POST', '/login-check', function() {
    $controller = new BackController();
    $controller->loginCheck();
}));

/*Admin-page*/
$router->add(new Route('GET', '/admin', function() {
    $controller = new BackController();
    $controller->admin();
}));

/*Logout*/
$router->add(new Route('GET', '/logout', function() {
    $controller = new BackController();
    $controller->disconnect();
}));

/*----------------------------------------------
                    CHAPTERS
----------------------------------------------*/

/*List of chapters*/
$router->add(new Route('GET', '/chapters', function() {
    $controller = new App\Controller\Frontend\ChapterController();
    $controller->chapters();
}));

/*Chapter by id*/
$router->add(new Route('GET', '/chapters/[id]', function($id) {
    $controller = new App\Controller\Frontend\ChapterController();
    $controller->chapter($id);
}));

/*Create-chapter-page*/
$router->add(new Route('GET', '/create', function() {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->create();
}));

/*Add-chapter*/
$router->add(new Route('POST', '/chapters', function() {
    $controller = new App\Controller\Backend();
    $controller->add();
}));

/*Update-chapter*/

/*Delete-chapter*/

/*----------------------------------------------
                    COMMENTS
----------------------------------------------*/


?>