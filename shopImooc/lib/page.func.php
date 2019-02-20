<?php
require_once '../include.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';
require_once '../lib/mysql.func.php';

function getAdminByPage($page, $pageSize = 2) {
	$sql = "select * from imooc_admin";
	$totalRows = getResultNum($sql);
	$totalPage = ceil($totalRows / $pageSize);
	if ($page < 1 || $page == null || !is_numeric($page)) {
		$page = 1;
	}
	if ($page > $totalRows) {
		$page = $totalRows;
	}
	$offset = ($page - 1) * $pageSize;
	$sql = "select * from imooc_admin limit {$offset}, {$pageSize}";
	$rows = fetchAll($sql);
	return $rows;
}

function getAdminPageNav($page, $pageSize = 2) {
	$sql = "select * from imooc_admin";
	$totalRows = getResultNum($sql);
	$totalPage = ceil($totalRows / $pageSize);
	$url = $_SERVER['PHP_SELF'];
	$p = '';
	for ($i = 1; $i < $totalPage + 1; $i++) {
		if ($page == $i) {
			$p .= "[{$i}]";
		} else {
			$p .= "<a href='{$url}?page={$i}'>[{$i}]</a>";
		}
	}
	return $p;
}

function getItemByPage($table, $page, $pageSize = 2) {
	$sql = "select * from {$table}";
	$totalRows = getResultNum($sql);
	$totalPage = ceil($totalRows / $pageSize);
	if ($page < 1 || $page == null || !is_numeric($page)) {
		$page = 1;
	}
	if ($page > $totalRows) {
		$page = $totalRows;
	}
	$offset = ($page - 1) * $pageSize;
	$sql = "select * from {$table} limit {$offset}, {$pageSize}";
	$rows = fetchAll($sql);
	return $rows;
}

function getItemPageNav($table, $page, $pageSize = 2) {
	$sql = "select * from {$table}";
	$totalRows = getResultNum($sql);
	$totalPage = ceil($totalRows / $pageSize);
	$url = $_SERVER['PHP_SELF'];
	$p = '总共' . $totalPage . '页/当前是第' . $page . '页' . '   ';
	for ($i = 1; $i < $totalPage + 1; $i++) {
		if ($page == $i) {
			$p .= "[{$i}]";
		} else {
			$p .= "<a href='{$url}?page={$i}'>[{$i}]</a>";
		}
	}
	return $p;
}

function getTotalRows($table) {
	$sql = "select * from {$table}";
	$totalRows = getResultNum($sql);
	return $totalRows;
}