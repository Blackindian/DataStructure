<?php 
header('content-type:text/html;charset=utf-8');
print_r($_FILES);
//1.通过$_FILES文件上传变量接收上传文件信息

// <input type="file" name='myFile2016' /><br/>
#  myFile2016 数组名字

$fileInfo=$_FILES['myFile'];
$filename=$fileInfo['name'];
$type=$fileInfo['type'];
// $tmp_name=$fileInfo['tmp_name'];
$UFO_name=$fileInfo['tmp_name'];
$size=$fileInfo['size'];
$error=$fileInfo['error'];

print_r($fileInfo);
print_r($filename);
print_r($type);
// print_r($tmp_name);
print_r($UFO_name);
print_r($size);
print_r($error);

// <input type="hidden" name="MAX_FILE_SIZE" value='10485760'/>

//将服务器上的临时文件移动指定目录下,移动成功返回true，否则返回false
// move_uploaded_file($tmp_name, "uploads/".$filename);
move_uploaded_file($UFO_name, "uploads/".$filename);

// 将文件拷贝到指定目录，拷贝成功返回true,否则返回false
// copy($tmp_name,"uploads/".$filename);
copy($UFO_name,"uploads/".$filename);

//2.判断下错误号，只有为0或者是UPLOAD_ERR_OK，没有错误发生，上传成功
if($error==UPLOAD_ERR_OK){
	if(move_uploaded_file($UFO_name, "uploads/".$filename)){
		echo '文件'.$filename.'上传成功';
	}else{
		echo '文件'.$filename.'上传失败';
	}
}else{
	//匹配错误信息
	switch($error){
		case 1:
			echo '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
			break;
		case 2:
			echo '超过了表单MAX_FILE_SIZE限制的大小';
			break;
		case 3:
			echo '文件部分被上传';
			break;
		case 4:
			echo '没有选择上传文件';
			break;
		case 6:
			echo '没有找到临时目录';
			break;
		case 7:
		case 8:
			echo '系统错误';
			break;
	}
}