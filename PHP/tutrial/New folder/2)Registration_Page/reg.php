                        
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


                if($pass==$cpass){   


                  $query = "select* from user where email='$email' ";
                  
                    $query_check = mysqli_query($conn,$query);

                    if($query_check){   


                            if(mysqli_num_rows($query_check)> 0){  

                              echo"
                              <script>
                              alert (' Email Already Use in Data_Base');
                              window.location.href='reg.php';
                              </script>
                              ";
                            
                            }   

                            else{  

                              $insertion =  "insert into user values('$name','$email','$pass')";
                              $run = mysqli_query($conn,$insertion);

                            if($run){ 

                            echo"

                              <script>
                              alert ('Succesfully Registratin ');
                              window.location.href='login.php';
                              </script>
                              
                              ";
                             }    
                              
                              
                             else{   

                            //Run else
                            //if data_base_error

                             echo"
                              <script>
                              alert ('Connection Fail ');
                              window.location.href='reg.php';
                              </script>
                              "; 

                                
                            }  

                            }                      

                    }           
                    else{   

                                //$query_check
                    
                                 echo"
                                 <script>
                                 alert ('Data Base Error or Connection Fail ');
                                 window.location.href='reg.php';
                                 </script>
                                 "; 
                        }  

                           }


                else{  

                    //password else

                      
                    echo"
                    <script>
                    alert (' Password & Confirm_Password not Match  ');
                    window.location.href='reg.php';
                    </script>
                    "; 
                       
                         
                     }

                    

        }

        else
           { 
            
            //isset else


            

             } 

        ?>

        </div>

    </body>

</html>
