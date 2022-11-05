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
echo "<br>";

$samsung->display();
echo "<br>";

$samsung->Compressor();
echo "<br>";

$samsung->power();
echo "<br>";

$samsung->rpower();
echo "<br>";

$samsung->tpower();




