<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];
// $currentUserId = 1;

//! Esta funcion es mucho mas segura ya que no permite al usuario agregar notas vacias ni que las modifique
if(! Validator::string($_POST['body'],1 , 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if(! empty($errors)) {
    view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
]);

}

// Verificar si el usuario tiene ID en la sesión
if (!isset($_SESSION['user']['id'])) {
    // Si no tiene ID, hacer logout y redirigir al login
    logout();
    header('location: /login');
    exit();
}

$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => $_SESSION['user']['id']
]);

header('location: /notes');
die();