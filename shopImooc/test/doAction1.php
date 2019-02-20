<?php
require_once '../include.php';
require_once '../core/admin.inc.php';
require_once '../lib/common.func.php';
require_once '../lib/string.func.php';
require_once 'uploads.func.php';
// print_r($_FILES);
$fileinfo = $_FILES['myfile'];
$info = uploadfile($fileinfo);
// echo $info;

alertMsg($info, 'filelist.php');