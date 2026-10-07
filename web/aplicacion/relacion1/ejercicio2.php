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
        "nombre" => "Ejercicio 2"
    ]
    
];

// contar el número de veces que aparece cada lado si se hicieran N lanzamientos
$N_LANZAMIENTOS = 1000;
$arrayDatosTiradas = [
    "contCara1" => 0,
    "contCara2" => 0,
    "contCara3" => 0,
    "contCara4" => 0,
    "contCara5" => 0,
    "contCara6" => 0
];

//array que le paso a la función cuerpo con todas las variables necesarias:
$arrayParams = [
    "N_LANZAMIENTOS" => $N_LANZAMIENTOS,
    "arrayDatosTiradas" => $arrayDatosTiradas
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
    <h1>Ejercicio 2</h1>

    <p style='text-align: justify;'>2.- Simular el lanzamiento de un dado (6 veces) (usar un bucle for, mt_rand con parametros). Además 
        contar el número de veces que aparece cada lado si se hicieran N lanzamientos al estilo (N lo 
        definiremos como constante) (usar un bucle while, mt_rand sin parametros).  
        Se deben usar arrays para almacenar los datos de las tiradas. Los arrays deben obtenerse en la 
        parte del controlador y visualizarse los resultados en la vista. Los arrays se pasarán como parámetros a la 
        vista (nunca como variables globales) 
    </p>

    <?php

        for ($cont = 1; $cont <= 6; $cont++) {
            $dado = mt_rand(1, 6);
            echo "Lanzamiento " . $cont . " del dado: " . $dado . "<br>";
        }

        $contWhile = 0;
        

        while ($contWhile != $arrayParams["N_LANZAMIENTOS"]) {

            //al hacer el resto de cualquier número que salga en mt_rand() entre el número de caras que tiene
            //un dado (6), salen números del 0 al 5, entonces por eso le sumamos 1
            switch ((mt_rand() % 6) + 1) {
                case 1: {
                    $arrayParams["arrayDatosTiradas"]["contCara1"]++;
                } break;
                case 2: {
                    $arrayParams["arrayDatosTiradas"]["contCara2"]++;
                } break;
                case 3: {
                    $arrayParams["arrayDatosTiradas"]["contCara3"]++;
                } break;
                case 4: {
                    $arrayParams["arrayDatosTiradas"]["contCara4"]++;
                } break;
                case 5: {
                    $arrayParams["arrayDatosTiradas"]["contCara5"]++;
                } break;
                case 6: {
                    $arrayParams["arrayDatosTiradas"]["contCara6"]++;
                } break;
            }

            $contWhile++;
        }

        echo "<br>Lanzado el dado " . $arrayParams["N_LANZAMIENTOS"] . " veces<br>";
        echo "El 1 ha salido " . $arrayParams["arrayDatosTiradas"]["contCara1"] . " con un porcentaje de " . 
            (($arrayParams["arrayDatosTiradas"]["contCara1"] / 1000) * 100) . "%<br>";
        
        echo "El 2 ha salido " . $arrayParams["arrayDatosTiradas"]["contCara2"] . " con un porcentaje de " . 
            (($arrayParams["arrayDatosTiradas"]["contCara2"] / 1000) * 100) . "%<br>";

        echo "El 3 ha salido " . $arrayParams["arrayDatosTiradas"]["contCara3"] . " con un porcentaje de " . 
            (($arrayParams["arrayDatosTiradas"]["contCara3"] / 1000) * 100) . "%<br>";

        echo "El 4 ha salido " . $arrayParams["arrayDatosTiradas"]["contCara4"] . " con un porcentaje de " . 
            (($arrayParams["arrayDatosTiradas"]["contCara4"] / 1000) * 100) . "%<br>";

        echo "El 5 ha salido " . $arrayParams["arrayDatosTiradas"]["contCara5"] . " con un porcentaje de " . 
            (($arrayParams["arrayDatosTiradas"]["contCara5"] / 1000) * 100) . "%<br>";
            
        echo "El 6 ha salido " . $arrayParams["arrayDatosTiradas"]["contCara6"] . " con un porcentaje de " . 
        (($arrayParams["arrayDatosTiradas"]["contCara6"] / 1000) * 100) . "%<br>";
    ?>
<?php
}
