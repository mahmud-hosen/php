
<?php


$host_name = 'localhost';
$name ='root';
$pass = ''; 
$db = 'test';

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

