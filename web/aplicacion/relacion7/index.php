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
    "nombre" => "",
    "contrasenia" => "",
    "contrasenia2" => "",
    "fechaNacimiento" => "",
    "fechaCarnetDia" => "",
    "fechaCarnetMes" => "",
    "fechaCarnetAnio" => "",
    "fechaCarnet" => "",
    "horaLevantarse" => "",
    "estado" => "",
    "estudios" => [],
    "estudiosTexto" => [],
    "hermanos" => 0,
    "sueldo" => 1100
];

//comprobar si se ha dado a insertar 
if (isset($_POST["enviar"])) {

    if (isset($_POST["nombre"])) {
        $nombre = mb_strtoupper(mb_trim($_POST["nombre"]));

        // if ($nombre == "") {
        //     $errores["nombre"][] = "Debe indicarse un nombre";
        // }

        $primeraLetra = mb_substr($nombre, 0, 1);

        if ($primeraLetra == "H") {
            $errores["nombre"][] = "El nombre no puede empezar por H";
        }

        if (!validaCadena($nombre, 25, "Nombre")) {
            $errores["nombre"][] = "El nombre no puede tener una longitud mayor de 25";
        }

        $datos["nombre"] = $nombre;

    }

    if (isset($_POST["contrasenia"])) {
        $contrasenia = $_POST["contrasenia"];

        if ($contrasenia !== "") {
            if (!validaCadena($contrasenia, 15, "contrasenia")) {
                $errores["contrasenia"][] = "La contraseña no puede tener una longitud mayor de 15";
            }

            $longitudContra = mb_strlen($contrasenia);

            if ($longitudContra < 8) {
                $errores["contrasenia"][] = "La contraseña no puede tener una longitud menor de 8";
            }

            $regExpContra = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&\-_+])[A-Za-z\d$@!%*?&\-_+]{8,15}$/";

            if (!validaExpresion($contrasenia, $regExpContra, "12345678&aB")) {
                $errores["contrasenia"][] = "La contraseña debe tener una mayúscula, una minúscula, un número y un caracter especial";
            }

            $datos["contrasenia"] = $contrasenia;
        }
        

        //repetir contraseña
        if (isset($_POST["contrasenia2"])) {

            $contrasenia2 = $_POST["contrasenia2"];

            if ($contrasenia !== "") {

                if (!validaCadena($contrasenia2, 15, "contrasenia")) {
                    $errores["contrasenia2"][] = "La contraseña no puede tener una longitud mayor de 15";
                }

                if ($contrasenia2 !== $contrasenia) {
                    $errores["contrasenia2"][] = "Las contraseñas deben coincidir";
                }

                $datos["contrasenia2"] = $contrasenia2;
            }
        }

    }

    if (isset($_POST["fechaNacimiento"])) {
        $fechaNac = $_POST["fechaNacimiento"];


        if ($fechaNac !== "") {
            if (!validaFecha($fechaNac, "01/01/2000")) {
                $errores["fechaNacimiento"][] = "La fecha de nacimiento es incorrecta";
            }

            //controlamos que la fecha sea menor que la actual
            $date = new DateTime();
            $fechaNacimiento = DateTime::createFromFormat("d/m/Y", $fechaNac);

            if ($fechaNacimiento > $date) {
                $errores["fechaNacimiento"][] = "La fecha de nacimiento no puede ser posterior a hoy";
            }

            $datos["fechaNacimiento"] = $fechaNac;
        }
            
        

    }

    if (isset($_POST["fechaCarnetDia"]) && isset($_POST["fechaCarnetMes"]) && isset($_POST["fechaCarnetAnio"])) {
        $fechaCarnetDia = $_POST["fechaCarnetDia"];
        $fechaCarnetMes = $_POST["fechaCarnetMes"];
        $fechaCarnetAnio = $_POST["fechaCarnetAnio"];
        $fechaCompleta = "";

        if ($fechaCarnetDia !== "" && $fechaCarnetMes !== "" && $fechaCarnetAnio !== "") {
            $fechaCompleta = $fechaCarnetDia . "/" . $fechaCarnetMes . "/" . $fechaCarnetAnio;
            
        }
        
          
        if ($fechaCompleta !== "") {
            if (!validaFecha($fechaCompleta, "12/02/2026")) {
                $errores["fechaCarnet"][] = "La fecha de carnet es incorrecta";
            }
        }

        

        $datos["fechaCarnetDia"] = $fechaCarnetDia;
        $datos["fechaCarnetMes"] = $fechaCarnetMes;
        $datos["fechaCarnetAnio"] = $fechaCarnetAnio;

        if (isset($_POST["fechaNacimiento"]) && $fechaCompleta !== "") {
            //controlamos que la fecha sea menor que la fecha de nacimiento más 18 años
            $fechaNacimiento = DateTime::createFromFormat("d/m/Y", $datos["fechaNacimiento"]);
            $fechaCarnet = DateTime::createFromFormat("d/m/Y", $fechaCompleta);

            $anios18 = new DateInterval('P18Y');

            $fechaCarnetMenos18 = $fechaCarnet->sub($anios18);

            if ($fechaNacimiento > $fechaCarnet) {
                $errores["fechaCarnet"][] = "La fecha del carnet debe ser posterior a la de nacimiento";
            }

            if ($fechaNacimiento >= $fechaCarnetMenos18) {
                $errores["fechaCarnet"][] = "Debes ser mayor de edad";
            }

            
        }

        $datos["fechaCarnet"] = $fechaCompleta;        

    }

    if (isset($_POST["horaLevantarse"])) {
        $horaLevantarse = $_POST["horaLevantarse"];

        if ($horaLevantarse !== "") {
            if (!validaHora($horaLevantarse, "08:00:00")) {
                $errores["horaLevantarse"][] = "La hora de levantarse es incorrecta";
            }
        }
        else 
            $errores["horaLevantarse"][] = "Debes indicar una hora de levantarse";
        

        $datos["horaLevantarse"] = $horaLevantarse;

        

    }

    if (isset($_POST["estado"])) {
        $estado = $_POST["estado"];

        if (!validaEntero($estado, 1, 4, 1)) { //por defecto es estudiante
            $errores["estado"][] = "Has seleccionado una opción no válida";
        }

        switch ($estado) {
            case 1: $datos["estado"] = "Estudiante"; break;
            case 2: $datos["estado"] = "En paro"; break;
            case 3: $datos["estado"] = "Trabajando"; break;
            case 4: $datos["estado"] = "Jubilado"; break;
            default: $datos["estado"] = "";
        }

    }
    else {
        $errores["estado"][] = "No has seleccionado una opción de Estado";
    }

    if (isset($_POST["arrayCheck"])) {
        $arrayCheck = $_POST["arrayCheck"];

        $arrayPosibles = [
            0 => "Sin estudios",
            1 => "Primaria",
            2 => "Secundaria",
            3 => "Bachillerato",
            4 => "Ciclo Formativo",
            5 => "Universitarios"];

        

        //si no hay nada seleccionado:
        if (count($arrayCheck) < 1) {
            $errores["estudios"][] = "Tienes que seleccionar al menos unos estudios";
        }

        //validamos que tiene marcado opciones correctas
        foreach ($arrayCheck as $seleccionado) {
            if (!validaRango($seleccionado, $arrayPosibles, 2)) {
                $errores["estudios"][] = "Tienes que seleccionar una opción de estudios correcta";
            }
            else {
                array_push($datos["estudiosTexto"], $arrayPosibles[$seleccionado]);
            }
        }

        //si ha marcado 0-sin estudios
        if (validaRango(0, $arrayCheck, 1) && count($arrayCheck) > 1) {
            // foreach ($arrayCheck as $seleccionado) {
            //     if ($seleccionado !== 0) {
                    
            //     }
            // }
            array_splice($arrayCheck, 1, count($arrayCheck)-1); //borra todos menos el primero
            $errores["estudios"][] = "No puedes no tener estudios y a la vez sí";
        }

        
        // foreach ($arrayCheck as $elem) {
        //     array_push($datos["estudiosTexto"], $arrayPosibles[$elem]);
            
        // }

        $datos["estudios"] = $arrayCheck;
        


    }
    else {
        $errores["estudios"][] = "No has seleccionado una opción de Estudios";
    }

    if (isset($_POST["hermanos"])) {
        $hermanos = $_POST["hermanos"];

        if (validaEntero($hermanos, 0, 20, 0)) {
            
        }
        else 
            $errores["hermanos"][] = "El número de hermanos es incorrecto";

        $datos["hermanos"] = $hermanos;

    }

    if (isset($_POST["sueldo"])) {
        $sueldo = $_POST["sueldo"];

        if (!validaEntero($sueldo, 1000, 150000, 0)) {
            $errores["sueldo"][] = "El sueldo es incorrecto";
        }

        $datos["sueldo"] = $sueldo;

    }

    
        

    


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
        <input type="text" name="coordX" value=""><br>

        <label for="coordY">Coordenada Y: </label>
        <input type="text" name="coordY" value=""><br>

        <label for="colores">Colores: </label>
        <select name="colores">
            <?php
            foreach (Punto::COLORES as $indice => $valor) {
                //el $indice es el color en inglés
                ?>
                <option value="<?= $indice ?>"><?= $valor["nombre"] ?></option>
                <?php

            }


            ?>
        </select>

        <br>
        <label for="grosor">Grosores:</label><br>
        <?php
        foreach (Punto::GROSORES as $indice => $valor) {
            //el $indice es el color en inglés
            ?>
            <input type="checkbox" name="<?= $indice ?>" value="<?= $valor ?>">
            <label for="<?= $indice ?>"><?= $valor ?></label> <br>
            <?php

        }


        ?>
        

        <input type="submit" class="boton" value="Guardar" name="guardar">
    </form>

    <?php
}

