<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 1",
        "url" => "/aplicacion/relacion1/index.php"
    ],
    [
        "nombre" => "Ejercicio 1",
        
    ]
    
];

//*************************EJERCICIO 1****************************

//-------------ROUND----------------

$numeroDecimal = 34.159;
//el primer parámetro de round es el número y el segundo es la precisión,
//que es a cuántos decimales lo vamos a redondear:
$numConRound = round($numeroDecimal, 2);

//-------------FLOOR----------------

//floor solo tiene un parámetro:
$numeroDecimal2 = 34.98;
$numConFloor = floor($numeroDecimal);

//-------------POW----------------
$numeroElevado = 2;
$resultadoPotencia3 = pow($numeroElevado, 3);

//-------------SQRT----------------
$numeroParaRaiz = 16;
$raizCuadrada = sqrt($numeroParaRaiz);

//-------------ENTERO A HEXADECIMAL----------------
$numeroEntero = 165;
$aHexadecimal = dechex($numeroEntero);

//-------------DE BASE 4 A BASE 8----------------
$numeroBase4 = "1203";
$numeroBase8 = base_convert($numeroBase4, 4, 8);

//-------------DOS FUNCIONES MÁS (decbin y abs)----------------
$numeroDecimal3 = 35;
$numeroABinario = decbin($numeroDecimal3);

$numeroNegativo = -78;
$valorAbsoluto = abs($numeroNegativo);

//-------------DEFINIR VARIABLES EN BINARIO, OCTAL Y HEXADECIMAL----------------
//estas variables se imprimen en decimal
$varBinario = 0b110111;
$varOctal = 067543;
$varHexadecimal = 0xf34;

//pasamos las variables a binario, octal y hexadecimal:
$varBinarioOriginal = decbin($varBinario);
$varOctalOriginal = decoct($varOctal);
$varHexaOriginal = dechex($varHexadecimal);



//array que le paso a la función cuerpo con todas las variables necesarias:
$arrayParams = [
    "numeroDecimal" => $numeroDecimal, 
    "numConRound" => $numConRound,
    "numConFloor" => $numConFloor,
    "numeroDecimal2" => $numeroDecimal2,
    "numeroElevado" => $numeroElevado,
    "resultadoPotencia3" => $resultadoPotencia3,
    "numeroParaRaiz" => $numeroParaRaiz,
    "raizCuadrada" => $raizCuadrada,
    "numeroEntero" => $numeroEntero,
    "aHexadecimal" => $aHexadecimal,
    "numeroBase4" => $numeroBase4,
    "numeroBase8" => $numeroBase8,
    "numeroDecimal3" => $numeroDecimal3,
    "numeroABinario" => $numeroABinario,
    "numeroNegativo" => $numeroNegativo,
    "valorAbsoluto" => $valorAbsoluto,
    "varBinario" => $varBinario,
    "varOctal" => $varOctal,
    "varHexadecimal" => $varHexadecimal,
    "varBinarioOriginal" => $varBinarioOriginal,
    "varOctalOriginal" => $varOctalOriginal,
    "varHexaOriginal" => $varHexaOriginal
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1", $barraUbicacion);
cuerpo($arrayParams);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!-- ESTO VA EN EL HEAD -->
    <?php
}

