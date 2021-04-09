<?php
    /* Performing Basic Maths operation whereby two numbers are given
    # * --- Multiplication
      + --- Addition
      / --- Division
      % --- Modulus 
      - --- Subtraction
    */

    //Multiplication
    function multiply($num1, $num2){
          return $num1 * $num2;
    }

   echo (multiply(2,3)). "<br>";
//adition
   function addition($a, $b){
        return $a + $b;
   }

   echo (addition(2,3)). "<br>";

   #division

   function division($a, $b){
     return $a / $b;
}

echo (division(2,3)). "<br>";

//Subtraction Operation
function minus($a, $b){
     return $a - $b;
}

echo (minus(2,3)). "<br>";

//Modulus Operation
function Modulus($a, $b){
     return $a % $b;
}

echo (Modulus(8, 3)). "<br>";
?>