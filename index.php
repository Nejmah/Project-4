<?php
require 'vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath('/Project-4');

// Test 1
$router->map('GET', '/123', function() {
    var_dump('ça marche');
});

// Test 2
$router->map('GET', '/article/[a:blablabla]', function($blablabla) {
    var_dump('Le paramètre de la barre d\'adresse est ' . $blablabla . '.');
});

// Test 3
// Map homepage
$router->map('GET', '/', 'home');

$match = $router->match();

if( is_array($match)) {

    if (is_callable( $match['target'] ) ) {
	    call_user_func_array( $match['target'], $match['params'] );
    } else {
        $params = $match['params'];
        require "../Views/{$match['target']}.php";
    }
} else {
    die('Erreur 404');
}

// use App\Chapter;

// $post = new Chapter;

// dump($post);

?>