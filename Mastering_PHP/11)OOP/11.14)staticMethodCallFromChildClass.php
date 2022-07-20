<?php

/*
Note: If parent class method is  static & we do extends method then child class
      method will be must static 
*/
class A{
    static function sayHi(){
        echo "Hi From A \n";
    }
}

class B extends A{

    //Child class will be must static cause parent method sayHi static
    static function sayHi(){
        echo "Hi From A \n";

        // Static parent method call from child
        parent::sayHi();
    }
}

B::sayHi();


?>