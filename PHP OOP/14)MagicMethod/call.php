<?php
//........................  Magic Method ...................
class Animal{
    private $color = "Red";

    public function __call($methodName, $value){
        echo "Undefine method call  \n";
        echo "There is no {$methodName} method & argument ".implode(',', $value);

    }
}


$a1 = new Animal();
$a1->Display("Mahmud", 4, 6);
$a1->Display("Mahmud", 4, 6);





?>