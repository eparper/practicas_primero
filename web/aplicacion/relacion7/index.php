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

//nombre archivo
$nombreArchivo = creaNombreArchivoSinExtension()  . ".jpg";
$nombreArchivoDat = creaNombreArchivoSinExtension()  . ".dat";



//creamos imagen si no existe
if (!file_exists(RUTABASE . "/imagenes/puntos/". $nombreArchivo)) {
    recargarImagen($nombreArchivo, $puntos);
}

//leemos de fichero si existe el .dat
if (file_exists(RUTABASE . "/ficheros/". $nombreArchivoDat)) {
    leerDeFichero($nombreArchivoDat, $puntos);
    recargarImagen($nombreArchivo, $puntos);
}

//comprobar si se ha dado a borrar
if (isset($_POST["borrar"])) {

    //comprobamos si existe el select comboPuntos
    if (isset($_POST["comboPuntos"])) {
        $valorOptionSeleccionado = $_POST["comboPuntos"];

        if (!validaRango($valorOptionSeleccionado, $puntos, 2)) { //comprobamos en las claves
            $errores["comboListaPuntos"][] = "No existe el punto";
        }

        //si está bien, quitamos el punto del array:
        
        unset($puntos[$valorOptionSeleccionado]); //este unset NO es el de métodos mágicos de punto
        $puntos = array_values($puntos); //reindexamos el array
        recargarImagen($nombreArchivo, $puntos);
        escribirAFichero($nombreArchivoDat, $puntos);
        
    }

}

//comprobar si se ha dado a descargar
if (isset($_POST["descargar"])) {

    //redirigir a imagen.php
    header("Location: ./imagen.php?");
    exit;
}

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



  

    if (!$errores)  //no hay errores, hago la insercion 
    {
        $x = $datos["coordX"];
        $y = $datos["coordY"];
        $color = $datos["colores"]; //color en inglés
        $grosor = $datos["grosores"][0]; //índice

        $obPunto = new Punto($x, $y, $color, $grosor);

        //añadimos el punto al array de la cabecera
        $puntos[] = $obPunto;

        //luego añadimos el array al .dat de /ficheros
        $nombreFichero = creaNombreArchivoSinExtension() . ".dat";

        escribirAFichero($nombreFichero, $puntos);

        recargarImagen($nombreArchivo, $puntos);

        //redirigir para limpiar el POST y evitar duplicados al pulsar F5 (antes de que cabecera imprima algo)
        header("Location: ./index.php");
        exit;
    }
}

//comprobar si se ha dado a subir fichero
if (isset($_POST["subida"])) 
    {
        //recojo el nombre

        //recojo el fichero
        if (!isset($_FILES["archivo"]))
            {
                $errores["archivo"][] = "No se ha indicado fichero";
            }
        else {
            //compruebo que se haya subido un archivo correcto
            if ($_FILES["archivo"]["error"] !== 0) {
                $errores["archivo"][] = "El fichero indicado no es correcto";
            } 
            if (!preg_match("/.txt$/", $_FILES['archivo']['name'])) { //si el fichero no es .txt
                $errores["archivo"][] = "El fichero indicado no es .txt";
            }
        }
        if (!$errores) { //si no hay errores
            
            $nombreSubida=RUTABASE . "/ficheros/"; 
            $nombreSubida=$nombreSubida.$_FILES['archivo']['name']; 
             
            if(!move_uploaded_file($_FILES['archivo']['tmp_name'],$nombreSubida)) 
            { 
                $errores["archivo"][] = "El archivo no se ha podido subir";
            } 

            $masPuntos = [];
            leerDeFichero($_FILES['archivo']['name'], $masPuntos);
            $puntos = array_merge($puntos, $masPuntos);
            escribirAFichero($nombreArchivoDat, $puntos);
            recargarImagen($nombreArchivo, $puntos);
            
        }
    }


//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 7", $barraUbicacion);
cuerpo($datos, $errores, $puntos, $nombreArchivo);  //llamo a la vista
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
function cuerpo(array $datos, array $errores, array $puntos, string $nombreArchivo)
{
?>
    <br><br>
    

<?php


    
    formulario($datos, $errores); //imprimo el formulario de crear puntos
    echo "<br>".PHP_EOL;
    formularioCombo($puntos, $errores); //imprimo el formulario de borrar puntos
    
    ?>

    <br>
    

    <textarea name="cajaTexto" cols="75" rows="10" readonly><?php foreach ($puntos as $indice => $punto) {

            echo "Punto: ".$indice.". Coordenada x: ". $punto->getX() . ". Coordenada Y: " .
                    $punto->getY() . ". Color: " . $punto->getColor() . 
                    ". Grosor: " . $punto->getGrosor() . ".\n";
        }

        ?>
    </textarea>

    <br><br>
    <!-- LA RAÍZ ES WEB, así que empezamos en /imagenes, que está en la raíz -->
    <img src="/imagenes/puntos/<?php echo $nombreArchivo ?>" alt="Imagen puntos">
    
    <br>

    
    <!-- FORMULARIO DE ENVIAR EL ARCHIVO -->
    <form enctype="multipart/form-data" action="" method="post">
        <!--MAX_FILE_SIZE debe preceder al campo de entrada de archivo-->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input name="archivo" type="file" /> 
        
        <input type="submit" value="Enviar fichero" name="subida"/> 
    </form> <br>
    <?php muestraErrores($errores, "archivo") ?><br>

    <a href="./pruebasPuntos.php">Pruebas Puntos</a>
    <?php
    

}

