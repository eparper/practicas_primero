<?php
/**
 * Clase que no se puede heredar de ella
 * Hereda de InstrumentoViento
 * Implementa la interfaz IFabricable
 * Con ella se puede construir una flauta
 */
final class Flauta extends InstrumentoViento implements IFabricable {

    public static array $arrayInfo = [
        "material" => "madera",
        "edad" => 15
    ];

    /**
     * Constructor privado que se usa en esta clase
     *
     * @param string $material Material de la flauta
     * @param integer $edad Edad de la flauta
     */
    private function __construct(string $material = "madera", int $edad = 15)
    {
        parent::__construct($material, $edad);

        

    
    }

    /**
     * Método mágico para clonar objetos
     *
     * @return void No devuelve nada
     */
    public function __clone()
    {
        //en el array estático no habría que ponerlo
        //self::$arrayInfo["edad"] = 0;
        //en la variable heredada
        $this->_edad = 0;

        //se actualiza el contador porque en el constructor se hace pero no cuando estamos
        //clonando, así que aquí le definimos otra vez ese comportamiento
        parent::$_contadorElementos++;

        $this->_ordenCreacion = parent::$_contadorElementos;

    }

    /**
     * Constructor estático público, con el que crearemos flautas
     * desde el fuera.
     *
     * @param array $arr Array con las propiedades material y edad como claves
     * @return static Devuelve un objeto flauta
     */
    public static function CrearDesdeArray(array $arr): static
    {
        
        //creo el objeto usando static 
        if (isset($arr["material"]) && isset($arr["edad"])) {

            $obj = new static($arr["material"], $arr["edad"]);

            return $obj;
        }
        else {
            $obj = new static(self::$arrayInfo["material"], self::$arrayInfo["edad"]);

            return $obj;
        }
            
            
    }



    //MÉTODOS DE LA INTERFAZ IFABRICABLE

    /**
     * Método que dice los pasos para fabricar una flauta
     *
     * @return string Devuelve los pasos para la fabricación de la flauta
     */
    public function metodoFabricacion() : string {

        return "1. Selección de madera noble (como palisandro o peral) secada al aire durante años. 
        2. Torneado del cilindro exterior y perforación del tubo interior. 
        3. Modelado artesanal del bloque y la boquilla para el canal del viento. 
        4. Perforación y afinación precisa de los agujeros tonales. 
        5. Tratamiento final con aceites naturales para proteger la madera.";
    }


    /**
     * Método que dice el método de reciclado de una flauta
     *
     * @return string Devuelve le método de reciclado de la flauta
     */
    public function metodoReciclado() : string {

        return "1. Desmontar el instrumento separando sus secciones (cabeza, cuerpo y pie). 
        2. Retirar los anillos de corcho o juntas de hilo de las uniones. 
        3. El cuerpo de madera es 100% biodegradable y puede compostarse o triturarse. 
        4. Las partes de plástico o metal residuales (si las hay) deben depositarse en 
        sus contenedores de reciclaje específicos.";
    }

}