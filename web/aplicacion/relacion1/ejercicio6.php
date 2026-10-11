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
        "nombre" => "Ejercicio 6"
    ]
    
];

//array
$vector = array(
    "primera" => 12.56, 
    24 => true, 
    67 => 23.76
); 


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 6", $barraUbicacion);
cuerpo($vector);  //llamo a la vista
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
function cuerpo($vector)
{
?>
    <br><br>
    <h1>Ejercicio 6</h1>

    <p style="text-align: justify;">
         
        6.- Con el array $vector=array("primera" =>12.56, 24=>true, 67 =>23.76); - Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de 
        recorrido para mostrar tanto los índices como los valores del array anterior. - Simular el funcionamiento de foreach usando las funciones array_keys y array_values para 
        mostrar tanto los índices como los valores del array anterior. 
        
        El array se definirá en el controlador y se realizarán las operaciones en la vista. 
    </p>
<?php

    echo "<br>Simular foreach con funciones de recorrido:<br>";

    //cuando la clave del array sea null es que ha terminado el array
    while(key($vector)!= null){ 

        echo "Índice: " . key($vector) . " valor: " . current($vector)."<br />";  //mostramos el elemento
        next($vector); //avanzamos el puntero para en la próxima vuelta se muestre el siguiente
    } 

    echo "<br>Simular foreach con funciones array_keys y array_values:<br>";
    for ($cont = 0; $cont < count($vector); $cont++) {
        echo "Índice: " . array_keys($vector)[$cont] . " valor: " . array_values($vector)[$cont] ."<br />";
    }

}
