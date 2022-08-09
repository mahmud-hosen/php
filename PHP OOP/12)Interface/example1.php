<?php

interface BaseAnimal{
    function CanEat();
}
class Animal implements BaseAnimal{
    function CanEat()
    {
        echo "Animal can eat"; 
    }
}
interface BaseHuman extends BaseAnimal{
    function CanTalk();
}
class Human implements BaseHuman{
    function CanEat(){  echo "Hunam can eat";   }
    function CanTalk(){ echo "Human can talk"; }
}
$b= new BaseAnimal();
$h = new Human();
$h->CanEat();

// $b = new BaseHuman();


?>