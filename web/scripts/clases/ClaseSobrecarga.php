<?php

/**
 * Clase sobrecarga con el siguiente comportamiento:
 * - Si la propiedad empieza por m o M la doy por buena
 * - una propiedad sobrecargada siempre tendrá el valor 234
 * 
 * 
 */
class ClaseSobrecarga {

    public int $numero = 10;




    //PARA QUE NO TENGA SOBRECARGA:
    //métodos mágicos para control de la sobrecarga
    public function __set(string $name, mixed $value):void {


        if (mb_substr(mb_strtoupper($name), 0, 1) !== "M")
            throw new \Exception("La propiedad $name no existe");
        
    }

    public function __get(string $name):mixed {

        //si el primer caracter no es m, mayúscula o minúscula 
        //porque lo hemos convertido a mayúscula:
        if (mb_substr(mb_strtoupper($name), 0, 1) !== "M")
            throw new \Exception("La propiedad $name no existe");

        return 234;
    }

    public function __isset(string $name):bool
    {
        //throw new \Exception('Not implemented');
        return (mb_substr(mb_strtoupper($name), 0, 1) !== "M");
    }

    public function __unset(string $name):void
    {
        //throw new \Exception('Not implemented');
    }
}