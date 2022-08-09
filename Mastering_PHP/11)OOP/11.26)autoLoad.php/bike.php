<?php

class Bike{
    function getType(){
        echo "Motorcycle \n";
    }
}

class BMW extends Bike{
    function getInfo(){
        echo "This is BMW";
    }

}


?>