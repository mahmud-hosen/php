<?php

$items = [
    'cars' => ['BMW','Toyota','Honda'],
    'drinks' => ['Water','Milk',''],
    'name' =>['Jamal','Kamal','Rahim']

];

$items1 = [
    'cars' => [
        'BMW' => ['BMW2010','BMW2015','BMW2020'],
    ],
    'drinks' => ['Water','Milk',''],
    'name' =>['Jamal','Kamal','Rahim']

];

print_r($items);
print_r($items1);
echo "\n";
echo $items1['cars']['BMW'][0];

echo "\n";
array_push($items1['cars']['BMW'],'BMW2030');
print_r($items1);


?>