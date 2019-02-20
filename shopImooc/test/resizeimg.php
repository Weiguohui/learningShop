<?php
function thumb($filename, $scale = 0.5) {
	list($src_w, $src_h, $imagetype) = getimagesize($filename);
	if (is_null($dst_w) || is_null($dst_h)) {
		$dst_w = ceil($src_w * $scale);
		$dst_h = ceil($src_h * $scale);
	}

	$mime = image_type_to_mime_type($imagetype);
	$createFun = str_replace("/", "createfrom", $mime);
	$outFun = str_replace("/", null, $mime);
	$src_image = $createFun($filename);
	$dst_image = imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
	header('content-type:image/png');
	imagepng($dst_image);
	imagedestroy($src_image);
	imagedestroy($dst_image);
}