/**
 * Función que pinta el formulario del combo de borrar puntos
 *
 * @param array $arrayPuntos Array de puntos que se le pasa para mostrarlos en el combo
 * @param array $errores Matriz de errores para mostrar los errores del formulario
 * @return void
 */
function formularioCombo(array $arrayPuntos, array $errores) {

    ?>

    <form action="./index.php" method="post"> 
        <select name="comboPuntos"> 
            
            <option value="">Sin opción</option>
            <?php
                foreach ($arrayPuntos as $indice => $punto) {
                    ?>
                        <option value="<?= $indice ?>">
                            <?php echo "Punto " . $indice . " - x:".$punto->getX()." - y:".
                                        $punto->getY()." - ".$punto->getColor(). " - ".$punto->getGrosor(); ?>
                        </option>

                    <?php
                }
            ?>
        </select> <?php muestraErrores($errores, "comboListaPuntos") ?><br>
        <input type="submit" value="Borrar" name="borrar">
        <input type="submit" value="Descargar" name="descargar">
    </form>

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

    <form action="./index.php" method="post"> 
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
            <input type="radio" name="arrayCheck[]" value="<?= $indice ?>" <?= (validaRango($indice, $datos["grosores"], 1)?"checked":"") ?>>
            <label for="<?= $indice ?>"><?= $valor ?></label> <br>
            <?php

        }

        ?> <br>
        
        
        
        <br>

        <input type="submit" class="boton" value="Guardar" name="guardar">
    </form>

    

    <?php
}

/**
 * Función que pinta un span con los errores para ponerlos al lado de cada campo
 *
 * @param array $errores Matriz de errores que se le pasa
 * @param string $nombreCampo Nombre del campo en la matriz para poder encontrarlo e imprimir el error correcto
 * @return void
 */
function muestraErrores (array $errores, string $nombreCampo):void {
    if ($errores) {   //mostrar los errores 
        
        
        foreach ($errores as $clave => $valor) {
            if ($clave == $nombreCampo) {
                //echo "<span class='error'>";
                foreach ($valor as $error)
                    echo "<span class='error'>$clave => $error</span><br><br>" . PHP_EOL;
                //echo "</span>";
            }
            

            
        }
        
    }
}


/**
 * Función que crea la imagen con los puntos o la recarga
 *
 * @param string $nombreImagen El nombre que le quieras poner a tu archivo de imagen
 * @param array $arrayPuntos Array de puntos a pintar en la imagen
 * @return void
 */
function recargarImagen(string $nombreImagen, array $arrayPuntos) : void {

    $imagen = imagecreatetruecolor(500, 500); //es este tamaño porque los puntos no van más allá de 500
    $color = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen, 499, 499, $color); //esto es como un cubo del paint, pone el cubo en las coordenadas que le digas
                                        //es lo mismo excepto si le pones 500 porque ya se saldría de la imagen

    //AÑADIMOS LOS PUNTOS DEL ARRAY DE LA CABECERA
    if ($arrayPuntos) { //si existe nuestro array de puntos:
        foreach ($arrayPuntos as $punto) {
            $rgbArrayPunto = Punto::COLORES[$punto->getColor()]["rgb"];

            //esta función crea un color trabajando sobre esta imagen pero no lo pone
            $colorPunto = imagecolorallocate($imagen, $rgbArrayPunto[0], $rgbArrayPunto[1], $rgbArrayPunto[2]);

            imagefilledellipse($imagen, $punto->getX(), $punto->getY(), 
                            $punto->getGrosor() * 10, $punto->getGrosor() * 10,
                            $colorPunto); //primero le ponemos el color blanco por defecto

            
            
        }
    }

    //marco negro 
    $color = imagecolorallocate($imagen, 0, 0, 0);
    imagerectangle($imagen, 0, 0, 499, 499, $color); //499 porque a 500 no llegaría, ya que el 0,0 también es una coordenada

    //la ponemos en la ruta 
    $ruta = "/imagenes/puntos/".$nombreImagen;
    imagejpeg($imagen, RUTABASE . $ruta); //nombre imagen con extensión

}

