<?php

final class Flauta extends InstrumentoViento implements IFabricable {

    public static array $arrayInfo = [
        "material" => "madera",
        "edad" => 15
    ];

    private function __construct(string $material = "madera", int $edad = 15)
    {
        parent::__construct($material, $edad);

        self::$arrayInfo["material"] = $material;
        self::$arrayInfo["edad"] = $edad;

        $this->_material = self::$arrayInfo["material"];
        $this->_edad = self::$arrayInfo["edad"];

    
    }

    public function __clone()
    {
        //en el array estático no habría que ponerlo
        //self::$arrayInfo["edad"] = 0;
        //en la variable heredada
        $this->_edad = 0;

        //se actualiza el contador porque en el constructor se hace pero no cuando estamos
        //clonando, así que aquí le definimos otra vez ese comportamiento
        parent::$_contadorElementos++;

        $this->_ordenCreacion = self::$_contadorElementos;

    }

    //constructor estatico publico 
    public static function CrearDesdeArray(array $arr): static
    {
        
        //creo el objeto usando static 
        if (isset($arr["material"]) && isset($arr["edad"])) {

            $obj = new static($arr["material"], $arr["edad"]);

            return $obj;
        }
        else
            throw new \Exception("La posición material o edad del array, no existe");
            
    }



    //MÉTODOS DE LA INTERFAZ IFABRICABLE
    public function metodoFabricacion() : string {

        return "1. Selección de madera noble (como palisandro o peral) secada al aire durante años. 
        2. Torneado del cilindro exterior y perforación del tubo interior. 
        3. Modelado artesanal del bloque y la boquilla para el canal del viento. 
        4. Perforación y afinación precisa de los agujeros tonales. 
        5. Tratamiento final con aceites naturales para proteger la madera.";
    }


    public function metodoReciclado() : string {

        return "1. Desmontar el instrumento separando sus secciones (cabeza, cuerpo y pie). 
        2. Retirar los anillos de corcho o juntas de hilo de las uniones. 
        3. El cuerpo de madera es 100% biodegradable y puede compostarse o triturarse. 
        4. Las partes de plástico o metal residuales (si las hay) deben depositarse en 
        sus contenedores de reciclaje específicos.";
    }

}