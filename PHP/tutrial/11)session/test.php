<?php

session_start();

echo $_SESSION["name"];
echo $_SESSION["age"];
echo $_SESSION["name"];


echo '<pre>';
print_r ($_SESSION);



?>