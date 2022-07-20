<?php

$student = [
    'name' => 'Habibur',
    'age' => 23,
    'Email' => 'habib@gmail.com'
];

echo "\n\n Array to serialize: \n";

$stdSerialized = serialize($student);
print_r($stdSerialized);

echo "\n\n Serialize to array: \n";

$stdUnSerialized = unserialize($stdSerialized);
print_r($stdUnSerialized);

//Data convert Array to JSON 
echo "\n\n Array to JSON: \n";
$stdArrayToJson = json_encode($student);
print_r($stdArrayToJson);

//Data convert JSON to Array object 
echo "\n\n JSON to Array Obj: \n";
$stdJsonToArrayObj = json_decode($stdArrayToJson);
print_r($stdJsonToArrayObj);

//Data convert JSON to Just Arry
echo "\n\n JSON to Array: \n";
$stdJsonToArray = json_decode($stdArrayToJson,true);
print_r($stdJsonToArray);

?>