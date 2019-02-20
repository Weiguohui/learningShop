<?php
require_once '../include.php';
require_once '../core/admin.inc.php';
checkLogined();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="style/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">慕课电子商务后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href="#">慕课首页</a></div>
        <div class="link fr">
            <span>欢迎
                <?php
if (isset($_SESSION['AdminName'])) {
	echo $_SESSION['AdminName'];
} elseif (isset($_POST['AdminName'])) {
	echo $_POST['AdminName'];
}
?>
            </span>
            <a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">详细信息</div>
                    <!-- 嵌套网页开始 -->
                    <iframe src="main.php" frameborder="0" name="mainFrame" width="100%" height="600" scrolling="no">

                    </iframe>

                    <!-- 嵌套网页结束 -->
                </div>
            </div>

            <!--左侧列表-->
            <div class="menu">
                <div class="cont">
                    <div class="title">管理员</div>
                    <ul class="mList">
                            <li>
                            <h3><span>-</span>用户管理</h3>
                            <dl>
                                <dd><a href="addUser.php" target="mainFrame">添加用户</a></dd>
                                <dd><a href="listUser.php" target="mainFrame">管理用户</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3><span>+</span>管理员管理</h3>
                            <dl>
                                <dd><a href="addAdmin.php"  target="mainFrame" >添加管理员</a></dd>
                                <dd><a href="listAdmin.php" target="mainFrame">管理员管理</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3><span>-</span>商品分类管理</h3>
                            <dl>
                                <dd><a href="addCate.php" target="mainFrame">添加商品分类</a></dd>
                                <dd><a href="listCate.php" target="mainFrame">商品分类管理</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3><span>-</span>商品管理</h3>
                            <dl>
                                <dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                                <dd><a href="listPro.php" target="mainFrame">商品管理</a></dd>
                            </dl>
                        </li>
                        <li>
                            <h3><span>+</span>订单管理</h3>
                            <dl>
                                <dd><a href="#" target="mainFrame">订单修改</a></dd>
                                <dd><a href="#" target="mainFrame">订单又修改</a></dd>
                                <dd><a href="#" target="mainFrame">订单总是修改</a></dd>
                                <dd><a href="#" target="mainFrame">测试内容你看着改</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>