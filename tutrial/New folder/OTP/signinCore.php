<?php
include 'config.php';

 $email = $_REQUEST['email'];
 $password = $_REQUEST['password'];
 
    $sql = "SELECT * FROM signup WHERE email='$email' AND password = '$password'";
    $result = mysqli_query($conn,$sql);

if ($result->num_rows == 1) {
    // header('Location: welcome.php');
         $otp = rand(11111,99999);
         $to = $email;
         $subject = "Check Your OTP ";
         $message = " Your OTP is : $otp ";
         $header = "From: mahmud15-1862@diu.edu.bd \r\n";

         $eheck = mail ($to,$subject,$message,$header);
         
         if( $eheck == true ) {
            session_start();
            $_SESSION["otp_code"] = $otp;
            echo "email_match";
         }else {
            echo "email_not_match";
         }

} else {
    echo "email_not_match";
    
}



?>