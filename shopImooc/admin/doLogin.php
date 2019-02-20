<?php
require_once '../include.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';
// require_once '/Applications/MAMP/htdocs/shopImooc/core/admin.inc.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$autoFlag = $_POST['autoFlag'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];

// if ($verify != $verify1) {
// 	alertMsg("验证码不正确", "login.php");
// }
if ($verify == $verify1) {
	$sql = "select * from imooc_admin where username='{$username}'and password='{$password}'";
	$row = checkAdmin($sql);
	print_r($row);
	if ($row) {
		if ($autoFlag) {
			setcookie("adminId", $row[id], 7 * 24 * 3600);
			setcookie("adminName", $row[username], 7 * 24 * 3600);
		}
		$_SESSION['AdminName'] = $row['username'];
		$_SESSION['ID'] = $row['id'];
		// print_r($row);
		alertMsg("登陆成功", "index.php");
	} else {
		alertMsg("密码不正确", "login.php");
	}
} else {
	alertMsg("验证码不正确", "login.php");
}