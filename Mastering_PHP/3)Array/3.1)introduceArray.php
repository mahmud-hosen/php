<?php
// Index Array
$student1 = ["Moly","habib","jamil"];
$student2 = array(
    "Habib",
    "Monir",
    "Moly"
);

var_dump($student1);
printf($student2[2]);

// Array Malipulation
echo "\n\n____Array Malipulation _____";

// Array value change by index
$student1[0] = "Mahadi";
var_dump($student1);

//Array Last element remove
printf(array_pop($student1));
var_dump($student1);

// https://www.php.net/array_shift
// array_Shift()  Remove from 1st element in array,
// array_pop()    Remove from last element in array, 
// array_push()   Insert data in array Last position
// array_unshift  Insert data in array 1st position





?>