<?php
// Manage file using bulid autoloading features

/*
 __autoload() use php previous version 7.2
function __autoload($name){
    include "{$name}.php";
}
*/

function autoload($name){
    include strtolower("{$name}.php");

}

spl_autoload_register('autoload');

(new Bike)->getType();

(new Spaceship)->launch();


?>