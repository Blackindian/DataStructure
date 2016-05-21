<?php
# 过程化风格

// header('content-type:text/html;charset=utf-8');
require_once '../../../../secret_config.php';
// require_once

echo '<p style="color:rgba(0,255,0,0.7);">过程化风格: DB 连接 test!</p><br>';

# DB_HOST DB_USER DB_PWD DB_NAME DB_PORT DB_TYPE DB_CHARSET


$link = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME,DB_PORT);
// $link = mysqli_connect('localhost', 'my_user', 'my_password', 'my_db');

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Successful Connect DB...!<br><h1>' . mysqli_get_host_info($link) . "</h1>\n<br>";

$close = mysqli_close($link);

if ($close) {
	echo "关闭DB成功！<br>";
} else {
	echo "关闭DB失败！<br>";
}

?>