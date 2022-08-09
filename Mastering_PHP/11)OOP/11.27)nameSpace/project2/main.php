<?php
namespace Astronomy;
include 'planet.php';

$planet = new \Astronomy\Planet();
$planet->getName();

/* Php Buildin function use: 
This file has namespace that name is Astronomy ---> (namespace Astronomy;)
When we use namespace then if we want to access php buildin function like 
DateTime() must use qualified name( backslash) -->'\'. 
Same as bellow $time = new \DateTime();
*/
$time = new \DateTime();

?>