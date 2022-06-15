<?php
/*
Integer int
Double / Float
Boolean 
Null
String
Array
Object
Resource
*/
$name = "Mahmud";
$lastName = "Hosen";
$country = "Bangladesh";
$age = 12;
$info = '';
$info1 = NULL;


var_dump($name,$age,$info,$info1); // var dump 
echo 'We\'re living in'.$country;
echo "\n";
echo "We're living in".$country; // Same way

echo "\n";
printf("His %s name is %s %s\n","full",$name,$lastName);
printf("His %s name is %s %s","full",strtoupper($name),$lastName);


echo "\n\n";

echo "My name 
           is mahmud.
I am twinty years old.\n\n";

$firstName = "Mahmud";
$lastName = "Hosen";
$id = 2002; 

printf('My name is %2$s and %1$s \n',$firstName,$lastName);
printf('My id is %1$d same %1$d\n',$id);

$num = 23.4664;
printf('Number is %.2f ',$num);

echo "\n\n";
$num2 = 34;
$num3 = 98;
$num4 = 98;


printf("Convert to 4 digit: %04d \n",$num2);
printf("Convert to 4 digit: %04d\n\n",$num3);


printf("A number convert : %08.3f \n\n",$num4);

$middleName = "Hossain";

$sprintf = sprintf("My name is mahmud %s",$middleName);
echo "$sprintf";

?>