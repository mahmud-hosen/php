<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";



$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection

if($conn==true){
    echo "Connected";

}
else{
    echo "not Connected";

}


                // $query = "CREATE TABLE student(id,age)";
       

$custID = 100;
$custName = "jamal";
$custPwd = "111";
$custEmail = "mahmud@gmail.com";
$custPhone	= "0189823";



$query = "INSERT INTO customer (custID, custName, custPwd, custEmail, custPhone)VALUES('$custID', '$custName', '$custPwd', '$custEmail', '$custPhone')";
                
                $sql = "INSERT INTO customer (custPwd, custID, custName)
VALUES ('John', 'Doe', 'john@example.com')";
$result = mysqli_query($conn, $query);

                if($result == true){
                    echo "iNSERT Sucessfully";

                }else{
                  echo "Not Insert";
                }





?>