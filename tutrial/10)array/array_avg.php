<?php

$x = array(
    '0'=>'12',
    '1'=>'10',
    '2'=>'15',
    '3'=>'',
    '4'=>'20',

);




//-----------------  Avg array ---------------------
$x = array_filter($x);
$average = array_sum($x)/count($x);
echo "Avg Value".$average;

echo "<br>";
//-----------------max value ------------------------

$maxValue = max($x);
echo "Max value".$maxValue;




?>