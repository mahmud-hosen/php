<?php

class Teacher{
    function Display()
    {
       echo "I am teacher";
    }
}

class Student{
    function Display()
    {
       echo "I am Student";
    }
}
// Check class found or not
if(class_exists("Teacher")){
    $t = new Teacher();
    
    // Method found or not
    if(method_exists($t, 'Display')){
    $t->Display();
    }else{
        echo "Method not found";
    }
}else{
    echo "Class not found.";
}