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
function generarCadena(int $num = 10) : string|false {

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


/**
 * Undocumented function
 *
 * @param integer $tipoOP
 * @param integer $operando1
 * @param integer $operando2
 * @param integer ...$resto
 * @return integer
 */
function operaciones(int $tipoOP, int $operando1, int $operando2, int ...$resto) : int {

    $resultado = 0;
    $sumaPares = 0;
    $sumaImpares = 0;

    switch ($tipoOP) {
        case 1: {

            $resultado = $operando1 + $operando2;

            foreach ($resto as $elem) {
                $resultado += $elem;
            }

        } break;
        case 2: {

            $resultado = $operando1 - $operando2;

            foreach ($resto as $elem) {
                $resultado -= $elem;
            }

        } break;
        case 3: {

            $resultado = $operando1 * $operando2;

            foreach ($resto as $elem) {
                $resultado *= $elem;
            }

        } break;
        default: {

            $sumaPares = $operando2;
            $sumaImpares = $operando1;

            for ($cont = 0; $cont < count($resto); $cont++) {

                //estos son los impares para el usuario:
                if ($cont % 2 == 0) {
                    $sumaImpares += $resto[$cont];
                }
                else {
                    //y aquí entran los pares
                    $sumaPares += $resto[$cont];
                }
            }

            $resultado = $sumaPares - $sumaImpares;

        }
    }
    return $resultado;
}

/**
 * Undocumented function
 *
 * @param integer $n1
 * @param integer $n2
 * @param integer $n3
 * @return integer
 */
function devuelve(int &$n1, int $n2 = 5, int $n3 = 10) : int {

    $suma = $n1 + $n2 + $n3;

    //guardamos n1 en una variable auxiliar para no perder el valor
    $aux = $n1;

    $n1 = $suma;

    return $aux * $n2 * $n3;

}