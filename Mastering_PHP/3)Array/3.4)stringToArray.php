<?php

// String to array

$name ='Mahmud, Jamal, Kamal, Habib';
//$convartName = explode(',','Mahmud, Jamal, Kamal, Habib');
$convartStringToArray = explode(', ',$name);

echo $convartStringToArray[0]."\n";
echo $convartStringToArray[1]."\n";
echo $convartStringToArray[2]."\n";

// Array to String
$convartArrayToString = join(', ',$convartStringToArray);
echo "\nConvart Array ToString: $convartArrayToString";


//More delemetre use preg_split()
$carsModel = 'BMW10, Toyota20, toyota30,BMW20,BMW50';
$carsConvartStringToArray = preg_split('/(, |,)/',$carsModel);
print_r($carsConvartStringToArray);



?>