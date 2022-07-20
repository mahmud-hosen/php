<?php

class Car{
    public $name;

    function __construct($name)
    {
        $this->name = $name;

    }
}

$c1 = new Car('BMW');
$c2 = new Car('BMW');

// It is not clone just exchange referance 
$c3 = $c2;

// Object value check
if($c1 == $c2)
{
    echo "Similar\n";
}else{
    echo "Not Similar\n";
}

// Object type check | c1 & c2 fully diffrent obj but there value same
if($c1 === $c2)
{
    echo "Similar\n";
}else{
    echo "Not Similar\n";
}






?>