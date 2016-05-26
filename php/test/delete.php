<?php 

// $dq = $_POST["admin"];
$dq =$_GET["delete"];

var_dump($dq);
echo "{$dq}";
exit();

$con = mysqli_connect('localhost','root','123456','dsqcx');
if (!$con){
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"dsqcx");





 ?>