<?php echo 'QQ:2399835618';exit;?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="{if $_G['setting']['mobile'][mobilecachetime] > 0}{$_G['setting']['mobile'][mobilecachetime]}{else}no-cache{/if}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)} {/if},$_G['setting']['bbname']" />
<title><!--{if $_GET['forumlist'] == '1' || $_GET['mod'] == 'guide'}-->$_G['setting']['bbname']<!--{else}--><!--{if !empty($navtitle)}-->$navtitle<!--{/if}--><!--{if empty($nobbname)}--> - $_G['setting']['bbname']<!--{/if}--><!--{/if}--></title>
<!--{eval include_once DISCUZ_ROOT.TPLDIR.'/touch/php/lang.php';}-->
<style>
.xxmfcs, .user_avatar .name { color: $_G['style']['zhuti'] !important; }
.searchxxm .xxmbutton, .button, .button2, .subforumshow h2 code:before, .button_pm, .btn-big .touch, .xxm-tattl-buy-button-fill a, .xxm-attach-buy-button-fill a, .btn-xxmlo .lrxxm, .btn-xxmregi .lrxxm, .btn_pn_blue, .xxmwrbtn, .btnxxmem, .forumlistpbl_box .pnc { background: $_G['style']['zhuti'] !important; }
.btn-xxmlo .lrxxm, .btn-xxmregi .lrxxm { border: 1px solid $_G['style']['zhuti'] !important; }
</style>
<link rel="stylesheet" href="{$_G['style']['styleimgdir']}/images/xxm.css" type="text/css" media="all">
<script src="{$_G['style']['styleimgdir']}/images/jquery.min.js?{VERHASH}"></script>
<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]';</script>
<script src="static/js/common.js?g9O" type="text/javascript"></script>
<script src="{$_G['style']['styleimgdir']}/images/xxm.js" charset="{CHARSET}"></script>
<link rel="stylesheet" type="text/css" href="{$_G['style']['styleimgdir']}/images/font/iconfont.css">
</head>
<body class="bgxxmfff">
<!--{hook/global_header_mobile}-->

