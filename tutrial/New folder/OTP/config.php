<?php
$conn = mysqli_connect('localhost','root','','otp');
if($conn == TRUE){
    echo "Connected"."</br>";
}else{
    echo "Not Connected";
}

?>