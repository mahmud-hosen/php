<?php

echo "<pre>";

//print_r($_SERVER);


 $url = $_SERVER["REQUEST_URI"];

if(preg_match("~^/php/routes/(\w+)/?$~",$url,$matches))
{
    echo $matches[1];
}

if(preg_match("~^/php/routes/$~",$url))
{
    echo "Welcome Home";
}


if(preg_match("~^/php/routes/number/(\d+)/do/(\w+)/?$~",$url,$matches))
{ 
    echo $matches[1];
     echo $matches[2];
}


echo "</pre>";

?>