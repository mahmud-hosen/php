<?php

class people{
    function __construct(){
        echo "I was auto called."."<br>";
    }
}
 $p = new people();


 class student{
     public $name;
     public $age;

    function __construct(string $name, int $age){
        $this->name = $name;
        $this->age = $age;
    }

    function display(){
        echo $this->name."<br>";
        echo $this->age;
    }
}
 $p = new student("Kamal",30);
 $p->display();


?>