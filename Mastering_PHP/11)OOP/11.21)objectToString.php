<?php

class Color{
    public $color;
    function __construct($color){
        $this->color = $color;
    }
    function setColor($color){
        $this->color = $color;
    }

    // It magic method convert object to string & auto call 
    function __toString(){
        return "The color is {$this->color}";
    
    }
}

$c = new Color('White');

/*
Object print <-- It is possible if we convert object to string using magic 
method __toString() .
*/
echo $c;




?>