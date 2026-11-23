<?php
require_once RUTABASE . "/scripts/librerias/validacion.php";
class Punto {

    //CONSTANTES PÚBLICAS DE CLASE
    public const COLORES = [
        "black" => [
            "nombre" => "negro",
            "rgb" => [0, 0, 0]
        ],
        "red" => [
            "nombre" => "rojo",
            "rgb" => [255, 0, 0]
        ],
        "green" => [
            "nombre" => "verde",
            "rgb" => [0, 255, 0]
        ],
        "blue" => [
            "nombre" => "azul",
            "rgb" => [0, 0, 255]
        ]
    ];

    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso"
    ];

    //propiedades
    private int $_x = 5;
    private int $_y = 10;

    private string $_color = "black";
    private int $_grosor = 1;

    /**
     * Constructor público de Punto
     *
     * @param integer $coordX Coordenada x del Punto
     * @param integer $coordY Coordenada y del Punto
     * @param string $colorIngles Color en inglés del Punto
     * @param integer $indiceGrosor Grosor del Punto (1, 2 o 3)
     */
    public function __construct(int $coordX = 5, int $coordY = 10, 
                                string $colorIngles = "black", int $indiceGrosor = 1)
    {
        $coordenadaX = $this->setX($coordX);
        $coordenadaY = $this->setY($coordY);
        $nombreColorIngles = $this->setColor($colorIngles);
        $indexGrosor = $this->setGrosor($indiceGrosor);

        //si alguno es false, no se crea el Punto y se lanza una excepción
        if ($coordenadaX == false)
            throw new Exception("La coordenada X es incorrecta, no se puede crear el punto");
        if ($coordenadaY == false) 
            throw new Exception("La coordenada Y es incorrecta, no se puede crear el punto");
        if ($nombreColorIngles == false)
            throw new Exception("El color es incorrecto, no se puede crear el punto");
        if ($indexGrosor == false) 
            throw new Exception("El grosor es incorrecto, no se puede crear el punto");
        
    }

    //getters y setters
    public function getX():int {
        return $this->_x;
    }

    public function getY():int {
        return $this->_y;
    }

    public function getColor():string {
        return $this->_color;
    }

    public function getGrosor():int {
        return $this->_grosor;
    }

    //--
    public function setX(int $nuevaX):bool {
        
        if (!validaEntero($nuevaX, 0, 20000, 5)) {
            return false;
        }
        else {
            $this->_x = $nuevaX;
            return true;
        }
    }

    public function setY(int $nuevaY):bool {
        
        if (!validaEntero($nuevaY, 0, 20000, 5)) {
            return false;
        }
        else {
            $this->_y = $nuevaY;
            return true;
        }
    }

    public function setColor(string $nuevoColorIngles):bool {
        
        if (!validaRango($nuevoColorIngles, self::COLORES, 2)) { //comprobamos en las claves de COLORES
            return false;
        }
        else {
            $this->_color = $nuevoColorIngles;
            return true;
        }
    }

    public function setGrosor(int $nuevoIndiceGrosor):bool {
        
        if (!validaRango($nuevoIndiceGrosor, self::GROSORES, 2)) { //comprobamos en las claves de GROSORES
            return false;
        }
        else {
            $this->_grosor = $nuevoIndiceGrosor;
            return true;
        }
    }

    //PARA QUE NO TENGA SOBRECARGA:
    //métodos mágicos para control de la sobrecarga
    public function __set(string $name, mixed $value):void {
        throw new \Exception("La propiedad $name no existe");
        
    }

    public function __get(string $name):mixed {
        throw new \Exception("La propiedad $name no existe");
    }

    public function __isset(string $name):bool
    {
        //throw new \Exception('Not implemented');
        return false;
    }

    public function __unset(string $name):void
    {
        //throw new \Exception('Not implemented');
        ;
    }

}