<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_usergroup');
0
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_usergroup_header.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_footer.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_usergroup_header.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_footer.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_usergroup_header.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_footer.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header_name.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header_name.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header_name.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header_name.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header_name.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
|| checktplrefresh('./template/default/home/spacecp_usergroup.htm', './template/default/home/spacecp_header_name.htm', 1659872597, '3', './data/template/3_3_home_spacecp_usergroup.tpl.php', './template/acgi_ox0', 'home/spacecp_usergroup')
;?><?php include template('common/header'); if(in_array($do, array('buy', 'exit'))) { ?>
<div class="f_c">
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>"><?php if($join) { ?>?????????? <?php echo $group['grouptitle'];?><?php } else { ?>?????????? <?php echo $group['grouptitle'];?><?php } ?></em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="????">????</a></span><?php } ?>
</h3>

<form id="buygroupform_<?php echo $groupid;?>" name="buygroupform_<?php echo $groupid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=usergroup&amp;do=<?php echo $do;?>&amp;groupid=<?php echo $groupid;?>"<?php if(!empty($_GET['inajax'])) { ?> onsubmit="ajaxpost('buygroupform_<?php echo $groupid;?>', 'return_<?php echo $_GET['handlekey'];?>', 'return_<?php echo $_GET['handlekey'];?>', 'onerror');return false;"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="buysubmit" value="true" />
<input type="hidden" name="gid" value="<?php echo $_GET['gid'];?>" />

<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="c">
<table class="list" cellspacing="0" cellpadding="0" style="width:300px">
<?php if($join) { if($group['dailyprice']) { ?>
<tr>
<td>??????</td><td> <?php echo $group['dailyprice'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?></td>
</tr>
<tr>
<td>??????????????</td><td><?php echo $usermaxdays;?> ??</td>
</tr>
<tr>
<td>????????</td><td><input type="text" size="2" name="days" value="<?php echo $group['minspan'];?>" class="px" onkeyup="change_credits_need(this.value)" /> ??</td>
</tr>
<tr>
<td>????<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?></td><td><span id="credits_need"></span> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?>
<script language="javascript">
var dailyprice = <?php echo $group['dailyprice'];?>;
function change_credits_need(daynum) {
if(!isNaN(parseInt(daynum))) {
$('credits_need').innerHTML = parseInt(daynum) * dailyprice;
} else {
$('credits_need').innerHTML = '0';
}
}
change_credits_need(<?php echo $group['minspan'];?>);
</script></td>
</tr>
<tr>
<td colspan="2">????:
<?php if($join) { ?>
????????????????????????????????????????????<br/>???????????? <?php echo $group['minspan'];?> ?????????????????????????? 
<?php } else { ?>
?????????????????????????????????????????????????????????????????????????????????????????????????????????? 
<?php } ?>
</td>
</tr>
<?php } else { ?>
<tr>
<td colspan="2">????: ????????????????????????????????????????????????????????</td>
</tr>
<?php } } else { ?>
<tr>
<td colspan="2">????:
<?php if($group['type'] != 'special' || $group['system']=='private') { ?>
????: ??????????????????????????????????????????????????????????????
<?php } elseif($group['dailyprice']) { ?>
?????????????????????????????????????????????????????????????????????????????????????????????????????????? 
<?php } else { ?>
?????????????????????????????????????????????? 
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
</div>
<p class="o pns">
<button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="pn pnc"><strong>????</strong></button>
</p>
</form>
</div>

<?php } elseif($do == 'switch') { ?>
<div class="f_c">
<h3 class="flb">
<em id="return_<?php echo $_GET['handlekey'];?>">?????? <?php echo $group['grouptitle'];?></em>
<?php if($_G['inajax']) { ?><span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="????">????</a></span><?php } ?>
</h3>
<form id="switchgroupform_<?php echo $groupid;?>" name="switchgroupform_<?php echo $groupid;?>" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=usergroup&amp;do=switch&amp;groupid=<?php echo $groupid;?>"<?php if(!empty($_GET['inajax'])) { ?> onsubmit="ajaxpost('switchgroupform_<?php echo $groupid;?>', 'return_<?php echo $_GET['handlekey'];?>', 'return_<?php echo $_GET['handlekey'];?>', 'onerror');return false;"<?php } ?>>
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<input type="hidden" name="groupsubmit" value="true" />
<input type="hidden" name="gid" value="<?php echo $_GET['gid'];?>" />

<?php if($_G['inajax']) { ?><input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>" /><?php } ?>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<div class="c">
<table class="list" cellspacing="0" cellpadding="0" style="width:300px">
<tr>
<td>??????????</td><td><?php echo $_G['group']['grouptitle'];?></td>
</tr>
<tr>
<td>??????????</td><td><?php echo $group['grouptitle'];?></td>
</tr>
</table>
</div>
<p class="o pns">
<button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="pn pnc"><strong>????</strong></button>
</p>
</form>
</div>
<?php } elseif($do == 'forum') { ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="????"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=spacecp">????</a> <em>&rsaquo;</em><?php if($actives['profile']) { ?>
????????
<?php } elseif($actives['verify']) { ?>
????
<?php } elseif($actives['avatar']) { ?>
????????
<?php } elseif($actives['credit']) { ?>
????
<?php } elseif($actives['usergroup']) { ?>
??????
<?php } elseif($actives['privacy']) { ?>
????????
<?php } elseif($actives['sendmail']) { ?>
????????
<?php } elseif($actives['password']) { ?>
????????
<?php } elseif($actives['promotion']) { ?>
????????
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><?php if($actives['profile']) { ?>
????????
<?php } elseif($actives['verify']) { ?>
????
<?php } elseif($actives['avatar']) { ?>
????????
<?php } elseif($actives['credit']) { ?>
????
<?php } elseif($actives['usergroup']) { ?>
??????
<?php } elseif($actives['privacy']) { ?>
????????
<?php } elseif($actives['sendmail']) { ?>
????????
<?php } elseif($actives['password']) { ?>
????????
<?php } elseif($actives['promotion']) { ?>
????????
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></h1>
<!--don't close the div here--><?php if(!empty($_G['setting']['pluginhooks']['spacecp_usergroup_top'])) echo $_G['setting']['pluginhooks']['spacecp_usergroup_top'];?><ul class="tb cl">
<?php if($usergroups) { ?>
<li class="y<?php echo $activegs['my'];?> showmenu" id="gmy" onmouseover="showMenu(this.id)"><a href="home.php?mod=spacecp&amp;ac=usergroup">??????????</a></li>
<li class="y<?php echo $activegs['upgrade'];?> showmenu" id="gupgrade" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<li class="y<?php echo $activegs['user'];?> showmenu" id="guser" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<li class="y<?php echo $activegs['admin'];?> showmenu"id="gadmin" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<?php } ?>
<li<?php echo $activeus['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">??????????</a></li>
<li<?php echo $activeus['list'];?> <?php echo $activeus['expiry'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=list">??????????</a></li>
<li<?php echo $activeus['forum'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=forum">????<?php echo $_G['setting']['navs']['2']['navname'];?>????</a></li>
</ul><table cellpadding="0" cellspacing="0" class="tdat ftb mtm mbm">
<tr class="alt">
<th class="xw1">????????</th><?php if(is_array($perms)) foreach($perms as $perm) { ?><td class="xw1"><?php echo $permlang['perms_'.$perm];?></td>
<?php } ?>
</tr><?php $key = 1;?><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $fid => $forum) { if($forum['status']) { ?>
<tr <?php if($key++%2==0) { ?>class="alt"<?php } ?>>
<th<?php if($forum['type'] == 'forum') { ?> style="padding-left:30px"<?php } elseif($forum['type'] == 'sub') { ?> style="padding-left:60px"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><?php echo $forum['name'];?></a></th><?php if(is_array($perms)) foreach($perms as $perm) { ?><td>
<?php if(!empty($verifyperm[$fid][$perm])) { if($myverifyperm[$fid][$perm] || $forumperm[$fid][$perm]) { ?>
<img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" class="vm" />
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" class="vm" />
<?php } ?>
&nbsp;<?php echo $verifyperm[$fid][$perm];?>
<?php } else { if($forumperm[$fid][$perm]) { ?><img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" /><?php } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" /><?php } } ?>
</td>
<?php } ?>
</tr>
<?php } } ?>
</table>
<img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" class="vm" /> ????????????&nbsp;
<img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" class="vm" /> ????????????&nbsp;
<?php if($_G['setting']['verify']['enabled']) { echo implode('', $verifyicon); ?> ??????????????????????
<?php } ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_usergroup_bottom'])) echo $_G['setting']['pluginhooks']['spacecp_usergroup_bottom'];?>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">????</h2>
<ul>
<li<?php echo $actives['avatar'];?>><a href="home.php?mod=spacecp&amp;ac=avatar">????????</a></li>
<li<?php echo $actives['profile'];?>><a href="home.php?mod=spacecp&amp;ac=profile">????????</a></li>
<?php if($_G['setting']['verify']['enabled'] && allowverify()) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>">????</a></li>
<?php } ?>
<li<?php echo $actives['credit'];?>><a href="home.php?mod=spacecp&amp;ac=credit">????</a></li>
<li<?php echo $actives['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">??????</a></li>
<li<?php echo $actives['privacy'];?>><a href="home.php?mod=spacecp&amp;ac=privacy">????????</a></li>

<?php if($_G['setting']['sendmailday']) { ?><li<?php echo $actives['sendmail'];?>><a href="home.php?mod=spacecp&amp;ac=sendmail">????????</a></li><?php } ?>
<li<?php echo $actives['password'];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password">????????</a></li>

<?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
<li<?php echo $actives['promotion'];?>><a href="home.php?mod=spacecp&amp;ac=promotion">????????</a></li>
<?php } if(!empty($_G['setting']['plugins']['spacecp'])) { if(is_array($_G['setting']['plugins']['spacecp'])) foreach($_G['setting']['plugins']['spacecp'] as $id => $module) { if(in_array($module['adminid'], array(0, -1)) || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div></div>
</div>
<?php } elseif($do == 'expiry' || $do == 'list') { ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="????"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=spacecp">????</a> <em>&rsaquo;</em><?php if($actives['profile']) { ?>
????????
<?php } elseif($actives['verify']) { ?>
????
<?php } elseif($actives['avatar']) { ?>
????????
<?php } elseif($actives['credit']) { ?>
????
<?php } elseif($actives['usergroup']) { ?>
??????
<?php } elseif($actives['privacy']) { ?>
????????
<?php } elseif($actives['sendmail']) { ?>
????????
<?php } elseif($actives['password']) { ?>
????????
<?php } elseif($actives['promotion']) { ?>
????????
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><?php if($actives['profile']) { ?>
????????
<?php } elseif($actives['verify']) { ?>
????
<?php } elseif($actives['avatar']) { ?>
????????
<?php } elseif($actives['credit']) { ?>
????
<?php } elseif($actives['usergroup']) { ?>
??????
<?php } elseif($actives['privacy']) { ?>
????????
<?php } elseif($actives['sendmail']) { ?>
????????
<?php } elseif($actives['password']) { ?>
????????
<?php } elseif($actives['promotion']) { ?>
????????
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></h1>
<!--don't close the div here--><?php if(!empty($_G['setting']['pluginhooks']['spacecp_usergroup_top'])) echo $_G['setting']['pluginhooks']['spacecp_usergroup_top'];?><ul class="tb cl">
<?php if($usergroups) { ?>
<li class="y<?php echo $activegs['my'];?> showmenu" id="gmy" onmouseover="showMenu(this.id)"><a href="home.php?mod=spacecp&amp;ac=usergroup">??????????</a></li>
<li class="y<?php echo $activegs['upgrade'];?> showmenu" id="gupgrade" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<li class="y<?php echo $activegs['user'];?> showmenu" id="guser" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<li class="y<?php echo $activegs['admin'];?> showmenu"id="gadmin" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<?php } ?>
<li<?php echo $activeus['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">??????????</a></li>
<li<?php echo $activeus['list'];?> <?php echo $activeus['expiry'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=list">??????????</a></li>
<li<?php echo $activeus['forum'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=forum">????<?php echo $_G['setting']['navs']['2']['navname'];?>????</a></li>
</ul><p class="tbmu"><span class="y">
???????? <span class="xi1"> <?php echo $usermoney;?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?></span></span>
??????????: <?php echo $_G['cache']['usergroups'][$_G['groupid']]['grouptitle'];?>
</p>
<?php if($do == 'expiry') { ?>
<div class="notice">????????????????????????????????????????????????????????????</div>
<?php } if($expirylist) { ?>
<table cellspacing="0" cellpadding="0" class="dt mtm mbm">
<tbody class="th">
<tr>
<th>??????</th>
<th>??????</th>
<th>??????????????</th>
<th>????????</th>
<th></th>
</tr>
</tbody>
<tbody><?php if(is_array($expirylist)) foreach($expirylist as $groupid => $group) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $groupid;?>" class="xi2" target="_blank"><?php echo $group['grouptitle'];?></a></td>
<td>
<?php if($_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy' && $group['dailyprice']) { ?>
<?php echo $group['dailyprice'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?>
<?php } elseif($_G['cache']['usergroups'][$groupid]['pubtype'] == 'free') { ?>
????
<?php } ?>
</td>
<td><?php if($group['usermaxdays']) { ?><?php echo $group['usermaxdays'];?> ??<?php } ?></td>
<td><?php echo $group['time'];?></td>
<td>
<?php if(in_array($groupid, $extgroupids) || $groupid == $_G['groupid']) { if($groupid != $_G['groupid']) { if(!$group['noswitch']) { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=switch&amp;groupid=<?php echo $groupid;?>&amp;handlekey=switchgrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } if(!$group['maingroup']) { if($_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy') { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=buy&amp;groupid=<?php echo $groupid;?>&amp;handlekey=buygrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=exit&amp;groupid=<?php echo $groupid;?>&amp;handlekey=exitgrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } } else { if($_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy') { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=buy&amp;groupid=<?php echo $groupid;?>&amp;handlekey=buygrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } ?>
????????
<?php } } elseif($_G['cache']['usergroups'][$groupid]['pubtype'] == 'free') { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=buy&amp;groupid=<?php echo $groupid;?>&amp;handlekey=buygrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????????</a>
<?php } elseif($_G['cache']['usergroups'][$groupid]['pubtype'] == 'buy') { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=buy&amp;groupid=<?php echo $groupid;?>&amp;handlekey=buygrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } else { ?>
<p class="emp">??????????????????????????????????</p>
<?php } ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_usergroup_bottom'])) echo $_G['setting']['pluginhooks']['spacecp_usergroup_bottom'];?>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">????</h2>
<ul>
<li<?php echo $actives['avatar'];?>><a href="home.php?mod=spacecp&amp;ac=avatar">????????</a></li>
<li<?php echo $actives['profile'];?>><a href="home.php?mod=spacecp&amp;ac=profile">????????</a></li>
<?php if($_G['setting']['verify']['enabled'] && allowverify()) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>">????</a></li>
<?php } ?>
<li<?php echo $actives['credit'];?>><a href="home.php?mod=spacecp&amp;ac=credit">????</a></li>
<li<?php echo $actives['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">??????</a></li>
<li<?php echo $actives['privacy'];?>><a href="home.php?mod=spacecp&amp;ac=privacy">????????</a></li>

<?php if($_G['setting']['sendmailday']) { ?><li<?php echo $actives['sendmail'];?>><a href="home.php?mod=spacecp&amp;ac=sendmail">????????</a></li><?php } ?>
<li<?php echo $actives['password'];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password">????????</a></li>

<?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
<li<?php echo $actives['promotion'];?>><a href="home.php?mod=spacecp&amp;ac=promotion">????????</a></li>
<?php } if(!empty($_G['setting']['plugins']['spacecp'])) { if(is_array($_G['setting']['plugins']['spacecp'])) foreach($_G['setting']['plugins']['spacecp'] as $id => $module) { if(in_array($module['adminid'], array(0, -1)) || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div></div>
</div>
<?php } else { ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="????"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=spacecp">????</a> <em>&rsaquo;</em><?php if($actives['profile']) { ?>
????????
<?php } elseif($actives['verify']) { ?>
????
<?php } elseif($actives['avatar']) { ?>
????????
<?php } elseif($actives['credit']) { ?>
????
<?php } elseif($actives['usergroup']) { ?>
??????
<?php } elseif($actives['privacy']) { ?>
????????
<?php } elseif($actives['sendmail']) { ?>
????????
<?php } elseif($actives['password']) { ?>
????????
<?php } elseif($actives['promotion']) { ?>
????????
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><?php if($actives['profile']) { ?>
????????
<?php } elseif($actives['verify']) { ?>
????
<?php } elseif($actives['avatar']) { ?>
????????
<?php } elseif($actives['credit']) { ?>
????
<?php } elseif($actives['usergroup']) { ?>
??????
<?php } elseif($actives['privacy']) { ?>
????????
<?php } elseif($actives['sendmail']) { ?>
????????
<?php } elseif($actives['password']) { ?>
????????
<?php } elseif($actives['promotion']) { ?>
????????
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></h1>
<!--don't close the div here--><?php if(!empty($_G['setting']['pluginhooks']['spacecp_usergroup_top'])) echo $_G['setting']['pluginhooks']['spacecp_usergroup_top'];?><ul class="tb cl">
<?php if($usergroups) { ?>
<li class="y<?php echo $activegs['my'];?> showmenu" id="gmy" onmouseover="showMenu(this.id)"><a href="home.php?mod=spacecp&amp;ac=usergroup">??????????</a></li>
<li class="y<?php echo $activegs['upgrade'];?> showmenu" id="gupgrade" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<li class="y<?php echo $activegs['user'];?> showmenu" id="guser" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<li class="y<?php echo $activegs['admin'];?> showmenu"id="gadmin" onmouseover="showMenu(this.id)"><a>??????????</a></li>
<?php } ?>
<li<?php echo $activeus['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">??????????</a></li>
<li<?php echo $activeus['list'];?> <?php echo $activeus['expiry'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=list">??????????</a></li>
<li<?php echo $activeus['forum'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=forum">????<?php echo $_G['setting']['navs']['2']['navname'];?>????</a></li>
</ul><?php $permtype = array(0 => '????????', 1 => '????????');?><div class="tdats">
<table cellpadding="0" cellspacing="0" class="tdat">
<tr><th class="c0">&nbsp;</th></tr>
<tr><th class="alt">&nbsp;</th></tr>
<tbody class="ca">
<tr><td>????????</td></tr><?php if(is_array($bperms)) foreach($bperms as $key => $perm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td><?php echo $permlang['perms_'.$perm];?></td>
</tr>
<?php } ?>
</tbody>

<tr class="alt h">
<th>????????</th>
</tr>
<tbody class="cb"><?php if(is_array($pperms)) foreach($pperms as $key => $perm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td><?php echo $permlang['perms_'.$perm];?></td>
</tr>
<?php } ?>
</tbody>

<tr class="alt h">
<th>????????</th>
</tr>
<tbody class="cc"><?php if(is_array($sperms)) foreach($sperms as $key => $perm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td><?php echo $permlang['perms_'.$perm];?></td>
</tr>
<?php } ?>
</tbody>


<tr class="alt h">
<th>????????</th>
</tr>
<tbody class="cd"><?php if(is_array($aperms)) foreach($aperms as $key => $perm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td><?php echo $permlang['perms_'.$perm];?></td>
</tr>
<?php } ?>
</tbody>
</table>
<table cellpadding="0" cellspacing="0" class="tdat tfx<?php if(!$group) { ?>f<?php } ?>">
<tr>
<th class="c0"><h4>???????????? - <?php echo $maingroup['grouptitle'];?></h4></th>
</tr>
<tr>
<th class="alt"><span class="notice">????: <?php echo $space['credits'];?></span></th>
</tr><?php echo permtbody($maingroup); ?></table>
<?php if($group) { if($switchtype == 'user') { $cid = 1;$tlang = '??????????';?><?php } if($switchtype == 'upgrade') { $cid = 2;$tlang = '??????????';?><?php } if($switchtype == 'admin') { $cid = 3;$tlang = '??????????';?><?php } ?>
<ul id="tba" class="tb c<?php echo $cid;?>">
<li id="c<?php echo $cid;?>"><?php echo $tlang;?> - <?php echo $currentgrouptitle;?></li>
</ul>
<div class="tscr">
<table cellpadding="0" cellspacing="0" class="tdat">
<tr>
<th class="alt h">
<?php if($group['grouptype'] == 'member') { $v = $group[groupcreditshigher] - $_G['member']['credits'];?><?php if($_G['group']['grouptype'] == 'member' && $v > 0) { ?>
<span class="notice">???????????????????????? <?php echo $v;?></span>
<?php } else { ?>
<span class="notice">???????? <?php echo $group['groupcreditshigher'];?></span>
<?php } } if(isset($publicgroup[$group['groupid']]) && $group['groupid'] != $_G['groupid'] && $publicgroup[$group['groupid']]['allowsetmain']) { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=switch&amp;groupid=<?php echo $group['groupid'];?>&amp;gid=<?php echo $_GET['gid'];?>&amp;handlekey=switchgrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } if(in_array($group['groupid'], $extgroupids) && $switchmaingroup && $group['grouptype'] == 'special' && $group['groupid'] != $_G['groupid']) { if($_G['cache']['usergroups'][$group['groupid']]['pubtype'] == 'buy') { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=buy&amp;groupid=<?php echo $group['groupid'];?>&amp;gid=<?php echo $_GET['gid'];?>&amp;handlekey=buygrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=exit&amp;groupid=<?php echo $group['groupid'];?>&amp;gid=<?php echo $_GET['gid'];?>&amp;handlekey=exitgrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } if($group['grouptype']=='special' && $group['groupid'] != $_G['groupid'] && array_key_exists($group['groupid'], $publicgroup) && !$publicgroup[$group['groupid']]['allowsetmain']) { ?>
<a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=buy&amp;groupid=<?php echo $group['groupid'];?>&amp;gid=<?php echo $_GET['gid'];?>&amp;handlekey=buygrouphk" class="xw1 xi2" onclick="showWindow('group', this.href, 'get', 0);">????</a>
<?php } if(array_key_exists($group['groupid'], $groupterms['ext'])) { ?>
<span class="notice">??????????????: <?php echo dgmdate($groupterms[ext][$group['groupid']]);?></span>
<?php } ?>
</th>
</tr><?php echo permtbody($group); ?></table>
</div>
<?php } ?>
</div>
<img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" class="vm" /> ????????????&nbsp;
<img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" class="vm" /> ????????????
<div id="gmy_menu" class="p_pop" style="display:none"><?php echo $usergroups['my'];?></div>
<div id="gupgrade_menu" class="p_pop" style="display:none"><?php echo $usergroups['upgrade'];?></div>
<div id="guser_menu" class="p_pop" style="display:none"><?php echo $usergroups['user'];?></div>
<div id="gadmin_menu" class="p_pop" style="display:none"><?php echo $usergroups['admin'];?></div>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_usergroup_bottom'])) echo $_G['setting']['pluginhooks']['spacecp_usergroup_bottom'];?>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">????</h2>
<ul>
<li<?php echo $actives['avatar'];?>><a href="home.php?mod=spacecp&amp;ac=avatar">????????</a></li>
<li<?php echo $actives['profile'];?>><a href="home.php?mod=spacecp&amp;ac=profile">????????</a></li>
<?php if($_G['setting']['verify']['enabled'] && allowverify()) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>">????</a></li>
<?php } ?>
<li<?php echo $actives['credit'];?>><a href="home.php?mod=spacecp&amp;ac=credit">????</a></li>
<li<?php echo $actives['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">??????</a></li>
<li<?php echo $actives['privacy'];?>><a href="home.php?mod=spacecp&amp;ac=privacy">????????</a></li>

<?php if($_G['setting']['sendmailday']) { ?><li<?php echo $actives['sendmail'];?>><a href="home.php?mod=spacecp&amp;ac=sendmail">????????</a></li><?php } ?>
<li<?php echo $actives['password'];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password">????????</a></li>

<?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
<li<?php echo $actives['promotion'];?>><a href="home.php?mod=spacecp&amp;ac=promotion">????????</a></li>
<?php } if(!empty($_G['setting']['plugins']['spacecp'])) { if(is_array($_G['setting']['plugins']['spacecp'])) foreach($_G['setting']['plugins']['spacecp'] as $id => $module) { if(in_array($module['adminid'], array(0, -1)) || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div></div>
</div>
<?php } function permtbody($maingroup) {
global $_G, $bperms, $pperms, $sperms, $aperms;?><tr><td><?php echo showstars($_G['cache']['usergroups'][$maingroup['groupid']]['stars']);; ?></td></tr>
<tbody class="ca"><?php if(is_array($bperms)) foreach($bperms as $key => $groupbperm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td>
<?php if($groupbperm == 'creditshigher' || $groupbperm == 'readaccess' || $groupbperm == 'maxpmnum') { ?>
<?php echo $maingroup[$groupbperm];?>
<?php } elseif($groupbperm == 'allowsearch') { if($maingroup['allowsearch'] == '0') { ?>????????<?php } elseif($maingroup['allowsearch'] == '1') { ?>??????????????<?php } else { ?>????????????????<?php } } else { if($maingroup[$groupbperm] >= 1) { ?><img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" /><?php } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" /><?php } } ?>
</td>
</tr>
<?php } ?>
</tbody>

<tr class="alt h">
<th><?php echo $maingroup['grouptitle'];?></th>
</tr>
<tbody class="cb"><?php if(is_array($pperms)) foreach($pperms as $key => $grouppperm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td>
<?php if(in_array($grouppperm, array('maxsigsize', 'maxbiosize'))) { ?>
<?php echo $maingroup[$grouppperm];?> ????
<?php } elseif($grouppperm == 'allowrecommend') { if($maingroup['allowrecommend'] > 0) { ?>+<?php echo $maingroup['allowrecommend'];?><?php } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" /><?php } } elseif(in_array($grouppperm, array('allowat', 'allowcreatecollection'))) { echo intval($maingroup[$grouppperm]); } else { if($maingroup[$grouppperm] == 1 || (in_array($grouppperm, array('raterange', 'allowcommentpost')) && !empty($maingroup[$grouppperm]))) { ?><img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" /><?php } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" /><?php } } ?>
</td>
</tr>
<?php } ?>
</tbody>

<tr class="alt h">
<th><?php echo $maingroup['grouptitle'];?></th>
</tr>
<tbody class="cc"><?php if(is_array($sperms)) foreach($sperms as $key => $perm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td>
<?php if(in_array($perm, array('maxspacesize', 'maximagesize'))) { if($maingroup[$perm]) { ?><?php echo $maingroup[$perm];?><?php } else { ?>????????<?php } } else { if($maingroup[$perm] == 1) { ?><img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" /><?php } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" /><?php } } ?>
</td>
</tr>
<?php } ?>
</tbody>

<tr class="alt h">
<th><?php echo $maingroup['grouptitle'];?></th>
</tr>
<tbody class="cd"><?php if(is_array($aperms)) foreach($aperms as $key => $groupaperm) { ?><tr <?php if($key%2==0) { ?>class="alt"<?php } ?>>
<td>
<?php if(in_array($groupaperm, array('maxattachsize', 'maxsizeperday', 'maxattachnum'))) { if($maingroup[$groupaperm]) { ?><?php echo $maingroup[$groupaperm];?><?php } else { ?>????????<?php } } elseif($groupaperm == 'attachextensions') { if($maingroup['allowpostattach'] == 1) { if($maingroup['attachextensions']) { ?><p class="nwp" title="<?php echo $maingroup['attachextensions'];?>"><?php echo $maingroup['attachextensions'];?></p><?php } else { ?>????????<?php } } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" /><?php } } else { if($maingroup[$groupaperm] == 1) { ?><img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" /><?php } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" /><?php } } ?>
</td>
</tr>
<?php } ?>
</tbody><?php }?><?php include template('common/footer'); ?>