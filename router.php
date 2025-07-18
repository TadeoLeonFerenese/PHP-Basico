<?php 

$routes = require 'routes.php';

function routeToControler($uri, $routes) {
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
abort();
}}

function abort($code = 404) {
    http_response_code($code);

    if (file_exists("views/{$code}.php")) {
        require "views/{$code}.php";
    } else {
        echo "Pagina de error no encontrada.";
    }

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToControler($uri, $routes);