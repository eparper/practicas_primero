<?php

const MIA = 56;

/**
 * Función que devuelve un número
 * Si el número es menor de 10 se dará un error
 *
 * @param integer $num Número al que aplicar el doble
 * @return integer|false Devuelve el doble del argumento o false en caso de error
 */
function doble(int $num): int|false 
{ 
   //$num es menor de 10, consideramos que hay un error 
   if ($num < 10) 
      return false; 
  
   return 2 * $num; 
} 


function variosParametros(int $par1, string $par2 = "", float $par3 = 10.0) : int|float {

   static $cadena = "";
   $cadena .= $par2;

   //así no tendríamos el warning
   if (is_integer($par2)) {
      $par2 = intval($par2);
   }
   else {
      $par2 = 0;
   }

   //es lo mismo que lo de arriba
   $par2 = is_integer($par2)?intval($par2):0;

   //la cadena funciona porque se convierte a número de forma implícita o si encuentra 
   //un número en la cadena también
   $par3 += $par1 + $par2;
   return $par3;
}


function suma(float $a, float $b, float ...$resto): float
{
   $res = $a + $b;

   foreach ($resto as $num)
      $res += $num;

   return $res;
}


//forma que ya no se usa
// function suma1(float $a, float $b, float ...$resto): float
// {
//    $res = 0;
//    for ($i = 0; $i < func_num_args(); $i++) {
//       $res += func_get_arg($i);
//    }

//    return $res;
// }