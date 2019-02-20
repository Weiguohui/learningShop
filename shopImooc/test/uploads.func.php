<?php
require_once '../include.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';
require_once '../lib/string.func.php';
// print_r($_FILES);

function uploadfile($fileinfo, $path = "uploads", $allowedFileType = array('txt', 'epub', 'jpg', 'png'), $imgFlag = true) {
	$filename = $fileinfo['name'];
	$type = $fileinfo['type'];
	$tmp_name = $fileinfo['tmp_name'];
	$error = $fileinfo['error'];
	$size = $fileinfo['size'];
	$newfilename = getUniName();
	$filetype = getExt($filename);
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}
	$destination = $path . "/" . $newfilename . "." . $filetype;

	if ($error == UPLOAD_ERR_OK) {
		if (!in_array($filetype, $allowedFileType)) {
			$msg = "文件类型不符合要求，请重新上传!";
			return $msg;
			exit;
		}
		if ($imgFlag) {
			$info = getimagesize($tmp_name);
			if (!$info) {
				$msg = "上传的不是图片，请重新上传";
			}
		}
		if (is_uploaded_file($tmp_name)) {
			if (move_uploaded_file($tmp_name, $destination)) {
				$msg = "上传成功!";
			}
		} else {
			$msg = "不是通过http post方式上传";
		}
	} else {
		$msg = "上传失败，请重新上传";
	}
	return $msg;
}