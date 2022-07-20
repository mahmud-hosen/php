<?php

$fruits= ['mango','apple','banana','orange','pinaple'];

$fruits1= array_slice($fruits,0,2);
$fruits2= array_slice($fruits,2);

$newFruits = array_merge($fruits1,$fruits2);
print_r($fruits1);
print_r($fruits2);
print_r($newFruits);

// Way to sum
echo "\nTwo array sum:\n";
$fruits3= array_slice($fruits,0,2);
$fruits4= array_slice($fruits,2,null,true);
$newFruits1 = $fruits3+$fruits4;
print_r($fruits3);
print_r($fruits4);
print_r($newFruits1);



?>