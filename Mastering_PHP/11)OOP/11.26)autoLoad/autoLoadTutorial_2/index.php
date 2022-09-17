<?php

//_________________   require use ________________
// require 'flowers/Jasmin.php';
// require 'flowers/Rose.php';
// require 'fruits/Banana.php';
// require 'fruits/Mango.php';
// require 'fruits/Pinapel.php';

// $rose = new Rose();
// echo $rose->name;


//_________________ autoload use __________________
require 'vendor/autoload.php';

$rose = new Rose();
echo $rose->name;

$somefile = new SomeFiles();
echo $somefile->name;




?>