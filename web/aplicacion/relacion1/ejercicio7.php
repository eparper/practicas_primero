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
    echo "<br><h3>Con las funciones para gestión de fechas:</h3>";

    echo "- Mostrar la fecha actual en el formato “d/m/Y”<br>";
    setlocale(LC_TIME, "esp_esp","es_ES");
    $diaActual = date("d/m/Y");
    
    echo $diaActual . "<br>";
    //************************** */

    echo "<br>- Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.<br>";
    //para que no aparezca el mensaje de error en la web en la cabecera ponemos en la línea 12: 
    //error_reporting(E_ALL & ~E_DEPRECATED); 

    //sacamos dia semana
    $diaSemana1a7 = date("w"); //aquí te devuelve de 0 (Domingo) a 6 (sábado)
    $arraySemana = [
        0 => "Domingo",
        1 => "Lunes",
        2 => "Martes",
        3 => "Miércoles",
        4 => "Jueves",
        5 => "Viernes",
        6 => "Sábado"
        
    ];

    $diaHoyConLetras = $arraySemana[$diaSemana1a7];

    //sacamos mes
    $mes1a12 = date("n");
    $arrayMes = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];

    $mesHoyConLetras = $arrayMes[$mes1a12];

    echo "Día " . date("j") . ", mes " . $mesHoyConLetras . ", año " . date("Y") . ", día de la semana " . $diaHoyConLetras;
    //************************** */
    echo "<br><br>- Mostrar la hora actual en el formato “hh:mm:ss” <br>"; //nos muestra otra hora 
                                                                //porque el servidor tiene esa hora
    
    echo date("H:i:s");
    //************************** */
    echo "<br><br>- Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.<br>";
    $fechaHoraDada = mktime(12, 45, 0, 3, 29, 2024);
    echo date("d/m/Y H:i", $fechaHoraDada) . "<br><br>";

    echo "Día " . date("j", $fechaHoraDada) . ", mes " . $arrayMes[date("n", $fechaHoraDada)] . 
            ", año " . date("Y", $fechaHoraDada) . ", día de la semana " . 
            $arraySemana[date("w", $fechaHoraDada)] . ", hora " . date("H", $fechaHoraDada) . 
            ", minuto " . date("i", $fechaHoraDada) . "<br><br>";

    echo date("H:i:s", $fechaHoraDada);

    //************************** */
    echo "<br><br>- Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas  <br>";

    $diaHoraActual = time();

    $diaHoraActual -= (60*60*24*12) + (60*60*4); 

    echo date("d/m/Y H:i:s", $diaHoraActual) . "<br><br>";

    echo "Día " . date("d", $diaHoraActual) . ", mes " . $arrayMes[date("n", $diaHoraActual)] . 
            ", año " . date("Y", $diaHoraActual) . ", día de la semana " . 
            $arraySemana[date("w", $diaHoraActual)] . ", hora " . date("H", $diaHoraActual) . 
            ", minuto " . date("s", $diaHoraActual) . "<br><br>";

    echo date("H:i:s", $diaHoraActual);


    //************CON LA CLASE DATETIME************** */
    echo "<br><br><h3>Con la clase DateTime:<br></h3>";

    echo "- Mostrar la fecha actual en el formato “d/m/Y”<br>";
    $diaActual = new DateTime();
    
    echo $diaActual->format("d/m/Y") . "<br>";
    //************************** */

    echo "<br>- Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.<br>";
    //para que no aparezca el mensaje de error en la web en la cabecera ponemos en la línea 12: 
    //error_reporting(E_ALL & ~E_DEPRECATED); 

    //sacamos dia semana
    $diaSemana1a7 = $diaActual->format("w"); //aquí te devuelve de 0 (Domingo) a 6 (sábado)
    $arraySemana = [
        0 => "Domingo",
        1 => "Lunes",
        2 => "Martes",
        3 => "Miércoles",
        4 => "Jueves",
        5 => "Viernes",
        6 => "Sábado"
        
    ];

    $diaHoyConLetras = $arraySemana[$diaSemana1a7];

    //sacamos mes
    $mes1a12 = $diaActual->format("m");
    $arrayMes = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];

    $mesHoyConLetras = $arrayMes[$mes1a12];

    echo "Día " . $diaActual->format("d") . ", mes " . $mesHoyConLetras . ", año " . $diaActual->format("Y") . ", día de la semana " . $diaHoyConLetras;
    //************************** */
    echo "<br><br>- Mostrar la hora actual en el formato “hh:mm:ss” <br>"; //nos muestra otra hora 
                                                                //porque el servidor tiene esa hora
    
    echo $diaActual->format("H:i:s");
    //************************** */
    echo "<br><br>- Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.<br>";
    $fechaHoraDada = new DateTime("29-3-2026 12:45"); //con guiones no da tantos fallos
    echo $fechaHoraDada->format("d/m/Y H:i") . "<br><br>";

    echo "Día " . $fechaHoraDada->format("d") . ", mes " . $arrayMes[$fechaHoraDada->format("n")] . 
            ", año " . $fechaHoraDada->format("Y") . ", día de la semana " . 
            $arraySemana[$fechaHoraDada->format("w")] . ", hora " . $fechaHoraDada->format("H") . 
            ", minuto " . $fechaHoraDada->format("i") . "<br><br>";

    echo $fechaHoraDada->format("H:i:s");

    //************************** */
    echo "<br><br>- Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas  <br>";

    $diaActualMenosFecha = $diaActual -> sub(new DateInterval("P12DT4H"));

    echo $diaActualMenosFecha -> format("d/m/Y H:i:s") . "<br><br>";

    echo "Día " . $diaActualMenosFecha -> format("d") . ", mes " . 
            $arrayMes[$diaActualMenosFecha -> format("n")] . 
            ", año " . $diaActualMenosFecha -> format("Y") . ", día de la semana " . 
            $arraySemana[$diaActualMenosFecha -> format("w")] . ", hora " 
            . $diaActualMenosFecha -> format("H") . 
            ", minuto " . $diaActualMenosFecha -> format("i") . "<br><br>";

    echo $diaActualMenosFecha -> format("H:i:s");
}
