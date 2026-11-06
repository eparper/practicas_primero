<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_filter.php");

//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 5"

    ]
    
];

//-------------------------
//-------------Ejercicio 1------------------

$variable = 2.5;
VALFILTER\validaReal($variable, 0, 10, 5);
echo gettype($variable);

$variable = "5  a";
VALFILTER\validaEntero($variable, 0, 10, 5);
echo gettype($variable);

//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barraUbicacion);
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
    

<?php

    
}
