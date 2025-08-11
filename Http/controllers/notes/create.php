<?php 

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => []
]);

//! ANOTACIONES !//

//! Con esta funcion lo que hago es que cuando se haga una peticion post se redirija a la pagina de notes
//! El problema con esta manera es que le permite al usuario poder agregar notas vacias e inclusive modificar los styles de las notas
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
//         'body' => $_POST['body'],
//         'user_id' => 1
//     ]);
// }