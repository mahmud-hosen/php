<?php

$fileName = "C:/xampp/htdocs/PHP/Mastering_PHP/7)File/file4.txt";

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

// Students data insert in file4.txt as a JSON Data
    $encodeData = json_encode($students);
    file_put_contents($fileName, $encodeData, LOCK_EX);

// Students JSON Data show from file4.txt 
    $data = file_get_contents($fileName);
    $allStudents = json_decode($data, true);  // true use for array otherwise show object data
    print_r($allStudents);

    foreach($allStudents as $std)
    {
        echo $std['name']."\n";
    }