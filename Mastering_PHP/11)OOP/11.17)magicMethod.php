<?php

class Student{
    private $name;
    private $age;
    private $class;

    function __construct($name='', $age='', $class=''){
        $this->name = $name;
        $this->age = $age;
        $this->class = $class;

    }

    // Get & Set method for property
    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->name = $name;
    }

    function getAge(){
        return $this->age;
    }
    function setAge($age){
        $this->age = $age;
    }

    function getClass(){
        return $this->class;
    }
    function setClass($class){
        $this->class = $class;
    }

}

$s = new Student();

// If we want to access private property use get(For get value) and set(For set value) method.
$s->setName("Jama");
echo $s->getName();

//........................  Magic Method ...................
class Animal{
    private $color;
    private $size;

    function __construct($color='', $size=''){
        $this->color = $color;
        $this->size = $size;
    }

    public function __get($prop){
        return $this->$prop;
    }
     public function __set($prop, $value){
        $this->$prop = $value;
    }


}



$a1 = new Animal('Red','25');
echo $a1->color;

$a2 = new Animal('Green','35');
echo $a2->color;

/*
Use Magic Method ---> When we want to access private property from out class
we need use get and set method for private property . But Other way to access
 magic method __get() , __set() it call private property without get and set property

*/
$a3 = new Animal();
$a3->color = "White";
$a3->size = "44";

echo $a3->color;
echo $a3->size;




?>