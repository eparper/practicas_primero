<?php 
/**
 * Interfaz IFabricable con dos métodos para que otras
 * clases la implementen
 */
interface IFabricable {

    /**
     * Método que devuelve cómo se fabrica un instrumento
     *
     * @return string Devuelve la explicación de cómo se fabrica el instrumento
     */
    public function metodoFabricacion(): string;

    /**
     * Método que devuelve cómo se recicla un instrumento
     *
     * @return string Devuelve la explicación de cómo reciclar el instrumento.
     */
    public function metodoReciclado(): string;

}