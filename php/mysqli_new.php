<?php
header('content-type:text/html;charset=utf-8');
require_once 'config.php';

echo "DB连接test<br>";
// $mysqli = new mysqli(host, user, password, database, port, socket);
$conn = new mysqli();
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);
// $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);
/*
$conn = new mysqli(DB_HOST, DB_USER, DB_PWD);
$conn = mysqli_select_db(DB_NAME);
*/
$connect_errno = mysqli_connect_errno();
$connect_error = mysqli_connect_error();

if (!$conn) {	
	// echo "Connection error code: {$connect_errno}<br>";
	// echo "Connection erorr message: {$connect_error}<br>";
	die("Connection error code: {$connect_errno}<br>Connection erorr message: {$connect_error}<br>");
	//die();
} else {
	echo "Connected successfully";
	try {
		// INSERT INTO video (vname,vurl,vdesc,vuser,vstatus,vtime) VALUES ($vname,$vurl,$desc,$vuser,$vstatus,$vtime);
		$sql = <<<EOF
		INSERT INTO video (vname,vurl,vdesc,vuser,vstatus,vtime) VALUES ('vname1','vurl1','desc','vuser1',0, 201605020);
EOF;
        $query = "INSERT INTO video SET vname=?,vurl=?,vdesc=?,vuser=?,vstatus=?,vtime=?";
        //
        $stmt -> mysqli_stmt_init();
        //
        $stmt -> mysqli_prepare($query);
        //
        $stmt -> mysqli_stmt_bind_param($vname,$vurl,$desc,$vuser,$vstatus,$vtime);
        //
        $array_vname = $_POST['vname'];
        $array_vurl = $_POST['vurl'];
        $array_desc = $_POST['desc'];
        $array_vuser = $_POST['vuser'];
        $array_vstatus = $_POST['vstatus'];
        $array_vtime = $_POST['vtime'];
        //
        $counter = 0;
        //
        while ( $counter<sizeof($array_vname)) {
        	$vname = $array_vname[$counter];
        	$vurl = $array_vurl[$counter];
        	$desc = $array_vdesc[$counter];
        	$vuser = $array_vuser[$counter];
        	$vstatus = $array_vstatus[$counter];
        	$vtime = $array_vtime[$counter];
        	//
        	$stmt->execute();
        	// $stmt = mysqli_execute(stmt);
        }
	} catch (Exception $e) {
		die("CURD error code:{$connect_errno}<br>CURD error message: {$connect_error}<br>");
	}
}





$conn->close();
// $mysqli = mysqli_close();
