<?php
require_once 'mysql.func.php';

function addUser() {

	$table = "imooc_user";
	$arr = $_POST;
	// print_r($arr);
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['sex'])) {
		$mes = "字段填写不完整，请<a href='addUser.php' target='mainFrame'>重新填写</a>";
	} else {
		$arr['password'] = md5($_POST['password']);
		// $mes = insert($table, $arr);
		if (insert($table, $arr)) {
			$mes = "添加成功!<br/><a href='addUser.php' target='mainFrame'>继续添加</a>|<a href='listUser.php' target='mainFrame'>查看用户列表</a>";
		} else {
			$mes = "添加失败!<a href='addUser.php' target='mainFrame'>继续添加</a>";
		}
	}
	return $mes;
}

function editUser($id) {
	$table = "imooc_user";
	$arr = $_POST;
	$arr['password'] = md5($_POST['password']);

	// print_r($arr);
	if (update($table, $arr, "id={$id}")) {
		$mes = "更新成功!|<a href='listUser.php' target='mainFrame'>返回用户列表</a>";
	} else {
		$mes = "更新失败!|<a href='listUser.php' target='mainFrame'>重新编辑</a>";
	}
	// $mes = print_r(update($table, $arr, "id={$id}"));
	return $mes;
}

function deleteUser($id) {
	$table = "imooc_user";
	// print_r($arr);
	if (delete($table, "id={$id}")) {
		$mes = "删除成功!|<a href='listUser.php' target='mainFrame'>返回用户列表</a>";
	} else {
		$mes = "删除失败!|<a href='listUser.php' target='mainFrame'>重试</a>";
	}
	return $mes;
}