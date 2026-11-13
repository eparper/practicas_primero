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


//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("carga página", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
    $id = 15;

    ?>
    <br><br>
    <h2>primera forma: enlace</h2> <!-- un enlace siempre hace la petición por GET -->
    <a href="<?= "otrapagina.php?id=$id&nombre=vicente" ?>">Enlace a otra página</a>
    <br><br>

    

    <form method="POST" action="otrapagina.php?id=<?= $id+5 ?>">
        <input type="hidden" name="id" value="<?= $id ?>">

        <select name="id">
            <option value="1">Primero</option>
            <option value="2">Segundo</option>
            <option value="3">Tercero</option>
        </select>

        <label>nombre:</label>
        <input type="text" name="nombre">
        <br><br>

        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="borrado" value="Borrar">
        <input type="submit" name="modificar" value="Modificar">

    </form>
    

    
    
    <?php
}
