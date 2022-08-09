<?php

$fileName = "C:/xampp/htdocs/PHP/Mastering_PHP/7)File/file1.txt";

$students = array(
    array(
        'name' => 'Mahmud',
        'age' => 20,
        'roll' => 3,
    ),
    array(
        'name' => 'Jamal',
        'age' => 22,
        'roll' => 4,
    ),
    array(
        'name' => 'Kamal',
        'age' => 25,
        'roll' => 5,
    ),

);

// Write student info
$fp = fopen($fileName, "w");
foreach($students as $student)
{
    $data = sprintf("%s, %s, %s \n",$student['name'], $student['age'], $student['roll']);
    fwrite($fp, $data);
}

//Read student info
$fp = fopen($fileName,"r");
while( $data = fgets($fp) )
{
    $student = explode(",", $data);
    printf("Name: %s Age: %s Roll: %s \n", $student[0], $student[1], $student[2]);

}

fclose($fp);