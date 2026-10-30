<?php

class InstrumentoViento extends InstrumentoBase {

    protected string $_material = "madera";

    public function __construct(string $mat = "madera", int $edad = 15)
    {   //se puede llamar al constructor de la clase padre 
        parent::__construct("instrumento de viento", $edad);

        $this -> _material = $mat;
    }

    public function sonido(): string {

        return "¡Fuuu-fiii-fuuu!";
    }

    public function afinar() {

        return "1. Calienta el instrumento soplando aire templado.\n" .
               "2. Toca una nota de referencia (usualmente un La).\n" .
               "3. Ajusta la junta de la cabeza: introdúcela si el tono es bajo, o sácatela un poco si el tono es alto.";
    }
}