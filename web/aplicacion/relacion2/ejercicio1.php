<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 2",
        "url" => "/aplicacion/relacion2/index.php"
    ],
    [
        "nombre" => "Ejercicio 1",
        
    ]
    
];

//*************************EJERCICIO 1****************************

//Escribe distintas cadenas usando “, ‘, HEREDOC y NOWDOC incluyendo variables, 
//etiquetas html y caracteres especiales como ‘, “, á, é, ñ. 

//usando comillas dobles
$color = "red";
$cadena1 = "'hola mundo', <span style='color:{$color};'> hasta </span>\"luego\" á, é, ñ";

//usando comillas simples
$cadena2 = '\'hola mundo\', <span style="color: ' . $color . ';"> hasta </span>"luego" á, é, ñ';

//usando HEREDOC
$nombre = "Noemí"; 
$cadena3 = <<<fin
Mi querida amiga á, é, ñ <br /> 
escribo estas líneas esperando que me leas. <br /> 
Firmado: $nombre<br /> 
fin; //el fin es lo que se utiliza para finalizar


//usando NOWDOC
$cadena4 = <<<'fin'
Mi querida amiga á, é, ñ <br /> 
escribo estas líneas esperando que me leas. <br /> 
Firmado: $nombre<br /> 
fin; //el fin es lo que se utiliza para finalizar, y el fin de arriba va entre comillas simples
        //entonces no se interpreta la variable

//QUE LAS ETIQUETAS HTML NO SE EJECUTEN
$cadena5 = "'hola mundo', <span style='color:{$color};'> hasta </span>\"luego\" á, é, ñ";
$cadena55 = htmlspecialchars($cadena5);

$cadena6 = '\'hola mundo\', <span style="color: ' . $color . ';"> hasta </span>"luego" á, é, ñ';
$cadena66 = htmlspecialchars($cadena6);

$cadena7 = <<<fin
Mi querida amiga á, é, ñ <br /> 
escribo estas líneas esperando que me leas. <br /> 
Firmado: $nombre<br /> 
fin; //heredoc

$cadena77 = htmlspecialchars($cadena7);

$cadena8 = <<<'fin'
Mi querida amiga á, é, ñ <br /> 
escribo estas líneas esperando que me leas. <br /> 
Firmado: $nombre<br /> 
fin; //nowdoc

$cadena88 = htmlspecialchars($cadena8);

//array que le paso a la función cuerpo con todas las variables necesarias:
$arrayParams = [
    "cadena1" => $cadena1,
    "cadena2" => $cadena2,
    "cadena3" => $cadena3,
    "cadena4" => $cadena4,
    "cadena5" => $cadena5,
    "cadena55" => $cadena55,
    "cadena6" => $cadena6,
    "cadena66" => $cadena66,
    "cadena7" => $cadena7,
    "cadena77" => $cadena77,
    "cadena8" => $cadena8,
    "cadena88" => $cadena88
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
    <p style="text-align: justify;">
        1.- Escribe distintas cadenas usando “, ‘, HEREDOC y NOWDOC incluyendo variables, 
        etiquetas html y caracteres especiales como ‘, “, á, é, ñ. Muestra las cadenas y 
        comprueba que 
        el código fuente es legible (no se tiene una sola línea con todo seguido). 
        Haz que se muestren 
        las etiquetas html (no se ejecuten)
    </p><br><br>


<?php
            
    echo "Usando comillas dobles: " . $arrayParams["cadena1"] .  "<br>" .PHP_EOL;
    echo "Usando comillas simples: " . $arrayParams["cadena2"] . "<br>" .PHP_EOL;
    echo "Usando HEREDOC: " . $arrayParams["cadena3"].PHP_EOL;
    echo "Usando NOWDOC: " . $arrayParams["cadena4"].PHP_EOL;

    echo "<br>".PHP_EOL;

    echo "Sin interpretar las etiquetas html<br>".PHP_EOL;
    echo"Usando comillas dobles: " . $arrayParams["cadena55"] .  "<br>" .PHP_EOL;
    echo "Usando comillas simples: " . $arrayParams["cadena66"] . "<br>" .PHP_EOL;
    echo "Usando HEREDOC: " . $arrayParams["cadena77"].PHP_EOL;
    echo "Usando NOWDOC: " . $arrayParams["cadena88"].PHP_EOL;
}
