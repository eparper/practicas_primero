<?php

/**
 * Clase con sobrecarga dinámica que implementa Iterator, 
 * vamos añadiendo propiedades con la sobrecarga y luego se 
 * pueden iterar en un foreach
 */
class ClaseMisPropiedades implements Iterator {

    private array $_propiedades = array();

    public mixed $propPublica;
    private mixed $_propPrivada = 25;

    //propiedades para iterar
    private int $_claveActual;
    private array $_claves = [];


    
     
    /**
     * Método mágico get: se llamará de forma automática cuando se lea 
     * una propiedad y no sea visible.
     *
     * @param string $nombre Nombre que se usa para leer la propiedad sobrecargada
     * @return void No devuelve nada porque le que hace es leer la propiedad.
     */
    public function __get(string $nombre)
    {
        if (isset($this->_propiedades[$nombre]))
            return $this->_propiedades[$nombre];
        else
            //si no existe lanza una excepción 
            throw new Exception("No existe la propiedad $nombre");
    }

    /**
     * Método mágico set: se llamará de forma automática cuando se escriba 
     * una propiedad y no sea visible 
     *
     * @param string $nombre Nombre de la propiedad a modificar
     * @param mixed $valor Valor para que se modifique la propiedad
     */
    public function __set(string $nombre, mixed $valor)
    {
        //puede filtrar que propiedades están o no disponibles 
        //no permito propiedades cuyo nombre sea _propPrivada
        if ($nombre == "_propPrivada")
            throw new Exception("No se puede escribir el valor a la propiedad $nombre.");

        //creo/actualizo la variable dinámica. 
        $this->_propiedades[$nombre] = $valor;
    }
    
    
    /**
     * Método mágico isset: se llamará automáticamente al 
     * ejecutar isset o empty
     *
     * @param string $nombre Nombre de la propiedad a comprobar si existe
     * @return boolean Devuelve true si existe o false si no.
     */
    public function __isset(string $nombre): bool
    {
        return (isset($this->_propiedades[$nombre]));
    }

    

    /**
     * Método mágico unset: se llamará automáticamente al ejecutar unset 
     * Elimina la propiedad
     *
     * @param string $nombre Nombre de la propiedad a eliminar.
     */
    public function __unset(string $nombre)
    {
        unset($this->_propiedades[$nombre]);
    }

    /***************************************************** */
    //----------------ITERATOR---------------------------- */
    /***************************************************** */


    /**
     * Pone el puntero al valor inicial
     *
     * @return void No devuelve nada
     */
    public function rewind() : void
    { 
        $this->_claveActual = 0; 
        //al principio del bucle guardamos las claves del array propiedades
        $this->_claves = array_keys($this->_propiedades);
        //al final, guardamos las otras dos claves en el array de claves
        $this->_claves[] = "propPublica";
        $this->_claves[] = "_propPrivada";
        
    } 
     
    
    /**
     * Devuelve el contenido correspondiente a la posición actual (el valor)
     * 
     * @return mixed Devuelve el contenido o valor
     */
    public function current() : mixed
    { 
        
        $clave = $this->_claves[$this->_claveActual];

        //Estas propiedades no están en el array propiedades, entonces ponemos 
        //los valores a mano
        if ($clave == "propPublica") {
            return $this -> propPublica;
        }

        if ($clave == "_propPrivada") {
            return $this -> _propPrivada;
        }


        return $this->_propiedades[$clave];
    } 
     
    
    /**
     * Devuelve la clave correspondiente a la posicion actual (la clave)
     *
     * @return mixed Devuelve la clave
     */
    public function key() : mixed
    { 
    
        $clave = $this->_claves[$this->_claveActual];
        //le añadimos el comportamiento para que todas las claves empiecen por oi_
        return "oi_".$clave;
    } 
     
    
    /**
     * Mueve el puntero a la siguiente posicion
     *
     * @return void No devuelve nada
     */
    public function next() : void
    {
        
        $this->_claveActual++; 
    } 
     
    

    /**
     * Comprueba si la posición actual es valida 
     *
     * @return boolean Devuelve true si es válida la claveActual o false si no lo es
     */
    public function valid() : bool
    { 
        //no se pone = al comparar porque claveActual solo llegaría 0,1,2,3, no llega al 4
        return($this->_claveActual < count($this->_claves));  //le sumamos las dos propiedades privada y publica
    }
}