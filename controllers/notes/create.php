<?php 

require base_path('/Core/Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);

     $errors = [];

//! Esta funcion es mucho mas segura ya que no permite al usuario agregar notas vacias ni que las modifique
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    //  $validator = new Validator();
    //Esta validacion es para que no se puedan agregar notas vacias
     if(! Validator::string($_POST['body'],1 , 1000)) {
         $errors['body'] = 'A body of no more than 1,000 characters is required.';
     }
    // //Esta validacion es para que no se puedan agregar notas vacias
    // if(strlen($_POST['body']) === 0) {
    //  $errors['body'] = 'A body is required';
    // }
    //Esta validacion es para que no se puedan agregar notas con mas de 1000 caracteres
    // if(strlen($_POST['body']) > 1000) {         
    //  $errors['body'] = 'The body can not be more than 1,000 characters';      
    // }

    if(empty($errors)) {
     $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
     'body' => $_POST['body'],
     'user_id' => 1
     ]);
    }
  
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
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