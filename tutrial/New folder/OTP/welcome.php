<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="vendor/sweetalert2/dist/sweetalert2.min.css">
    
    <title>Document</title>
</head>
<body>
    <h1 style="color:green;font-size:30px;text-align: center;" >Welcome MD.You are logged in. </h1>
</body>
</html>

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

    <?php
      // SignIn Message 
        if(isset($_REQUEST["secret"])){
            $secret = $_REQUEST["secret"]; 

        if($secret == '4jkDfaq'){
            echo "<script> 
            Toast.fire({
                icon: 'success',
                title: 'Sign In Successfully',
            });
            </script>";

        }
        }

   ?>
