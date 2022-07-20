<?php

class Animal{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function eat()
    {
        echo "$this->name is eating.\n";
    }

    public function run()
    {
        echo "$this->name is running.\n";
    }

    public function sleep()
    {
        echo "$this->name is sleeping.\n\n";
    }
}

class Human extends Animal
{

}

class Cat extends Animal
{
    public function greet()
    {
        echo "$this->name says meow... meow...\n";
    }
    
}

class Dog extends Animal
{
    public function greet()
    {
        echo "$this->name says huff... huff... \n";
    }
    
}

$h1 = new Human("Jamal");
$h1->eat();
$h1->run();
$h1->sleep();

$c1 = new Cat("Tom");
$c1->eat();
$c1->run();
$c1->sleep();
$c1->greet();


$d1 = new Dog("Jerry");
$d1->eat();
$d1->run();
$d1->sleep();
$d1->greet();






?>