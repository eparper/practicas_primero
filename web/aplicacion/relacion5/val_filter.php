<?php
namespace VALFILTER;

function validaEntero(int &$var, int $min, int $max, int $defecto):bool {

    $opciones = [
        "options" => [
            "min_range" => 100,
            "max_range" => 200,
            "default" => 100
        ],
        "flags" => FILTER_FLAG_ALLOW_HEX
    ];

    //filter_var($var, FILTER_);
    return true;
    
}

function validaReal(int &$var, int $min, int $max, int $defecto):bool {

    if (filter_var($var, FILTER_VALIDATE_FLOAT)) {

        if ($var > $min && $var < $max) {
            $variable = filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT);
            $var = (float) $variable;
            return true;
        }
        else {
            $var = $defecto;
            return false;
        }

    }    
    else 
        return false;
}
