<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas básicas");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>esto es html <!-- esto es un comentario -->

    <?php 
        echo "dnkfnekaaaa"; //esto es un comentario;


        $var1 = 25;
        $cadena = 'esto es una cadena';

        $var1 += 0b1000;
        echo $var1;

        $una_cadena = "hola";
        $unaCadena = "adiós";

        $var1 -= 17;
        echo "$var1";

        $unaCadena = 45;
        echo $unaCadena;

        if (isset($cadena2)) {
            echo $cadena2;
        }

        


        
    ?>
    
<?php
}
