<?php
$assignedGrades[0] = array(
    "userID" => 1,
    "studentName" => "John Doe",
    "grade" => 86,
);

print_r($assignedGrades);
print "count = ".count($assignedGrades)."<br>";
for ($i = 0; $i < count($assignedGrades); $i++){
    print $assignedGrades[$i]['studentName'];
}