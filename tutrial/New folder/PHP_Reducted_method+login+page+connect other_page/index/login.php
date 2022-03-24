<?php

include 'config.php';

?>



<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="web.css">


    </head>
    <body class="b" >
    <fieldset>
        <div id="d">
        <h1>Login From</h1>

        <form action="Login.php" method="post" >
            <fieldset  > 

 
            <b>Email : </b><input type="email" name="email" id="from" placeholder="Enter your email" required>    </br>  </br>
            <b>Password : </b><input type="password" name="pass" id="from" placeholder="Enter your password"required >     </br> </br>
           


            </fieldset> </br>

        <input  name="Login"  id="button" type="submit" value="Login">
        <a href="reg.php">  <input  name="reg" id="button" type="button"  value="Registration">


    
        </form>
        </div>
    </body>

</html>