<?php
require_once '../config/config.php';

function connect() {
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PORT);

/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	return $link;

}

function fetchOne($sql, $result_type = MYSQLI_ASSOC) {
	$link = connect();
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, $result_type);
	return $row;
}

function fetchAll($sql, $result_type = MYSQLI_ASSOC) {
	$link = connect();
	$result = mysqli_query($link, $sql);
	while (@$row = mysqli_fetch_array($result, $result_type)) {
		$rows[] = $row;
	}
	return $rows;
}

function insert($table, $array) {
	$link = connect();
	$keys = join(",", array_keys($array));
	$vals = "'" . str_replace(",", "','", join(",", array_values($array))) . "'";
	$sql = "insert {$table}($keys) values({$vals})";
	// return $sql;
	mysqli_query($link, $sql);
	return mysqli_insert_id($link);
}

function update($table, $array, $where = null) {
	$str = null;
	foreach ($array as $key => $value) {
		if ($str == null) {
			$sep = "";
		} else {
			$sep = ",";
		}
		$str .= $sep . $key . "='" . $value . "'";

	}
	$link = connect();
	$sql = "update {$table} set {$str} " . ($where == null ? null : " where " . $where);
	mysqli_query($link, $sql);
	return mysqli_affected_rows($link);
}

function delete($table, $where = null) {
	$link = connect();
	$where = $where == null ? null : " where " . $where;
	$sql = "delete from {$table} {$where}";
	mysqli_query($link, $sql);
	return mysqli_affected_rows($link);
}

function getResultNum($sql) {
	$link = connect();
	$result = mysqli_query($link, $sql);
	return mysqli_num_rows($result);
}

// }
// $link = connect();
// echo $link;
// $sql = "select * from imooc_admin where id=1";
// // $row = fetchOne($link, $sql);
// $result = mysqli_query($link, $sql);
// echo $result;
// $row = mysqli_fetch_array($result, "MYSQLI_ASSOC");
// if ($row) {
// 	printf("%s %s\n", $row["username"], $row["password"]);
// } else {
// 	echo "no Data found!";
// }