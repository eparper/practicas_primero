<?php

abstract class InstrumentoBase {

    //propiedades
    private string $_descripcion;
    protected int $_edad = 10;

    protected static int $_contadorElementos = 0;
    private int $_ordenCreacion;


    public function __construct(string $desc, int $ed = 10)
    {
        $this -> _descripcion = $desc;
        $this -> _edad = $ed;

        self::$_contadorElementos++;

        $this->_ordenCreacion = self::$_contadorElementos;

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

    abstract public function sonido();
    abstract public function afinar();

    
    public function envejecer():void {
        $this -> _edad++;
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



    public function __toString():string {
        return "Instrumento con descripción " . $this->getDescripcion() . ", instancia 
                " . $this->_ordenCreacion . " de un total de " . self::$_contadorElementos . 
                ". Tiene " . $this->getEdad() . 
                " años. La clase es " . get_class();
    }

   
}