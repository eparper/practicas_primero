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
        "nombre" => "Ejercicio 5"
    ]
    
];

//rellenamos el array
$vector = array();
$vector[1] = "esto es una cadena"; 
$vector["posi1"] = 25.67;  
$vector[] = false; 
$vector["ultima"] = array(2, 5, 96); 
$vector[56] = 23;

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5", $barraUbicacion);
cuerpo($vector);  //llamo a la vista
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
function cuerpo($vector)
{
?>
    <br><br>
    <h1>Ejercicio 5</h1>
    <p style='text-align: justify;'>5.- Rellenar un array con el siguiente contenido.  
        $vector=array(); 
        $vector[1]="esto es una cadena"; 
        $vector["posi1"]=25.67; 
        $vector[]=false; 
        $vector["ultima"]=array(2,5,96); 
        $vector[56]=23; 
        
        Mostrar mediante bucles foreach el contenido del array con la siguiente salida: - posicion XXX  contenido (tipo) YYYYY  - Según el tipo del contenido  
        o Si es un array mostrarlo mediante un foreach. 
        o Si es un entero poner Entero con valor DDD, en binario  BBB 
        o Si es un real DDD que al cuadrado es  DDD 
        o Si es una cadena -CCCC- 
        o Si es un booleano BBB y su opuesto XXX 
        Las palabras en mayúscula representan un valor concreto de lo pedido 
        
        El array se definirá en el controlador y se visualizará en la vista. 
    </p>
    


<?php

    foreach ($vector as $posicion => $valor) {

        //SI ES UN ARRAY
        if (gettype($valor) == "array") {

            echo "Posición " . $posicion . " contenido (" . gettype($valor) . ") <br>";

            foreach ($valor as $posDentroDeArray => $valorDentroDeArray) {
                echo "&nbsp; Posición " . $posDentroDeArray . " contenido (" . gettype($valorDentroDeArray) . ") " . $valorDentroDeArray . "<br>";
            
                if (gettype($valor) == "integer")
                    echo "&nbsp; Posición " . $posDentroDeArray . " contenido (" . gettype($valorDentroDeArray) . ") " . $valorDentroDeArray . "<br>";
            }
        }
        //SI ES UN ENTERO
        else if (gettype($valor) == "integer")
            echo "Posición " . $posicion . " contenido (" . gettype($valor) . ") Entero con valor " . $valor . ", en binario ". decbin($valor) . "<br>";
        //SI ES UN REAL
        else if (gettype($valor) == "double")
            echo "Posición " . $posicion . " contenido (" . gettype($valor) . ") " . $valor . " que al cuadrado es ". pow($valor, 2) . "<br>";
        //SI ES UNA CADENA
        else if (gettype($valor) == "string")
            echo "Posición " . $posicion . " contenido (" . gettype($valor) . ") -" . $valor . "-<br>";
        //SI ES UN BOOLEAN
        else if (gettype($valor) == "boolean") {
            echo "Posición " . $posicion . " contenido (" . gettype($valor) . ") " . (($valor)?"true":"false") . " y su opuesto ". (($valor)?"false":"true") . "<br>";
            
        }
        else
            echo "Posición " . $posicion . " contenido (" . gettype($valor) . ") " . $valor . "<br>";
    }

}
