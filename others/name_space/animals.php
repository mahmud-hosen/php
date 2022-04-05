<?php
include_once "cat.php";
include_once "dog.php";

use Animals\Cat;

$cat = new Cat();
$cat->greet();

$dog = new Dog();
$dog->greet();

?>