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
        "nombre" => "Pruebas cookies y sesiones"
    ],

];


//COOKIES------------------------------------------------
//setcookie("numero", mt_rand(1,100), time() + 60*60*24*2);

//la primera vez no se carga la cookie, hay que recargar la página
//$valor = $_COOKIE["numero"];

//borrar cookie:
//setcookie("numero", false); 
//-------------------------------------------------------

//SESIONES------------------------------------------------
//se genera un id por sesión, cuando cambias de sesión, se cambia ese id
//mediante session_start() se inicia una sesión
//superglobal: $_SESSION
//mediante una cookie se guarda el id de sesión
//$valor = $_COOKIE["numero"];
$valor = 0;
session_start();

//a partir de que inicio la sesión, en la superglobal ya está funcionando
//$_SESSION["nombre"] = "vicente";

//se destruye una sesión con session_destroy()



//--------------------------------------------------------



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Imágenes", $barraUbicacion);
cuerpo($valor); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(int $valor)
{
    ?>
    

    <?php

    echo "Leído la cookie con valor: $valor";

}