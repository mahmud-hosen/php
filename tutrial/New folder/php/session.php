<?php
session_start();

$_SESSION['users'] = "Mahmud";
$_SESSION['password'] = "123";

echo "Name: ".$_SESSION['users']."<br/>";
session_unset();
echo "Password: ".$_SESSION['password']."<br/>";

session_destroy();



?>