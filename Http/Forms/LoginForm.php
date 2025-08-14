<?php 

namespace Http\Forms;

use Core\Validator;
use Core\ValidatorException;

class LoginForm 
{
    protected $errors = [];

    public function __construct(public array $attributes) 
    {
        if(!Validator::email($attributes['email'])){
            $this->errors['email'] = "El email no es valido";
        }

        // Valida que la contraseña sea una cadena de texto válida
        if(!Validator::string($attributes['password'])){
            $this->errors['password'] = "La contraseña no es valida";
        }
    }

    public static function validate($attributes ) 
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;    
    }

    public function throw() {
        ValidatorException::throw($this->errors(), $this->attributes);
        }

    public function failed(){
        return count($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;

        return $this;
    }
} 