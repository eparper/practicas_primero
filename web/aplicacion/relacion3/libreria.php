<?php


/**
 * Undocumented function
 *
 * @param array $arrayParam
 * @param string $cadena
 * @param integer $num1
 * @param integer $num2
 * @return boolean
 */
function cuentaVeces(array &$arrayParam, string $cadena, int $num1, int &$num2) : bool { //estos tipos hay que comprobar si son o no
    
    $resultado = false;
    //para aumentar el contador del num2
    static $contVeces = 0;
    $contVeces++;
    $num2 = $contVeces;
    static $array = []; //si no pones static se resetea en cada llamada


    if ($cadena == "2daw" || $cadena == "primera") {
        $resultado = false;
    }
    else {

        $array[$cadena] = $num1;

        $arrayParam = $array;

        $resultado = true;
    }

    return $resultado;
    
}


/**
 * Undocumented function
 *
 * @param integer $num
 * @return string|boolean
 */
function generarCadena(int $num = 10) : string|bool {

    $resultado = false;
    $cadena = "";
    $res = [];
    $cont = 0;

    $expReg = "/[A-Za-z0-9]/";

    //error
    if ($num == 0 || $num < 0) {
        $resultado = false;
    }
    else {
        while ($cont !== $num) {

            $random = mt_rand(1, 255);

            //sacamos el caracter
            $caracter = mb_chr($random);

            //si el valor devuelto no es false, o sea, que es int:
            if (preg_match($expReg, $caracter, $res, PREG_OFFSET_CAPTURE) == 1) {
                //se van concatenando los caracteres
                $cadena .= $res[0][0][0];

                $cont++;
            }
        }

        $resultado = $cadena;
    }

    return $resultado;

}


