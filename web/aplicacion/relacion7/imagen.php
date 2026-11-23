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
//creamos el nombre del archivo con la extensión .dat
$nombreArchivoDat = creaNombreArchivoSinExtension()  . ".dat";

//leemos del fichero .dat y recogemos los puntos en el array
leerDeFichero($nombreArchivoDat, $puntos); 

//se crea la imagen con los puntos y se descarga al vuelo
crearImagenAlVuelo($puntos);
//-------------------------

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Imagen", $barraUbicacion);
cuerpo();  //llamo a la vista
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
function cuerpo()
{
}

/** 
 * funcion para leer de un fichero 
 * @param string $nombre nombre del fichero 
 * @param mixed $datos valores  
 * @return bool devuelve si ejecuta correctamente o hay algún error 
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
            //$linea = explode(" ; ", $linea);

            //creamos el punto
            $partesLinea = mb_split(" ; ", $linea); //tiene 4 partes (x, y, color, grosor)

            $obPunto = new Punto($partesLinea[0], $partesLinea[1], $partesLinea[2], $partesLinea[3]);

            $datos[] = $obPunto;
        }
    }

    //se cierra el fichero 
    fclose($fic);

    return true;
}

/**
 * Función que crea la imagen y la descargar al vuelo
 *
 * @param array $puntos Array puntos que se le pasa para recorrerlos y que se muestren en la imagen
 * @return void
 */
function crearImagenAlVuelo(array $puntos) {


    $imagen = imagecreatetruecolor(500, 500); //es este tamaño porque los puntos no van más allá de 500
    $color = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen, 499, 499, $color); //esto es como un cubo del paint, pone el cubo en las coordenadas que le digas
                                        //es lo mismo excepto si le pones 500 porque ya se saldría de la imagen

    //AÑADIMOS LOS PUNTOS DEL ARRAY DE LA CABECERA
    if ($puntos) { //si existe nuestro array de puntos:
        foreach ($puntos as $punto) {
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

    //enviar las cabeceras http antes de generar la salida de la imagen:
    $nombreArchivo = "imagen_descargar.jpg";
    header('Content-Type:'.'image/jpeg'); //tipo mime
    //esto es para el cuadro de descarga
    header('Content-Disposition:attachment;filename="'.$nombreArchivo.'"'); 


    imagejpeg($imagen, null); //ponemos null en el nombre del archivo porque no queremos ponerla 
                                //en ninguna ruta sino que tenemos que descargarla al vuelo


    exit;
}

/**
 * Esta función crea el nombre del archivo (IP + nombre del navegador) pero sin extensión
 *
 * @return string Devuelve el nombre del archivo en una cadena
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