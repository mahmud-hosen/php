<?php

require "Router.php";
use OurApplication\Routing\Router;

Router::get('/',function(){
    echo "Welcome home 5";

});

Router::get('/hello/world',function(){
    echo "Hello World.";

});



?>