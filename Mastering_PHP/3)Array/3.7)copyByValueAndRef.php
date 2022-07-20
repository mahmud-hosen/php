<?php

// Copy by value or deep copy

$person = ['mahmud','jamal','kamal'];

$newPerson = $person;
$newPerson[2] = 'Habib';

echo "Copy by value or deep copy\n";
print_r($person);
echo "\n\n";
print_r($newPerson);



// Shallow Copy or call by referance
$newPerson = &$person;
$newPerson[2] = 'Moly';

echo "Shallow Copy or call by referance\n";
print_r($person);
echo "\n\n";
print_r($newPerson);

?>