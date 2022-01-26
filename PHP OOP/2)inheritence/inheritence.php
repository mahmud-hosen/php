<?php

//Inheritence

class flower{
    public $color="Red";
    public $size = "100D";
}

// All property of flower extend rose
class rose extends flower{
    public $name="Rose";
}

// Flower Object Create
 $flower_obj = new flower();
 echo "My class name is flower. Size=".$flower_obj->size.'</br>';
 
 //Rose Object Create 
 $rose_obj = new rose();
 echo "My class name rose .I came from flower.Color: ".$rose_obj->color;

?>