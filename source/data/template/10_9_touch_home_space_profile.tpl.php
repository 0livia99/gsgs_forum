<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');?>
<?php if($_GET['mycenter'] && !$_G['uid']) { dheader('Location:member.php?mod=logging&action=login');exit;?><?php } include template('common/header'); if(!$_GET['mycenter']) { ?>

<!-- header start -->

<!-- header end -->
<!-- userinfo start -->
<div class="user_notmy_info">
<div class="user_notmy_bg" style="background-image: url(<?php echo avatar($space[uid], big, true);?>);background-size: cover;">
<div class="user_notmy_avatar_h">
<div class="user_notmy_avatar_h_l"><a href="javascript:history.back();" class="z xxmfont iconzuo"></a></div>
<h2></h2>
<div class="user_notmy_avatar_h_r"><a href="forum.php" class="y xxmfont iconhome"></a></div>
</div>
<div class="user_notmy_avatar">
<div class="avatar_m"><span><img src="<?php echo avatar($space[uid], big, true);?>" /></span></div>
<h2 class="name white fts"><?php echo $space['username'];?></h2>
<p>
<span class="tips">Lv.<?php echo $_G['cache']['usergroups'][$space['groupid']]['stars'];?></span>
<?php if($space['gender']) { if($space['gender'] == 1) { ?><span class="tips">��</span><?php } elseif($space['gender'] == 2) { ?><span class="tips">Ů</span><?php } } ?>
</p>
</div>
<?php if($space['self']) { } else { ?>
<div class="user_notmy_avatar_bottom">
<?php if($_G['uid']) { ?>
<a href="home.php?mod=space&amp;do=pm&amp;subop=view&amp;touid=<?php echo $space['uid'];?>&amp;mobile=2" class="xxmfst pm">����Ϣ</a>
<?php } else { ?>
<a href="javascript:popup.open('����δ��¼��������¼?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfst pm">����Ϣ</a>
<?php } if(helper_access::check_module('follow')) { $follow = 0;?><?php $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);?><?php if(!$follow) { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $space['uid'];?>" class="dialog xxmfst follow xxmsmallbg"><?php echo xxm('follow_add');; ?></a>
<?php } else { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $space['uid'];?>" class="dialog xxmfst followed"><?php echo xxm('follow_del');; ?></a>
<?php } } ?>
</div>
<?php } ?>
</div>
<div class="user_notmy_avatar_cover"></div>
<div class="user_notmy_avatar_cover_yuanjiao"></div>
<div class="user_notmy_avatar_info xxmbb1 cl">
<ul class="cl">
<?php if($_G['uid']) { $space['posts'] = $space['posts'] - $space['threads'];?><li>
<div><span><?php echo $space['threads'];?></span></div>
<div><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=thread" class="blue xxmfst"><em>����</em></a></div>
</li>
<li>
<div><span><?php echo $space['posts'];?></span></div>
<div><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=reply" class="blue xxmfst"><em>�ظ�</em></a></div>
</li>
<li>
<div><span><?php echo $space['following'];?></span></div>
<div><a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $space['uid'];?>" class="blue xxmfst"><em><?php echo xxm('follow_add');; ?></em></a></div>
</li>
<li>
<div><span><?php echo $space['follower'];?></span></div>
<div><a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $space['uid'];?>" class="blue xxmfst"><em><?php echo xxm('follow_er');; ?></em></a></div>
</li>
<?php } else { ?>
<li>
<div><span><?php echo $space['threads'];?></span></div>
<div><a href="javascript:popup.open('����δ��¼��������¼?', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em>����</em></a></div>
</li>
<li>
<div><span><?php echo $space['posts'];?></span></div>
<div><a href="javascript:popup.open('����δ��¼��������¼?', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em>�ظ�</em></a></div>
</li>
<li>
<div><span><?php echo $space['following'];?></span></div>
<div><a href="javascript:popup.open('����δ��¼��������¼?', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em><?php echo xxm('follow_add');; ?></em></a></div>
</li>
<li>
<div><span><?php echo $space['follower'];?></span></div>
<div><a href="javascript:popup.open('����δ��¼��������¼?', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em><?php echo xxm('follow_er');; ?></em></a></div>
</li>
<?php } ?>
</ul>
</div>
<div class="user_notmy_box">
<ul>
<li>�û�ID<span><?php echo $space['uid'];?></span></li>
<?php if($space['adminid']) { ?>
<li>������<span><?php echo $space['admingroup']['grouptitle'];?></span></li>
<?php } ?>
<li>�û���<span><?php echo $space['group']['grouptitle'];?></span></li>
<li>����<span><?php echo $space['credits'];?></span></li><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { if($value['title']) { ?>
<li><?php echo $value['title'];?><span><?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></span></li>
<?php } } if($profiles) { if(is_array($profiles)) foreach($profiles as $value) { ?><li><?php echo $value['title'];?><span><?php echo $value['value'];?></span></li>
<?php } } ?>
</ul>
</div>
</div>
<!-- userinfo end -->

