<?php

// Need to implement of body in child class for abstract class
// Need to extends abstract function , do not initialize abstract function

abstract class Shape{
    abstract function getArea();
    abstract function getPerimeter();
}

class Rectangle extends Shape{
    private $base, $height;

    function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }

    public function setBase($base)
    {
        $this->base = $base;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getArea()
    {
        return $this->base * $this->height;
    }

    function getPerimeter()
    {

    }
}

class Triangle extends Shape
{
     public function getArea()
    {
        return $this->base * $this->height;
    }

    function getPerimeter()
    {

    }
}

$r = new Rectangle(10,20);
echo $r->getArea();


?>