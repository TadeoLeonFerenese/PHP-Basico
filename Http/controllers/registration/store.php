<?php

use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password']; 

//validar los imputs forms
$errors = [];
if(!Validator::email($email)){
    $errors['email'] = "El email no es valido";
}

if(!Validator::string($password, 7,255)){
    $errors['password'] = "La contraseña tiene que tener al menos 7 caracteres";
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$config = require base_path('config.php');
$db = new Database($config['database']);
//Verificar si la cuenta existe 
$user = $db->query('select * from users WHERE email = :email', [
    'email' => $email
])->find();
    //si existe, redirigir a loginpage.
    if($user){
        header('location: /');
    }   else {
    //si no existe, guardar en la base de datos y redirigir a loginpage.
    //iniciar sesion y redirigir a la pagina principal
    $db->query('INSERT INTO users(email,password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // Obtener el usuario recién creado con su ID
    $user = $db->query('select * from users where email = :email', [
        'email' => $email
    ])->find();

    //marcar el usuario como logeado
    login($user);

    header('location: /');
    exit();
}