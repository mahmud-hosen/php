<?php

//______________________ Indexed Array __________________

$z = ["sakib","habib","foisal"];
$k = array("liza","moly","trisha");
// or
// $x[0] = "jamal";
// $x[1] = 8;
// $x[2] = "moly";
// $x[3] = "hossain";

echo $l[2];
echo $k[2];



// Associative array
echo "<br/><br/>Associative array<br/><br/>";


$ages = array("habib"=>"20","kamal"=>"23","jamal"=>"39");
//or
$names["habib"] = "25";
$names["kamal"] = "24";
$names["jamal"] = "28";


foreach($ages as $l => $age)
{
    echo $l."->".$age;
    echo "<br/>";
}

echo "<br/>";

foreach($names as $l => $age)
{
    echo $l."->".$age;
    echo "<br/>";
}

// Multidimensional array
echo "<br/>Multidimensional array<br/>";

$cars = array(
    array(5,4,3),
    array(4,1,9),
    array(0,2,7),

);

echo $cars[0][2]."<br/>";

for($i=0;$i<=2;$i++)
{
    for($j=0;$j<=2;$j++)
    {
        echo $cars[$i][$j];
    }
    echo "<br/>";
}

?>