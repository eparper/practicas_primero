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

//-------------------
$numero = doble(5);
//comprobación
if ($numero === false) {
    //hay un error, lo resuelvo
    $numero = 5; //le asignamos un valor por defecto, por ejemplo

}

//primero hace asignación, y luego verifica que no sea false 
//(es lo mismo que lo de arriba, solo que de otra forma):
// if (($numero = doble($numero)) === false) {
//     exit;
// }

// if (!$numero = doble($numero)) {
//     exit;
// }

$numero = variosParametros(25, "2aaa8769", 56);
$numero = variosParametros(25, "2");
//par2 debe tener un valor por defecto porque si no, dará fallo, ya que no le hemos
//indicado ningún valor en la llamada
$numero = variosParametros(25, par3:100);

//los demás parámetros no son accesibles porque no se 
//ha definido una forma de trabajar con ellos
$numero = variosParametros(25, "2aaa8769", 56, 2, 5, 6, 8);

$numero = suma(1,2,3,4,5,6,7,8,9,10);
//$numero = suma1(1,2,3,4,5,6,7,8,9,10);

$r = [3,4,5,6,7,8,9,10];
$numero = suma(1,2,...$r);
$numero = suma(...$r);


$n1 = 15;
$otra = "n1";
//variable-variable
$numero = $$otra; //es 15 porque sustituye $otra por "n1" y como tiene 
                    //otro $, hace que se direccione a esa otra variable

//variable-función
$otra = "suma";

$numero = $otra(1,2,3,4); //se llama a la función suma mediante una variable

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Funciones", $barraUbicacion);
cuerpo($numero); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(int $n)
{

    

    echo "El doble del número es $n".PHP_EOL;
    
    
}
