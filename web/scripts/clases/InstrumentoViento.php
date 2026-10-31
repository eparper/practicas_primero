<?php
/**
 * Clase InstrumentoViento que hereda de InstrumentoBase, 
 * describe la funcionalidad de un instrumento de viento
 */
class InstrumentoViento extends InstrumentoBase {

    protected string $_material = "madera";

    /**
     * Constructor público que copia el comportamiento de la clase padre
     *
     * @param string $mat Se le pasa el material
     * @param integer $edad Se le pasa la edad
     */
    public function __construct(string $mat = "madera", int $edad = 15)
    {   //se puede llamar al constructor de la clase padre 
        parent::__construct("instrumento de viento", $edad);

        $this -> _material = $mat;
    }

    /**
     * Devuelve el sonido
     *
     * @return string Devuelve la cadena con el sonido
     */
    public function sonido(): string {

        return "¡Fuuu-fiii-fuuu!";
    }

    /**
     * Devuelve los pasos para afinar el instrumento
     *
     * @return string Devuelve la cadena con los pasos
     */
    public final function afinar():string {

        return "1. Calienta el instrumento soplando aire templado.\n" .
               "2. Toca una nota de referencia (usualmente un La).\n" .
               "3. Ajusta la junta de la cabeza: introdúcela si el tono es bajo, o sácatela un poco si el tono es alto.";
    }

    /**
     * Método toString que hace el comportamiento del toString padre y le añade 
     * el material.
     *
     * @return string
     */
    public function __toString(): string
    {
        return parent::__toString() . " Instrumento de material " . $this->_material;
    }
}