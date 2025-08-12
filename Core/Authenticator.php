<?php 

namespace Core; 

use Core\Database;
use Core\Session;

class Authenticator 
{
    public function attempt($email, $password) {
        $config = require base_path('config.php');
        $db = new Database($config['database']);

        // log in the user if the credentials  match.
        $user = $db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        // Verifica si existe el usuario
        if($user) {
            // Verifica si la contraseña ingresada coincide con la almacenada
            if(password_verify($password, $user['password']) ) {
                // Inicia la sesión del usuario
                $this->login($user);
                
                return true;
            } 
        }
        
        return false;
    }

    //funcion que valida si el usuario esta logueado
    public function login($user) {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id']
        ];

        session_regenerate_id(true);
    }

    //log out the user outfunction 
    public function logout(){
        Session::destroy();
    }
}