<?php

//

function cuentaVeces(array &$arrayParam, string $cadena, int $num1, int &$num2) : bool { //estos tipos hay que comprobar si son o no
    
    $resultado = false;
    //para aumentar el contador del num2
    static $num2 = 0;
    $num2++;

    if ($cadena == "2daw" || $cadena == "primera") {
        $resultado = false;
    }
    else {

        

        $arrayParam = [];

        $arrayParam[$cadena] = $num1;

        $resultado = true;
    }

    return $resultado;
    
}