<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_filter.php");
include_once(dirname(__FILE__) . "/val_normal.php");
require_once RUTABASE . "/scripts/librerias/validacion.php";
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 5"

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

        if ($nombre == "") {
            $errores["nombre"][] = "Debe indicarse un nombre";
        }

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

        //repetir contraseña
        if (isset($_POST["contrasenia2"])) {

            $contrasenia2 = $_POST["contrasenia2"];

            if ($contrasenia2 !== $contrasenia) {
                $errores["contrasenia2"][] = "Las contraseñas deben coincidir";
            }

            $datos["contrasenia2"] = $contrasenia2;
        }

    }

    if (isset($_POST["fechaNacimiento"])) {
        $fechaNac = $_POST["fechaNacimiento"];

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

    if (isset($_POST["fechaCarnetDia"]) && isset($_POST["fechaCarnetMes"]) && isset($_POST["fechaCarnetAnio"])) {
        $fechaCarnetDia = $_POST["fechaCarnetDia"];
        $fechaCarnetMes = $_POST["fechaCarnetMes"];
        $fechaCarnetAnio = $_POST["fechaCarnetAnio"];

        $fechaCompleta = $fechaCarnetDia . "/" . $fechaCarnetMes . "/" . $fechaCarnetAnio;
        
        if (!validaFecha($fechaCompleta, "12/02/2026")) {
            $errores["fechaCarnet"][] = "La fecha de carnet es incorrecta";
        }

        $datos["fechaCarnetDia"] = $fechaCarnetDia;
        $datos["fechaCarnetMes"] = $fechaCarnetMes;
        $datos["fechaCarnetAnio"] = $fechaCarnetAnio;

        if (isset($_POST["fechaNacimiento"])) {
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

        if (!validaHora($horaLevantarse, "08:00:00")) {
            $errores["horaLevantarse"][] = "La hora de levantarse es incorrecta";
        }

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

        if (!validaEntero($hermanos, 0, 20, 0)) {
            $errores["hermanos"][] = "El número de hermanos es incorrecto";
        }

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
inicioCuerpo("RELACIÓN 3", $barraUbicacion);
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

    $variable = 2.5;
    echo (VALFILTER\validaReal($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = 5;
    echo (VALFILTER\validaEntero($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = 2.5;
    echo (VALNORMAL\validaReal($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = 5;
    echo (VALNORMAL\validaEntero($variable, 0, 10, 5))?"Es correcto<br>":"No es correcto<br>";
    echo gettype($variable)."<br>".PHP_EOL;

    $variable = "30/3/2022";
    echo (VALFILTER\validaFecha($variable, "01/01/2000"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "30/2/2022";
    echo (VALNORMAL\validaFecha($variable, "01/01/2000"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "-16:87:-00";
    echo (VALFILTER\validaHora($variable, "01:01:00"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "16:7:56";
    echo (VALNORMAL\validaHora($variable, "01:01:00"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g.educaand.es";
    echo (VALFILTER\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g..educaand.es";
    echo (VALFILTER\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g.educaand.es";
    echo (VALNORMAL\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "eparper111@g.educaand..es";
    echo (VALNORMAL\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "HOLA";
    echo (VALNORMAL\validaEmail($variable, "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "HOLA";
    echo (VALNORMAL\validaCadena($variable, 10, "cadena"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "HOLAholaholahola";
    echo (VALNORMAL\validaCadena($variable, 10, "cadena"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "adios@gmail.com";
    echo (VALFILTER\validaExpresion($variable, "/^[\w\.-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/", "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;

    $variable = "adios@gmail.com";
    echo (VALNORMAL\validaExpresion($variable, "/^[\w\.-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/", "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;



    $variable = "adios";
    echo (VALNORMAL\validaExpresion($variable, "/^[\w\.-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,}$/", "hola@gmail.com"))?"Es correcto<br>":"No es correcto<br>";
    echo $variable."<br>".PHP_EOL;


    //----------------------------------------
    $variable = "adios";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALNORMAL\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    $variable = "adios";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALFILTER\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    $variable = "adioss";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALNORMAL\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    $variable = "adioos";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (VALFILTER\validaRango($variable, $arrayPrueba, 1))?"Es correcto<br>":"No es correcto<br>".PHP_EOL;

    //comprobar el require_once:
    $variable = "adioos";
    $arrayPrueba = ["hola", "adiós", "adios"];
    echo (validaRango($variable, $arrayPrueba, 1)?"Es correcto<br>":"No es correcto<br>").PHP_EOL;

    echo "<br><br>".PHP_EOL;

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
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?= $datos["nombre"]; ?>"><br>

        <label for="pass">Contraseña: </label>
        <input type="password" name="contrasenia" id="pass" value="<?= $datos["contrasenia"]; ?>"><br>

        <label for="pass2">Repetir contraseña: </label>
        <input type="password" name="contrasenia2" id="pass2" value="<?= $datos["contrasenia2"]; ?>"><br>

        <label for="fechaNac">Fecha Nacimiento: </label>
        <input type="text" name="fechaNacimiento" id="fechaNac" value="<?= $datos["fechaNacimiento"]; ?>"><br>

        <label for="fechaCarnetDia">Fecha Carnet: Día:</label>
        <input type="text" name="fechaCarnetDia" id="fechaCarnetDia" value="<?= $datos["fechaCarnetDia"]; ?>" size="5">
        <label for="fechaCarnetMes">Mes: </label>
        <input type="text" name="fechaCarnetMes" id="fechaCarnetMes" value="<?= $datos["fechaCarnetMes"]; ?>" size="5">
        <label for="fechaCarnetAnio">Año: </label>
        <input type="text" name="fechaCarnetAnio" id="fechaCarnetAnio" value="<?= $datos["fechaCarnetAnio"]; ?>" size="5"><br>

        <label for="horaLevantarse">Hora de levantarse: </label>
        <input type="text" name="horaLevantarse" id="horaLevantarse" value="<?= $datos["horaLevantarse"]; ?>"><br>

        <label for="">Estado:</label><br>
        <input type="radio" name="estado" value="1" <?= (($datos["estado"] == "Estudiante")? "checked" : "") ?>>
        <label for="estado">Estudiante</label> <br>
        <input type="radio" name="estado" value="2" <?= (($datos["estado"] == "En paro")? "checked" : "") ?>>
        <label for="estado">En paro</label> <br>
        <input type="radio" name="estado" value="3" <?= (($datos["estado"] == "Trabajando")? "checked" : "") ?>>
        <label for="estado">Trabajando</label> <br>
        <input type="radio" name="estado" value="4" <?= (($datos["estado"] == "Jubilado")? "checked" : "") ?>>
        <label for="estado">Jubilado</label> <br>
        <input type="radio" name="estado" value="5" <?= (($datos["estado"] == "")? "checked" : "") ?>>
        <label for="estado">Incorrecta</label> <br>

        <label for="estudios">Estudios:</label><br>
        <input type="checkbox" name="arrayCheck[]" value="0" <?= ((validaRango(0, $datos["estudios"], 1))?"checked":"") ?>>
        <label for="estudios">Sin estudios</label><br>
        <input type="checkbox" name="arrayCheck[]" value="1" <?= ((validaRango(1, $datos["estudios"], 1))?"checked":"") ?>>
        <label for="estudios">Primaria</label><br>
        <input type="checkbox" name="arrayCheck[]" value="2" <?= ((validaRango(2, $datos["estudios"], 1))?"checked":"") ?>>
        <label for="estudios">Secundaria</label><br>
        <input type="checkbox" name="arrayCheck[]" value="3" <?= ((validaRango(3, $datos["estudios"], 1))?"checked":"") ?>>
        <label for="estudios">Bachillerato</label><br>
        <input type="checkbox" name="arrayCheck[]" value="4" <?= ((validaRango(4, $datos["estudios"], 1))?"checked":"") ?>>
        <label for="estudios">Ciclo Formativo</label><br>
        <input type="checkbox" name="arrayCheck[]" value="5" <?= ((validaRango(5, $datos["estudios"], 1))?"checked":"") ?>>
        <label for="estudios">Universitarios</label><br>
        <input type="checkbox" name="arrayCheck[]" value="6" <?= ((validaRango(6, $datos["estudios"], 1))?"checked":"") ?>>
        <label for="estudios">Opción incorrecta</label><br>

        <label for="hermanos">Hermanos: </label>
        <input type="text" name="hermanos" id="hermanos" value="<?= $datos["hermanos"]; ?>"><br>

        <label for="sueldo">Sueldo: </label>
        <input type="text" name="sueldo" id="sueldo" value="<?= $datos["sueldo"]; ?>"><br>

        <input type="submit" class="boton" value="Enviar" name="enviar">
    </form>

    <?php
}

/**
 * Función que muestra los datos si no hay ningún error
 *
 * @param array $datos Array datos con posiciones asociativas donde se encuentran los resultados
 * @return void
 */
function muestraResumen(array $datos) {

    echo "Nombre: " . $datos["nombre"]. "<br>".PHP_EOL;
    echo "Fecha nacimiento: " . $datos["fechaNacimiento"]. "<br>".PHP_EOL;
    echo "Fecha carnet: " . $datos["fechaCarnet"]. "<br>".PHP_EOL;
    echo "Hora de levantarse: " . $datos["horaLevantarse"]. "<br>".PHP_EOL;
    echo "Estado: " . $datos["estado"]. "<br>".PHP_EOL;
    echo "Estudios: -".PHP_EOL;
    foreach ($datos["estudiosTexto"] as $est) {
        echo $est . " - ";
    }
    echo "<br>".PHP_EOL;
    echo "Hermanos: " . $datos["hermanos"]. "<br>".PHP_EOL;
    echo "Sueldo: " . $datos["sueldo"]. "<br>".PHP_EOL;
}