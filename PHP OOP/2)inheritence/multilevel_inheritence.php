<?php

class user{
    public $name='kamal';
    public $email='kamal@gmail.com';
    public $address='Dhaka';
}

class student extends user{
    public $id='1001';
    public $mark='86';
}

class teacher extends user{
    public $t_id='2001';
    public $salary='20000';
}

class people extends teacher{
    
}

$teacher_obj = new teacher();

$student_obj = new student();

$people_obj = new people();


echo $teacher_obj->name."<br>";
echo $student_obj->mark."<br>";

echo $people_obj->salary."<br>";
echo $people_obj->name."<br>";





?>