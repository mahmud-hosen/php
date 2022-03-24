                        
<?php
             // config page connection
             //Data_Base_name: test ,Table_Name : user
            // Table : name varchar(20), email varchar(50), password varchar(20)
include 'config.php';

?>


<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="web.css">


    </head>
    <body class="b" >
        <div id="d">
        <h1>Registration From</h1>

        <form action="reg.php" method="POST" >
            <fieldset  >  <legend>Personal Information</legend>


            <b>Name : </b><input type="text" name="name" id="from" placeholder="Enter your name" required > </br> </br>
            <b>Email : </b><input type="email" name="email" id="from" placeholder="Enter your email" required>    </br>  </br>
            <b>Password : </b><input type="password" name="pass" id="from" placeholder="Enter your password"required >     </br> </br>
            <b>C-Password : </b><input type="password" name="cpass" id="from" placeholder="Enter your c-password" required>     </br> </br>
                       
              

            </fieldset> </br>

            <a href="home.php"> <input  name="reg"  id="button" type="submit" value="Sign-Up">
        <a href="login.php">  <input  name="back" id="button" type="button"  value="Back-Login">


    
        </form>

        <?php

        if(isset($_POST['reg'])){   
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];


    
                              $insertion =  "insert into user values('$name','$email','$pass')";
                              $run = mysqli_query($conn,$insertion);
                              echo "Succesfully Registration";

                               
                
                    

        }

        else
           { 
            
            //isset else


            

             } 

        ?>

        </div>

    </body>

</html>
