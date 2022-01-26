<?php

//private the property or method can ONLY be accessed within the class
// We can not access any private or protected  class or property using create object.
//We can access private or protected  class or property using create function or method.


class user{
    private $name = "jamal";
    public $age = "40";

    function display(){
        echo $this->name;
        // $this->test();
    }

    private function test(){
        echo "Kamal"."<br>";
    }
}

class student extends user{
    function set(){
        $this->name="Habib";
    }
    
}

$user_obj = new user();
$student_obj = new student();

$student_obj->set();




$student_obj->display();


echo $user_obj->age."<br>";

$user_obj->display();




?>