/**
 * Función que crea el nombre del archivo en formato: IP + nombre del navegador
 *
 * @return string Devuelve una cadena con el nombre sin extensión
 */
function creaNombreArchivoSinExtension() : string {
    $ip = $_SERVER["REMOTE_ADDR"];

    $ipConGuiones = mb_ereg_replace("\.", "_", $ip) . "_";

    $cadenaNavegador = $_SERVER["HTTP_USER_AGENT"];
    

    $resultadosNavegadores = [];
    $navegador = "";

    if (preg_match("[Edg]", $cadenaNavegador, $resultadosNavegadores, PREG_OFFSET_CAPTURE))
        $navegador = "edge";
        
    else if (preg_match("[Firefox]", $cadenaNavegador, $resultadosNavegadores, PREG_OFFSET_CAPTURE))
        $navegador = "firefox";

    //safari es si no pone Chrome
    else if (preg_match("[^Chrome]", $cadenaNavegador, $resultadosNavegadores, PREG_OFFSET_CAPTURE))
        $navegador = "safari";

    else if (preg_match("[Chrome]", $cadenaNavegador, $resultadosNavegadores, PREG_OFFSET_CAPTURE))
        $navegador = "chrome";

    return $ipConGuiones . $navegador;
}

/** 
 * Función para escribir en un fichero 
 * @param string $nombre nombre del fichero 
 * @param mixed $datos valores  
 * @return bool devuelve si ejecuta correctamente o hay algún error 
 */
function escribirAFichero(string $nombre, ?array $datos = null): bool
{
    //ruta en la que se guardará el fichero 
    //$ruta=$_SERVER["DOCUMENT_ROOT"]."/ficheros"; 
    $ruta = RUTABASE . "/ficheros";

    //si no existe la ruta se crea 
    if (!file_exists($ruta))
        mkdir($ruta);

    //LE CONCATENAMOS EL NOMBRE DEL FICHERO CON LA EXTENSIÓN
    $ruta .= "/$nombre";

    // if (!isset($datos)) {
    //     return false;
    // }

    //se abre el fichero para escritura 
    //si existe se borra el contenido 
    $fic = fopen($ruta, "w");  //a modo escritura colocando el puntero al final
    if (!$fic) //si no se puede abrir, se devuelve false porque se ha producido un error
        return false;

    //se recorre el array con los datos 
    foreach ($datos as $punto) //recorre las diferentes filas
    {
        $linea = "";
        
        $linea .= $punto->getX() . " ; " . $punto->getY() . " ; " . 
                    $punto->getColor() . " ; " . $punto->getGrosor();
        
        $linea .= "\r\n";

        //se escribe en el fichero una linea 
        fputs($fic, $linea);
    }

    //se cierra el fichero 
    fclose($fic);
    return true;
}

/** 
 * Función para leer de un fichero 
 * @paramstring $nombre nombre del fichero 
 * @parammixed $datos valores  
 * @returnbool devuelve si ejecuta correctamente o hay algún error 
 */
function leerDeFichero(string $nombre, array &$datos): bool
{
    //ruta en la que se guardará el fichero 
    //$ruta=$_SERVER["DOCUMENT_ROOT"]."/ficheros"; 
    $ruta = RUTABASE . "/ficheros";

    //si no existe la ruta se crea 
    if (!file_exists($ruta))
        mkdir($ruta);

    //LE CONCATENAMOS EL NOMBRE DEL FICHERO CON LA EXTENSIÓN
    $ruta .= "/$nombre";

    if (!isset($datos)) {
        return false;
    }
    //se abre el fichero para lectura 
    //debe existir 
    $fic = fopen($ruta, "r");
    if (!$fic)
        return false;

    //borro el contenido del array 
    foreach ($datos as $pos => $valor) {
        unset($datos[$pos]);
    }

    //leo el fichero linea a linea 
    while ($linea = fgets($fic)) {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);

        if ($linea != "" && preg_match_all("/^[0-9]{1,3} ; [0-9]{1,3} ; \w+ ; (1|2|3)$/", $linea)) {
            //$linea = explode(" ; ", $linea);

            //creamos el punto
            $partesLinea = mb_split(" ; ", $linea); //tiene 4 partes (x, y, color, grosor)

            try {
                $obPunto = new Punto($partesLinea[0], $partesLinea[1], $partesLinea[2], $partesLinea[3]);
            }
            catch (Exception $e) {
                continue;
            }
            

            $datos[] = $obPunto;
        }
    }

    //se cierra el fichero 
    fclose($fic);

    return true;
}
