<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 1",
        "url" => "/aplicacion/relacion1/index.php"
    ],
    [
        "nombre" => "Ejercicio 3"
    ]
    
];

//***********PRIMERA FORMA: creando y rellenando el array usando varias sentencias*********** */

// Crear una variable de tipo array. 
$array = [];

// Rellenar las posiciones 1, 16, 54 con valores cualquiera.
$array[1] = 344;
$array[16] = 546;
$array[54] = 78;

//Añadir el valor 34 al final 
array_push($array, 34);

// Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres” 
$array["uno"] = "cadena";
$array["dos"] = true;
$array["tres"] = 1.345;

// Rellenar la posición “ultima” con el array (1,34,”nueva”);
$array["ultima"] = array(1,34,"nueva");


//***********SEGUNDA FORMA: usando una sola sentencia con array*********** */
$arraySolaSentencia = array(
    1 => 34,
    16 => 546,
    54 => 78,
    34,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => array(1,34,"nueva")
);


//**************TERCERA FORMA: usando una sola sentencia con [] *************** */
$arraySolaSentenciaCor = [
    1 => 34,
    16 => 546,
    54 => 78,
    34,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => [1,34,"nueva"]
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3", $barraUbicacion);
cuerpo($array, $arraySolaSentencia, $arraySolaSentenciaCor);  //llamo a la vista
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
function cuerpo($array, $arraySolaSentencia, $arraySolaSentenciaCor)
{
?>
    <br><br>
    <h1>Ejercicio 3</h1>

    <p style='text-align: justify;'>
        3.- Se quiere: 
        a) Crear una variable de tipo array. 
        b) Rellenar las posiciones 1, 16, 54 con valores cualquiera. 
        c) Añadir el valor 34 al final 
        d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres” 
        e) Rellenar la posición “ultima” con el array (1,34,”nueva”); 
        - Hacer lo anterior creando y rellenando el array usando varias sentencias.  - Hacer lo anterior usando una sola sentencia con array; - Hacer lo anterior usando una sola sentencia con [] - Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados 
        
        Los arrays se definirán en el controlador y se visualizarán en la vista.
    </p>
    
<?php

    //******************PRIMERA FORMA********************** */

    echo "<br>- Primera forma: <br><br>".PHP_EOL;

    foreach($array as $clave => $valor) {

        if (gettype($valor) == "array") {

            echo "array[" . $clave . "] = array(";

            foreach($valor as $key => $value) {
                echo "<br>$key => " . $value;
            }

            echo ");";
        }
        else {
            echo "array[" . $clave . "] = " . $valor . "<br>";
        }
        
    }

    //***************SEGUNDA FORMA****************** */

    echo "<br><br>- Segunda forma: <br><br>".PHP_EOL;

    foreach($arraySolaSentencia as $clave => $valor) {

        if (gettype($valor) == "array") {

            echo "array[" . $clave . "] = array(";

            foreach($valor as $key => $value) {
                echo "<br>$key => " . $value;
            }

            echo ");";
        }
        else {
            echo "array[" . $clave . "] = " . $valor . "<br>";
        }
        
    }

    //***************TERCERA FORMA****************** */
    
    echo "<br><br>- Tercera forma: <br><br>".PHP_EOL;

    foreach($arraySolaSentenciaCor as $clave => $valor) {

        if (gettype($valor) == "array") {

            echo "array[" . $clave . "] = array(";

            foreach($valor as $key => $value) {
                echo "<br>$key => " . $value;
            }

            echo ");";
        }
        else {
            echo "array[" . $clave . "] = " . $valor . "<br>";
        }
        
    }

}
