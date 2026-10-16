<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 2"

    ]
    
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 2", $barraUbicacion);
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
    <a href="/aplicacion/relacion2/ejercicio1.php">Ejercicio1</a><br>
    <a href="/aplicacion/relacion2/ejercicio2.php">Ejercicio2</a><br>
    <a href="/aplicacion/relacion2/ejercicio3.php">Ejercicio3</a><br>
    <a href="/aplicacion/relacion2/ejercicio4.php">Ejercicio4</a><br>
    <a href="/aplicacion/relacion2/ejercicio5.php">Ejercicio5</a><br>

<?php
}
