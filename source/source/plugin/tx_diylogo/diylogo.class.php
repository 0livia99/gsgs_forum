<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_tx_diylogo{
	function global_header(){
		global $_G;
		$url = DB::result_first("SELECT url FROM ".DB::table('plugin_tx_diylogo').' ORDER BY dateline DESC');
		if($url){
			$_G['style']['boardlogo'] = '<img src="'.$url.'" />';
		}
	}
}

?>
