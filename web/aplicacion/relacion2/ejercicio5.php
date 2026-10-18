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
        "nombre" => "Ejercicio 5",
        
    ]
    
];

//*************************EJERCICIO 5****************************
//usando HEREDOC
$nombre = "Noemí"; 
$cadena = <<<fin
Mi 754 querida <hr>amiga á, é, ñ <br> 
escribo encarni@gmail.com estas 1.12 líneas <h1>esperando</h1> que 1 me leas. <br/> 
Firmado: $nombre noemi@gmail.com <br/> 
fin;

$resultado = [];
$resultado2 = [];
$resultado3 = [];

//expresiones regulares
$expEtiqueta = "/<\/?[a-z0-9]+\/?>/";

preg_match_all($expEtiqueta, $cadena, $resultado, PREG_OFFSET_CAPTURE); 


$expNumero = "/\d+\.\d+|\d+/";

preg_match_all($expNumero, $cadena, $resultado2, PREG_OFFSET_CAPTURE); 

$expEmail = "/[a-z0-9]+@[a-z0-9]+\.[a-z0-9]+/";

preg_match_all($expEmail, $cadena, $resultado3, PREG_OFFSET_CAPTURE); 

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3", $barraUbicacion);
cuerpo($cadena, $resultado, $resultado2, $resultado3);  //llamo a la vista
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
function cuerpo($cadena, $resultado, $resultado2, $resultado3)
{
?>
    <br><br>
    <h1>Ejercicio 4</h1>
    <p style="text-align: justify;">
        5.- Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe 
        aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias  direcciones 
        de correo electrónico (formato aaaa@aaaa.aa).  
        Define expresiones regulares apropiadas para localizar los distintos elementos creados 
        (etiqueta, numero y dirección de email) en la cadena.  
        Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la 
        función preg_match. 
    </p><br><br>


    
<?php
    
    echo $cadena;

    for ($cont = 0; $cont < count($resultado); $cont++) {

        for ($cont2 = 0; $cont2 < count($resultado[$cont]); $cont2++) {

            for ($cont3 = 0; $cont3 < count($resultado[$cont][$cont2]); $cont3++) {
                echo "Elemento: " . htmlspecialchars($resultado[$cont][$cont2][0]) . ". Posición: " . $resultado[$cont][$cont2][1] . "<br>";
            }
        }
    }

    //numeros
    echo "<br>".PHP_EOL;

    for ($cont = 0; $cont < count($resultado2); $cont++) {

        for ($cont2 = 0; $cont2 < count($resultado2[$cont]); $cont2++) {

            
            echo "Elemento: " . $resultado2[$cont][$cont2][0] . ". Posición: " . $resultado2[$cont][$cont2][1] . "<br>";
            
        }
    }


    //emails
    echo "<br>".PHP_EOL;

    for ($cont = 0; $cont < count($resultado3); $cont++) {

        for ($cont2 = 0; $cont2 < count($resultado3[$cont]); $cont2++) {

            
            echo "Elemento: " . $resultado3[$cont][$cont2][0] . ". Posición: " . $resultado3[$cont][$cont2][1] . "<br>";
            
        }
    }


    
    
}
