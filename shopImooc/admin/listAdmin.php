<?php
require_once '../include.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';
require_once '../lib/page.func.php';

//分页
$pageSize = 2;
$page = isset($_REQUEST['page']) ? (int) $_REQUEST['page'] : 1;
$rows = getAdminByPage($page, $pageSize);
$sql = "select * from imooc_admin";
$totalRows = getResultNum($sql);
$totalPage = ceil($totalRows / $pageSize);
// if ($page < 1 || $page == null || !is_numeric($page)) {
// 	$page = 1;
// }
// if ($page >= $totalPage) {
// 	$page = $totalPage;
// }

// $offset = ($page - 1) * $pageSize;
// $sql = "select * from imooc_admin limit {$offset},{$pageSize}";
// $rows = fetchAll($sql);
// $rows = getAllAdmin();

// $url = $_SERVER['PHP_SELF'];
$p = getAdminPageNav($page, $pageSize);
// for ($i = 1; $i < $totalPage + 1; $i++) {s
// 	if ($page == $i) {
// 		$p .= "[{$i}]";
// 	} else {
// 		$p .= "<a href='{$url}?page={$i}'>[{$i}]</a>";
// 	}
// }

if (!$rows) {
	alertMes("sorry,没有管理员,请添加!", "addAdmin.php");
	exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
                        </div>

                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">管理员名称</th>
                                <th width="30%">管理员邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id']; ?></label></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id']; ?>)"><input type="button" value="删除" class="btn"  onclick="deleteAdmin(<?php echo $row['id']; ?>)"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if ($totalRows > $pageSize): ?>

                            <tr>
                            	<td colspan="4"><?php echo $p; ?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function addAdmin(){
		window.location="addAdmin.php";
	}
	function editAdmin(id){
			window.location="editAdmin.php?id="+id;
	}
	function deleteAdmin(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=deleteAdmin&id="+id;
			}
	}
</script>
</html>