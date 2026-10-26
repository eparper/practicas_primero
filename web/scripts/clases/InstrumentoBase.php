<?php

class InstrumentoBase {

    //propiedades
    private string $_descripcion;
    protected int $_edad = 10;


    private function __construct(string $desc, int $ed = 10)
    {
        $this -> _descripcion = $desc;
        $this -> _edad = $ed;
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

}