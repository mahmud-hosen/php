<?php

class people{
    function __construct(){
        echo "I was auto called."."<br>";
    }

    function __destruct(){
        echo "All work done";
    }

     function display(){
        echo "I am second activity"."<br>";
    }

    
}
 $p = new people();
 $p->display();



?>