<?php 

// $newq = $_POST["admin"];
$newq =$_GET["sname"];

// var_dump($_GET);
// var_dump($newq);
// var_dump($_POST);
// echo "{$newq}";
// exit();

$con = mysqli_connect('localhost','root','123456','dsqcx');
if (!$con){
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"dsqcx");
$sql="SELECT * FROM admin WHERE sname = '{$newq}'";

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>id</th>
<th>super name</th>
<th>super role</th>
<th>super rights</th>
<th>add time</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['sname'] . "</td>";
echo "<td>" . $row['srole'] . "</td>";
echo "<td>" . $row['srights'] . "</td>";
echo "<td>" . $row['addtime'] . "</td>";
echo "</tr>";
}
echo "</table>";
# delete
$del = false;
if ($del) {
	$dsql="DELETE FROM admin WHERE sname = '".$newq ."'";

    $dresult = mysqli_query($con,$dsql);
}
echo"<form>";
echo "<span><button name='sname' onclick='doDelete(input.value)'>delete</button></span>";
echo"</form>";
mysqli_close($con);



 ?>