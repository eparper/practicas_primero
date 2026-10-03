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
        "url" => ""
    ]
    
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 1", $barraUbicacion);
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
    <a href="/aplicacion/relacion1/ejercicio1.php">Ejercicio1</a><br>
    <a href="/aplicacion/relacion1/ejercicio2.php">Ejercicio2</a><br>
    <a href="/aplicacion/relacion1/ejercicio3.php">Ejercicio3</a><br>
    <a href="/aplicacion/relacion1/ejercicio4.php">Ejercicio4</a><br>
    <a href="/aplicacion/relacion1/ejercicio5.php">Ejercicio5</a><br>
    <a href="/aplicacion/relacion1/ejercicio6.php">Ejercicio6</a><br>
    <a href="/aplicacion/relacion1/ejercicio7.php">Ejercicio7</a><br>
<?php
}
