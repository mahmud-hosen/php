<?php

class user{
    public $name;
    public $age;
    public $roll;


    function set(string $name, int $age){
        $this->name = $name;
        $this->age = $age;
    }
    
    function display(){
        echo "My name is ".$this->name."\n";
        echo "My age is ".$this->age."\n";
        echo "My roll is ".$this->roll."\n";

       
        echo "<br>";
    }
}

class student extends user{

    public $roll;
    public function set(string $name, int $age, int $roll =NULL){
        parent::set($name, $age);
        $this->roll = $roll;
    }
    
    
    function display(){
        echo "Student Info\n";
        parent::display();
    }
    
}

class teacher extends user{
     function display(){
        echo "Teacher Info"."<br>";
        parent::display();
    }
    
}

$student_object = new student();
$student_object->set("Mahmud",22,4);
$student_object->display();


$teacher_object = new teacher();
$teacher_object->set("Akter",55);
$teacher_object->display();



?>