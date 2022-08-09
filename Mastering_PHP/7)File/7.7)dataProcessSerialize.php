<?php

$fileName = "C:/xampp/htdocs/PHP/Mastering_PHP/7)File/file3.txt";

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

 //  Students data insert convert to serialize from file3 
    $data = serialize($students);
    // print_r($data);
    file_put_contents($fileName, $data,);

 // Students data shows convert to unserialize from file3.txt
    $dataFromFile = file_get_contents($fileName);
    $allStudent = unserialize($dataFromFile);

    // print_r($allStudent);
    //unset($allStudent[1]); // If want to delete array 1

    foreach($allStudent as $student)
    {
        printf("Name: %s Age: %s Roll: %s \n", $student['name'], $student['age'], $student['roll']);

    }
 // New student add with all students
    array_push($allStudent, $newStd);
    $data = serialize($allStudent);
    file_put_contents($fileName, $data,);

