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
        "nombre" => "Ejercicio 3",
        
    ]
    
];

//*************************EJERCICIO 3****************************
$arrayLetrasNums = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", 
                            "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", 
                            "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", 
                            "J", "K", "L", 
                        "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", 
                        "X", "Y", "Z", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

//echo count($arrayLetrasNums);

$arrayASCII = [];

//array que le paso a la función cuerpo con todas las variables necesarias:
$arrayParams = [
    "arrayLetrasNums" => $arrayLetrasNums,
    "arrayASCII" => $arrayASCII
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3", $barraUbicacion);
cuerpo($arrayParams);  //llamo a la vista
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
function cuerpo($arrayParams)
{
?>
    <br><br>
    <h1>Ejercicio 3</h1>
    <p style="text-align: justify;">
        3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras 
        minúsculas, letras mayúsculas y números) 
        a) A partir de un array en el que están todos los caracteres posibles que cumplen la 
        condición. (tienes que rellenar el array con todos los caracteres validos) 
        b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos 
        caracteres que no lo cumplan). 
    </p><br><br>


    
<?php
    
    for ($cont = 0; $cont < 20; $cont++) {

        //le restamos 1 porque intenta acceder a la posición 64 y solo hay del 0 al 63
        $numRandom = mt_rand(0, count($arrayParams["arrayLetrasNums"]) - 1);

        echo $arrayParams["arrayLetrasNums"][$numRandom];
    }

    //con código ascii
    //convertimos el array en código hex



    for ($cont = 0; $cont < count($arrayParams["arrayLetrasNums"]); $cont++) {

        $caracter = $arrayParams["arrayLetrasNums"][$cont];

        //usamos ord para pasar el caracter a decimal
        $caracterDec = ord($caracter);

        $caracterHex = dechex($caracterDec);

        //ya tenemos el arrayASCII con los valores ascii en hexadecimal
        $arrayParams["arrayASCII"][$cont] = "0x00" . $caracterHex;



    }

    echo "<br><br>".PHP_EOL;

    for ($cont = 0; $cont < 20; $cont++) {
        //le restamos 1 porque intenta acceder a la posición 64 y solo hay del 0 al 63
        $numRandom = mt_rand(0, count($arrayParams["arrayASCII"]) - 1);

        $caracterHex = $arrayParams["arrayASCII"][$numRandom];

        $caracterDec = hexdec($caracterHex);

        $caracterLetra = mb_chr($caracterDec);

        echo $caracterLetra;
    }
    

    //echo mb_chr(0x005a);
    
}
