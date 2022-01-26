<?php

class cars{
    public $name="BMW";
    public $price="20000000";
 
    // Price is cars property .It can get access from other function using thik keyword.
    function toyota(){
        return $this->price;
    }

}
 // Cars object create
 $car_obj = new cars();

 //Price properyt access from toyota function using this keyword.
 echo "I came from cars using this keyword.Price : ".$car_obj->toyota();


?>