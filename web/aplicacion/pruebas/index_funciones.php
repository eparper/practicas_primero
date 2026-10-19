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

//-------------------
$numero = doble(5);
//comprobación
if ($numero === false) {
    //hay un error, lo resuelvo
    $numero = 5; //le asignamos un valor por defecto, por ejemplo

}

//primero hace asignación, y luego verifica que no sea false 
//(es lo mismo que lo de arriba, solo que de otra forma):
if (($numero = doble($numero)) === false) {
    exit;
}

if (!$numero = doble($numero)) {
    exit;
}


//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Funciones", $barraUbicacion);
cuerpo($numero); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(int $n)
{

    

    echo "El doble del número es $n".PHP_EOL;
    
    
}
