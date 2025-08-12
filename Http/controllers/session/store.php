<?php

use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$config = require base_path('config.php');
$db = new Database($config['database']);

$email = $_POST['email'];
$password = $_POST['password'];

// Crea una nueva instancia del formulario de login
$form = new LoginForm();

// Valida que el email y password sean correctos, si no son validos
// retorna a la vista de login mostrando los errores encontrados
if ($form->validate($email, $password)){
    if ((new Authenticator)->attempt($email, $password)) {
        header('location: /');
        exit();
    }
    $form->error('email', 'Las credenciales no coinciden');
}

Session::flash('errors', $form->errors());
Session::flash('old', ['email' => $_POST['email']]);
header('location: /login');
exit();