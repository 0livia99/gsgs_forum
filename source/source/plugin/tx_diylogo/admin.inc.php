<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

if(!submitcheck('submit', 1)) {
	$url = DB::result_first("SELECT url FROM ".DB::table('plugin_tx_diylogo').' ORDER BY dateline DESC');
	include(template("tx_diylogo:admin"));
} else {
	if($_FILES['logo']['error'] !== 0) {
		cpmsg('File Not Exist');
	}
	if(!in_array(strtolower(fileext($_FILES['logo']['name'])), array('jpg', 'gif', 'png'))) {
		cpmsg('File Ext Error');
	}

	$upload = new discuz_upload();
	if($upload->init($_FILES['logo'], 'common') && $upload->save(1)) {
		$url = (!strstr($_G['setting']['attachurl'], '://') ? $_G['siteurl'] : '').$_G['setting']['attachurl'].'common/'.$upload->attach['attachment'];
		DB::insert('plugin_tx_diylogo', array(
			'url' => $url,
			'dateline' => $_G['timestamp']
		));
		cpmsg('Upload Success!');
	} else {
		cpmsg('Upload Failure');
	}
}

?>
