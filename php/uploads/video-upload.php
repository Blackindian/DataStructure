<?
# 上传视频
header('content-type:text/html;charset=utf-8');
//1.包含所需文件
require_once '../PdoMySQL.class.php';
require_once '../config.php';

# 插入video到db

//2.接收信息
// $act=$_GET['act'];
// $vname=addslashes($_POST['vname']);
$vname=$_POST['vname'];
$vdesc=$_POST['vdesc'];
$vuser=$_POST['vuser'];
$vstatus=$_POST('vstatus');
// $vtime=$_POST('vtime');
$table='video';

$checked = true;


//3.得到连接对象
$PdoMySQL=new PdoMySQL();
if ($checked) {
	$vtime=time();
	//完成上传的功能
	$data=compact('vname','vdesc','vuser','vstatus','vtime');
	$res=$PdoMySQL->add($data, $table);
} else {
	echo "上传视频失败！";
}


