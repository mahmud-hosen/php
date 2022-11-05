<?php

include 'television.php';
include 'refrigerator.php';

class Electronics {
    use Television,Refrigerator;
    }


$electronics = new Electronics;

$electronics->Compressor();
echo "<br>";

$electronics->power();
echo "<br>";

$electronics->display();
echo "<br>";

$electronics->speaker();




