<?php

/**
 * Constructor Overriding mean already a constructor has parent class
 * child class can extend it .
 * */ 
 
 class user{
    
    public $name;
    public $age;
    
    public function __construct(string $name, int $age){
        $this->name = $name;
        $this->age  = $age;
    }

    public function display(){
        echo "My name is ".$this->name."<br>";
        echo "Age is ".$this->age."<br>";
        
    }
}

class student extends user{
    public $id;

    public function __construct(string $name, int $age, int $id){
        
        parent::__construct($name , $age);
        $this->id   = $id;
    }

     public function display(){
         
        parent::display();
        echo "ID is ".$this->id."<br>";

        
    }

    
    
    
}

$user_obj = new user("Janmal",25);
$user_obj->display();

$student_obj = new student("Kamal",20,1001);
$student_obj->display();



?>