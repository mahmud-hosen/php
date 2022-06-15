<?php

//Encapsulation


// Default value pass in function
serve();
function serve($food='coffee',$numItem='1')
{
    echo "I need $numItem cup of $food  \n\n\n";
}

// Unlimited argument pass using array .
function sum(int ...$num){
    $result =0;
    for($i=0; $i<count($num); $i++)
    {
        $result = $result+$num[$i];
    }
    return $result;
}
echo sum(10,12,20);
echo "\n";

// Recursive function

function printNumber($start,$end,$step){
    if($start>$end){
        return;
    }
    echo "Number is $start \n";
    $start=$start+$step;
    printNumber($start,$end,$step);

}
printNumber(11,20,2);

// Fibonacci 


//Facturial 
function facturial($n){
    if($n<=1){
        return 1;
    }
    return $n * facturial($n-1);
}
echo "\n";
echo facturial(6);



?>