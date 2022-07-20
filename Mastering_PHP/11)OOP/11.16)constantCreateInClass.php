<?php

// Constant Create & Constant can not change or override next time if one time declare
//Constant altime object property
// Can not use Like define('NUMBER',182); in side a class , Must be use define('variableName',477) 
define('NUMBER',182);
// Or
const CITY = "Dhaka";

class A{
    //define('NUM',883);    <----- Can not use 
    const NAME = "Mahmud ";  // Use const in side of a class 
    const CITY = "Tangail ";

    function sayHi()
    {
        echo "\n SayHi, From ".self::CITY;
    }
    function message()
    {
        echo "\n Message , From ".$this::CITY;
    }
}

//Can not use a constant property create object that class
    /*
        $a = new A();
        $a->NUMBER;
    */

// Way:1 to access constant property method
 $a = new A();
 echo $a::NAME;
 
 $a->message();


// Way:2 to access constant property , Constant static scope so call process bellow 
 echo A::NAME;
 echo A::sayHi();

 //


 

?>