<?php

interface BaseAnimal{

    //Here do not create body for interface
    function isAlive();
    function canEat($param1, $param2);
    function breed();
}

//How to use interface , Must be implements body
class Animal implements BaseAnimal{
    function isAlive()
    {
        //body 
    }
    function canEat($param1, $param2)
    {
        //body 
    }
    function breed()
    {
        //body 
    }
}

// One interface can extends other interface but class can not extends one interface
interface BaseHuman extends BaseAnimal{
    function canTalk();

}

class Human implements BaseHuman{
    function isAlive(){}
    function canEat($param1, $param2){}
    function breed(){}
    function canTalk(){}
}

// Human carry 2 type (BaseHuman & BaseAnimal) it call polymorphism
$h = new Human();
echo $h instanceof Animal;


?>