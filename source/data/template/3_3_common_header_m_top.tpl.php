<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($_G['uid']) { ?>
<!--<a href="javascript:;" id="myitem" class="showmenu" onmouseover="showMenu({'ctrlid':'myitem'});"></a>-->
<span class="lg_info">
<a class="avar" href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="�����ҵĿռ�"><?php echo avatar($_G[uid],small);?></a>
<div class="info" style="/*display:none;*/">
<?php if(check_diy_perm($topic)) { ?><!--<?php echo $diynav;?>--><?php } ?>
<a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" title="�� DIY ���">DIY����</a>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" class="vw/my<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>" target="_blank" title="�����ҵĿռ�"><?php echo $_G['member']['username'];?></a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?>
<a href="home.php?mod=spacecp&amp;ac=usergroup" ><?php echo $_G['group']['grouptitle'];?></a>
<!--<a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>��Ϣ</a>-->
<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">�����е�����</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>�Ż�����<?php } else { ?>ģ�����<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>����</a><?php } if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">��ƽ̨</a><?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?><a href="admin.php" target="_blank">��������</a><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">����: <?php echo $_G['member']['credits'];?></a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<a href="home.php?mod=spacecp">�޸�����</a>
<a href="home.php?mod=spacecp&amp;ac=avatar">�ϴ�ͷ��</a>
<a href="forum.php?mod=guide&amp;view=my">�ҵ�����</a>
<a href="home.php?mod=space&amp;do=favorite&amp;view=me">�ҵ��ղ�</a>
<a href="home.php?mod=space&amp;do=friend">�ҵĺ���</a>
<a class="logout" href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">�˳���½</a>
</div>
</span>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="�л�����״̬" onclick="ajaxget(this.href, 'loginstatus');return false;"></a>
</span>
<span class="acnotice">
<a href="home.php?mod=space&amp;do=notice" id="myprompt" class="<?php if($_G['member']['newprompt']) { ?> new<?php } ?>" onmouseover="showMenu({'ctrlid':'myprompt'});">��Ϣ
<?php if($_G['member']['newprompt']) { ?><em><?php echo $_G['member']['newprompt'];?></em><?php } ?>
</a>
<span id="myprompt_check"></span>
</span>
<span class="go-post">
<?php if(empty($_G['fid'])) { ?>
<a class="button13" onclick="showWindow('nav', this.href, 'get', 0)" href="forum.php?mod=misc&amp;action=nav">Ͷ��</a>
<?php } else { ?>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" title="��ǰ���:<?php echo $_G['forum']['name'];?>" initialized="true">Ͷ��</a>
<?php } ?>
</span>

<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
        <a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a>
        <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">����</a>
        <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">�˳�</a>
<?php } elseif(!$_G['connectguest']) { ?>
<a class="login" href="member.php?mod=logging&amp;action=login">��½</a><a class="sign"  href="member.php?mod=<?php echo $_G['setting']['regname'];?>">ע��</a>

<?php } else { ?><?php echo avatar(0,small);?><strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">�˳�</a>

<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">����: 0</a>�û���: <?php echo $_G['group']['grouptitle'];?>

<?php } ?>
