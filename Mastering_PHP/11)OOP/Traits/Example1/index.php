<?php

include 'mobile.php';
include 'television.php';
include 'refrigerator.php';



class Samsung extends Mobile{
    use Television,Refrigerator{
        Television::power insteadOf Refrigerator;
        Refrigerator::power as rpower;
        Television::power as tpower;


    }

}

$samsung = new Samsung;

$samsung->battery();
$samsung->display();
$samsung->Compressor();
$samsung->power();
$samsung->rpower();
$samsung->tpower();




