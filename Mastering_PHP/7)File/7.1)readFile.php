<?php
$fileName = "C:/xampp/htdocs/PHP/Mastering_PHP/7)File/dataRead.txt";

if( is_readable($fileName) )
{
    
    $fp = fopen($fileName, 'r');
    $line = fgets($fp);  // 1 line read 

    // Read untill file end
    while( $line = fgets($fp) ){
        echo $line; 
    }

    // File read another way
    echo "Another way for file read \n";
    $line2 = file($fileName);
    print_r($line2);

    // File read another way
    echo "Another way for file read \n";
    $line3 = file_get_contents($fileName);
    echo $line3;


    fclose($fp);


}

?>