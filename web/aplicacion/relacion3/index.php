<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/libreria.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 3"

    ]
    
];

//-------------------------
$array = [];

$cad = "hola";

$numero1 = 7;

$numero2 = 0;

cuentaVeces($array, $cad, $numero1, $numero2);




//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barraUbicacion);
cuerpo($array, $cad, $numero1, $numero2);  //llamo a la vista
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
function cuerpo(array $a, string $c, int $n1, int $n2)
{
?>
    <br><br>
    

<?php

    

}
