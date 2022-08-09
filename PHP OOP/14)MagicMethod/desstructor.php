<?php

class people{
   
    function __destruct(){
        echo "All work done";
    }
    
    function __construct(){
        echo "I was auto called.\n ";
    }

     function display(){
        echo "I am second activity\n ";
    }

    
}
 $p = new people();
 $p->display();



?>