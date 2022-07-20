<?php

// Associative array ,access by key not index
// https://www.php.net/manual/en/language.types.array.php
$student = [
    'id' => 101,
    'name' => "jamal",
    'Email' => "mahmud@gmail.com"

];
   // Associative array access using foreach way:1 
foreach($student as $key => $value)
{
    echo "Student key is $key value : $value \n";

}
   // Associative array access using foreach way:1 
   echo "\n";

   $keys = array_keys($student);
   print_r($keys);
   echo "\n";

   $sValues = array_values($student);
   print_r($sValues);

   for($i=0; $i<count($keys); $i++)
   {
    $key = $keys[$i];
     echo $student[$key]."\n";
   }

   // Associative array concat 
   //   $student['name'] .=" Kamal";
   $student['name'] = $student['name']." Kamal";
   $sValues = array_values($student);
   print_r($sValues);

   //Data remove from associative array
   echo "\n\nData remove from array:";
   unset($student['name']);
   print_r($student);
?>