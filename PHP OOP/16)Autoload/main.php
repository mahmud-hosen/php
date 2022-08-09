<?php

// __autoload if use from php v-5
function __autoload($className){
    echo $className."\n";
    include "classes/".$className.".php";

}

// spl_autoload_register less than php v-5

spl_autoload_register(function($className){
    echo $className."\n";
    include "classes/".$className.".php";

});

$s = new Student();
$t = new Teacher();
$a = new Admin();




?>