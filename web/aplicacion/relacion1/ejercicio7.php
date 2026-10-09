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
        "nombre" => "Ejercicio 7"
    ]
    
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 7", $barraUbicacion);
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
    <h1>Ejercicio 7</h1>

    <p style="text-align: justify;">
        7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie de funciones 
        para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime. - Mostrar la fecha actual en el formato “d/m/Y” - Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”. - Mostrar la hora actual en el formato “hh:mm:ss” - Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45. - Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas 
        Se definirán las fechas y se visualizarán directamente en la vista. ( no se definirán en el 
        controlador) 
    </p>
<?php

    echo "<br>Con las funciones para gestión de fechas:<br>";

    echo "- Mostrar la fecha actual en el formato “d/m/Y”<br>";
    setlocale(LC_TIME, "esp_esp","es_ES");
    $diaActual = date("d/m/Y");
    $diaActualEsp = $diaActual.date_default_timezone_set("Europe/Madrid");

    echo "<br>- Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.<br>";
    
    $diaActualPasadoATime = strtotime($diaActualEsp);
    echo "" . strftime("%A, %d de %B de %Y");
    
}
