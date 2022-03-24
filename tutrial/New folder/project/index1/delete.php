<?php

include 'config.php';



echo $getID = $_REQUEST["id"];


$dlt_query = "DELETE FROM user1 WHERE id =$getID";
$run_query = mysqli_query($conn,$dlt_query);

if($run_query==true){

header("location: index.php?deleted");

}






 

?>




