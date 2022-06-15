<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Sign up Form with Icons</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="vendor/sweetalert2/dist/sweetalert2.min.css">
 

<style>
body {
	color: #fff;
	background: #19aa8d;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	font-size: 15px;
}
.form-control, .form-control:focus, .input-group-text {
	border-color: #e1e1e1;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 400px;
	margin: 0 auto;
	padding: 30px 0;		
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr {
	margin: 0 -30px 20px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 15px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
}	
.signup-form .btn, .signup-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #19aa8d !important;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #179b81 !important;
}
.signup-form a {
	color: #fff;	
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #19aa8d;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
}
.signup-form .fa-paper-plane {
	font-size: 18px;
}
.signup-form .fa-check {
	color: #fff;
	left: 17px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}
</style>
</head>
<body>
<div class="signup-form">
    <form action="/examples/actions/confirmation.php"  method="post">
		<h2>Sign In</h2>
		<hr>
        
        <div id="email_field" class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
			</div>
			<div id="error_email" style="color:red;font-size:12px;">Email and password mismatch.</div>

        </div>
		
        <div id="password_field" class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
		
        <div id="otp_message" style="color:green;font-size:15px;">Please check your email for OTP.</div>

        <div id="otp_field" class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input  type="text" class="form-control" name="otp" placeholder="OTP " required="required">
			</div>
            <div id="error_otp_mismatch" style="color:red;font-size:14px;margin-top:3;">OTP mismatch. <a id="resend" style="color:green;font-size:14px;margin-left: 5;" >Resend</a> </div>
        </div>

		
       
		<div id="signin_div" class="form-group">
            <button type="submit" id="submit_button" class="btn btn-primary btn-lg">Sign In</button>
        </div>

        <div id="otp_check_div" class="form-group">
            <button type="submit" id="otp_button" class="btn btn-primary btn-lg">Check</button>
        </div>
        
    </form>
	<div class="text-center">Need an account? <a href="signup.php">SIGN UP </a></div>
</div>
     <!--sweetalert2 js file -->
     <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
     <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
	 <script>
      const Toast =   Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                window.Toast = Toast;
    </script>
    <!-- sweetalert2 js file -->

</body>
</html>

<script >
    $(document).ready(function()
    {   
        $("#resend").click(function(event){
            $('#otp_field').hide(); 
            $('#otp_message').hide();
            $('#email_field').show();  
            $('#password_field').show(); 
            $('#otp_check_div').hide();
            $('#signin_div').show();
            $('#error_otp_mismatch').hide();
            $('#error_email').hide();
		});

         $("form").click(function(event){
			event.preventDefault();
		});

        $('#otp_field').hide();
        $('#error_email').hide();
        $('#otp_message').hide();
        $('#otp_check_div').hide();
        $('#error_otp_mismatch').hide();

        $("#submit_button").click(function(){
           
            $("input[name=otp]").val(null);
            var email=$("input[name=email]").val();
            var password=$("input[name=password]").val();

             $.ajax({
                type: "POST",
                url: 'signinCore.php',
                data: {
                    email: email,
                    password: password,
                },
                cache: false,
                success: function(data) {
                    if(data == 'email_match'){
                        $('#otp_field').show(); 
                        $('#otp_message').show();
                        $('#email_field').hide();  
                        $('#password_field').hide(); 
                        $('#otp_check_div').show();
                        $('#signin_div').hide();

                        $("input[name=email]").val(null);
                        $("input[name=password]").val(null);

                    }else if(data == 'email_not_match'){
                        $('#error_email').show();

                    }
                }
            });
            
        });
         //------- OTP Code Check ---------------------
           $("#otp_button").click(function(){      
                         var otp=$("input[name=otp]").val();
                            $.ajax({
                                type: "POST",
                                url: 'otpCheck.php',
                                data: {
                                    otp: otp,
                                },
                                cache: false,
                                success: function(data) {

                                    if(data == 200 ){
                                        console.log(30);
                                        window.location.href = 'welcome.php?secret=4jkDfaq';

                                    }else if(data == 300){
                                        $('#error_otp_mismatch').show(); 
                                        
                                    }else if(data == 'exist'){
                                        $('#error').show();   
                                    }
                                }
                            });
                            
                        });

    });

    function countDown()
    {
        var counter = 120;
        var interval = setInterval(function() {
        counter--;
        // Display 'counter' wherever you want to display it.
        if (counter <= 0) {
                clearInterval(interval);
            $('#timer').html("<h3>Time Up.</h3>");  
            return;
        }else{
            $('#time').text(counter);
        console.log("Timer --> " + counter);
        }
    }, 1000);

    }
      
</script>

<?php
   // SignIn Message 
  if(isset($_REQUEST["secret"])){
    $secret = $_REQUEST["secret"]; 

  if($secret == 'Dk21XeF'){
    echo "<script> 
      Toast.fire({
        icon: 'success',
        title: 'Sign Up Successfully',
      });
    </script>";

  }
 }

?>

