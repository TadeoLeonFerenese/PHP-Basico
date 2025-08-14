<?php

use Core\Database;
use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\ValidatorException;

$config = require base_path('config.php');
$db = new Database($config['database']);

try {
    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);
} catch (ValidatorException $exception) {
    \Core\Session::flash('errors', $exception->errors);
    \Core\Session::flash('old', $exception->old);
    return redirect('/login');
}

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if (!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email and password.'
    );
    
    \Core\Session::flash('errors', $form->errors());
    \Core\Session::flash('old', $attributes);
    return redirect('/login');
}

redirect ('/');