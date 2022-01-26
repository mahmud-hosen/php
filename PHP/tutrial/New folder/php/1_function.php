<?php

// Function
function school()
{
    echo "BAF Shaheen school PKP<br/><br/>";
}
school();

// Argument pass

echo "Argument pass:<br/>"; 

function clg($name,$age)
{
    echo "$name is $age years old<br/>";
}
clg("Jamal","20");
clg("Moly","25");
clg("Kamal","26");
clg("Rahim","21");


//Defalt Argument pass
echo "<br/>";
echo "Defalt Argument pass:<br/>"; 

function versity($name="School name is KML <br/>")
{
    echo "$name<br/>";
}

versity("My school name is PKP");
versity();

// Return value

function sum($x,$y)
{
    $z=$x+$y;
    return $z;
}

echo sum(5,7);








?>

