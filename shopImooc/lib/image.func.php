<?php
require_once '../include.php';
require_once 'string.func.php';

function verifyImage($type = 1,
	$length = 4, $pixel = 0, $line = 0, $sess_name = "verify") {
	$chars = buildRandomString($type, $length);
//echo $chars;

	$width = 80;
	$height = 30;
	$image = imagecreatetruecolor($width, $height);

	$white = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 0, 0, 0);
	imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
	$fontfiles = array("MAIAN.TTF", "MixTitanica.ttf");

	$_SESSION[$sess_name] = $chars;
	for ($i = 0; $i < $length; $i++) {
		$size = mt_rand(14, 18);
		$angle = mt_rand(-10, 10);
		$x = 5 + $i * $size;
		$y = mt_rand(20, 26);
		$color = imagecolorallocate($image, mt_rand(80, 160), mt_rand(100, 220), mt_rand(140, 255));
		$fontfile = "/Applications/MAMP/htdocs/shopImooc/fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];
		$text = substr($chars, $i, 1);
		imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);

	}

	for ($i = 0; $i < $pixel; $i++) {
		imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
	}

	for ($i = 0; $i < $line; $i++) {
		imageline($image, mt_rand(0, $width / 4), mt_rand(5, $height), mt_rand($width / 2, $width), mt_rand(5, $height), $black);
	}

	header('Content-type:image/png');
	imagepng($image);
	imagedestroy($image);
}