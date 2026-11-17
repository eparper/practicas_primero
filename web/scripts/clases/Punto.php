<?php

class Punto {

    //CONSTANTES PÚBLICAS DE CLASE
    public const COLORES = [
        "black" => [
            "nombre" => "negro",
            "rgb" => [0, 0, 0]
        ],
        "red" => [
            "nombre" => "rojo",
            "rgb" => [255, 0, 0]
        ],
        "green" => [
            "nombre" => "verde",
            "rgb" => [0, 255, 0]
        ],
        "blue" => [
            "nombre" => "negro",
            "rgb" => [0, 0, 255]
        ]
    ];

    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso"
    ];
}