<?php
//载入核心类库，其中定义了重要常量和自动处理代码

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
*      This is NOT a freeware, use is subject to license terms
*
*      $Id: admin.php 34285 2013-12-13 03:39:35Z hypowang $
*/

//载入核心类库，其中定义了重要常量和自动处理代码
require './source/class/class_core.php';
require './source/function/function_misc.php';
require './source/function/function_forum.php';
require './source/function/function_admincp.php';
require './source/function/function_cache.php';

C::app()->init();
global $_G;

$setting = C::t('common_setting')->fetch_all(null);
$setting['regverify'] = 2 ;

//var_dump($setting['regverify']);
C::t('common_setting')->update_batch($setting);
DB::query("UPDATE %t SET modnewposts=2",array('forum_forum'));
updatecache('setting','forums');