<?php

class Planet{
    static function echoName()
    {
    //if we use self::getName(); it refer planet class method <-- it call early binding
    //if we use static::getName(); it refer extends class method <--it call late binding 

        
        echo static::getName();
    }

    static function getName(){
        return "Planet";
    }
}

class Earth extends Planet{
    static function getName(){
        echo "Earth";
    }
}

// Planet::echoName();
Earth::echoName();




?>