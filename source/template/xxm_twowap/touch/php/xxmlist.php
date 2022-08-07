<?php

/**
 *      This is NOT a freeware, use is subject to license terms
 *      应用名称: 小熊猫-TWO手机版 商业版
 *      下载地址: https://addon.dismall.com/templates/xxm_twowap.html
 *      应用开发者: 小熊猫设计
 *      开发者QQ: 2399835618
 *      更新日期: 202208022103
 *      授权域名: www.jujugsgs.com
 *      授权码: 2022051311pz4iu7uQGu
 *      未经应用程序开发者/所有者的书面许可，不得进行反向工程、反向汇编、反向编译等，不得擅自复制、修改、链接、转载、汇编、发表、出版、发展与之有关的衍生产品、作品等
 */


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function xxmlist_img_num($tid, $uid, $threadtable) {
	$img_number = DB::result(DB::query("SELECT count(*) FROM ".DB::table('forum_attachment_'.$threadtable.'')." WHERE tid = '$tid' AND uid = '$uid' AND isimage = '1'"));
	return $img_number;
}

function xxmlist_img($tid, $uid, $num, $threadtable) {
	$list_img = DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.$threadtable.'')." WHERE tid = '$tid' AND uid = '$uid' AND isimage = '1' ORDER BY dateline ASC LIMIT $num");
	return $list_img;
}

?>