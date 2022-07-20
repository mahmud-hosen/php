<?php
// Human Class
class Human{

    // Property of human
    public $name;

    // Method of human
    function sayHi(){
        echo "Salam\n";
        $this->sayName();
    }
    function sayName(){
        echo "My name is {$this->name}\n";
    }
}

// h1 is Object of Human
$h1 = new Human();
$h1->name = "Kamal";
$h1->sayHi();

// h2 Object of Human
$h2 = new Human();
$h2->name = "Moly";
$h2->sayHi();

?>