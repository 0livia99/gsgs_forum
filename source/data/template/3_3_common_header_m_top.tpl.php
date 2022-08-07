<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($_G['uid']) { ?>
<!--<a href="javascript:;" id="myitem" class="showmenu" onmouseover="showMenu({'ctrlid':'myitem'});"></a>-->
<span class="lg_info">
<a class="avar" href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间"><?php echo avatar($_G[uid],small);?></a>
<div class="info" style="/*display:none;*/">
<?php if(check_diy_perm($topic)) { ?><!--<?php echo $diynav;?>--><?php } ?>
<a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" title="打开 DIY 面板">DIY设置</a>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" class="vw/my<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>" target="_blank" title="访问我的空间"><?php echo $_G['member']['username'];?></a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?>
<a href="home.php?mod=spacecp&amp;ac=usergroup" ><?php echo $_G['group']['grouptitle'];?></a>
<!--<a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息</a>-->
<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">进行中的任务</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a><?php } if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a><?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?><a href="admin.php" target="_blank">管理中心</a><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: <?php echo $_G['member']['credits'];?></a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<a href="home.php?mod=spacecp">修改资料</a>
<a href="home.php?mod=spacecp&amp;ac=avatar">上传头像</a>
<a href="forum.php?mod=guide&amp;view=my">我的帖子</a>
<a href="home.php?mod=space&amp;do=favorite&amp;view=me">我的收藏</a>
<a href="home.php?mod=space&amp;do=friend">我的好友</a>
<a class="logout" href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出登陆</a>
</div>
</span>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="切换在线状态" onclick="ajaxget(this.href, 'loginstatus');return false;"></a>
</span>
<span class="acnotice">
<a href="home.php?mod=space&amp;do=notice" id="myprompt" class="<?php if($_G['member']['newprompt']) { ?> new<?php } ?>" onmouseover="showMenu({'ctrlid':'myprompt'});">消息
<?php if($_G['member']['newprompt']) { ?><em><?php echo $_G['member']['newprompt'];?></em><?php } ?>
</a>
<span id="myprompt_check"></span>
</span>
<span class="go-post">
<?php if(empty($_G['fid'])) { ?>
<a class="button13" onclick="showWindow('nav', this.href, 'get', 0)" href="forum.php?mod=misc&amp;action=nav">投稿</a>
<?php } else { ?>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" title="当前版块:<?php echo $_G['forum']['name'];?>" initialized="true">投稿</a>
<?php } ?>
</span>

<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
        <a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a>
        <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">激活</a>
        <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
<?php } elseif(!$_G['connectguest']) { ?>
<a class="login" href="member.php?mod=logging&amp;action=login">登陆</a><a class="sign"  href="member.php?mod=<?php echo $_G['setting']['regname'];?>">注册</a>

<?php } else { ?><?php echo avatar(0,small);?><strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>

<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: 0</a>用户组: <?php echo $_G['group']['grouptitle'];?>

<?php } ?>
