<?php
function buildRandomString($type = 1, $length = 4) {

	if ($type == 1) {
		$char = join("", range(0, 9));
	} elseif ($type == 2) {
		$char = join("", array_merge(range('a', 'z'), range('A', 'Z')));
	} elseif ($type == 3) {
		$char = join("", array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9)));

	}

	if ($length > strlen($char)) {
		exit("字符长度不够");
	}

	$char = str_shuffle($char);
	return substr($char, 0, $length);

}

function getUniName() {
	// return md5(uniqid(microtime(true), true));
	// return uniqid(microtime(true), true);
	return md5(uniqid(microtime(true), true));
}

function getExt($filename) {
	$setting = explode(".", $filename);
	if (is_array($setting)) {
		return strtolower(end($setting));
	}

}