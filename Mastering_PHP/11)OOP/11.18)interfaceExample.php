<?php

class DistrictCollection{
    private $districts;

    function __construct()
    {
        $this->districts = array();
    }
    function add($district){
        array_push($this->districts,$district);
    }
    function getDisplay(){
        return $this->districts;
    }
}

$districts = new DistrictCollection();
$districts->add("Tangail");
$districts->add("Manikganje");
$districts->add("Sirajganje");

 $allDistricts = $districts->getDisplay();
 foreach($allDistricts as $district)
 {
    echo $district."\n";
 }

 //........................    Other way use   ..........................
 //______________________________________________________________________
 echo "\n\n";

class DistrictCollections implements IteratorAggregate {
    private $districts;

    function __construct()
    {
        $this->districts = array();
    }
    function add($district){
        array_push($this->districts,$district);
    }

    // Implemented getIterator() so not need to getDisplay() method
    // function getDisplay(){
    //     return $this->districts;
    // }

    //Implement getIterator() method
    // It return array iterator object , Not need to call getIterator() method
    //  It implement Interface  , it Iterator interface return object here has all property
    function getIterator(){
        return new ArrayIterator($this->districts);
    }
}

$districts = new DistrictCollections();
$districts->add("Shakhipur");
$districts->add("Dhaka");
$districts->add("Nalua");

 // Not need to call getDisplay() method cause already implement getIterator()
 
 //$allDistricts = $districts->getDisplay();

 foreach($districts as $district)
 {
    echo $district."\n";
 }

?>