<?php 

namespace Http\Forms;

use Core\Validator;

class LoginForm 
{
    protected $errors = [];

    public function validate($email, $password ) {
        if(!Validator::email($email)){
            $this->errors['email'] = "El email no es valido";
        }

        // Valida que la contraseña sea una cadena de texto válida
        if(!Validator::string($password)){
                $this->errors['password'] = "La contraseña no es valida";
        }

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }
} 