

<?php


$name=$_REQUEST["u_name"];         
$password=$_POST["password"];

if($password==12345){

    
    header("location: reg.php");


}
else{
    header("location:http://google.com");

}



?>

