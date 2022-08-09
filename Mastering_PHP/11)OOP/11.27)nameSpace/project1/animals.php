<?php
/*
1)namespace is one kind of group system . Like cat, dog, man is animal so 
cat, dog, will be same group .
2) namespace will be declare top line of page.
*/

include 'cat.php';
include 'dog.php';

// One way : use Animals\Cat; mean Cat class has Animals namespacce
use Animals\Cat;

// Use Cat() method 
$cat = new Cat();
$cat->greet();

// If we not use --> use Animals\Dog; in top page then we need to use as bellow

$dog = new Animals\Dog();
$dog->greet();




?>