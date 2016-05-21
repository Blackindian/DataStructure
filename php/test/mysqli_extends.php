<?php
# 面向对象风格 when extending mysqli class

// header('content-type:text/html;charset=utf-8');
require_once '../../../../secret_config.php';
// require_once

echo '<p style="color:rgba(0,255,0,0.7);">面向对象风格 when extending mysqli class: DB 连接 test!</p><br>';

class foo_mysqli extends mysqli {
    public function __construct($host, $user, $pass, $db) {
        parent::__construct($host, $user, $pass, $db);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }
}

# DB_HOST DB_USER DB_PWD DB_NAME DB_PORT DB_TYPE DB_CHARSET
$db = new foo_mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME,DB_PORT);
// $db = new foo_mysqli('localhost', 'my_user', 'my_password', 'my_db');


	echo 'Successful Connect DB...!<br><h1>' . $db->host_info . "</h1>\n<br>";

$close = $db->close();

if ($close) {
	echo "关闭DB成功！<br>";
} else {
	echo "关闭DB失败！<br>";
}

?>