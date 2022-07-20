<?php

/*
If you create a __construct() function, PHP will automatically call this 
function when you create an object for that class.
*/

// Without Constructor
class cars{
    public $name="kamal";
    public $age;
    public $id;

    function info(){
       echo $this->name;
    }
}

$obj = new cars();
$obj->info();

// Constructor

class person{
    public $name="kamal";
    public $age;
    public $id;

 function __construct($a,$b){
      echo $a+$b;
    }

}

$person1 = new person();


//echo $person1->info();






?>