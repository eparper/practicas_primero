<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 4"

    ]
    
];

//-------------------------
//-------------Ejercicio 1------------------
// $ob1 = new InstrumentoBase("Instrumento piano de cuerda");
// $ob2 = new InstrumentoBase("Instrumento saxofón de viento", 20);



//-------------------------
//-------------Ejercicio 2------------------



//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 4", $barraUbicacion);
cuerpo($ob1, $ob2);  //llamo a la vista
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
function cuerpo(InstrumentoBase $ob1, InstrumentoBase $ob2)
{
?>
    <br><br>
    

<?php

    // echo $ob1->getDescripcion() . "<br>"; 
    // echo $ob2->getDescripcion() . "<br>";

    // $ob1 -> setDescripcion("Instrumento violín de cuerda");
    // echo $ob1->getDescripcion() . "<br>";

    // echo $ob1->getEdad() . "<br>";
    // echo $ob2->getEdad() . "<br>";

    // $ob1->envejecer();
    // $ob1->envejecer();
    // $ob2->envejecer();

    // echo $ob1->getEdad() . "<br>";
    // echo $ob2->getEdad() . "<br>";

    // echo $ob1 . "<br>";
    // echo $ob2 . "<br>";

    // //probando que sea sin sobrecarga
    // $ob1 -> modelo = "plateado";

    // echo $ob1 -> modelo;

    // $modelo = "";
    // if (isset($ob1->modelo))
    //     $modelo = $ob1 -> modelo;
}
