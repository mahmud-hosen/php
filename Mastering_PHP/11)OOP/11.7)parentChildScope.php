<?php

class ParentClass{

    function __construct()
    {
        $this->sayHi();
    }

    function sayHi()
    {
        echo "Hi.. I am calling from child class.\n\n";
    }
}

class ChildClass extends ParentClass
{
    function sayHi()
    {
        // Calling parent class method from child class .
        parent::sayHi();

        echo "Hello.. I am calling from parent class. \n";
    }
}

$c = new ChildClass();


?>