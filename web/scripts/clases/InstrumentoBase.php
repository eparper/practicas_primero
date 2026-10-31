<?php
/**
 * Clase abstracta InstrumentoBase de la que heredarán las siguientes clases
 */
abstract class InstrumentoBase {

    //propiedades de instancia
    private string $_descripcion;
    protected int $_edad = 10;
    protected int $_ordenCreacion;

    //propiedad de clase
    protected static int $_contadorElementos = 0;
    

    /**
     * Constructor público
     *
     * @param string $desc Se le pasa una descripción del instrumento
     * @param integer $ed Se le pasa la edad del instrumento, por defecto es 10
     */
    public function __construct(string $desc, int $ed = 10)
    {
        $this -> _descripcion = $desc;
        $this -> _edad = $ed;

        self::$_contadorElementos++;

        $this->_ordenCreacion = self::$_contadorElementos;

    }

    /**
     * Método get de descripción para obtener la descripción de un Instrumento
     *
     * @return string Se devuelve la descripción del instrumento
     */
    public function getDescripcion():string {
        return $this -> _descripcion;
    }

    /**
     * Método set para modificar la descripción del instrumento
     *
     * @param string $paramDescripcion Se le pasa una descripción para modificar la anterior
     * @return void No devuelve nada, solo modifica
     */
    public function setDescripcion(string $paramDescripcion):void {
        $this -> _descripcion = $paramDescripcion;
    }

    /**
     * Método get para obtener la edad del instrumento
     *
     * @return integer Devuelve la edad del instrumento.
     */
    public function getEdad() : int {
        return $this -> _edad;
    }

    /**
     * Método abstracto que devuelve el sonido del instrumento en las clases heredadas
     *
     * @return string Devuelve el sonido del instrumento
     */
    abstract public function sonido():string;

    /**
     * Devuelve los pasos para afinar el instrumento
     *
     * @return string Devuelve los pasos para afinar el instrumento
     */
    abstract public function afinar():string;

    /**
     * Cuando se llama a este método, se aumenta un año la edad
     * del instrumento
     *
     * @return void No devuelve nada.
     */
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



    /**
     * Método toString para devolver la cadena del objeto
     *
     * @return string Devuelve una cadena explicando el objeto
     */
    public function __toString():string {
        return "Instrumento con descripción " . $this->getDescripcion() . ", instancia 
                " . $this->_ordenCreacion . " de un total de " . self::$_contadorElementos . 
                ". Tiene " . $this->getEdad() . 
                " años. La clase es " . get_class($this);
    }

   
}