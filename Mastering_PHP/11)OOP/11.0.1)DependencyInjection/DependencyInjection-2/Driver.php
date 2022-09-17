<?php

class Driver
{
    protected $vehicle;

 public function __construct(VehicleInterface $vehicle)
 {
    $this->vehicle = $vehicle;
 }
 public function startVehicle()
 {
    $this->vehicle->start();
 }


}

class Bike implements VehicleInterface
{
    public function start()
    {
        echo "Bike Start";
    }
}

class Car implements VehicleInterface
{
    public function start()
    {
        echo "Car Start";
    }
}

interface VehicleInterface
{
    public function start();
}


class Engine
{
    //
}

$bike = new Bike();
$car = new Car();
$driver = new Driver($bike);

$driver->startVehicle();



?>