<?php } else { if($_G['setting']['domain']['app']['mobile']) { $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>

<!-- userinfo start -->
<div class="userinfo">
<div class="user_avatar cl xxmsmallbg">
<div class="avatar_m"><span><a href=""><img src="<?php echo avatar($_G[uid], big, true);?>" /></a></span></div>
<h2 class="white name fts"><?php echo $_G['username'];?></h2>
<p>
<span class="tips xxmfcs">Lv.<?php echo $_G['cache']['usergroups'][$space['groupid']]['stars'];?></span>
<?php if($space['gender']) { if($space['gender'] == 1) { ?><span class="tips xxmfcs">��</span><?php } elseif($space['gender'] == 2) { ?><span class="tips xxmfcs">Ů</span><?php } } ?>
</p>
</div>
<div class="user_avatar_yuanjiao"></div>
<div class="user_avatar_info xxmbb1 cl"><?php $space['posts'] = $space['posts'] - $space['threads'];?><ul class="cl">
<li>
<div><span><?php echo $space['threads'];?></span></div>
<div><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=thread" class="blue xxmfst"><em>����</em></a></div>
</li>
<li>
<div><span><?php echo $space['posts'];?></span></div>
<div><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=reply" class="blue xxmfst"><em>�ظ�</em></a></div>
</li>
<li>
<div><span><?php echo $space['following'];?></span></div>
<div><a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $_G['uid'];?>" class="blue xxmfst"><em><?php echo xxm('follow_add');; ?></em></a></div>
</li>
<li>
<div><span><?php echo $space['follower'];?></span></div>
<div><a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $_G['uid'];?>" class="blue xxmfst"><em><?php echo xxm('follow_er');; ?></em></a></div>
</li>
</ul>
</div>
<div class="myinfo_list cl mtm">
<ul>
<li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile" class="xxmbb1">�����ҵĿռ�<span class="y xxmfont iconyou ddd"></span></a></li>
<li><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;do=forum" class="xxmbb1">�ҵ��û���<span class="y xxmfont iconyou ddd"></span><em class="y xxmfst grey"><?php echo $space['group']['grouptitle'];?>&nbsp;&nbsp;</em></a></li>
<li><a href="home.php?mod=spacecp&amp;ac=credit" class="xxmbb1">���ֳ�ֵ<span class="y xxmfont iconyou ddd"></span><em class="y xxmfst grey"><?php echo $space['credits'];?>&nbsp;����&nbsp;&nbsp;</em></a></li>
<li><a href="home.php?mod=space&amp;do=pm" class="xxmbb1">�ҵ���Ϣ<span class="y xxmfont iconyou ddd"></span><?php if($_G['member']['newpm']) { ?><i class="xxmfont icondian rq y"></i><?php } ?></a></li>
<li><a href="home.php?mod=space&amp;do=favorite&amp;type=all" class="xxmbb1">�ҵ��ղ�<span class="y xxmfont iconyou ddd"></span></a></li>
<li><a href="misc.php?mod=tag" class="xxmbb1"><?php echo xxm('tags');; ?><span class="y xxmfont iconyou ddd"></span></a></li>
<li><a href="forum.php?mod=announcement" class="xxmbb1"><?php echo xxm('announcement');; ?><span class="y xxmfont iconyou ddd"></span></a></li>
<li><a href="misc.php?mod=faq" class="xxmbb1">����<span class="y xxmfont iconyou ddd"></span></a></li>
<li class="xxmbb1"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" class="dialog">�˳���¼<span class="y xxmfont iconyou ddd"></span></a></li>
</ul>
</div>
</div>
<!-- userinfo end -->

<div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>��ҳ</span></a></li>
<?php } if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php } else { ?>
<li class="flex"><a href="forum.php?forumlist=1&amp;mobile=2&amp;forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>��ҳ</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=misc&amp;action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>����</span></a></li>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfcs"><i class="xxmfont iconpeoplefill"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>�ҵ�<?php } else { ?>��¼<?php } ?></span></a></li>
</ul>
</div>

<?php } ?>


    		  	  		  	  		     	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		 	      	  		  	  		     <?php include template('common/footer'); ?>