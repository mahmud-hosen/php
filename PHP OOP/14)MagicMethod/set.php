<?php
//........................  Magic Method ...................
class Animal{
    private $color = "Red";
    private $size = 30;

    public function __get($propertyName){
        echo $this->$propertyName."\n";
    }
    public function __set($propertyName, $value){
        $this->$propertyName = $value;
    }
}


$a1 = new Animal();
$a1->color;
$a1->size;

$a1->color = "Green";
$a1->color;




?>