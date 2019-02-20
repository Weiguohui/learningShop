<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文件上传</title>
</head>
<body>

	<form action="doAction1.php" method="post" enctype="multipart/form-data">
		请选择上传的文件：<input type="file" name="myfile" /><br />
		<input type="submit" value="上传" />
	</form>
</body>
</html>