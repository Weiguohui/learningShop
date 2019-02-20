<?php

require_once '../include.php';
require_once '../lib/mysql.func.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';

function addPro() {

	$table = "imooc_pro";
	$arr = $_POST;
	// print_r($arr);
	if (empty($_POST['pName'])) {
		$mes = "字段填写不完整，请<a href='addPro.php' target='mainFrame'>重新填写</a>";
	} else {
		if (insert($table, $arr)) {
			$mes = "添加成功!<br/><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
		} else {
			$mes = "添加失败!<a href='addPro.php' target='mainFrame'>继续添加</a>";
		}
	}
	return $mes;
}