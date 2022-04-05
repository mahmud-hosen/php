
  <?php
         $otp = rand(11111,99999);
         $to = "mahmudhossain582@gmail.com";
         $subject = "Check Your OTP ";
         $message = " Your OTP is : $otp ";
         $header = "From: mahmud15-1862@diu.edu.bd \r\n";

         $eheck = mail ($to,$subject,$message,$header);
         
         if( $eheck == true ) {
            echo "OTP sent successfully. Please check your email.";
         }else {
            echo "OTP could not be sent...";
         }
      ?>