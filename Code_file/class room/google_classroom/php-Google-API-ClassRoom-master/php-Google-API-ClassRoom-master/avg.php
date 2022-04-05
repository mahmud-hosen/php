<?php

$grades = [86, 57, 44];
$count = count($grades);
$sum = 0;
for ($i = 0; $i < $count; $i++){
    $sum = $sum + $grades[$i];
}

$avg = $sum/$count;
print $avg;