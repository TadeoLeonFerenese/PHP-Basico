<?php 

//! Este es un ejemplo de como crear un enrutador simple en PHP
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if ($uri === '/') {
//     require 'controllers/index.php';
// } elseif ($uri === '/about') {
//     require 'controllers/about.php';
// } elseif ($uri === '/contact') {
//     require 'controllers/contact.php';
// } else {
//     http_response_code(404);
//     require 'views/404.view.php';
// }

//! De esta forma se crea una rota mas limpia y separamos la logica de las rutas
//! Se puede agregar mas rutas sin necesidad de agregar mas ifs
// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php', 
//     '/notes' => 'controllers/notes/index.php', 
//     '/note' => 'controllers/notes/show.php', 
//     '/notes/create' => 'controllers/notes/create.php',
//     '/contact' => 'controllers/contact.php'
// ];

$router ->get('/', '../controllers/index.php');
$router ->get('/about', '../controllers/about.php');
$router ->get('/contact', '../controllers/contact.php');

$router ->get('/notes', 'notes/index.php')->only('auth');
$router ->get('/note', 'notes/show.php');
$router ->get('/notes/create', 'notes/create.php');

$router ->get('/note/edit', 'notes/edit.php');
$router ->patch('/note/edit', 'notes/update.php');

$router ->post('/notes', 'notes/store.php');
$router ->delete('/note', 'notes/destroy.php');

$router ->get('/register', 'registration/create.php')->only('guest');
$router ->post('/register', 'registration/store.php')->only('guest');

$router ->get('/login', 'session/create.php')->only('guest');
$router ->post('/session', 'session/store.php')->only('guest');
$router ->delete('/session', 'session/destroy.php')->only('auth');