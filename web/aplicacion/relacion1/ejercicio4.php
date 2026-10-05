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
$FILAS = 5;

$array = [];

for ($fila = 0; $fila < 5; $fila++) {
    echo $fila + 1;
    //$array[$fila] = [];

    for ($col = 0; $col < $fila; $col++) {
        $array[$fila][$col] = $col + 1;
        echo $array[$fila][$col];
    }
}


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4", $barraUbicacion);
cuerpo($array);  //llamo a la vista
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
function cuerpo($array)
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

    for ($filas = 1; $filas <= count($array); $filas++) {

        echo "$filas ";

        for ($columnas = 1; $columnas <= $filas; $columnas++) {
            
            echo "$columnas";
        }

        echo "<br>";
    }

}
