<?php

class MathCalculator{
    static $number;
    static function fibonacci($n)
    {
        // Way to static property access -> Use self::$propertyName
        self::$number = $n;
        echo self::$number." is fibonacci number. \n";

        //Static method call
        self::doSomething();

    }
     function factorial($n)
    {
        //Here two way we can call doSomething cause factorial has object
        self::doSomething();
        //or 
        $this->doSomething();
        
    }
    static function doSomething()
    { 
        echo "Doing somethings..\n";
    }

}

/*  
MathCalculator::fibonacci(4) Here MathCalculator is class & fibonacci is method
We can access method without create object of a class if that method will be static.
*/
MathCalculator::fibonacci(4);

// Object Create
$m = new MathCalculator();
$m->factorial(30);

// Static property print using without ceate object
echo MathCalculator::$number;




?>