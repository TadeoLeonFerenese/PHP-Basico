<?php

use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;


$config = require base_path('config.php');
$db = new Database($config['database']);

$email = $_POST['email'];
$password = $_POST['password'];

// Crea una nueva instancia del formulario de login
$form = new LoginForm();

// Valida que el email y password sean correctos, si no son validos
// retorna a la vista de login mostrando los errores encontrados
if  (! $form->validate($email, $password)){
    return view('session/create.view.php',[
        'errors' => $form->errors()
    ]);
}

// log in the user if the credentials  match.
$user = $db->query('select * from users where email = :email', [
    'email' => $email

])->find();

// Verifica si existe el usuario
if($user) {
    // Verifica si la contraseña ingresada coincide con la almacenada
    if(password_verify($password, $user['password']) ) {
        // Inicia la sesión del usuario
        login($user);

        // Redirecciona a la página principal
        header('location: /');
        exit();
    } 
}

// Si las credenciales no coinciden, retorna a la vista de login con mensaje de error
return view('session/create.view.php', [
    'errors' => [
        'emial' => 'El email no existe'
    ]
]);