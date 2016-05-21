<?php
# 面向对象风格 

// header('content-type:text/html;charset=utf-8');
require_once '../../../../secret_config.php';
// require_once

echo '<p style="color:rgba(0,255,0,0.7);">面向对象风格: DB 连接 test!</p><br>';

# DB_HOST DB_USER DB_PWD DB_NAME DB_PORT DB_TYPE DB_CHARSET
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME,DB_PORT);
// $mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

/*
 * Use this instead of $connect_error if you need to ensure
 * compatibility with PHP versions prior to 5.2.9 and 5.3.0.
 */
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Successful Connect DB...!<br><h1>' . $mysqli->host_info . "</h1>\n<br>";

$close = $mysqli->close();

if ($close) {
	echo "关闭DB成功！<br>";
} else {
	echo "关闭DB失败！<br>";
}
?>