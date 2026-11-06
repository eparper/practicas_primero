<?php
namespace VALNORMAL;

function validaEntero(int &$var, int $min, int $max, int $defecto):bool {

    if ($var > $min && $var < $max) {
        $var = is_integer($var);
    }


}