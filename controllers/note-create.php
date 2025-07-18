<?php 

$config = require ('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';
// Con esta funcion lo que hago es que cuando se haga una peticion post se redirija a la pagina de notes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
    header('Location: /notes');
}

require 'views/note-create.view.php';