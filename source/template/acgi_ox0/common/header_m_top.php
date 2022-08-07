<?php echo ' ';exit;?>
<!--{if $_G['uid']}-->
	<!--<a href="javascript:;" id="myitem" class="showmenu" onmouseover="showMenu({'ctrlid':'myitem'});"></a>-->
	<span class="lg_info">
			<a class="avar" href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}"><!--{avatar($_G[uid],small)}--></a>
			<div class="info" style="/*display:none;*/">
				<!--{if check_diy_perm($topic)}--><!--$diynav--><!--{/if}-->
				<a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" title="打开 DIY 面板">DIY设置</a>
				<a href="home.php?mod=space&uid=$_G[uid]" class="vw/my{if $_G['setting']['connect']['allow'] && $_G[member][conisbind]} qq{/if}" target="_blank" title="{lang visit_my_space}">{$_G[member][username]}</a>
				<!--{hook/global_usernav_extra1}-->
				<!--{hook/global_usernav_extra4}-->
				<a href="home.php?mod=spacecp&ac=usergroup" >$_G[group][grouptitle]</a>
				<!--<a href="home.php?mod=space&do=pm" id="pm_ntc"{if $_G[member][newpm]} class="new"{/if}>{lang pm_center}</a>-->
				<!--{if $_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])}--><a href="home.php?mod=task&item=doing" id="task_ntc" class="new">{lang task_doing}</a><!--{/if}-->
				<!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
				<a href="portal.php?mod=portalcp"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a>
				<!--{/if}-->
				<!--{if $_G['uid'] && $_G['group']['radminid'] > 1}--><a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank">{lang forum_manager}</a><!--{/if}-->
				<!--{if $_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']}--><a href="admin.php?frames=yes&action=cloud&operation=applist" target="_blank">{lang cloudcp}</a><!--{/if}-->
				<!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}--><a href="admin.php" target="_blank">{lang admincp}</a><!--{/if}-->
				<!--{hook/global_usernav_extra3}-->
				<a href="home.php?mod=spacecp&ac=credit&showcredit=1">{lang credits}: $_G[member][credits]</a>
				<!--{hook/global_usernav_extra2}-->
				<a href="home.php?mod=spacecp">修改资料</a>
				<a href="home.php?mod=spacecp&ac=avatar">上传头像</a>
				<a href="forum.php?mod=guide&view=my">我的帖子</a>
				<a href="home.php?mod=space&do=favorite&view=me">我的收藏</a>
				<a href="home.php?mod=space&do=friend">我的好友</a>
				<a class="logout" href="member.php?mod=logging&action=logout&formhash={FORMHASH}">退出登陆</a>
			</div>
	</span>
	<span id="loginstatus">
		<a id="loginstatusid" href="member.php?mod=switchstatus" title="{lang login_switch_invisible_mode}" onclick="ajaxget(this.href, 'loginstatus');return false;"></a>
	</span>
	<span class="acnotice">
		<a href="home.php?mod=space&do=notice" id="myprompt" class="{if $_G[member][newprompt]} new{/if}" onmouseover="showMenu({'ctrlid':'myprompt'});">消息
			<!--{if $_G[member][newprompt]}--><em>$_G[member][newprompt]</em><!--{/if}-->
		</a>
		<span id="myprompt_check"></span>
	</span>
	<span class="go-post">
		<!--{if empty($_G[fid])}-->
			<a class="button13" onclick="showWindow('nav', this.href, 'get', 0)" href="forum.php?mod=misc&action=nav">投稿</a>
		<!--{else}-->
			<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" title="当前版块:$_G[forum][name]" initialized="true">投稿</a>
		<!--{/if}-->
	</span>

<!--{elseif !empty($_G['cookie']['loginuser'])}-->
        <a id="loginuser" class="noborder"><!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--></a>
        <a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)">{lang activation}</a>
        <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>
<!--{elseif !$_G[connectguest]}-->
		<a class="login" href="member.php?mod=logging&action=login">登陆</a><a class="sign"  href="member.php?mod={$_G[setting][regname]}">注册</a>

<!--{else}-->
		<!--{avatar(0,small)}-->
		<strong class="vwmy qq">{$_G[member][username]}</strong>
		<!--{hook/global_usernav_extra1}-->
		<a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>

		<a href="home.php?mod=spacecp&ac=credit&showcredit=1">{lang credits}: 0</a>{lang usergroup}: $_G[group][grouptitle]

<!--{/if}-->
