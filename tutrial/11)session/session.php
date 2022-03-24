<?php

session_start();

$_SESSION["name"] = "Jamal";
$_SESSION["age"] = 20;
$_SESSION["home"] = "Dhaka";
$_SESSION["country"] = "Bangladesh";

echo " Session variable value set . "



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="test.php">Go to test page</a>
    
</body>
</html>
