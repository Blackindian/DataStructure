<?php 
header('content-type:text/html;charset=utf-8');
require_once '../config.php';

// $vname=$_POST['vname'];
// $vdesc=$_POST['vdesc'];
// $vurl=$_POST['vurl'];
// $vuser=$_POST['vuser'];
// $vstatus=$_POST('vstatus');
// $vtime = =$_POST('vtime');

$vname="dsqc01";
$vdesc="数据结构课程简介";
$vurl="G:\wwwRoot\DataStructure\sources\video";
$vuser="admin";
$vstatus= 0;
$vtime = time();


echo "DB连接test<br>";
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);
// $newdb = mysqli_select_db(link, database);
$mysqli_connect_errno = mysqli_connect_errno();
$mysqli_connect_error = mysqli_connect_error();

if (!$conn) {
	echo "DB连接失败！<br>";
	// echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br>";
	echo "错误信息: {$mysqli_connect_error}<br>";
} else {
	echo "DB连接成功！<br>";
	mysqli_autocommit($conn,FALSE);
	// 关闭自动连接
	$sql = <<<EOF
	// INSERT INTO video (vname,vurl,vdesc,vuser,vstatus,vtime) VALUES ($vname,$vurl,$desc,$vuser,$vstatus,$vtime);
	INSERT INTO video (vname,vurl,vdesc,vuser,vstatus,vtime) VALUES ('vname1','vurl1','desc','vuser1',0, 201605020);
	INSERT INTO video('vname','vurl','vdesc','vuser','vstatus','vtime') VALUES ('vname1','vurl1','desc','vuser1',0, 201605020);
EOF;
	if (mysqli_query($conn,$sql)) {
		echo "插入成功！<br>";
	} else {
		echo "插入error！<br>";
	}
	
	mysqli_commit($conn);
	mysqli_rollback($conn);
	// mysqli_close($conn);

}

if (!$conn)
{
    // die("连接失败: " . mysqli_connect_errno());
     die("连接失败！<br> 错误代码：{$mysqli_connect_errno}<br>");
}

if(mysqli_close($conn)){
	echo "数据库成功关闭！<br>";
}



