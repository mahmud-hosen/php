<?php

class A{
    public $name;
}
class B{
    public $name;
}

$obj1 = new A();
$obj2 = new B();

var_dump($obj1 instanceof A);

if($obj1 instanceof A){
    echo " Yes, A obj is obj1.";

}




?>