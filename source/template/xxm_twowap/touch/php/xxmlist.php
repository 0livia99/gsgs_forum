<?php

/**
 *      This is NOT a freeware, use is subject to license terms
 *      Ӧ������: С��è-TWO�ֻ��� ��ҵ��
 *      ���ص�ַ: https://addon.dismall.com/templates/xxm_twowap.html
 *      Ӧ�ÿ�����: С��è���
 *      ������QQ: 2399835618
 *      ��������: 202208022103
 *      ��Ȩ����: www.jujugsgs.com
 *      ��Ȩ��: 2022051311pz4iu7uQGu
 *      δ��Ӧ�ó��򿪷���/�����ߵ�������ɣ����ý��з��򹤳̡������ࡢ�������ȣ��������Ը��ơ��޸ġ����ӡ�ת�ء���ࡢ�������桢��չ��֮�йص�������Ʒ����Ʒ��
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