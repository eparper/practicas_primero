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

    "coordX" => "",
    "coordY" => "",
    "colores" => "",
    "grosores" => []
    
];



//comprobar si se ha dado a insertar 
if (isset($_POST["guardar"])) {

    if (isset($_POST["coordX"])) {
        $coordX = $_POST["coordX"];

        // if ($coordX == "") {
        //     $errores["coordX"][] = "Debe indicarse una coordenada X";
        // }
        
        $expReg = "/^[0-9]+$/";

        if (!validaExpresion($coordX, $expReg, "")) { //si el string no es un número:
            $errores["coordX"][] = "Debe indicarse un número";
        }
        else { //si el string es un número lo pasamos a int
            $coordX = intval($coordX);

            if (!validaEntero($coordX, 0, 500, 20)) {
                $errores["coordX"][] = "La coordenada X debe estar entre 0 y 500";
            }
        }

        

        $datos["coordX"] = $coordX;

    }

    if (isset($_POST["coordY"])) {
        $coordY = $_POST["coordY"];

        // if ($coordY == "") {
        //     $errores["coordY"][] = "Debe indicarse una coordenada Y";
        // }

        $expReg = "/^[0-9]+$/";

        if (!validaExpresion($coordY, $expReg, "")) { //si el string no es un número:
            $errores["coordY"][] = "Debe indicarse un número";
        }
        else { //si el string es un número lo pasamos a int
            $coordY = intval($coordY);

            if (!validaEntero($coordY, 0, 500, 20)) {
                $errores["coordY"][] = "La coordenada Y debe estar entre 0 y 500";
            }
        }

        $datos["coordY"] = $coordY;

    }

    if (isset($_POST["colores"])) {
        $colorSeleccionado = mb_trim($_POST["colores"]);

        // if ($colorSeleccionado == "") {
        //     $errores["colores"][] = "Debe indicarse un color";
        // }

        if (!validaRango($colorSeleccionado, Punto::COLORES, 2)) {
            $errores["colores"][] = "El color no existe";
        }

        //color en inglés
        $datos["colores"] = $colorSeleccionado;

    }

    //CHECKBOX
    if (isset($_POST["arrayCheck"])) { //si hay seleccionados:
        $arrayCheck = $_POST["arrayCheck"];        


        $datos["grosores"] = $arrayCheck; // este array guarda de forma (0 = "2") o sea, tiene índice
                                            // y el valor es el índice de Punto::GROSORES

    }
    else {
        $errores["grosores"][] = "No has seleccionado una opción de Grosor";
    }



  

    if (!$errores)  //no hay errores hago la insercion 
    {
        $x = $datos["coordX"];
        $y = $datos["coordY"];
        $color = $datos["colores"]; //color en inglés
        $grosor = $datos["grosores"]; //índice

        $obPunto = new Punto($x, $y, $color, $grosor);

        $puntos[] = $obPunto;
    }
}



//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barraUbicacion);
cuerpo($datos, $errores, $puntos);  //llamo a la vista
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
function cuerpo(array $datos, array $errores, array $puntos)
{
?>
    <br><br>
    

<?php


    
    formulario($datos, $errores);
    
    ?>

    <br>
    

    <textarea name="cajaTexto" cols="65" rows="10"><?php foreach ($puntos as $punto) {

            echo "Coordenada x: ". $punto->getX() . ". Coordenada Y: " .
                    $punto->getY() . ". Color: " . $punto->getColor() . 
                    ". Grosor: " . $punto->getGrosor() . ".\n";
        }

        ?>
    </textarea>

    <br>
    <a href="./pruebasPuntos.php">Pruebas Puntos</a>
    <?php
    

}

/**
 * Función que muestra el formulario
 *
 * @param array $datos Array donde se le pasan todos los datos con posiciones asociativas
 * @param array $errores Matriz donde se le pasan los errores
 * @return void
 */
function formulario(array $datos, array $errores) {

    
    ?>

    <form action="" method="post"> 
        <label for="coordX">Coordenada X: </label>
        <input type="text" name="coordX" value="<?= $datos["coordX"] ?>">
        <?php muestraErrores($errores, "coordX") ?><br>

        <label for="coordY">Coordenada Y: </label>
        <input type="text" name="coordY" value="<?= $datos["coordY"] ?>">
        <?php muestraErrores($errores, "coordY") ?><br><br>

        <label for="colores">Colores: </label>
        <select name="colores">
            <option value="">Sin color</option>
        <?php
            
            foreach (Punto::COLORES as $indiceIngles => $color) {
                ?>
                    <option value="<?= $indiceIngles ?>" <?= ($datos["colores"] == $indiceIngles? "selected": "") ?>><?= $color["nombre"] ?></option>
                <?php
            }
        ?>
        </select>
        <?php muestraErrores($errores, "colores") ?>

        <br>

        <br>
        <label for="grosor">Grosores:</label><?php muestraErrores($errores, "grosores") ?>
        <br>

        <?php
        

        foreach (Punto::GROSORES as $indice => $valor) {
            
            // El array $datos["grosores"] guarda de forma (0 = "2") o sea, tiene índice
            // y el valor es el índice de Punto::GROSORES
            ?>
            <input type="checkbox" name="arrayCheck[]" value="<?= $indice ?>" <?= (validaRango($indice, $datos["grosores"], 1)?"checked":"") ?>>
            <label for="<?= $indice ?>"><?= $valor ?></label> <br>
            <?php

        }

        ?> <br>
        
        
        
        <br>

        <input type="submit" class="boton" value="Guardar" name="guardar">
    </form>

    

    <?php
}

function muestraErrores (array $errores, string $nombreCampo):void {
    if ($errores) {   //mostrar los errores 
        
        
        foreach ($errores as $clave => $valor) {
            if ($clave == $nombreCampo) {
                echo "<span class='error'>";
                foreach ($valor as $error)
                    echo "$clave => $error<br>" . PHP_EOL;
                echo "</span>";
            }
            

            
        }
        
    }
}