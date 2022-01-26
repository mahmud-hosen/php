<?php

include 'config.php';



if(isset($_REQUEST["edit_button"])){




 $id = $_REQUEST["id"];
$first_name = $_REQUEST["first_name"];
$l_name = $_REQUEST["lname"];
$u_email = $_REQUEST["email"];
$u_password = $_REQUEST["password"];





 $update_query = "UPDATE user1 SET id='$id',first_name='$first_name',lname='$l_name',email='$u_email',password='$u_password' where id='$id' ";
  
 $run_query = mysqli_query($conn,$update_query);
 if($run_query==true){
     header("location: index.php?edited");



 }

 






}


?>

