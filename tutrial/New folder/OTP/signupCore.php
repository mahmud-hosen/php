<?php
    include 'config.php';

    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];
    
    if($password == $confirm_password){
        
        $sql = "SELECT email FROM signup WHERE email='$email'";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
            echo "exist_email";
        } else {
                
        $sql1 = "INSERT INTO signup (username, email, password)VALUES ('$username', '$email', '$password')";

        $query = mysqli_query($conn,$sql1);
        if($query == TRUE){
            echo "insert_signup_info";
        }else{
            echo "not_insert_signup_info";
        }
      }
    }else{
        echo "password_mismatch";
    }


?>