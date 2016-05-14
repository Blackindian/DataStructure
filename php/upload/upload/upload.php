<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>上传文件</title>
</head>
<body>
<form action="doAction0.php" method="post" enctype="multipart/form-data">
<label for="">上传文件的最大值：10M</label><br/>
<input type="hidden" name="MAX_FILE_SIZE" value='10485760'/>
<!-- Size；59883  58.4 KB (59,883 bytes) -->
<!-- Size on disk；60.0 KB (61,440 bytes) -->

<!-- *** 1024=k  58.479 KB ***-->
<!-- 1000=k  59.883KB-->
<label for="">请选择您要上传的文件：</label><br/>
<input type="file" name='myFile' /><br/>
<div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
<label for="">请选择您要上传的图片文件：</label><br/>
<input type="file" name="myFile"  accept="image/jpeg,image/gif,image/png"/><br/>
<br/>
<input type="submit" value="上传文件" />
</form>
</body>
</html>