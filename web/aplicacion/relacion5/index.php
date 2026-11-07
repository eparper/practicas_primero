<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_filter.php");
include_once(dirname(__FILE__) . "/val_normal.php");
require_once RUTABASE . "/scripts/librerias/validacion.php";
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 5"

    ]
    
];

//-------------------------





//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barraUbicacion);
cuerpo();  //llamo a la vista
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
function cuerpo()
{
?>
    <br><br>
    

<?php

    $variable = 2.5;
    echo (VALFILTER\validaReal($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = 5;
    echo (VALFILTER\validaEntero($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = 2.5;
    echo (VALNORMAL\validaReal($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = 5;
    echo (VALNORMAL\validaEntero($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = "30/3/2022";
    echo (VALFILTER\validaFecha($variable, "01/01/2000"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "30/2/2022";
    echo (VALNORMAL\validaFecha($variable, "01/01/2000"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "-16:87:-00";
    echo (VALFILTER\validaHora($variable, "01:01:00"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "16:7:56";
    echo (VALNORMAL\validaHora($variable, "01:01:00"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g.educaand.es";
    echo (VALFILTER\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g..educaand.es";
    echo (VALFILTER\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g.educaand.es";
    echo (VALNORMAL\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g.educaand..es";
    echo (VALNORMAL\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "HOLA";
    echo (VALNORMAL\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "HOLA";
    echo (VALNORMAL\validaCadena($variable, 10, "cadena"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "HOLAholaholahola";
    echo (VALNORMAL\validaCadena($variable, 10, "cadena"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "adios@gmail.com";
    echo (VALFILTER\validaExpresion($variable, "/^[\w\.-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/", "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "adios@gmail.com";
    echo (VALNORMAL\validaExpresion($variable, "/^[\w\.-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/", "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;



    $variable = "adios";
    echo (VALNORMAL\validaExpresion($variable, "/^[\w\.-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/", "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;


    //----------------------------------------
    $variable = "adios";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALNORMAL\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    $variable = "adios";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALFILTER\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    $variable = "adioss";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALNORMAL\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    $variable = "adioos";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALFILTER\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    //comprobar el require_once:
    $variable = "adioos";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (validaRango($variable, $arrayPrueba, 1)?"Es correcto<br>":"No es correcto<br>").PHP_EOL;


}
