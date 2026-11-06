<?php
namespace VALNORMAL;

function validaEntero(int &$var, int $min, int $max, int $defecto):bool {

    if ($var > $min && $var < $max) {
        $var = (int) $var;
        return true;
    }
    else {
        $var = $defecto;
        return false;
    }
}

function validaReal(float &$var, float $min, float $max, float $defecto):bool {

    if ($var > $min && $var < $max) {
        $var = (float) $var;
        return true;
    }
    else {
        $var = $defecto;
        return false;
    }
}

