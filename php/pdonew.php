<?php 
header('content-type:text/html;charset=utf-8');
// require_once 'config.php';

require_once '../../../secret_config.php';
# 安全目录 (放在网站根目录以外的地方)

// define("DB_HOST",'localhost');//主机URL
// # define("DB_HOST",'127.0.0.1');//主机URL
// define("DB_USER",'root');//用户名
// define('DB_PWD','123456');//密码
// define('DB_NAME','dsqcx');//数据库名
// define('DB_PORT','3306');//端口
// define('DB_TYPE','mysql');//数据库类型
// define('DB_CHARSET','utf8');//字符编码

$html51 = <<<EOF
         <!DOCTYPE html>
         <html lang="en">
         <head>
         	<meta charset="UTF-8">
         	<title>MySQLi && PDO</title>
         </head>
         <body>
EOF;
echo "{$html51}";
$html52 = <<<EOF
		  </body>
		  </html>
EOF;

echo "DB连接test<br>";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

$UFT8 = mysqli_set_charset($conn,"utf8");

if ($conn) {
	echo "DB连接成功！<br>";
} else {
	echo "DB连接失败！<br>";
}
// $db = mysqli_select_db(link, database);
$db = mysqli_select_db($conn, dsqcx);
if ($db) {
	echo "选择DB成功！<br><hr>";
} else {
	echo "选择DB失败！<br><hr>";
}
/*
	// $sql = mysqli_query(link, query,MYSQLI_USE_RESULT);
	// $sql = mysqli_query(link, query,MYSQLI_STORE_RESULT);//默认
	// $sql = mysqli_query(link, query);
*/
$query = "INSERT INTO video (vname,vurl,vdesc,vuser,vstatus,vtime) VALUES ('数据库','vurl6','desc6','vuser6',0, 201605020);";
$result = mysqli_query($conn, $query);

if ($result) {
	echo "插入数据成功！<br><hr>";
	// $i = 0;
	// $row = mysqli_fetch_row($result);
	// $lengths = mysqli_fetch_lengths($result);
	// // $close = mysqli_free_result($result);

	// foreach ( $lengths as $i => $val) {
 //        printf("Field %2d has Length %2d\n", $i+1, $val);
 //    }
 //    mysqli_free_result($result);
} else {
	echo "插入数据失败！<br><hr>";
}

// $sql = "SELECT * FROM  video WHERE id='70'";
// 一行结果 ok
$sql = "SELECT * FROM  video";
// 多行结果 ok
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_all($res);
// 返回二维数组结果
$data1 = array();
$data1 = $row[0];
$data2 = array();
$data2 = $row[1];
$data5 = array();
$data5 = $row[5];

// $data = array();
$row_line = mysqli_num_rows($res);
// for ($i=0; $i < $row_line; $i++) { 
// 	$data[$i] = $row[$i];
// 	echo "string{$data[$i]}<br>";
// }

// $row = mysqli_fetch_row($res);
// 返回一行结果
// $row = mysql_fetch_array($res);
// 返回数组结果

// var_dump && print_r 输出结果测试
// print_r($row);
// var_dump($row);

// echo "<hr>一维数组：索引数组 begin<hr>";
// $id = $row[0];
// $vname = $row[1];
// $vurl = $row[2];
// $vdesc = $row[3];
// $vuser = $row[4];
// $vstatus = $row[5]; 
// $vtime = $row[6];
// echo "id:{$row[0]}<br>vname:{$row[1]}<br>vurl:{$row[2]}<br>vdesc:{$row[3]}<br>vuser:{$row[4]}<br>vstatus:{$row[5]}<br>vtime: {$row[6]}<br>\n<br>";
// printf("id: %s<br>vname: %s<br>vurl: %s<br>vdesc: %s<br>vuser: %s<br>vstatus: %s<br>vtime: %s <br>", $id,$vname,$vurl,$vdesc,$vuser,$vstatus,$vtime);
// echo "<hr>一维数组：索引数组 end<hr>";

// echo "<hr>二维数组：关联数组 begin<hr>";
// $datax = array();
// $datax =$row[5];

// $id = $datax[0];
// $vname = $datax[1];
// $vurl = $datax[2];
// $vdesc = $datax[3];
// $vuser = $datax[4];
// $vstatus = $datax[5]; 
// $vtime = $datax[6];

