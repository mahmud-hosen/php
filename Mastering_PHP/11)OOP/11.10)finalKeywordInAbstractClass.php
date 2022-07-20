<?php
abstract class OurClass{
    //
    final function doSomething()
    {
        echo "Doing Somethings...";
    }
}

class MyClass extends OurClass{
    
}

$mc = new MyClass();
$mc->doSomething();
?>