//vista
function cuerpo($arrayParams)
{
?>
    <br><br>
    <h1>Ejercicio 1</h1>
    <p style="text-align: justify;">1.- Mostrar el funcionamiento de diversas funciones Matemáticas (round, floor, pow, sqrt, entero a 
        hexadecimal, de base 4 a base 8 y al menos dos funciones mas distintas de las anteriores) (buscar la 
        información sobre las funciones matemáticas en <a href="http://php.net/manual/es/book.math.php" target="_blank">http://php.net/manual/es/book.math.php</a>
        ). 
        Definir 
        variables inicializadas con valores en binario, octal y hexadecimal. Mostrar el valor de esas variables 
        tanto en decimal como en la base en la que se han definido.  
        Hacer este ejercicio directamente en la vista (definiciones de las variables y visualización de las 
        mismas)
    </p><br><br>


<?php
            //********************ROUND********************** */
            echo "- round:<br>".PHP_EOL;
            echo "<p style='text-align: justify;'>
                Devuelve el valor redondeado a la cantidad de dígitos especificada 
                (después del punto decimal). 
                También puede ser negativo o cero (valor predeterminado).</p>".PHP_EOL;
            echo "El número es: {$arrayParams["numeroDecimal"]}<br>".PHP_EOL;
            echo "round({$arrayParams["numeroDecimal"]}, 2) = {$arrayParams["numConRound"]}<br><br>".PHP_EOL;

            //********************FLOOR********************** */
            echo "- floor:<br>".PHP_EOL;
            echo "<p style='text-align: justify;'>
                Devuelve el siguiente valor entero más bajo (como número de coma flotante) 
                redondeando hacia abajo si es necesario.</p>".PHP_EOL;
            echo "El número es: {$arrayParams["numeroDecimal"]}<br>".PHP_EOL;
            echo "floor({$arrayParams["numeroDecimal"]}) = {$arrayParams["numConFloor"]}<br><br>".PHP_EOL;

            echo "El número es: {$arrayParams["numeroDecimal2"]}<br>".PHP_EOL;
            echo "floor({$arrayParams["numeroDecimal2"]}) = {$arrayParams["numConFloor"]}<br><br>".PHP_EOL;

            //********************POW********************** */
            echo "- pow:<br>".PHP_EOL;
            echo "<p style='text-align: justify;'>
                Resultado de elevar un número a una potencia.</p>".PHP_EOL;
            echo "El número es: {$arrayParams["numeroElevado"]}<br>".PHP_EOL;
            echo "pow({$arrayParams["numeroElevado"]}, 3) = {$arrayParams["resultadoPotencia3"]}<br><br>".PHP_EOL;

            //********************SQRT********************** */
            echo "- sqrt:<br>".PHP_EOL;
            echo "<p style='text-align: justify;'>
                Devuelve la raíz cuadrada de un número.</p>".PHP_EOL;
            echo "El número es: {$arrayParams["numeroParaRaiz"]}<br>".PHP_EOL;
            echo "sqrt({$arrayParams["numeroParaRaiz"]}) = {$arrayParams["raizCuadrada"]}<br><br>".PHP_EOL;

            //********************ENTERO A HEXADECIMAL********************** */
            echo "- Entero a hexadecimal (dechex):<br>".PHP_EOL;
            echo "<p style='text-align: justify;'>
                Retorna un string que contiene la representación hexadecimal del argumento numero sin signo.</p>".PHP_EOL;
            echo "El número es: {$arrayParams["numeroEntero"]}<br>".PHP_EOL;
            echo "dechex({$arrayParams["numeroEntero"]}) = {$arrayParams["aHexadecimal"]}<br><br>".PHP_EOL;

            //********************DE BASE 4 A BASE 8********************** */
            echo "- De base 4 a base 8 (base_convert):<br>".PHP_EOL;
            echo "<p style='text-align: justify;'>
                Tiene tres parámetros: string numero, int desde_base, int a_la_base.</p>".PHP_EOL;
            echo "La cadena del número en base 4 es: \"{$arrayParams["numeroBase4"]}\"<br>".PHP_EOL;
            echo "base_convert(\"{$arrayParams["numeroBase4"]}\", 4, 8) = {$arrayParams["numeroBase8"]}<br><br>".PHP_EOL;

            //********************DOS FUNCIONES MÁS********************** */
            echo "- Dos funciones más (decbin y abs):<br><br>".PHP_EOL;
            echo "El número en decimal es: {$arrayParams["numeroDecimal3"]}<br>".PHP_EOL;
            echo "decbin({$arrayParams["numeroDecimal3"]}) = {$arrayParams["numeroABinario"]}<br><br>".PHP_EOL;

            echo "El número negativo es: {$arrayParams["numeroNegativo"]}<br>".PHP_EOL;
            echo "abs({$arrayParams["numeroNegativo"]}) = {$arrayParams["valorAbsoluto"]}<br><br>".PHP_EOL;

            //********************BINARIO, OCTAL Y HEXADECIMAL********************** */
            echo "- Variables en binario, octal y hexadecimal:<br><br>".PHP_EOL;
            echo "El número en binario es: {$arrayParams["varBinarioOriginal"]}<br>".PHP_EOL;
            echo "El número en decimal es: {$arrayParams["varBinario"]}<br><br>".PHP_EOL;

            echo "El número en octal es: {$arrayParams["varOctalOriginal"]}<br>".PHP_EOL;
            echo "El número en decimal es: {$arrayParams["varOctal"]}<br><br>".PHP_EOL;

            echo "El número en hexadecimal es: {$arrayParams["varHexaOriginal"]}<br>".PHP_EOL;
            echo "El número en decimal es: {$arrayParams["varHexadecimal"]}<br><br>".PHP_EOL;

}
