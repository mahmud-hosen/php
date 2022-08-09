<?php

abstract class Student{
    public $name="Jamal";
    public $age=23;

    public function Details(){
        echo "Student name is {$this->name} & Age is {$this->age} \n";
    }
    abstract public function School();
}
class Boy extends Student{
    public function Describe()
    {
        parent::Details();
    }
    public function School(){
        echo "I am a student boy \n";
    }
}

$b = new Boy();
$b->Describe();
$b->School();



?>