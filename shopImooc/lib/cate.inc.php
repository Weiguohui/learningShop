<?php
require_once 'mysql.func.php';

function addCate() {

	$table = "imooc_cate";
	$arr = $_POST;
	// print_r($arr);
	if (empty($_POST['cName'])) {
		$mes = "字段填写不完整，请<a href='addCate.php' target='mainFrame'>重新填写</a>";
	} else {
		if (insert($table, $arr)) {
			$mes = "添加成功!<br/><a href='addCate.php' target='mainFrame'>继续添加</a>|<a href='listCate.php' target='mainFrame'>查看分类列表</a>";
		} else {
			$mes = "添加失败!<a href='addCate.php' target='mainFrame'>继续添加</a>";
		}
	}
	return $mes;
}

function editCate($id) {
	$table = "imooc_cate";
	$arr[] = null;
	$arr = $_POST;

	// print_r($arr);
	if (update($table, $arr, "id={$id}")) {
		$mes = "更新成功!|<a href='listCate.php' target='mainFrame'>返回管理员列表</a>";
	} else {
		$mes = "更新失败!|<a href='listCate.php' target='mainFrame'>重新编辑</a>";
	}
	// $mes = print_r(update($table, $arr, "id={$id}"));
	return $mes;
}

function deleteCate($id) {
	$table = "imooc_cate";
	// print_r($arr);
	if (delete($table, "id={$id}")) {
		$mes = "删除成功!|<a href='listCate.php' target='mainFrame'>返回管理员列表</a>";
	} else {
		$mes = "删除失败!|<a href='listCate.php' target='mainFrame'>重试</a>";
	}
	return $mes;
}

function getAllCate() {
	$sql = "select id,cName from imooc_cate";
	$rows = fetchAll($sql);
	return $rows;
}