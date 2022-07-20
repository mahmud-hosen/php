<?php

class Human{

    public $name;
    public $age;

    public function __construct($personName,$personAge=0){
        $this->name = $personName;
        $this->age = $personAge;
    }


    function sayInfo(){
        echo "My name is {$this->name} , I am {$this->age} years old.\n\n";
    }

}

$h1 = new Human("Mahmud",23);
$h1->sayInfo();

$h2 = new Human("Moly");
$h2->sayInfo();


?>