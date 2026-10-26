<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Pruebas",
        "url" => "/aplicacion/pruebas/index.php"
    ],
    [
        "nombre" => "Clases"
    ]
    
];

//se crea una instancia de la clase prueba 
$instancia = new ClasePrueba();

//accede a la propiedad pública de la instancia 
$instancia->propPublica = 50;

//cuando cambiemos la propiedad estática se cambia para todas las instancias 
//(debugear para entender)
$instancia1 = new ClasePrueba();

ClasePrueba::$propEstatica[1]=10;



$instancia::$propEstatica[2] = 20;

/*************************************** */
$datos=["codigo"=>12,"nombre"=>"prueba2"]; 
$datosJSon=json_encode($datos); 

//no hay constructor público: por eso da fallo la siguiente línea, entonces llamamos a los constructores 
//estáticos que hemnos definido
//$inst = new Prueba(12, "cadena");


 
//no hay constructor público, por lo que tengo que  
//llamar a las funciones de creación estaticas 
$p1 = Prueba::desdeDatos(5, 'Objeto'); 
$p2 = Prueba::desdeJson($datosJSon); 

/*************************************** */
$programa = Unica::crear(100);

$programa -> numero = 1;

$segunda = Unica::crear(300); //ambos hacen referencia al mismo objeto aunque lo llames mil veces

/*************************************** */
//fichero externo en /scripts/clases
$ins = new Instituto();


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>
    <h1>CLASES</h1>
    <br><br>
    
<?php
}


/** 
 * Clase prueba usada para mostrar el funcionamiento de los 
 * distintos elementos 
 */
class ClasePrueba
{
   //definición de constantes 
   public const PI = 2.14;

   //definición de propiedad 
   public int $propPublica = 1;
   private string $_propPrivada = "hola";
   protected float $_propProtegida = 1.234;

   //definición de propiedad estática 
   public static $propEstatica = array(1, 2, 3);

   //definición de método 
   public function metodo()
   {
      //acceso a las propiedades desde el propio objeto 
      $this->propPublica = 13;
      $this->_propPrivada = 100;
      $this->_propProtegida = "adios";

      //acceso a la propiedad estática 
      self::$propEstatica[0] = "otra";

      return true;
   }
}

/**
 * Clase Prueba... comentar todas las clases
 */
class Prueba
{

   private ?int $_codigo;
   private ?string $_nombre;

   //el constructor es privado 
   private function __construct(?int $codigo = null, ?string $nombre =
   null)
   {
      $this->_codigo = $codigo;
      $this->_nombre = $nombre;
   }

   //constructor estatico publico 
   public static function desdeDatos(int $codigo, string $nombre): static
   {
      if ($codigo < 0) {
         $codigo = 0;
      }
      //creo el objeto usando static 
      $obj = new static($codigo, $nombre);
      return $obj;
   }

   //constructor estatico publico 
   public static function desdeJson(string $json): static
   {
      $datos = json_decode($json);
      return new static($datos->codigo, $datos->nombre);
   }
}

class Unica {

   private static bool $_creada = false;
   public int $numero = 12;
   
   //el ? es que permite nulos
   private static ?Unica $_objeto = null;

   //yo quiero controlar que haya una sola instancia de Unica
   private function __construct(int $val = 0) {

      $this -> numero = $val;
   }

   public static function crear(int $numero) : static {

      if (self::$_creada) {
         return self::$_objeto;
      }

      $obj = new static($numero);
      self::$_objeto = $obj;
      self::$_creada = true;

      self::$_objeto = new static($numero);

      return self::$_objeto;

   }

}

//con parent:: se llama a la clase base (padre)