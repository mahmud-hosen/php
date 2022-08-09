<?php

namespace Project;

include 'c1.php';
include 'c2.php';

// Class LES Cause method name same Like Bike()
use \Project\Motorcycles\Bike as Sojoki;

$b = new Bike();
$b->getName();

$s = new Sojoki();
$s->getName();


?>