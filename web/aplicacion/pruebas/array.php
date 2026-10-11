<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Array"
    ],
    
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("ARRAYS", $barraUbicacion);
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
    <h1>ARRAYS</h1>
    <br><br>
    


<?php

    $miArray[3] = 56;
    $miArray[7] = 1234;
    
    $miArray[] = 23;
    

    //$total = 0;
    //no funciona porque no son los índices correspondientes
    // for($i = 0; $i < count($miArray); $i++){ 
    //     $total += $miArray[$i];
    // } 

    $total = 0;
    
    $final = count($miArray);

    for($i = 0; $i < $final; $i++) { 
        if (isset($miArray[$i]))
            $total += $miArray[$i];
        else 
            $final++;
    } 

    //*************************
    $miArray["nueva"] = 24;
    $total = 0;
    $total1 = 0;

    //*******************************FOREACH (PARA ARRAYS CON POSICIONES ASOCIATIVAS)**********************************
    foreach($miArray as $i => $valor) {
        $total += $miArray[$i];
        $total1 += $valor;
    }

    //***************************************************** */




}
