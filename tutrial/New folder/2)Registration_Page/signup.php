<?php
$conn = mysqli_connect('localhost','root','','mahmud');
if($conn == TRUE){
    echo "Connected";
}else{
    echo "Not Connected";
}

$sql = "CREATE TABLE signup(id int,name varchar(100),email varchar(100));";
$query = mysqli_query($conn,$sql);
if($query == TRUE){
    echo "Table Create Successfully";
}else{
    echo "Table doesn't  Create";
}


?>