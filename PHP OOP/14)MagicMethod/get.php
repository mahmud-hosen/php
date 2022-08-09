<?php
//........................  Magic Method ...................
class Animal{
    private $color = "Red";
    private $size = 30;

    public function __get($propertyName){
        return $this->$propertyName;
    }
    


}



$a1 = new Animal('Red','25');
echo $a1->color;
echo "\n";
echo $a1->size;
$a1->color = "Green";




?>