<?php 

// Importa las clases necesarias para la base de datos y validación
use Core\Database; 
use Core\Validator; 

// Carga la configuración de la base de datos
$config = require base_path('config.php');
$db = new Database($config['database']);

// ID del usuario actual
$currentUserId = $_SESSION['user']['id'];

// Busca la nota en la base de datos por su ID
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
    ])->findOrFail();

// Verifica que el usuario actual sea el dueño de la nota
authorize($note['user_id'] === $currentUserId); 

// Array para almacenar errores de validación
$errors = [];

// Valida que el contenido de la nota tenga entre 1 y 1000 caracteres
if(! Validator::string($_POST['body'],1 , 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// Si hay errores, vuelve a mostrar el formulario con los errores
if (count($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// Actualiza el contenido de la nota en la base de datos
// usando el ID y cuerpo recibidos por POST
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// Redirecciona al usuario a la página de notas
header('location: /notes');
// Termina la ejecución del script
die();