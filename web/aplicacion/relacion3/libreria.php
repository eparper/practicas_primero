<?php


/**
 * Función que cuenta las veces que se llama a la misma. 
 * En cada llamada pone la posición asociativa del array que le pasamos en la cadena
 * y en esa posición añade el primer número que le pasamos.
 * 
 * @param array $arrayParam Array en el que se va guardando la posición asociativa con el valor.
 * @param string $cadena La posición asociativa que se añade al array.
 * @param integer $num1 El número que se pasa como valor a la posición asociativa.
 * @param integer $num2 Número en el que se le pasa el contador de veces que se llama a la función.
 * @return boolean Se devuelve true si todo ha ido bien o false si las posiciones no son válidas (2daw o primera)
 */
function cuentaVeces(array &$arrayParam, string $cadena, int|float $num1, int &$num2) : bool { //estos tipos hay que comprobar si son o no
    
    $resultado = false;
    //para aumentar el contador del num2
    static $contVeces = 0;
    $contVeces++;
    $num2 = $contVeces;

    


    if ($cadena == "2daw" || $cadena == "primera" || $cadena == "") {
        $resultado = false;
    }
    else {

        $arrayParam[$cadena] = $num1;

        $resultado = true;
    }

    return $resultado;
    
}

/**
 * Función que genera una cadena con caracteres aleatorios (10 por defecto o los que le indiquemos)
 *
 * @param integer $num Número de caracteres que tendrá la cadena
 * @return string|false Devuelve string si todo ha bien o false en caso de errores (si el número es 0 o negativo)
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
 * Función a la que se le pasa un número como tipo de función y
 * hace la operación indicada con los dos o más operandos.
 *
 * @param integer $tipoOP Tipo de operación, 1 suma, 2 resta, 3 multiplicacion, otra: suma números pares, suma números impares y luego resta
 * @param integer $operando1 Primer número obligatorio con el que se hace la operación
 * @param integer $operando2 Segundo número obligatorio con el que se hace la operación
 * @param integer ...$resto Resto de números si se indican, con los que se hacen la operación
 * @return integer Devuelve el resultado de la operación
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
 * Función que suma los tres números y los guarda en el primer número, 
 * devuelve la multiplicación de los tres números.
 *
 * @param integer $n1 Número que guarda la suma de los tres números.
 * @param integer $n2 Segundo número que se utiliza para las operaciones.
 * @param integer $n3 Tercer núemro que se utiliza para las operaciones.
 * @return integer Devuelve la multiplicación de los tres números.
 */
function devuelve(int &$n1, int $n2 = 5, int $n3 = 10) : int {

    $suma = $n1 + $n2 + $n3;

    //guardamos n1 en una variable auxiliar para no perder el valor
    $aux = $n1;

    $n1 = $suma;

    return $aux * $n2 * $n3;

}

/**
 * Función que da el resultado de la suma de dos números
 *
 * @param integer $op1 Primer número que se suma 
 * @param integer $op2 Segundo número que se suma 
 * @return integer Devuelve el resultado de la suma
 */
function suma(int $op1, int $op2):int {
    return $op1 + $op2;
}

/**
 * Función que da el resultado de la resta de dos números
 *
 * @param integer $op1 Primer número al que se le resta el otro
 * @param integer $op2 Segundo número que se le resta al primero
 * @return integer Devuelve el resultado de la resta
 */
function resta(int $op1, int $op2):int {
    return $op1 - $op2;
}

/**
 * Función que da el resultado de la multiplicación de dos números
 *
 * @param integer $op1 Primer operando de la multiplicación
 * @param integer $op2 Segundo operando de la multiplicación
 * @return integer Devuelve el resultado de la multiplicación
 */
function multiplicacion(int $op1, int $op2):int {
    return $op1 * $op2;
}

/**
 * Función a la que se le pasa una cadena con la operación válida,
 * y los dos números para hacer la operación.
 *
 * @param string $cadena Operación válida en cadena
 * @param integer $op1 Primer operando
 * @param integer $op2 Segundo operando
 * @return false|integer Devuelve false si se indica operación no válida, si no, devuelve un número entero con el resultado 
 */
function hacerOperacion(string $cadena, int $op1, int $op2):false|int {

    $resultado = 0;

    switch ($cadena) {
        case "suma": {
            
        } 
        case "resta": {
            
        } 
        case "multiplicacion": {
            $resultado = $cadena($op1, $op2);
        } break;
        default: {
            $resultado = false;
        } 
    }

    return $resultado;
}

/**
 * Función a la que se le pasan dos operandos y una función. 
 * Hace lo que haga la función pasada con los dos operandos pasados.
 *
 * @param integer $op1 Primer operando que se le pasa.
 * @param integer $op2 Segundo operando que se le pasa.
 * @param callable $op3 Función que se le pasa.
 * @return mixed Devuelve cualquier tipo según lo que haga la función
 */
function llamadaAFuncion(int $op1, int $op2, callable $op3) : mixed {

    return $op3($op1, $op2);
}

/**
 * Función que ordena un array de forma descendente teniendo en cuenta 
 * el tamaño de las cadenas del array.
 *
 * @param array $arr Array que se le pasa con las cadenas a ordenar.
 * @return void No devuelve nada porque solo ordena el array.
 */
function ordenar(array &$arr) : void {

    //el operador nave devuelve 0,1,-1
    usort($arr, fn(string $a2, string $b):int => mb_strlen($b) <=> mb_strlen($a2));

    //si sale 0 la resta de los tamaños: son iguales las cadenas.
    //si sale negativo: b es menor
    //si sale positivo: b es mayor
    //usort($arr, fn(string $a2, string $b):int => mb_strlen($b) - mb_strlen($a2));
}
