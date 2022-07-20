<?php

//Implement Countable interface for count
class DistrictCollections implements IteratorAggregate,Countable {
    private $districts;

    function __construct()
    {
        $this->districts = array();
    }
    function add($district){
        array_push($this->districts,$district);
    }

    function getIterator(){
        return new ArrayIterator($this->districts);
    }

    //Implement count()  method
    function count(){
        return count($this->districts);
    }
}

$districts = new DistrictCollections();
$districts->add("Shakhipur");
$districts->add("Dhaka");
$districts->add("Nalua");

 foreach($districts as $district)
 {
    echo $district."\n";
 }

echo count($districts);


?>