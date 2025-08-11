<?php

use Core\Response;

// Funcion para depurar: muestra el contenido de una variable y detiene la ejecucion
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

// Funcion que verifica si la URL actual coincide con el valor proporcionado
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404) {
    http_response_code($code); 

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

// Funcion que construye una ruta completa agregando BASE_PATH al inicio
function base_path($path)
{
    return BASE_PATH . $path;
}

// Funcion que renderiza una vista y le pasa variables como atributos
function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

//funcion que valida si el usuario esta logueado
function login($user) {
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

//log out the user outfunction 
function logout(){
$_SESSION = [];
session_destroy();

$params = session_get_cookie_params();
setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'],$params['secure'],$params['httponly']);
}