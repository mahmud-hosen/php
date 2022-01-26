
<?php


$host_name = 'localhost';
$name ='root';
$pass = ''; 
$db = 'test1';

// create connection
$conn = mysqli_connect($host_name, $name, $pass,$db);


// check connection

if($conn==true){
    echo "Connected";

}
else{
    echo "<h1>NOT Connected</h1>";

}

?>



