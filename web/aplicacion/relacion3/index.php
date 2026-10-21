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
//-------------Ejercicio 1------------------
$array = [];

$cad = "hola";

$numero1 = 7;

$numero2 = 0;

cuentaVeces($array, $cad, $numero1, $numero2);

//-------------Ejercicio 2------------------
$cad2 = generarCadena(); //con 10 caracteres
$cad3 = generarCadena(5); // con 5 caracteres
$cad4 = generarCadena(-5); //debe dar error

$ejercicio2 = [
    "cad2" => $cad2,
    "cad3" => $cad3,
    "cad4" => $cad4
];

//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 3", $barraUbicacion);
cuerpo($array, $cad, $numero1, $numero2, $ejercicio2);  //llamo a la vista
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
function cuerpo(array $a, string $c, int $n1, int $n2, array $ej2)
{
?>
    <br><br>
    

<?php


    echo "Ejercicio 1: <br>".PHP_EOL;
    echo "Llamada número: " . $n2 . "<br>".PHP_EOL;


    cuentaVeces($a, "2daw", 3, $n2);
    echo "Llamada número: " . $n2 . "<br>".PHP_EOL;


    cuentaVeces($a, "daw1", 35, $n2);
    echo "Llamada número: " . $n2 . "<br>".PHP_EOL;

    cuentaVeces($a, "hasta luego", 3, $n2);
    echo "Llamada número: " . $n2 . "<br>".PHP_EOL;

    echo "Array: <br>".PHP_EOL;

    foreach ($a as $clave => $valor) {
        echo "Posición: " . $clave . ". Valor: " . $valor . "<br>";

        
    }

    echo "<br><br>".PHP_EOL;

    echo "Ejercicio 2: <br>".PHP_EOL;
    
    echo (generarCadena() == false?"Da error": generarCadena()) . " <br>".PHP_EOL; //con 10 caracteres
    echo (generarCadena(5) == false?"Da error": generarCadena(5)) . " <br>".PHP_EOL; // con 5 caracteres
    echo (generarCadena(-5) == false?"Da error": generarCadena(-5)) . " <br>".PHP_EOL; //debe dar error
    
    echo "<br><br>".PHP_EOL;

    echo "Ejercicio 2: <br>".PHP_EOL;

    echo operaciones(1,2,5,7,3,4)."<br>".PHP_EOL; //sumará todos los operandos
    echo operaciones(5,2,5,7,3,4)."<br>".PHP_EOL; //sumará pares e impares y restará a pares - impares


}
