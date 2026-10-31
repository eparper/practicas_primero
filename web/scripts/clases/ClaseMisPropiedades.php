<?php

class ClaseMisPropiedades implements Iterator {

    private array $_propiedades = array();

    public mixed $propPublica;
    private mixed $_propPrivada = 25;

    private int $_claveActual;

    private array $_claves = [];


    
    //se llamará de forma automática cuando se lea 
    //una propiedad y no sea visible. 
    public function __get(string $nombre)
    {
        if (isset($this->_propiedades[$nombre]))
            return $this->_propiedades[$nombre];
        else
            //si no existe lanza una excepción 
            throw new Exception("No existe la propiedad $nombre");
    }

    //se llamará de forma automática cuando se escriba 
    //una propiedad y no sea visible 
    public function __set(string $nombre, mixed $valor)
    {
        //puede filtrar que propiedades están o no disponibles 
        //no permito propiedades cuyo nombre sea _propPrivada
        if ($nombre == "_propPrivada")
            throw new Exception("No se puede escribir el valor a la propiedad $nombre.");

        //creo/actualizo la variable dinámica. 
        $this->_propiedades[$nombre] = $valor;
    }
    //se llamará automáticamente al ejecutar isset o 
    //empty 
    public function __isset(string $nombre): bool
    {
        return (isset($this->_propiedades[$nombre]));
    }

    //se llamará automáticamente al ejecutar 
    //unset 
    public function __unset(string $nombre)
    {
        unset($this->_propiedades[$nombre]);
    }

    /***************************************************** */
    /**************************ITERATOR******************* */
    /***************************************************** */


    //pone el puntero al valor inicial 
    public function rewind() : void
    { 
        $this->_claveActual = 0; 
        //al principio del bucle guardamos las claves del array propiedades
        $this->_claves = array_keys($this->_propiedades);
        //al final, guardamos las otras dos claves en el array de claves
        $this->_claves[] = "propPublica";
        $this->_claves[] = "_propPrivada";
        
    } 
     
    //devuelve el contenido correspondiente a la posición actual (el valor)
    public function current() : mixed
    { 
        
        $clave = $this->_claves[$this->_claveActual];

        if ($clave == "propPublica") {
            return $this -> propPublica;
        }

        if ($clave == "_propPrivada") {
            return $this -> _propPrivada;
        }


        return $this->_propiedades[$clave];
    } 
     
    //devuelve la clave correspondiente a la posicion actual (la clave)
    public function key() : mixed
    { 
    
        $clave = $this->_claves[$this->_claveActual];
        return "oi_".$clave;
    } 
     
    //mueve el puntero a la siguiente posicion 
    public function next() : void
    {
        
        $this->_claveActual++; 
    } 
     
    //comprueba si la posición actual es valida 
    public function valid() : bool
    { 
        //no se pone = al comparar porque claveActual solo llegaría 0,1,2,3, no llega al 4
        return($this->_claveActual < count($this->_claves));  //le sumamos las dos propiedades privada y publica
    }
}