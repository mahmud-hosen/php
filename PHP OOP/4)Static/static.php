<?php

class Cars{
    static $name="BMW";
    static $price="3000000";

    function toyota(){
       $toyota_price = Cars::$price;
       return $toyota_price;
    }
}

// Cars class property name & price static .So We doesn't need Cars object to access Cars class property.
echo Cars::$name.'</br>';

// Use static .So without object create We can access Cars property.
echo Cars::toyota();



?>