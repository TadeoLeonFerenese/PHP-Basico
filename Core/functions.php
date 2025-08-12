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

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}