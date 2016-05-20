<?php 
header('content-type:text/html;charset=utf-8');
require_once 'config.php';

# define("DB_SOCKET",'localhost');//SOCKET 与 localhost/127.0.0.1 有关系！

# mysql连接类型与socket通信原理说明 http://blog.fity.cn/post/348/
# mysqli使用localhost问题 http://blog.csdn.net/meegomeego/article/details/36187683

echo "DB连接test<br>";
$conn = mysqli_connect(DB_HOST, DB_USER, xDB_PWD, DB_NAME, DB_PORT);
$mysqli_connect_errno = mysqli_connect_errno();
$mysqli_connect_error = mysqli_connect_error() ;

if (!$conn) {
	echo "DB连接失败！<br>";
	// echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br>";
	echo "错误信息: {$mysqli_connect_error}<br>";
} else {
	echo "DB连接成功！<br>";
	echo "".mysqli_connect_errno()."<br>";
	echo "".mysqli_connect_error()."<br>";
}

if (!$conn)
{
    // die("连接失败: " . mysqli_connect_errno());
     die("连接失败！<br> 错误代码：{$mysqli_connect_errno}<br>");
}
?>