<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$isHTTPS = ($_SERVER['HTTPS'] && strtolower($_SERVER['HTTPS']) != 'off') ? 1 : 0;
$identifier=$_GET['identifier'];
echo "<script>var https=$isHTTPS;var identifier='$identifier';</script><script src=\"https://addon-api.oss-cn-hangzhou.aliyuncs.com/1552.js\" type=\"text/javascript\"></script>";