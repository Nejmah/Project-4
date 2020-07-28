<?php

use App\lib\Route;
use App\Controller\Frontend\FrontController;
use App\Controller\Backend\BackController;
use App\Controller\Backend\UserController;

/*----------------------------------------------
                    FRONTEND
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

/*Chapters-list*/
$router->add(new Route('GET', '/chapters', function() {
    $controller = new App\Controller\Frontend\ChapterController();
    $controller->chapters();
}));

/*Chapter*/
$router->add(new Route('GET', '/chapters/[id]', function($id) {
    $controller = new App\Controller\Frontend\ChapterController();
    $controller->chapter($id);
}));

/*Add-comment*/
$router->add(new Route('POST', '/comments', function() {
    $controller = new App\Controller\Frontend\CommentController();
    $controller->store();
}));

/*Login-form*/
$router->add(new Route('GET', '/login', function() {
    $controller = new FrontController();
    $controller->loginForm();
}));

/*Login*/
$router->add(new Route('POST', '/login', function() {
    $controller = new FrontController();
    $controller->login();
}));

/*----------------------------------------------
                    BACKEND
----------------------------------------------*/

/*Admin-page*/
$router->add(new Route('GET', '/admin', function() {
    $controller = new BackController();
    $controller->admin();
}));

/*Logout*/
$router->add(new Route('POST', '/logout', function() {
    $controller = new BackController();
    $controller->logout();
}));

    // CHAPTERS

/*Chapter-form*/
$router->add(new Route('GET', '/admin/chapters/create', function() {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->create();
}));

/*Add-chapter*/
$router->add(new Route('POST', '/admin/chapters', function() {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->store();
}));

/*Chapters-index*/
$router->add(new Route('GET', '/admin/chapters/manage', function() {
// $router->add(new Route('GET', '/admin/chapters', function() {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->index();
}));

/*Edit-chapter*/
$router->add(new Route('GET', '/admin/chapters/[id]/edit', function($id) {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->edit($id);
}));

/*Update-chapter*/
$router->add(new Route('POST', '/admin/chapters/[id]/update', function($id) {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->update($id);
}));

/*Delete-chapter*/
$router->add(new Route('POST', '/admin/chapters/[id]/delete', function($id) {
    $controller = new App\Controller\Backend\ChapterController();
    $controller->delete($id);
}));

    // COMMENTS

/*Comments-index*/
$router->add(new Route('GET', '/admin/comments/moderate', function() {
    $controller = new App\Controller\Backend\CommentController();
    $controller->index();
}));

/*Report-comment*/
$router->add(new Route('POST', '/admin/comments/[id]/report', function($id) {
    $controller = new App\Controller\Frontend\CommentController();
    $controller->report($id);
}));

/*Approve-comment*/
$router->add(new Route('POST', '/admin/comments/[id]/approve', function($id) {
    $controller = new App\Controller\Backend\CommentController();
    $controller->approve($id);
}));

/*Delete-comment*/
$router->add(new Route('POST', '/admin/comments/[id]/delete', function($id) {
    $controller = new App\Controller\Backend\CommentController();
    $controller->delete($id);
}));

    // USER

/*Password-form*/
$router->add(new Route('GET', '/auth/password/edit', function() {
    $controller = new App\Controller\Backend\UserController();
    $controller->edit();
}));

/*Update-password*/
$router->add(new Route('POST', '/auth/password/update', function() {
    $controller = new App\Controller\Backend\UserController();
    $controller->update();
}));

?>