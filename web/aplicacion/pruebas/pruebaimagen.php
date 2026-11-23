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
        "nombre" => "Imágenes"
    ],

];

$nombreFichero = RUTABASE . "/imagenes/pruebaimagen.jpg";
$crear = true;

if ($crear) {
    $imagen = imagecreatetruecolor(250, 250);

    //genero el color azul
    $color = imagecolorallocate($imagen, 0, 0, 255);
    //rellena un rectángulo
    imagefilledrectangle($imagen, 10, 10, 190, 190, $color);
    //dibujo una línea blanca
    $color = imagecolorallocate($imagen, 255, 255, 255);
    imageline($imagen, 10, 10, 100, 15, $color);



    imagejpeg($imagen, $nombreFichero);

}

if (isset($_GET["descargar"])) {
    $imagen = imagecreatefromjpeg($nombreFichero);
    $color = imagecolorallocate($imagen, 255, 255, 255);
    imagestring($imagen, 2, 100, 100, "marca agua", $color);
    header('Content-Disposition:attachment; filename="imagen.jpg"');
    imagejpeg($imagen);
    exit;

}




//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Imágenes", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
    ?>
    <img src="/imagenes/pruebaimagen.jpg" alt="Imagen">
    <a href="?descargar" name="descargar">Descargar</a>

    <?php

}