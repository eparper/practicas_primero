<?php

class SerieFibonacci implements Iterator {

    private int $_limite;
    private int $_claveActual; //índice

    private int $_fib0;
    private int $_fib1;
    private int $_fibonacci;

    public function __construct(int $lim)
    {
        $this -> _limite = $lim;

        
    }

    //pone el puntero al valor inicial 
    public function rewind() : void
    { 
        $this->_claveActual = 0; 
        $this->_fib0 = 0;
        $this->_fib1 = 1;
        $this->_fibonacci = 0;
    } 
     
    //devuelve el contenido correspondiente a la posición actual (el valor)
    public function current() : mixed
    { 

        return $this->_fibonacci;
    } 
     
    //devuelve la clave correspondiente a la posicion actual (la clave)
    public function key() : mixed
    { 
        return $this->_claveActual;
    } 
     
    //mueve el puntero a la siguiente posicion 
    public function next() : void
    { 

        $this->_fib0 = $this->_fib1;
        $this->_fib1 = $this->_fibonacci;

        $this -> _fibonacci = $this->_fib0 + $this->_fib1;

        $this->_claveActual++; 
    } 
     
    //comprueba si la posición actual es valida 
    public function valid() : bool
    { 
        return($this->_claveActual <= $this->_limite); 
    } 

    public static function fFibonacci(int $ultimo) {

        $fib0 = 0;
        $fib1 = 1;

        $fibonacci = 0;

        for ($cont = 0; $cont <= $ultimo; $cont++) {

            $fib0 = $fib1;
            $fib1 = $fibonacci;

            yield $fibonacci; //devuelve un objeto de tipo generador que se puede recorrer

            $fibonacci = $fib0 + $fib1;

            
        }
    }
}