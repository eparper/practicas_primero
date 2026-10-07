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
        "nombre" => "Ejercicio 4",
        "url" => ""
    ]
    
];

//constante $FILAS
$FILAS = 8;

$array = [];
$arrayConstante = [];

//sin la constante FILAS
for ($fila = 0; $fila < 5; $fila++) {
    
    $array[$fila] = [];

    for ($col = 0; $col < count($array); $col++) {

        $array[$fila][$col] = $fila + 1;
        
    }

}

//con la constante FILAS
for ($fila = 0; $fila < $FILAS; $fila++) {
    
    $arrayConstante[$fila] = [];

    for ($col = 0; $col < count($arrayConstante); $col++) {

        $arrayConstante[$fila][$col] = $fila + 1;
        
    }

}


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4", $barraUbicacion);
cuerpo($array, $arrayConstante);  //llamo a la vista
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
function cuerpo($array, $arrayConstante)
{
?>
    <br><br>
    <h1>Ejercicio 4</h1>

    <p style='text-align: justify;'>4- Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se 
        debe generar usando bucles for.  <br>
        1 <br>
        2  2 <br>
        3  3  3 <br>
        4  4  4  4 <br>
        5  5  5  5  5  <br>
        
        Declarar la constante FILAS que se rellenará con el número de filas que se deben crear. Repetir 
        lo anterior usando FILAS para crear el array y visualizarlo. 
        
        Los datos se definirán en el controlador y se visualizarán en la vista. 
    </p>
<?php

    echo "SIN LA CONSTANTE \$FILAS:<br>";

    foreach ($array as $elemento) {


        //se le pone el igual porque estamos cogiendo ahora lo que sea el valor de $fila
        foreach ($elemento as $valor) {

            echo "{$valor} ";
        }

        echo "<br>";
    }

    //************************************************************************************** */

    echo "<br>CON LA CONSTANTE \$FILAS:<br>";

    foreach ($arrayConstante as $elemento) {


        //se le pone el igual porque estamos cogiendo ahora lo que sea el valor de $fila
        foreach ($elemento as $valor) {

            echo "{$valor} ";
        }

        echo "<br>";
    }

}
