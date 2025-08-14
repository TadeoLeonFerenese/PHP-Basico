<?php 

namespace Core;

class ValidatorException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;

    public function __construct($errors = [], $old = [])
    {
        $this->errors = $errors;
        $this->old = $old;
        parent::__construct('Validation failed.');
    }

    public static function throw($errors, $old = []) {
        $instance = new static($errors, $old); 

        throw $instance;
    }
}