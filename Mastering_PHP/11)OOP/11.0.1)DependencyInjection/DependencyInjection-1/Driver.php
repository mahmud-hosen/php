<?php

class Driver
{
    protected $vehicle;

 public function __constructor(Vehicle $vehicle)
 {
    $this->vehicle = $vehicle;
 }
}

class Vehicle
{
    protected $engine;
    public function __constructor(Engine $engine)
    {
        $this->engine = $engine;
    }

}

class Engine
{
    //
}

$engine = new Engine();
$vehicle = new Vehicle($engine);
$driver = new Driver($vehicle);



?>