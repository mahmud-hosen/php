<?php

$fileName = "C:/xampp/htdocs/PHP/Mastering_PHP/7)File/file2.txt";

$students = array(
    array(
        'name' => 'Mahadi',
        'age' => 20,
        'roll' => 3,
    ),
    array(
        'name' => 'Moly',
        'age' => 22,
        'roll' => 4,
    ),
    array(
        'name' => 'Habib',
        'age' => 25,
        'roll' => 5,
    ),

);

$newStd = array(
        'name' => 'Salam',
        'age' => 44,
        'roll' => 20,
);

// Write student info
$fp = fopen($fileName, "w");
foreach($students as $student)
{
    fputcsv($fp, $student);
}

//Read student info
$fp = fopen($fileName,"r");
while( $student = fgetcsv($fp) )
{
    printf("Name: %s Age: %s Roll: %s \n", $student[0], $student[1], $student[2]);

}

// Extra one data insert
$fp = fopen($fileName, "a");
fputcsv($fp, $newStd);
fclose($fp);

//    Delete one data

$data = file($fileName);
unset($data[1]);
// print_r($data);
$fp = fopen($fileName, "w");
foreach($data as $line)
{
    fwrite($fp, $line);
}
fclose($fp);
