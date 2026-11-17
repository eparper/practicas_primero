<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once RUTABASE . "/scripts/librerias/validacion.php";
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 7"

    ]
    
];

//-------------------------
$errores = [];
$datos = [

    "coordX" => 0,
    "coordY" => 0,
    "colores" => "",
    "grosores" => []
    
];



//comprobar si se ha dado a insertar 
if (isset($_POST["guardar"])) {

    if (isset($_POST["coordX"])) {
        $coordX = intval($_POST["coordX"]);

        if ($coordX == "") {
            $errores["coordX"][] = "Debe indicarse una coordenada X";
        }

        if (!validaEntero($coordX, 0, 500, 20)) {
            $errores["coordX"][] = "La coordenada X debe estar entre 0 y 500";
        }

        $datos["coordX"] = $coordX;

    }

    if (isset($_POST["coordY"])) {
        $coordY = intval($_POST["coordY"]);

        if ($coordY == "") {
            $errores["coordY"][] = "Debe indicarse una coordenada Y";
        }

        if (!validaEntero($coordY, 0, 500, 20)) {
            $errores["coordY"][] = "La coordenada Y debe estar entre 0 y 500";
        }

        $datos["coordY"] = $coordY;

    }

    if (isset($_POST["colores"])) {
        $colorSeleccionado = mb_trim($_POST["colores"]);

        if ($colorSeleccionado == "") {
            $errores["colores"][] = "Debe indicarse un color";
        }

        if (!validaRango($colorSeleccionado, Punto::COLORES, 2)) {
            $errores["colores"][] = "El color no existe";
        }

        $datos["colores"] = $colorSeleccionado;

    }

    //CHECKBOX
    if (isset($_POST["arrayCheck"])) {
        $arrayCheck = $_POST["arrayCheck"];        

        //si no hay nada seleccionado:
        if (count($arrayCheck) < 1) {
            $errores["grosores"][] = "Tienes que seleccionar al menos un grosor";
        }

        //validamos que tiene marcado opciones correctas
        // foreach ($arrayCheck as $seleccionado) {
        //     if (!validaRango($seleccionado, $arrayPosibles, 2)) {
        //         $errores["estudios"][] = "Tienes que seleccionar una opción de estudios correcta";
        //     }
        //     else {
        //         array_push($datos["estudiosTexto"], $arrayPosibles[$seleccionado]);
        //     }
        // }


        $datos["grosores"] = $arrayCheck;
        


    }
    // else {
    //     $errores["grosores"][] = "No has seleccionado una opción de Grosor";
    // }



  

    if (!$errores)  //no hay errores hago la insercion 
    {
        echo "bien";
    }
}



//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barraUbicacion);
cuerpo($datos, $errores);  //llamo a la vista
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
function cuerpo(array $datos, array $errores)
{
?>
    <br><br>
    

<?php


    if (!$errores && isset($_POST["enviar"])) {
        muestraResumen($datos);
    }
    else {
        formulario($datos, $errores);
    }
    

}

/**
 * Función que muestra el formulario
 *
 * @param array $datos Array donde se le pasan todos los datos con posiciones asociativas
 * @param array $errores Matriz donde se le pasan los errores
 * @return void
 */
function formulario(array $datos, array $errores) {

    if ($errores) {   //mostrar los errores 
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }
    ?>

    <form action="" method="post">
        <label for="coordX">Coordenada X: </label>
        <input type="text" name="coordX" value="<?= $datos["coordX"] ?>"><br>

        <label for="coordY">Coordenada Y: </label>
        <input type="text" name="coordY" value="<?= $datos["coordY"] ?>"><br>

        <label for="colores">Colores: </label>
        <select name="colores" value="<?= $datos["colores"] ?>">
            <?php
            foreach (Punto::COLORES as $indice => $valor) {
                //el $indice es el color en inglés
                ?>
                <option value="<?= $datos["colores"] ?>" ><?= $valor["nombre"] ?></option>
                <?php

            }


            ?>
        </select>

        <br>
        <label for="grosor">Grosores:</label><br>
        <?php
        $valoresCheckeados = $datos["grosores"];

        foreach (Punto::GROSORES as $indice => $valor) {
            //ponemos los tipos de grosores en el array
            
            ?>
            <input type="checkbox" name="arrayCheck[]" value="<?= $indice ?>" <?= ($valor == $datos["grosores"]?"checked":"") ?>>
            <label for="<?= $indice ?>"><?= $valor ?></label> <br>
            <?php

        }


        ?>
        

        <input type="submit" class="boton" value="Guardar" name="guardar">
    </form>

    <?php
}

