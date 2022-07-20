<?php

class A{

    private static $name;
    protected static $age;

    static function sayHi(){
        echo "Hi From A \n";
        self::$name = "Mahmud";
        self::$age = 23;

    }
}

class B extends A{

    static function sayHi(){
        echo "Hi From A \n";

        //If we want access $name property from parent class scope will be protected Like $age property cause private property can not extends 
        //echo parent::$name;

        echo parent::$age;



    }
}

B::sayHi();

// Can not access private property out side that class
//echo B::$name;


?>