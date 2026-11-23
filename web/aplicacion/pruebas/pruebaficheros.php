<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Ficheros"
    ],

];

$datos = [
    ["nombre",
    "Vicente",
    16,
    "Noemí"],
    ["Ordenador",
    123,
    638]
];

//pathinfo()

if (!escribirAFichero("datos.txt", $datos)) {
    paginaError("No se han podido guardar los datos");
    exit; //para que no cargue más nada
}

$errores = [];

if (isset($_POST["descargar"])) {
    $nombreSalida="datos.pdf"; 
    header('Content-Type:'.'application/pdf'); 
    //esto es para el cuadro de descarga
    header('Content-Disposition:attachment;filename="'.$nombreSalida.'"'); 
    $ruta = RUTABASE . "/ficheros/ej2.pdf";
    echo file_get_contents($ruta);
    echo "esto es lo que va en la respuesta".PHP_EOL;
    echo "y por tanto en el fichero";
    exit;
}

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
        }
        if (!$errores) {
            
            $nombreSubida=RUTABASE . "/ficheros/"; 
            $nombreSubida=$nombreSubida.$_FILES['archivo']['name']; 
             
            if(!move_uploaded_file($_FILES['archivo']['tmp_name'],$nombreSubida)) 
            { 
                $errores["archivo"][] = "El archivo no se ha podido subir";
            } 
            
        }
    }

$datos = ["c2daw"];

if (!leerDeFichero("datos.txt", $datos))
    {
        paginaError("No se han podido guardar los datos");
        exit; //para que no cargue más nada
    }

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("FICHEROS", $barraUbicacion);
cuerpo($errores); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $errores)
{
    mostrarErrores($errores);
?>
    <br><br>
    <h1>ARRAYS</h1>
    <br><br>

    <!-- El tipo de codificación de datos, enctype, se DEBE especificar como 
    a continuación-->
    <form enctype="multipart/form-data" action="" method="POST">
        <!--MAX_FILE_SIZE debe preceder al campo de entrada de archivo-->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- El nombre del elemento de entrada determina el nombre en el array 
        $_FILES -->
        Enviar este archivo:
        <input name="archivo" type="file" />
        <input type="text" name="nombre">
        <input type="submit" value="Enviar fichero" name="subida"/>
        <input type="submit" value="Descargar fichero" name="descargar"/>
    </form>


<?php






}


/** 
 * funcion para escribir en un fichero 
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
    $fic = fopen($ruta, "w");  //w modo escritura
    if (!$fic) //si no se puede abrir, se devuelve false porque se ha producido un error
        return false;

    //se recorre el array con los datos 
    foreach ($datos as $fila) //recorre las diferentes filas
    {
        $linea = "";
        foreach ($fila as $columna) {

            $linea .= $columna . ",";
        }
        $linea .= "\r\n";

        //se escribe en el fichero una linea 
        fputs($fic, $linea);
    }

    //se cierra el fichero 
    fclose($fic);
    return true;
}

/** 
 * funcion para leer de un fichero 
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

        if ($linea != "") {
            $linea = explode(",", $linea);

            $datos[] = $linea;
        }
    }

    //se cierra el fichero 
    fclose($fic);

    return true;
}


function mostrarErrores(array $errores) {
    //mostrar los errores 
    if ($errores) {
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }
}