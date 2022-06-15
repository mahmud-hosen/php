<?php
include 'config.php';

    $otp = $_REQUEST['otp'];
    session_start();
    $session_otp = $_SESSION["otp_code"];

    if($otp == $session_otp){
        echo "200";
    }else{
        echo "300";
    }

?>


        
     