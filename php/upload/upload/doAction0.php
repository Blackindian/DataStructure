<?php 
header('content-type:text/html;charset=utf-8');

//$_FILES：文件上传变量
print_r($_FILES);
// exit;

$filename=$_FILES['myFile']['name'];
$type=$_FILES['myFile']['type'];
$tmp_name=$_FILES['myFile']['tmp_name'];
$size=$_FILES['myFile']['size'];
$error=$_FILES['myFile']['error'];

//将服务器上的临时文件移动指定目录下,移动成功返回true，否则返回false
// move_uploaded_file($tmp_name,$destination);

// 将文件拷贝到指定目录，拷贝成功返回true,否则返回false
//copy($src,$dst):

// move_uploaded_file($tmp_name, "uploads/".$filename);

// copy($tmp_name,"uploads/".$filename);