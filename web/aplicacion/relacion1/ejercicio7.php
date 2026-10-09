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
    //************************** */
    echo "<br>Con las funciones para gestión de fechas:<br>";

    echo "- Mostrar la fecha actual en el formato “d/m/Y”<br>";
    setlocale(LC_TIME, "esp_esp","es_ES");
    $diaActual = date("d/m/Y");
    
    echo $diaActual;
    //************************** */

    echo "<br>- Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.<br>";
    //para que no aparezca el mensaje de error en la web en la cabecera ponemos en la línea 12: 
    //error_reporting(E_ALL & ~E_DEPRECATED); 

    //sacamos mes
    $diaSemana1a7 = strftime("%u");
    $arraySemana = [
        1 => "Lunes",
        2 => "Martes",
        3 => "Miércoles",
        4 => "Jueves",
        5 => "Viernes",
        6 => "Sábado",
        7 => "Domingo"
    ];


    echo strftime("Día %d, mes %B, año %Y, día de la semana %A");
    
}
