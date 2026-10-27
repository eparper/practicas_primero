<?php

class InstrumentoBase {

    //propiedades
    private string $_descripcion;
    protected int $_edad = 10;

    protected static int $_numeroOrden = 0;
    private static ?InstrumentoBase $_objeto = null;


    public function __construct(string $desc, int $ed = 10)
    {
        $this -> _descripcion = $desc;
        $this -> _edad = $ed;

        //se le asigna a la instancia el número de orden de creación del 
        //instrumento actual y se incrementa el valor de la variable de clase. 
        $obj = new static($desc, $ed);
        self::$_objeto = $obj;

        //al numeroOrden de la instancia se le iguala el numeroOrden 
        self::$_objeto -> _numeroOrden = self::$_numeroOrden;

        self::$_numeroOrden++;




    }

    //prop descripcion
    public function getDescripcion():string {
        return $this -> _descripcion;
    }

    public function setDescripcion(string $paramDescripcion):void {
        $this -> _descripcion = $paramDescripcion;
    }

    //prop edad 
    public function getEdad() : int {
        return $this -> _edad;
    }

    //abstract public function sonido();
    //abstract public function afinar();

    
    public function envejecer():void {
        $this -> _edad++;
    }

   
}