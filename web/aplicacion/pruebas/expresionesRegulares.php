<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Expresiones Regulares"
    ],
    
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Expresiones regulares", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>
    <h1>Expresiones regulares</h1>
    <br><br>
    


<?php

    
    //***************************************************** */

    $cadena = "Tienes 258 34 años";

    //buscar número
    $exp = '/años/';

    $resultado = [];

    //devuelve 1 si el patrón coincide con la cadena de texto
    //devuelve 0 si el patrón NO coincide con la cadena de texto
    //devuelve false si ocurre algún error como por ejemplo que esté mal la expReg
    preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

    //***************************************************** */

    //buscar número
    $exp = '/[0123456789]+/'; //EL + INDICA UNA O MÁS OCURRENCIAS
    $exp = '/[0-9]+/'; //ES LO MISMO QUE LO DE ARRIBA
    $exp = '/\d+/'; //ES LO MISMO QUE LOS DE ARRIBA
    $exp = '/\d{1,}/'; //ES LO MISMO QUE LOS DE ARRIBA
    $exp = '/[[:digit:]]+/'; //ES LO MISMO QUE LOS DE ARRIBA
    preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

    //busco un número con dos cifras
    $exp = '/\d{2}/'; //un número con dos dígitos
    preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

    // buscar un número real
    $cadena = 'tienes 54 Años 258.34 años';
    $exp = "/\d+\.\d+/";
    preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);


    //subpatrones
    //quiero encontrar en un número real la parte decimal:
    $cadena = 'tienes 54 Años 258.34 años';
    $exp = "/\d+\.(\d+)/"; //los paréntesis es el subpatrón, 
                            //primero encuentra todo y luego el subpatrón
    preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);


    //modificadores
    $exp = '/años/i'; //no distingue mayúsculas y minúsculas el modificador i
    preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);


    //cuantificado, como hacer perezoso
    $cadena = "/* primer comentario */ no comentado /* segundo comentario */";
    $exp = "/[/]\*.*?\*//";

}
