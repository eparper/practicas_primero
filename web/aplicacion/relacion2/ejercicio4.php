<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 2",
        "url" => "/aplicacion/relacion2/index.php"
    ],
    [
        "nombre" => "Ejercicio 4",
        
    ]
    
];

//*************************EJERCICIO 4****************************
$var1 = 17.5;
$var2 = 379987.24;

$numeroFormateado = number_format($var1, 1, ",");
$numeroFormateado2 = number_format($var2, 2, ",", ".");


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3", $barraUbicacion);
cuerpo($numeroFormateado, $numeroFormateado2);  //llamo a la vista
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
function cuerpo($numeroFormateado, $numeroFormateado2)
{
?>
    <br><br>
    <h1>Ejercicio 4</h1>
    <p style="text-align: justify;">
        4.- Tengo unas variables con valores 17.5 (float), 379987.24 (float)  
        Mostrarlas de forma que resulte "el primer valor -0000000000017,5-, el segundo valor -      
        379.987,24-" (usar number format para obtener el formateo de los números, los números se 
        muestran con 15 caracteres en total, el primero relleno con 0 y el segundo con espacios-debe 
        aparecer el espacio)) 
    </p><br><br>


    
<?php
    
    //   

    echo "el primer valor -" . str_pad($numeroFormateado, 15, "0", STR_PAD_LEFT) . "-, 
            el segundo valor -" . str_pad($numeroFormateado2, 15, "&nbsp;", STR_PAD_LEFT) . "-".PHP_EOL;
    
}
