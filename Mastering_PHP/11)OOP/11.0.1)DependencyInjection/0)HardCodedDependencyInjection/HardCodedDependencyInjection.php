<?php

class Driver
{
    protected $vehicle;

 public function __constructor()
 {
    $engine = new Engine();
    $this->vehicle = new Vehicle($engine);
 }
}

class Vehicle
{
    protected $engine;
    public function __constructor($engine)
    {
        $this->engine = $engine;
    }

}

class Engine
{
    //
}


$driver = new Driver();



?>