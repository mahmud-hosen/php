<?php

include 'config.php';




$id = $_REQUEST["id"];
$first_name = $_REQUEST["first_name"];
$l_name = $_REQUEST["lname"];
$u_email = $_REQUEST["email"];
$u_password = $_REQUEST["password"];


// file_Upload 


$file = $_FILES["photo"];

$file_name = $file["name"];
$file_type = $file["type"]; 
$file_size = $file["size"];
$file_tmpname = $file["tmp_name"];




// file_upload in pc

move_uploaded_file($file_tmpname,"tmp/$file_name");



$insertion =  "insert into user1 values ('$id','$first_name','$l_name','$u_email','$u_password','$file_name')";
$run = mysqli_query($conn,$insertion);


if($run==true)
{

    header("location:index.php?action=true");



}
else{


echo "Data Not Inserted";
header("location:index.php?action=false");





}

?>


