<?php

require_once '../include.php';
require_once '../lib/mysql.func.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';
// require_once '../include.php';

function checkAdmin($sql) {
	return fetchOne($sql);
}

function getAllAdmin() {
	$sql = "select id,username,email from imooc_admin";
	return fetchAll($sql);
}

function checkLogined() {
	if ($_SESSION['ID'] == "" && $_COOKIE['adminId'] == "") {
		alertMsg("请先登录", "login.php");
	}
}

function logout() {
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), "", time() - 1);
	}
	session_destroy();
	header("location:login.php");
}

function addAdmin() {

	$table = "imooc_admin";
	$arr = $_POST;
	// print_r($arr);
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
		$mes = "字段填写不完整，请<a href='addAdmin.php' target='mainFrame'>重新填写</a>";
	} else {
		$arr['password'] = md5($_POST['password']);
		if (insert($table, $arr)) {
			$mes = "添加成功!<br/><a href='addAdmin.php' target='mainFrame'>继续添加</a>|<a href='listAdmin.php' target='mainFrame'>查看管理员列表</a>";
		} else {
			$mes = "添加失败!<a href='addAdmin.php' target='mainFrame'>继续添加</a>";
		}
	}
	return $mes;
}

function editAdmin($id) {
	$table = "imooc_admin";
	$arr[] = null;
	$arr = $_POST;
	$arr['password'] = md5($_POST['password']);

	// print_r($arr);
	if (update($table, $arr, "id={$id}")) {
		$mes = "更新成功!|<a href='listAdmin.php' target='mainFrame'>返回管理员列表</a>";
	} else {
		$mes = "更新失败!|<a href='listAdmin.php' target='mainFrame'>重新编辑</a>";
	}
	// $mes = print_r(update($table, $arr, "id={$id}"));
	return $mes;
}

function deleteAdmin($id) {
	$table = "imooc_admin";
	// print_r($arr);
	if (delete($table, "id={$id}")) {
		$mes = "删除成功!|<a href='listAdmin.php' target='mainFrame'>返回管理员列表</a>";
	} else {
		$mes = "删除失败!|<a href='listAdmin.php' target='mainFrame'>重试</a>";
	}
	return $mes;
}
