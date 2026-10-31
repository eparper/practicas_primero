<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Pruebas"
    ],
    
];




//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>
    Elemento de pruebas
    <br><br>
    <a href="basicas.php">Funcionamiento básico</a><br>
    <a href="pasopar.php">Comunicación controlador-vista</a><br>
    <a href="array.php">ARRAYS</a><br>
    <a href="cadenas.php">CADENAS</a><br>
    <a href="expresionesRegulares.php">Expresiones Regulares</a><br>
    <a href="index_funciones.php">Index Funciones</a><br>
    <a href="clases.php">Clases</a><br>
    <a href="pagFormulario.php">Formulario</a><br>
<?php
}
