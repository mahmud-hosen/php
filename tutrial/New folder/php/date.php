<?php


// date  
echo date("d/m/Y")."<br/>";
// Day
echo date("l")."<br/>";
//Default TimeZone
echo date("h:i:sa")."<br/>";

//Set timezone
date_default_timezone_set('Asia/Dhaka');
echo date("h:i:sa")."<br/>";

echo date_default_timezone_get();

/*
More info about date related go to this link
https://www.php.net/manual/en/function.date.php
*/
?>