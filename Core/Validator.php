<?php 

namespace Core;

class Validator 
{
    // Este metodo se lo llama funcion pura ya que no es contingente ni depende del estado o valores exteriores
    public static function string($value, $min = 1, $max = INF) {
        $value = trim($value); 

        return strlen($value) >= $min && strlen($value) <= $max;
    }
    //Static sirve para que el metodo sea publico y no tengas que instanciarlo en otros componenntes con una variable
    // static se usa dirctamente
    public static function email(string $value):bool
    {
        //Validator :: email('asasasas@exaple.com)
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    //! Esto fue utilizado para hacer tests
    public static function greaterThan(string $value, int $greaterThan):bool
    {
        return $value > $greaterThan;
    }
}