<?php
session_start();

require 'vendor/autoload.php';

use App\lib\Router;

$router = new Router();

require_once 'App/config/routes.php';

$match = $router->match();

if (!$match) {
    // Si la route n'existe pas, on affiche une erreur
    die('Erreur 404');
}

$router->go();

?>