<div class="cl">
	<div style="display: none">
		<ul id="fs_group">$grouplist</ul>
		<ul id="fs_forum_common">$commonlist</ul>
		<!--{loop $forumlist $forumid $forum}-->
			<ul id="fs_forum_$forumid">$forum</ul>
		<!--{/loop}-->
		<!--{loop $subforumlist $forumid $forum}-->
			<ul id="fs_subforum_$forumid">$forum</ul>
		<!--{/loop}-->
	</div>
	<div class="c forumlistpbl_box">
		<div class="b_p">
			<span class="pbnv grey">$_G['setting']['sitename']<span id="pbnv"></span> <a id="enterbtn" class="xg1 grey" href="javascript:;" onclick="locationforums(currentblock, currentfid)">[{lang nav_forum}]</a></span>
		</div>
		<ul class="forumlistpbl cl">
			<li id="block_group"></li>
			<li id="block_forum"></li>
			<li id="block_subforum"></li>
		</ul>
	    <p class="cl z pbut">
		<!--{if $_G['group']['allowpost'] || !$_G['uid']}-->
			<!--{if $special === null}-->
				<button id="postbtn" class="pn pnc z" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&mobile=2'" disabled="disabled">{lang send_posts}</button>
			<!--{else}-->
				<button id="postbtn" class="pn pnc z" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&special=$special&mobile=2'" disabled="disabled">$actiontitle</button>
			<!--{/if}-->
		<!--{/if}-->
		</p>
	</div>
	<script type="text/javascript" reload="1">
		var s = '<!--{if $commonfids}--><p><a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, \'common\')" class="pbsb lightlink">{lang nav_forum_frequently}</a></p><!--{/if}-->';
		var lis = $('fs_group').getElementsByTagName('LI');
		for(i = 0;i < lis.length;i++) {
			var gid = lis[i].getAttribute('fid');
			if($('fs_forum_' + gid)) {
				s += '<p><a href="javascript:;" ondblclick="locationforums(1, ' + gid + ')" onclick="switchforums(this, 1, ' + gid + ')" class="pbsb">' + lis[i].innerHTML + '</a></p>';
			}
		}
		$('block_group').innerHTML = s;
		var lastswitchobj = null;
		var selectfid = 0;
		var switchforum = switchsubforum = '';
		switchforums($('commonforum'), 1, 'common');
		function switchforums(obj, block, fid) {
			if(lastswitchobj != obj) {
				if(lastswitchobj) {
					lastswitchobj.parentNode.className = '';
				}
				obj.parentNode.className = 'pbls';
			}
			var s = '';
			if(fid != 'common') {
				$('enterbtn').className = 'xi2 grey';
				currentblock = block;
				currentfid = fid;
			} else {
				$('enterbtn').className = 'xg1 grey';
			}
			if(block == 1) {
				var lis = $('fs_forum_' + fid).getElementsByTagName('LI');
				for(i = 0;i < lis.length;i++) {
					fid = lis[i].getAttribute('fid');
					if(fid != '') {
						s += '<p><a href="javascript:;" ondblclick="locationforums(2, ' + fid + '\)" onclick="switchforums(this, 2, ' + fid + ')"' + ($('fs_subforum_' + fid) ?  ' class="pbsb"' : '') + '>' + lis[i].innerHTML + '</a></p>';
					}
				}
				$('block_forum').innerHTML = s;
				$('block_subforum').innerHTML = '';
				switchforum = switchsubforum = '';
				selectfid = 0;
				$('postbtn').setAttribute("disabled", "disabled");
				$('postbtn').className = 'pn xg1 y';
			} else if(block == 2) {
				selectfid = fid;
				if($('fs_subforum_' + fid)) {
					var lis = $('fs_subforum_' + fid).getElementsByTagName('LI');
					for(i = 0;i < lis.length;i++) {
						fid = lis[i].getAttribute('fid');
						s += '<p><a href="javascript:;" ondblclick="locationforums(3, ' + fid + ')" onclick="switchforums(this, 3, ' + fid + ')">' + lis[i].innerHTML + '</a></p>';
					}
					$('block_subforum').innerHTML = s;
				} else {
					$('block_subforum').innerHTML = '';
				}
				switchforum = obj.innerHTML;
				switchsubforum = '';
				$('postbtn').removeAttribute("disabled");
				$('postbtn').className = 'pn pnc y';
			} else {
				selectfid = fid;
				switchsubforum = obj.innerHTML;
				$('postbtn').removeAttribute("disabled");
				$('postbtn').className = 'pn pnc y';
			}
			lastswitchobj = obj;
			$('pbnv').innerHTML = switchforum ? '&nbsp;&gt;&nbsp;' + switchforum + (switchsubforum ? '&nbsp;&gt;&nbsp;' + switchsubforum : '') : '';
		}
		function locationforums(block, fid) {
			location.href = block == 1 ? 'forum.php?gid=' + fid : 'forum.php?mod=forumdisplay&fid=' + fid;
		}
	</script>
</div>

<div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
	<ul class="xxmfootflex">
	<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
	<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>{lang homepage}</span></a></li>
	<!--{/if}-->
	<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
	<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span>{echo xxm('forumlist');}</span></a></li>
	<!--{else}-->
	<li class="flex"><a href="forum.php?forumlist=1&mobile=2&forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>{lang homepage}</span></a></li>
	<!--{/if}-->
	<li class="flex"><a href="forum.php?mod=misc&action=nav" class="xxmfca"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
	<li class="flex"><a href="forum.php?mod=guide&view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><!--{if $_G[setting][navs][10][navname]}-->{$_G[setting][navs][10][navname]}<!--{else}-->Loading<!--{/if}--></span></a></li>
	<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="xxmfca"><i class="xxmfont iconpeople"><!--{if $_G[member][newpm]}--><span class="news bg-rq"></span><!--{/if}--></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
	</ul>
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->