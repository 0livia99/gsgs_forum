<?php

/**
 *      $author: ³ËÁ¹ $
 */

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_avatarrefresh {

	public static $identifier = 'avatarrefresh';

	function __construct() {
		global $_G;
		$setconfig = $_G['cache']['plugin'][self::$identifier];
		$this->setconfig = $setconfig;
	}

	function avatar($value){
		global $_G;
		$setconfig = $this->setconfig;
		list($uid, $size, $returnsrc, $real, $static, $ucenterurl) = $value['param'];
		static $staticavatar;
		if($staticavatar === null) {
			$staticavatar = $_G['setting']['avatarmethod'];
		}

		$ucenterurl = empty($ucenterurl) ? $_G['setting']['ucenterurl'] : $ucenterurl;
		$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
		$uid = abs(intval($uid));
		if(!$staticavatar && !$static) {
			$random = (!$setconfig['refresh_myself'] || $uid == $_G['uid']) ? "&random=".rand(1000, 9999) : "";
			$_G['hookavatar'] = $returnsrc ? $ucenterurl.'/avatar.php?uid='.$uid.'&size='.$size.($real ? '&type=real' : '').$random : '<img src="'.$ucenterurl.'/avatar.php?uid='.$uid.'&size='.$size.($real ? '&type=real' : '').$random.'" />';
		} else {
			$uid = sprintf("%09d", $uid);
			$dir1 = substr($uid, 0, 3);
			$dir2 = substr($uid, 3, 2);
			$dir3 = substr($uid, 5, 2);
			$random = (!$setconfig['refresh_myself'] || $uid == $_G['uid']) ? "?random=".rand(1000, 9999) : "";
			$file = $ucenterurl.'/data/avatar/'.$dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2).($real ? '_real' : '').'_avatar_'.$size.'.jpg'.$random;
			$_G['hookavatar'] = $returnsrc ? $file : '<img src="'.$file.'" onerror="this.onerror=null;this.src=\''.$ucenterurl.'/images/noavatar_'.$size.'.gif\'" />';
		}
	}

}

?>