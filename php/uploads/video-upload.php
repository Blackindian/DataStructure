<?php
# 上传视频
header('content-type:text/html;charset=utf-8');
//1.包含所需文件
require_once '../PdoMySQL.class.php';
require_once '../config.php';

// $_FILES
// print_r($_FILES);
$filename=$_FILES['xvideo']['name'];
$type=$_FILES['xvideo']['type'];
$tmp_name=$_FILES['xvideo']['tmp_name'];
$size=$_FILES['xvideo']['size'];
$error=$_FILES['xvideo']['error'];

// $vurl=$_POST('vurl');
// $vurl=$_FILES['xvideo']['vurl'];


// $vname=$_FILES['xvideo']['name'];
// $vdesc=$_POST['vdesc'];
// $vuser=$_POST['vuser'];
// $vstatus=$_POST('vstatus');

# 插入video到db

//2.接收信息
// $act=$_GET['act'];
// $vname=addslashes($_POST['vname']);
// $vname=$_POST['vname'];
// $vdesc=$_POST['vdesc'];
// $vuser=$_POST['vuser'];
// $vstatus=$_POST('vstatus');
// $vtime=$_POST('vtime');
$table='video';

// $checked = true;


//3.得到连接对象
// $PdoMySQL=new PdoMySQL();
$notexist = ture;
if ($notexist) {
	// $vtime=time();
	// //完成上传的功能
	// $data=compact('vname','vurl','vdesc','vuser','vstatus','vtime');
	// $res=$PdoMySQL->add($data, $table);
	echo "<h1 style='color:green'>视频{$vname}上传成功！</h1>";
} else {
	echo "上传视频失败！";
}


