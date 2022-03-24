<?php

$course = array(
    "id" => 100,
    "name" => "PHP",
    "section" =>"PC-D",
    "room" => "201",
    "date" => "23-08-2021"

);

$course_work = array(


    "id" => 100,
    "work_id" => 200,
    "work_name" => "Assignment",
    "point" =>"100",

);

$submission = array(
    "id" => 100,
    "work_id" => 200,
    "submission_id" => 300,
    "draft" => 30,
    "assign" =>90,

);


        echo '<pre>';
        return print_r($course);
    

// for ($i=0;$i<count($course);$i++)
// {
//     echo $course['name']."<br>";
// }








// function course1($x,$y){
  
//     return $x+$y;
// }
// function course2($x,$y,$z){
  
//     return $x+$y+$z;
// }

// $sum1 = course1(5,6);
// $sum2 = course2(5,6,4);

// echo $sum2;

// ?>




<table>
    <?php

    foreach($assignedGrades as $assignedGrade){
        for($i=0; $i < count($assignedGrades)-1; $i++){

    ?>
    <tr>
        <td>Name</td>
        <td>Graft</td>
        <td>Course Id</td>
        <td>Course Work Id</td>
        <td>Id</td>
    </tr>
    <tr>
        <td><?php echo $assignedGrade[$i]["name"]; ?></td>
        <td><?php echo $assignedGrade[$i]["DraftGrade"]; ?></td>
        <td><?php echo $assignedGrade[$i]["CourseId"]; ?></td>
        <td><?php echo $assignedGrade[$i]["CourseWorkId"]; ?></td>
        <td><?php echo $assignedGrade[$i]["id"]; ?></td>

    </tr>

    <?php
    }            
  }
    ?>

</table>