// echo "id:{$datax[0]}<br>vname:{$datax[1]}<br>vurl:{$datax[2]}<br>vdesc:{$datax[3]}<br>vuser:{$datax[4]}<br>vstatus:{$datax[5]}<br>vtime: {$datax[6]}<br>\n<br>";
// printf("id: %s<br>vname: %s<br>vurl: %s<br>vdesc: %s<br>vuser: %s<br>vstatus: %s<br>vtime: %s <br>", $id,$vname,$vurl,$vdesc,$vuser,$vstatus,$vtime);
// echo "<hr>二维数组：关联数组 end<hr>";

$table = <<<EOF
         <table style="color:red; border:3px solid #0f0;" border="1" >
            <caption>video 存储信息表：</caption>
            <colgroup>
                <col span="1" style="background-color:yellow">
                <col span="3" style="background-color:rgba(0,255,0,0.5);">
                <col span="3" style="background-color:rgba(255,0,255,0.5);">
             </colgroup>
         	<thead>
 	         	<tr>
 		         	<th>id</th>
 		         	<th>vname</th>
 		         	<th>vurl</th>
 		         	<th>vdesc</th>
 		         	<th>vuser</th>
 		         	<th>vstatus</th>
 		         	<th>vtime</th>
 	         	</tr>
         	</thead>
         	<tbody>
 	         	<tr>
 		         	<td>$data1[0]</td>
 		         	<td>$data1[1]</td>
 		         	<td>$data1[2]</td>
 		         	<td>$data1[3]</td>
 		         	<td>$data1[4]</td>
 		         	<td>$data1[5]</td>
 		         	<td>$data1[6]</td>
 	         	</tr>
 	         	<tr>
 		         	<td>$data2[0]</td>
 		         	<td>$data2[1]</td>
 		         	<td>$data2[2]</td>
 		         	<td>$data2[3]</td>
 		         	<td>$data2[4]</td>
 		         	<td>$data2[5]</td>
 		         	<td>$data2[6]</td>
 	         	</tr>
 	         	<tr>
 		         	<td>$data5[0]</td>
 		         	<td>$data5[1]</td>
 		         	<td>$data5[2]</td>
 		         	<td>$data5[3]</td>
 		         	<td>$data5[4]</td>
 		         	<td>$data5[5]</td>
 		         	<td>$data5[6]</td>
 	         	</tr>
         	</tbody>
         	<tfoot>
 	         	<tr>
 		         	<th>sum:{$row_line}</th>
 		         	<th>sum:{$row_line}</th>
 		         	<th>sum:{$row_line}</th>
 		         	<th>sum:{$row_line}</th>
 		         	<th>sum:{$row_line}</th>
 		         	<th>sum:{$row_line}</th>
 		         	<th>sum:{$row_line}</th>
 	         	</tr>
         	</tfoot>
         </table>
EOF;
    echo "{$table}";
// var_dump($row);
/*
<td>$data1[0]</td>
<td>$data1[1]</td>
<td>$data1[2]</td>
<td>$data1[3]</td>
<td>$data1[4]</td>
<td>$data1[5]</td>
<td>$data1[6]</td>
*/
// while ($array) {
// 		$id = $array[0];
// 		$vname = $array[1];
// 		$vurl = $array[2];
// 		$vdesc = $array[3];
// 		$vuser = $array[4];
// 		$vstatus = $array[5]; 
// 		$vtime = $array[6];
// 		//
// 		printf("id: %s;vname: %s; vurl: %s", $id,$vname,$vurl);
// }
if ($row) {
	echo "查询数据成功！<br><hr>";
	//输出 结果集！
	// $row_cnt = $result->num_rows;
	$row_cnt = mysqli_num_rows($res);
	$field_cnt = mysqli_num_fields($res);

	printf("结果集有 %d 行：rows.\n<br>", $row_cnt);
	printf("结果集有 %d 列：field.\n<br>", $field_cnt);
	// $array = mysqli_fetch_row($result);
} else {
	echo "查询数据失败！<br><hr>";
}

// $resclose = mysqli_free_result($result);
// if ($resclose) {
// 	echo "结果集关闭成功！<br><hr>";
// } else {
// 	echo "结果集关闭失败！<br><hr>";
// }



$close = mysqli_close($conn);
if ($close) {
	echo "关闭DB成功！<br><hr>";
} else {
	echo "关闭DB失败！<br><hr>";
}















echo "{$html52}";