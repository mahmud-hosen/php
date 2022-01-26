<?php

    /*  PHP has three different variable scopes:
          local
          global
          static   
    */
   //__________________________  1)Global  ________________________________
   // A variable declared outside a function has a GLOBAL SCOPE  and can only be accessed outside a function:

$x = 5; // global scope

function myTest() {
  // using x inside this function will generate an error
  echo "<p>Variable x inside function is: $x</p>";
}
myTest();

echo "<p>Variable x outside function is: $x</p>";

//____________________________  2)  local scope ___________________________
// A variable declared within a function has a LOCAL SCOPE and can only be accessed within that function:
    
function myTest2() {
    $Y = 5; // local scope
    echo "<p>Variable x inside function is: $Y</p>";
  }
  myTest2();
  
  // using x outside the function will generate an error
  echo "<p>Variable x outside function is: $Y</p>";
  

  //_____________________________ Global Keyword ___________________

  
//The global keyword is used to access a global variable from within a function.

//To do this, use the global keyword before the variables (inside the function):
   
    $k = 5;
    $l = 10;

function myTest3() {
  global $k, $l;
  $k = $k + $l;
}

myTest3();
echo $k; // outputs 15

?>