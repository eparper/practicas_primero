<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Pruebas",
        "url" => "/aplicacion/pruebas/index.php"
    ],
    [
        "nombre" => "Paso de parámetros"
    ]
    
];

//datos básicos
$nombre = "Vicente";
$edad = 30;

$basicos = [
    "nombre" => $nombre,
    "edad" => $edad
];

//relleno otras
$otras = rellenarOtras();

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("PASO PARÁMETROS", $barraUbicacion);
cuerpo($basicos, $otras);  //llamo a la vista
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
function cuerpo($bas, $ot)
{
?>
    <br><br>
    
<?php
    echo "Mi nombre es: {$bas["nombre"]} de {$bas["edad"]} años. <br>".PHP_EOL;
    echo "Con otros datos {$ot}";
}

function rellenarOtras() {
    return "de 2 DAW";
}