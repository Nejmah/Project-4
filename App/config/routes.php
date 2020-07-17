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

/*Connect*/
$router->add(new Route('POST', '/connexion', function() {
    $controller = new FrontController();
    $controller->connect();
}));

/*----------------------------------------------
                    BACK
----------------------------------------------*/

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
    $controller = new App\Controller\Backend\ChapterController();
    $controller->store();
}));

/*Chapters-table*/
$router->add(new Route('GET', '/manage', function() {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->table();
}));

/*Edit-chapter*/
$router->add(new Route('GET', '/chapters/[id]/edit', function($id) {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->edit($id);
}));

/*Update-chapter*/
$router->add(new Route('POST', '/chapters/[id]/update', function($id) {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->update($id);
}));

/*Delete-chapter*/
$router->add(new Route('POST', '/chapters/[id]/delete', function($id) {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->delete($id);
}));

/*----------------------------------------------
                    COMMENTS
----------------------------------------------*/

/*Add-comment*/
$router->add(new Route('POST', '/comments', function() {
    $controller = new App\Controller\Backend\CommentController();
    $controller->store();
}));

/*Report-comment*/
$router->add(new Route('POST', '/comments/[id]/report', function($id) {
    $controller = new App\Controller\Backend\CommentController();
    $controller->report($id);
}));

/*Approve-comment*/
$router->add(new Route('GET', '/comments/[id]/approve', function($id) {
    $controller = new App\Controller\Backend\CommentController();
    $controller->approve($id);
}));

/*Delete-comment*/
$router->add(new Route('GET', '/comments/[id]/delete', function($id) {
    $controller = new App\Controller\Backend\CommentController();
    $controller->delete($id);
}));

?>