<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

define("NUME", 25);
const NUME1 = 56;

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Pruebas",
        "url" => "/aplicacion/pruebas/index.php"
    ],
    [
        "nombre" => "Pruebas básicas",
        "url" => ""
    ]
    
];

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas básicas", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>esto es html <!-- esto es un comentario -->

    <?php 
        echo "dnkfnekaaaa"; //esto es un comentario;


        $var1 = 25;
        $cadena = 'esto es una cadena';

        $var1 += 0b1000;
        echo $var1;

        $una_cadena = "hola";
        $unaCadena = "adiós";

        $var1 -= 17;
        echo "$var1";

        $unaCadena = 45;
        echo $unaCadena;

        if (isset($cadena2)) {
            echo $cadena2;
        }

        $real = 1234.3456782548930;
        $real+=0.432109876549;

        echo "el numero \$var1 es {$var1}<br>".PHP_EOL;
        echo 'el numero es $var1<br>'.PHP_EOL;


        $real = null;

        echo $real;

        $var = 125;
        $tipo = gettype($var);
        $var = (string) $var;
        $tipo = gettype($var);
        settype($var, "double");
        $tipo = gettype($var);
        $var = intval($var);
        $tipo = gettype($var);

        $var = "0"; //false
        if ($var)
            $cadena = "var no vale false";

        $var = "0"; //true
        if ("0000")
            $cadena = "var no vale false";

        $var = ""; //false
        if ($var)
            $cadena = "var no vale false";

        $var = 0; //false
        if ($var)
            $cadena = "var no vale false";

        $var = 1; //true
        if ($var)
            $cadena = "var no vale false";

        //****************** */

        $var = 1 + true; //2
        $var = 1 + 1.5; //2.5
        //$var = 1 + "1hola"; //2
        //$var = 1 + "1.5hola"; //2.5
        //$var = 1 + "hola"; //DA ERROR
        //$var = 1 + []; // DA ERROR


        $aux = 125;
        $var = "hola " . $aux;
        $aux = true;
        $var = "hola " . $aux;
        $aux = [];
        //$var = "hola " .$aux;
        $aux = "adios";
        $var = "hola " . $aux;

        //referencia
        $var1 = 100;
        $var2 = $var1;
        $var3 = &$var1;
        $var2 = 150;
        $var3 = 200;

        unset($var3);

        
        $var1 += NUME;
        $var1 += NUME1;

        //OPERADORES

        $var = 15/2;

        if ("25" == 25) { //iguales
            $var = "iguales";
        }

        if ("25hola" == 25) { //distintos
            $var = "iguales";
        }

        if ("25" === 25) { //distintos
            $var = "iguales";
        }

        if ("25" != 25) { // son distintos
            $var = "distintos";
        }

        if ("25" !== 25) { //verdadera la condición
            $var = "distintos";
        }

        $var = 14 > 25;
        $var = 14 < 25;
        $var = 14 <=> 25;

        if (isset($var3))
            $var = $var3;
        elseif (isset($mivar))
            $var = $mivar;
        else 
            $var = 27;

        $var = $var3??$mivar??27;

        //*********************************** */

        $var = 0b11111;
        $var = $var >> 1; //quita el bit de la derecha, poniendo un 0 en la izquierda
        $var = $var << 1; //quita el bit de la izquierda, poniendo un 0 en la derecha

        $var = 0b1010 & 0b0101;

        $var = 0b1010 | 0b0101;


        //************************************* */
        $var = 7;

        if ($var == 1)
            $cadena = "uno";
        elseif ($var == 2) 
            $cadena = "dos";
        else
            $cadena = "otro";


        //con switch

        $var = 1;

        switch ($var) {
            
            case 1: $cadena = "uno"; break;
            case 2: $cadena = "dos"; break;
            default: $cadena = "otro";
        }


    ?>
    
<?php
}
