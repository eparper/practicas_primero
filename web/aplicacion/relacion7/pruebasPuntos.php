<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once RUTABASE . "/scripts/librerias/validacion.php";
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 7",
        "url" => "/aplicacion/relacion7/index.php"
    ],
    [
        "nombre" => "Pruebas Puntos"
    ]
    
];

//-------------------------





//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barraUbicacion);
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

    
    try 
        { 
            //sentencias 
            $punto = new Punto();
            echo "La coordenada X:" . $punto->getX() . "<br>".PHP_EOL;
            echo "La coordenada Y:" . $punto->getY() . "<br>".PHP_EOL;
            echo "El color:" . $punto->getColor() . "<br>".PHP_EOL;
            echo "El grosor:" . $punto->getGrosor() . "<br>".PHP_EOL;

            $punto = new Punto(2000, 200000, "black", 2);
            echo "La coordenada X:" . $punto->getX() . "<br>".PHP_EOL;
            echo "La coordenada Y:" . $punto->getY() . "<br>".PHP_EOL;
            echo "El color:" . $punto->getColor() . "<br>".PHP_EOL;
            echo "El grosor:" . $punto->getGrosor() . "<br>".PHP_EOL;
            
        }  
    catch (Exception $e)  
        { 
            //sentencias para tratar la excepcion 
             echo "Se ha producido el error ".$e->getCode().", ". 
                    $e->getMessage()." de clase ".get_class($e)."<br>".PHP_EOL; 
        } 
    
    

}

