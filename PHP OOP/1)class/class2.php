<?php

class home{

    // Global variable light,fan,tv
    public $light;
    public $fan;
    public $tv;

    public $ac = "LG";

    function set_name($fan,$tv){
        //local variable fan,tv
        //We can accesss global  variable using this keyword
        $this->fan = $fan;
        $this->tv = $tv;
    }
     function set_name2(string $fan, string $tv){
        $this->fan = $fan;
        $this->tv = $tv;

    }


    function display_name(){
        echo $this->fan;
        echo $this->tv;
    }

     function display_name2(){
        echo $this->fan;
        echo $this->tv;
    }
}

// Home Obj -1
$home_obj = new home();

$home_obj->light="LED";
echo $home_obj->light."<br>";

$home_obj->set_name("walton","Samsung");
$home_obj->display_name();

echo "<br>";
//Home Obj -2

$home_obj2 = new home();
$home_obj2->set_name2("Natonal","Mi");
$home_obj2->display_name2();

?>