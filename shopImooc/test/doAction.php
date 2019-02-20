<?php
require_once '../include.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';
require_once '../lib/string.func.php';
// print_r($_FILES);
$filename = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$tmp_name = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];
$size = $_FILES['myfile']['size'];
$newfilename = getUniName();
$filetype = getExt($filename);
$path = "uploads";
if (!file_exists($path)) {
	mkdir($path, 0777, true);
}
$destination = $path . "/" . $newfilename . "." . $filetype;
$allowedFileType = array('txt', 'epub', 'jpg', 'png');
$imgFlag = true;

if ($error == UPLOAD_ERR_OK) {
	if (!in_array($filetype, $allowedFileType)) {
		$msg = "文件类型不符合要求，请重新上传!";
		alertMsg($msg, "upload.php");
		exit;
	}
	if ($imgFlag) {
		$info = getimagesize($tmp_name);
		if (!$info) {
			$msg = "上传的不是图片，请重新上传";
			alertMsg($msg, "upload.php");
		}
	}
	if (is_uploaded_file($tmp_name)) {
		if (move_uploaded_file($tmp_name, $destination)) {
			$msg = "上传成功!";
			alertMsg($msg, "upload.php");
		}
	} else {
		$msg = "不是通过http post方式上传";
		alertMsg($msg, "upload.php");
	}
} else {
	$msg = "上传失败，请重新上传";
	alertMsg($msg, "upload.php");
}