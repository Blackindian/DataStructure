<?php 
#
header('content-type:text/html;charset=utf-8');
require_once '../PdoMySQL.class.php';
require_once '../config.php';
#require_once '../pwd.php';

$username=addslashes($_POST['username']);
$password=md5($_POST['password']);
$table='user';

$PdoMySQL=new PdoMySQL();

$row=$PdoMySQL->find($table,"username='{$username}' AND password='{$password}'");
	foreach ($row as $key => $value) {
		echo "{$value}";
	}










 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DSQC | 用户权限管理</title>
</head>
<body>
	<div class="container">
		<h1>用户权限管理页</h1>
	</div>
</body>
</html>