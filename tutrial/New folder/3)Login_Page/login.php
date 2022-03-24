<?php

include 'config.php';

?>


<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="web.css">


    </head>
    <body class="b" >
        <div id="d">
        <h1>Login From</h1>

        <form action="login.php" method="post" >
        <fieldset  > 


            <b>Email : </b><input type="email" name="email" id="from" placeholder="Enter your email" required>    </br>  </br>
            <b>Password : </b><input type="password" name="pass" id="from" placeholder="Enter your password"required >     </br> </br>
                     
             

            </fieldset> </br>

        <input  name="login"  id="button" type="submit" value="Login">
        <a href="reg.php">  <input  name="reg" id="button" type="button"  value="Registration">



        <?php

        if(isset($_POST['login'])) {   

            
            $email = $_POST['email'];
            $pass = $_POST['pass'];

                  $query = "select* from user where email='$email' AND password='$pass' ";
                  
                    $query_check = mysqli_query($conn,$query);

                    if($query_check){   


                            if(mysqli_num_rows($query_check)==1){  

                              echo"
                              <script>
                              alert (' Succesfully Login');
                              window.location.href='home.php';
                              </script>
                              ";
                            
                            }
                            else{


                                echo"
                              <script>
                              alert (' Not  Login');
                              window.location.href='login.php';
                              </script>
                              ";




                            }  
                            
                            

                        }

                    }

                    else{


                        //isset_else
                    }

                            
                           
                              
                              
                            
                   

                           


               
                     

                    

        ?>
















    
        </form>
        </div>
    </body>

</html>