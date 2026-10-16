<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Relación 2",
        "url" => "/aplicacion/relacion2/index.php"
    ],
    [
        "nombre" => "Ejercicio 2",
        
    ]
    
];

//*************************EJERCICIO 2****************************


//array que le paso a la función cuerpo con todas las variables necesarias:
$arrayParams = [
    
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1", $barraUbicacion);
cuerpo($arrayParams);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!-- ESTO VA EN EL HEAD -->
    <?php
}

//vista
function cuerpo($arrayParams)
{
?>
    <br><br>
    <h1>Ejercicio 1</h1>
    <p style="text-align: justify;">
        2.- Dada la cadena "Está la niña en casa" se pide: - Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me 
        indica la posición del carácter mostrado.  (quedaría algo así) 
        NOTA: prueba si puedes hacerlo con [] para obtener los caracteres correctos. Prueba si 
        puedes hacerlo con substr para obtener los caracteres correctos. Prueba si puedes 
        hacerlo con mb_substr para obtener los caracteres correctos. Comenta las formas no 
        válidas para que pueda comprobar que lo has hecho. 
        
        E 
        s 
        t 
        á 
            
            l 
            a 
                
                n 
                i 
                ñ 
                a 
                    
                    e 
                    n 
                        
                        c 
                        a 
        - 
        s 
        a 
        Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena) 
        con cada carácter en una línea distinta y con los espacios en blanco 
        correspondientes (desde 0 hasta n espacios en blanco), los caracteres pares en 
        mayúscula (0, 2, …) y los impares en minúscula (1, 3, 5, …), y extrayendo los - - 
        caracteres con mb_substr. 
        Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea 
        distinta 
        Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el 
        espacio en blanco) por "/mujer "
    </p><br><br>


<?php
            

}
