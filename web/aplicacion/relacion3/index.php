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

    cuentaVeces(1);

}
