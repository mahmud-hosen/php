

<?php
// GET & POST Method are same just GET show data in URL bar &  POST don't show URL bar

$name=$_REQUEST["u_name"];         //we can $_REQUEST[" "]; & POST & GET method for catch data
$comment=$_POST["c_name"];


echo "<b>".$name."</b>";

echo"<br/>";

echo "<b>".$comment."</b>";
echo"<br/>";

echo"<a href='http://google.com'>";
echo "<b>".$name."</b>";
echo "</a>";




?>

