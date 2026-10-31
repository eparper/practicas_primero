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
//$ob1 = new InstrumentoBase("Instrumento piano de cuerda");
//$ob2 = new InstrumentoBase("Instrumento saxofón de viento", 20);



// $ob3 = new InstrumentoViento("metal"); //edad 15
// $ob4 = new InstrumentoViento("plástico", 23); //edad 15

$arrayInfo2 = [
    "material" => "plástico",
    "edad" => 5
];

$ob5 = Flauta::CrearDesdeArray(Flauta::$arrayInfo);
$ob6 = Flauta::CrearDesdeArray($arrayInfo2);

$arrayEstados = EstadoCivil::casos();

$random = mt_rand(1, 4) * 10; //para que coja entre 0 y 3 

foreach ($arrayEstados as $estado) { //aquí $estadoCivil es el "objeto" de la enumeración EstadoCivil

    if ($random == $estado->valor()) {
        $estadoCivil = $estado;
    }
}


//Persona
$persona1 = Persona::registrarPersona("Noe", "12/02/2003",
                                        "casitas 3", "Mollina",
                                        $estadoCivil);


//ClaseMisPropiedades
$Objeto = new ClaseMisPropiedades(); 


//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 4", $barraUbicacion);
cuerpo($ob5, $ob6, $persona1, $Objeto);  //llamo a la vista
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
function cuerpo(Flauta $ob5, Flauta $ob6, Persona $persona1, $Objeto)
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

    //----------

    // echo $ob3 -> sonido() . "<br>".PHP_EOL;
    // echo $ob4 -> sonido() . "<br>".PHP_EOL;

    // echo $ob3 -> afinar() . "<br>".PHP_EOL;
    // echo $ob4 -> afinar() . "<br>".PHP_EOL;

    // echo $ob3 . "<br>".PHP_EOL;
    // echo $ob4 . "<br>".PHP_EOL;


    //--------------
    echo $ob5->metodoFabricacion()."<br>";
    echo $ob6->metodoReciclado();

    $miObjetoClonado = clone $ob5;
    echo $ob5."<br>";
    echo $ob6."<br>";
    echo $miObjetoClonado."<br>";

    echo $persona1."<br>";

    //fibonacci
    foreach(new SerieFibonacci(10) as $valor) 
    { 
        echo "$valor &nbsp;"; 
    } 

    /* Generaria 10 valores 
    0 1 1 2 3 5 8 13 21 34 55 
    */ 

    echo "<br>".PHP_EOL;

    //fibonacci con generador
    foreach (SerieFibonacci::fFibonacci(10) as $valor) {
        echo $valor . " ";
    }

    echo "<br>".PHP_EOL;

    
    $Objeto->propPublica="publica"; 
    //$Objeto->_propPrivada="privada"; //no es valida al ser privada 
    $Objeto->propiedad1=25; 
    $Objeto->propiedad2="cadena de texto"; 
    echo "la propiedad 1 vale ".$Objeto->propiedad1."<br>"; 
    //echo $Objeto->propiedad3; // esto debería dar un error al no haber asignado previamente la propiedad 

    foreach ($Objeto as $key => $value) {
        echo "la clave es " . $key . "<br>"; 
    } 
}
