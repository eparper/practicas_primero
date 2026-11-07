<?php
namespace VALNORMAL;

/**
 * Undocumented function
 *
 * @param integer $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
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

/**
 * Undocumented function
 *
 * @param float $var
 * @param float $min
 * @param float $max
 * @param float $defecto
 * @return boolean
 */
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

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaFecha(string &$var, string $defecto):bool  {

    //separamos el día, mes y año
    $fecha = mb_split("/", $var); 

    //mes -- día -- año
    $fechaBien = checkdate($fecha[1], $fecha[0], $fecha[2]);

    if ($fechaBien) {

        //construimos una fecha
        $fechaDate = mktime(0, month: $fecha[1], day: $fecha[0], year: $fecha[2]);

        //saneamos día y mes si tienen 1 cifra
        $var = date("d/m/Y", $fechaDate); //devuelve string

        return true;

    }
    else {

        $var = $defecto;
        return false;
    }


}

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaHora(string &$var, string $defecto):bool {

    $horaBien = true;

    //separamos en hora, minutos y segundos
    $hora = mb_split(":", $var); 

    //hora, minutos y segundos
    if ($hora[0] > 23) { //horas
        $horaBien = false;
    }
    if ($hora[1] > 59) { //minutos
        $horaBien = false;
    }
    if ($hora[2] > 59) { //segundos
        $horaBien = false;
    }

    if ($horaBien) {

        //construimos una hora
        $horaDate = mktime($hora[0], $hora[1], $hora[2]);

        //saneamos la hora
        $var = date("H:i:s", $horaDate); //devuelve string

        return true;

    }
    else {

        $var = $defecto;
        return false;
    }
}


/**
 * Undocumented function
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaEmail(string &$var, string $defecto):bool {

    $resultado = [];

    $expRegEmail = "/^[\w\.-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/";

    $resultadoBien = preg_match($expRegEmail, $var, $resultado, PREG_OFFSET_CAPTURE);

    if ($resultadoBien == false) {
        $var = $defecto;
        return false;    
    
    
    }

    return true;
}

/**
 * Undocumented function
 *
 * @param string $var
 * @param integer $longitud
 * @param string $defecto
 * @return boolean
 */
function validaCadena(string &$var, int $longitud, string $defecto):bool {

    if (mb_strlen($var) < $longitud) {
        $var = (string) $var;
        return true;
    }
    else {
        $var = $defecto;
        return false;
    }
}

/**
 * Undocumented function
 *
 * @param string $var
 * @param string $expresion
 * @param string $defecto
 * @return boolean
 */
function validaExpresion(string &$var, string $expresion, string $defecto):bool {

    $resultado = [];

    $resultadoBien = preg_match($expresion, $var, $resultado, PREG_OFFSET_CAPTURE);

    if ($resultadoBien == false) {
        $var = $defecto;
        return false;    
    
    }

    return true;
}

/**
 * Undocumented function
 *
 * @param mixed $var
 * @param array $posibles
 * @param integer $tipo
 * @return boolean
 */
function validaRango(mixed $var, array $posibles, int $tipo=1):bool {

    $resultado = false;

    //contenido
    if ($tipo == 1) {

        if (in_array($var, $posibles)) {
            $resultado = true;
        }
        else
            $resultado = false;


    }
    //claves
    if ($tipo == 2) {
        if (array_key_exists($var, $posibles)) {
            $resultado = true;
        }
        else
            $resultado = false;
    }

    return $resultado;
}