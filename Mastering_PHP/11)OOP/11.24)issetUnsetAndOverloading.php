<?php

class MotorCycle{

    private $parameters;

    function __construct($displacement, $capacity, $mileage)
    {
        $this->parameters = [];

        $this->parameters['displacement'] = $displacement;
        $this->parameters['capacity'] = $capacity;
        $this->parameters['mileage'] = $mileage;
 
    }

    // Private method access using get and set method 
    function getDisplacement()
    {
        return $this->parameters['displacement'];
    }
    function setDisplacement($displacement)
    {
      $this->parameters['displacement'] = $displacement;  
    }

    //Or
    // Private property access using magic method __get() & __set()
    function __get($name)
    {
        echo "\n";
        echo $this->parameters[$name]; // mean  $this->displacement;
        echo "\n";

    }
    function __set($name, $value)
    {
        $this->parameters[$name] = $value;
    }
    // __isset() Method
    function __isset($name){
        if(!isset($this->parameters[$name])){
            echo "{$name} not found\n";
            return false;
        }else{
            return true;
        }
    }
    
      // __unset() method
    function __unset($name){
        // Before removeing print
        print_r($this->parameters);
       
        // unset() <-- Remove property name Like mileage
        unset($this->parameters[$name]);

        // After removing print
        print_r($this->parameters);
    }

    // Calling method check and arguments pass
    function __call($name, $arguments){
        if('run' == $name){
            echo "True , Match to call method name. Arguments is {$arguments[0]},{$arguments[1]}";
        }else{
            echo "False, Not match to call method name";
        }
    }
}

$pulsar = new MotorCycle('200CC','15lt','40km');
// echo $pulsar->getDisplacement();
echo $pulsar->displacement;
echo $pulsar->capacity;

// Value set using __set() auto find parametre name and set value
$pulsar->displacement = "250cc";
echo $pulsar->displacement;

// isset method for check, It return true or false
if(isset($pulsar->tiresize)){
    echo $pulsar->tiresize;
}else{
    echo "\n";
    echo "Not Found\n";
}

// It remove mileage property & auto called __unset($name) method
unset($pulsar->mileage);

// Auto called __call() method 
$pulsar->run('Kamal','Jamal');





?>