<?php


$fileName = "C:/xampp/htdocs/PHP/Mastering_PHP/7)File/dataWrite.txt";

if( is_writable($fileName) ){
    // w -> read mode once we read, previous data remove then read 
    // a -> append mode, previous data + new data , 
    $fp = fopen($fileName, 'a');
    $line = fwrite($fp, "My name is kamal \n");

    //Or 
    file_put_contents($fileName,"Hi, MD How are you ? \n", LOCK_EX | FILE_APPEND);

}
