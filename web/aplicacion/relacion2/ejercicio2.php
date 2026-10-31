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
        "nombre" => "Ejercicio 2",
        
    ]
    
];

//*************************EJERCICIO 2****************************
$cadenaEntera = "Está la niña en casa";

//Localiza en la cadena la palabra niña y cambia el siguiente 
    //carácter a niña (el espacio en blanco) por "/mujer " 

$cadena = "niña";
$cadenaSus = "/mujer ";

$posStart = mb_strpos($cadenaEntera, $cadena);


$tamanioCadena = mb_strlen($cadena);

$posEspacio = $posStart + $tamanioCadena;

$nuevaCadena = mb_substr($cadenaEntera, 0, $posEspacio)
                . $cadenaSus .
                mb_substr($cadenaEntera, $posEspacio + 1, mb_strlen($cadenaEntera));


//array que le paso a la función cuerpo con todas las variables necesarias:
$arrayParams = [
    "cadena" => $cadenaEntera,
    "nuevaCadena" => $nuevaCadena
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2", $barraUbicacion);
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
    <h1>Ejercicio 1</h1>
    <p style="text-align: justify;">
        2.- Dada la cadena "Está la niña en casa" se pide: - Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me 
        indica la posición del carácter mostrado.  (quedaría algo así) 
        NOTA: prueba si puedes hacerlo con [] para obtener los caracteres correctos. Prueba si 
        puedes hacerlo con substr para obtener los caracteres correctos. Prueba si puedes 
        hacerlo con mb_substr para obtener los caracteres correctos. Comenta las formas no 
        válidas para que pueda comprobar que lo has hecho. 
        
        E 
        s 
        t 
        á 
            
            l 
            a 
                
                n 
                i 
                ñ 
                a 
                    
                    e 
                    n 
                        
                        c 
                        a 
        - 
        s 
        a 
        Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena) 
        con cada carácter en una línea distinta y con los espacios en blanco 
        correspondientes (desde 0 hasta n espacios en blanco), los caracteres pares en 
        mayúscula (0, 2, …) y los impares en minúscula (1, 3, 5, …), y extrayendo los - - 
        caracteres con mb_substr. 
        Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea 
        distinta 
        Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el 
        espacio en blanco) por "/mujer "
    </p><br><br>


<?php
        
    $cadenaEspacios = "";


    //con mb_substr
    for ($cont = 0; $cont < mb_strlen($arrayParams["cadena"]); $cont++) {

        

        $caracter = mb_substr($arrayParams["cadena"], $cont, 1);

        if ($cont !== 0)
            $cadenaEspacios .= "&nbsp;";

        echo $cadenaEspacios . $caracter . "<br>";
        
    }

    //con substr NO VÁLIDA

    // $cadenaEspacios = "";

    // for ($cont = 0; $cont < mb_strlen($arrayParams["cadena"]); $cont++) {

        

    //     $caracter = substr($arrayParams["cadena"], $cont, 1);

    //     if ($cont !== 0)
    //         $cadenaEspacios .= "&nbsp;";

    //     echo $cadenaEspacios . $caracter . "<br>";
        
    // }


    //con [] NO VÁLIDO
    // $cadenaEspacios = "";

    // for ($cont = 0; $cont < strlen($arrayParams["cadena"]); $cont++) {

        

    //     $caracter = $arrayParams["cadena"][$cont];

    //     if ($cont !== 0)
    //         $cadenaEspacios .= "&nbsp;";

    //     echo $cadenaEspacios . $caracter . "<br>";
        
    // }

    //mostrar cadena en orden inverso

    $cadenaEspacios = "";
    $caracter = "";

    //MIRAR CORRECCIÓN DE VICENTE

    for ($cont = 1; $cont <= mb_strlen($arrayParams["cadena"]); $cont++) {

        $caracterParParaUsuario = mb_substr($arrayParams["cadena"], -$cont, 1);

        if ($cont !== 0)
            $cadenaEspacios .= "&nbsp;";

        //caracteres pares en mayúsculas:
        if ($cont % 2 == 0)
            $caracterFinal = mb_strtoupper($caracterParParaUsuario);
        else 
            $caracterFinal = mb_substr($arrayParams["cadena"], -$cont, 1); //el mb_substr trabaja con orden inverso con números negativos

        echo $cadenaEspacios . $caracterFinal . "<br>";
        
    }


    //separar la cadena por el caracter a:
    $cadenaEspacios = "";

    
    $partesPorA = mb_split("a", $arrayParams["cadena"]);

    for ($cont = 0; $cont < count($partesPorA); $cont++) {
        echo $partesPorA[$cont] . " <br>";
    }

    


    echo $arrayParams["nuevaCadena"];

}
