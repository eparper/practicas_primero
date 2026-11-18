<?php

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

    public function __construct(int $coordX = 5, int $coordY = 10, 
                                string $colorIngles = "black", int $indiceGrosor = 1)
    {
        $coordenadaX = $this->setX($coordX);
        $coordenadaY = $this->setY($coordY);
        $nombreColorIngles = $this->setColor($colorIngles);
        $indexGrosor = $this->setGrosor($indiceGrosor);

        //si alguno es false, no se crea el Punto y se lanza una excepción
        if ($coordenadaX == false || $coordenadaY == false || 
            $nombreColorIngles == false || $indexGrosor == false) {
            throw new Exception("NO se ha podido crear el punto");
        }
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

}