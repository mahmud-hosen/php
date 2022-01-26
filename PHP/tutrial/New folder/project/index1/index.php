<?php

include 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

</head>
<body  >
    

<?php

if(isset($_REQUEST["action"])){

    if($_REQUEST["action"]=="true"){

        echo "<font color='green'>Data Insert</font>";
    }



}


?>


    
<form enctype="multipart/form-data"  action="savedata.php" method="POST" >


    <input type="text" name="id" placeholder="User_ID"  />
    <input type="text" name="first_name" placeholder="First_Name"  />
    <input type="text" name="lname" placeholder="Last_Name"  />
    <input type="email" name="email" placeholder="Email"  />
    <input type="password" name="password" placeholder="password"  />
    <input type="file" name="photo"  />
    <input type="submit" name="submit"  value="Save_Data"   />


</form>

<br/>
<br/>



<table  border="2px" >




<tr>
<td><b>S_Num</b></td>
<td><b>DB_ID</b></td>
<td><b>F_Name</b></td>
<td><b>L_Name</b></td>
<td><b>Email</b></td>
<td><b>Password</b></td>
<td><b>Photo</b></td>
<td><b>Action</b></td>

</tr>



<?php

include 'config.php';


$query = "SELECT* from user1;";
$run = mysqli_query($conn,$query);


if($run==true){

$s_num=1;

while($mydata = mysqli_fetch_array($run)){

    
    echo '<tr>
     
    <td>'.$s_num.'</td>
    <td>'.$mydata["id"].'</td>
    <td>'.$mydata["first_name"].'</td>
    <td>'.$mydata["lname"].'</td>
    <td>'.$mydata["email"].'</td>
    <td>'.$mydata["password"].'</td>
	<td><img width="60" src="tmp/'.$mydata["file_name"].'"/> </td>
	 
    <td> <a href="edit.php?edit_id='.$mydata["id"].'">Edit</a> | <a href="delete.php?id='.$mydata["id"].'">Delete</a>  </td>
    
    
 


</tr>';
$s_num++;


}


}

?>

</table>  



</body>
</html>







