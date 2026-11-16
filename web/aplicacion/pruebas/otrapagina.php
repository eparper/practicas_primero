<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once("mis_funciones.php");

//no se puede redeclarar la función con otro include, entonces si se 
//hace una sola inclusión con include_once ya no da error
//include("mis_funciones.php");

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
        "nombre" => "Funciones"
    ]
    
];

$id = 0;

if (isset($_REQUEST["id"])) {

    $id = intval($_REQUEST["id"]);
}

//compruebo que el id es correcto
$datos["id"] = $id;

//---
$nombre = "";

if (isset($_REQUEST["nombre"])) {

    $nombre = mb_trim($_REQUEST["nombre"]);
}

//compruebo que el nombre es correcto
$datos["nombre"] = $nombre;


//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("carga página", $barraUbicacion);
cuerpo($datos); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $datos)
{
    

    ?>
    <br><br>
    Esta es la página cargada
    <br><br>
    <?php
    
    echo "Se ha recibido un id {$datos["id"]} y nombre {$datos["nombre"]}";
    
    
    
}
