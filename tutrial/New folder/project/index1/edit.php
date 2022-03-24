
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

include 'config.php';


if(isset($_REQUEST["edit_id"])){

    $edit_ID = $_REQUEST["edit_id"];





$selectinfo = "SELECT* from user1 WHERE id=$edit_ID";
$run_info = mysqli_query($conn,$selectinfo);

while($getinfo = mysqli_fetch_array($run_info)){

  

    ?>



<form     action="editdata_core.php" method="POST" >

<b>ID : </b>   <input type="text" name="id" value="<?php echo $getinfo["id"]; ?>" placeholder="User_ID"  />   </br>  </br>
<b>F_Name : </b>   <input type="text" name="first_name" value="<?php echo $getinfo["first_name"]; ?>" placeholder="First_Name"  />          </br>  </br>
<b>L_Name : </b>   <input type="text" name="lname"  value="<?php echo $getinfo["lname"]; ?>" placeholder="Last_Name"  />          </br>  </br>
<b>Email : </b>   <input type="email" name="email" value="<?php echo $getinfo["email"]; ?>" placeholder="Email"  />              </br>  </br>
<b>Password : </b>   <input type="text" name="password" value="<?php echo $getinfo["password"]; ?>" placeholder="password"  />    </br>  </br>

 
<input type="submit" name="edit_button"  value="Update_Data"   />

</form>

<?php
}
  }

?>


 

</body>
</html>

