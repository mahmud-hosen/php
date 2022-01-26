<?php
  
  // A Class is a tempalte of object.
  // Class is student & It object name,id,section,age

  
  class student{
      //Properties of this student class
      public $name;
      public $id;
      public $section;
      public $age;

      //Methods
  function set_name($name){
      $this->name=$name;
  }

  function get_name(){
      return $this->name;
  }

  // Sum Function
  function sum($x,$y){
      return $x+$y;
  }


  }

  // Object Create for student class
  $std = new student();

  // Value Set in student class name Propertie
  $std->set_name('Jamal');

  // Value get from student class name Propertie

  $student_name = $std->get_name();
  echo $student_name;
  

  // Call Sum Function
  echo $std->sum(30,60);

  


?>