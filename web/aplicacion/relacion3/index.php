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

$suma = 5;

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
cuerpo($array, $cad, $numero1, $numero2, $ejercicio2, $suma);  //llamo a la vista
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
function cuerpo(array $a, string $c, int $n1, int $n2, array $ej2, int $sum)
{
?>
    <br><br>
    

<?php

    $n2 = 0;

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

    echo "Ejercicio 3: <br>".PHP_EOL;

    echo operaciones(1,2,5,7,3,4)."<br>".PHP_EOL; //sumará todos los operandos
    echo operaciones(5,2,5,7,3,4)."<br>".PHP_EOL; //sumará pares e impares y restará a pares - impares
    //le pasamos comno resto pero eso hace que se asignen los primeros valores a los parámetros según
    //la posición respectivamente
    echo operaciones(...[5,2,5,7,3,4])."<br>".PHP_EOL; //da lo mismo que el de arriba

    echo "<br><br>".PHP_EOL;

    echo "Ejercicio 4: <br>".PHP_EOL;

    
    echo "Resultado: " . devuelve($sum, 7, 20) . ". Suma: $sum <br>".PHP_EOL; //indicando los tres parámetros
    $sum = 1;
    echo "Resultado: " . devuelve($sum) . ". Suma: $sum <br>".PHP_EOL; //indicando el primer parámetro
    $sum = 1;
    echo "Resultado: " . devuelve($sum, 7) . ". Suma: $sum <br>".PHP_EOL; //indicando el primer y segundo parámetro
    $sum = 1;
    //cuando se ponga el nombre del parámetro, ya se ponen a todos los que queden
    echo "Resultado: " . devuelve($sum, n3: 20) . ". Suma: $sum <br>".PHP_EOL;

    echo "<br><br>".PHP_EOL;

    echo "Ejercicio 5: <br>".PHP_EOL;

    echo ((hacerOperacion("resta", 3, 1))?hacerOperacion("resta", 3, 1):"Error")."<br>".PHP_EOL;
    echo ((hacerOperacion("suma", 3, 1))?hacerOperacion("suma", 3, 1):"Error")."<br>".PHP_EOL;
    echo ((hacerOperacion("multiplicacion", 3, 1))?hacerOperacion("multiplicacion", 3, 1):"Error")."<br>".PHP_EOL;
    echo ((hacerOperacion("nada", 3, 1))?hacerOperacion("nada", 3, 1):"Error")."<br>".PHP_EOL;

    echo "<br><br>".PHP_EOL;

    echo "Ejercicio 6: <br>".PHP_EOL;
    echo llamadaAFuncion(2, 5, fn(int $a2,int $b)=>$a2+$b)."<br>".PHP_EOL;

    echo llamadaAFuncion(2, 5, fn(int $a2,int $b)=>$a2-$b)."<br>".PHP_EOL;

    echo llamadaAFuncion(2, 5, fn(int $a2,int $b)=>$a2*$b)."<br>".PHP_EOL;

    echo llamadaAFuncion(2, 5, fn(int $a2,int $b)=>"Param1: " . $a2 . ". Param2: " . $b)."<br>".PHP_EOL;

    echo "<br><br>".PHP_EOL;

    echo "Con funciones anónimas: <br>".PHP_EOL;

    $funcSuma = function (int $a2, int $b) {
        return $a2 + $b;
    };

    $funcResta = function (int $a2, int $b) {
        return $a2 - $b;
    };

    $funcMultiplicacion = function (int $a2, int $b) {
        return $a2 * $b;
    };

    $funcMuestraParams = function (int $a2, int $b) {
        return "Param1: " . $a2 . ". Param2: " . $b;
    };

    echo llamadaAFuncion(2, 5, $funcSuma)."<br>".PHP_EOL;

    echo llamadaAFuncion(2, 5, $funcResta)."<br>".PHP_EOL;

    echo llamadaAFuncion(2, 5, $funcMultiplicacion)."<br>".PHP_EOL;

    echo llamadaAFuncion(2, 5, $funcMuestraParams)."<br>".PHP_EOL;


    echo "<br><br>".PHP_EOL;

    echo "Ejercicio 7: <br>".PHP_EOL;

    $vector = array("uno", "grande", "caminos", "a");
    ordenar($vector); //el vector debe quedar (“caminos”,”grande”,”uno”,”a”)

    foreach ($vector as $elem) {
        echo $elem . " ";
    }
}
