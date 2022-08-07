<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
<div class="nav">
<a href="<?php if($_GET['fromguid'] == 'hot') { ?>forum.php<?php } elseif($_GET['fromguid'] == 'newthread') { ?>forum.php?mod=guide&view=newthread&page=<?php echo $_GET['page'];?><?php } elseif($_GET['fromguid'] == 'digest') { ?>forum.php?mod=guide&view=digest&page=<?php echo $_GET['page'];?><?php } elseif($_GET['fromguid'] == 'new') { ?>forum.php?mod=guide&view=new&page=<?php echo $_GET['page'];?><?php } else { ?>forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&<?php echo rawurldecode($_GET[extra]);?><?php } ?>" class="z xxmfont iconzuo xxmfstt"></a>
<span class="name"><?php echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];?></span>
<a href="forum.php" class="y xxmfont iconhome"></a>
</div>
</header>
<!-- header end -->
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_top_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_top_mobile'];?>
<!-- main postlist start -->
<div class="postlist"><?php $postcount = 0;?><?php if(is_array($postlist)) foreach($postlist as $post) { $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);?><?php $followed = 0;
if($_G['uid']):
$followed = C::t('home_follow')->fetch_by_uid_followuid($_G['uid'], $post['authorid']);
endif;?><?php if(!empty($_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount];?>
<div class="plc cl<?php if($post['first']) { ?> pfirstxxm<?php } ?>" id="pid<?php echo $post['pid'];?>">
<?php if(!$post['authorid'] || $post['anonymous']) { ?>
<a><span class="avatar"><img src="<?php echo avatar(0, middle, true);?>" style="width:32px;height:32px;" /></span></a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile"><span class="avatar"><img src="<?php echo avatar($post[authorid], middle, true);?>" style="width:32px;height:32px;" /></span></a>
<?php } ?>
<div class="display pi" href="#replybtn_<?php echo $post['pid'];?>">
<ul class="authi">
<li class="grey">
<?php if($post['first']) { if($post['authorid'] != $_G['uid'] ) { if(!$post['authorid'] || $post['anonymous']) { } else { if($followed) { ?>
<a class="dialog y followed" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $post['authorid'];?>"><?php echo xxm('follow_del');; ?></a>
<?php } else { ?>
<a class="dialog y follow xxmsmallbg" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $post['authorid'];?>"><?php echo xxm('follow_add');; ?></a>
<?php } } } ?>

<div id="bztn_<?php echo $post['pid'];?>" popup="true" style="display:none;">
<?php if($post['authorid'] != $_G['uid'] ) { ?>
<!--<em class="btnxxmem"><a href="misc.php?mod=report&amp;rtype=post&amp;rid=<?php echo $pid;?>&amp;tid=<?php echo $_G['tid'];?>&amp;fid=<?php echo $_G['fid'];?>" class="dialog">举报</a></em>-->
<?php } if($post['first'] && $post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
<em class="btnxxmem">
<?php if(!IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;page=<?php echo $page;?>&amp;authorid=<?php echo $_G['forum_thread']['authorid'];?>" rel="nofollow" style="font-size:12px;font-weight:normal;">只看楼主</a>
<?php } elseif(!$_G['forum_thread']['archiveid']) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;page=<?php echo $page;?>" rel="nofollow" style="font-size:12px;font-weight:normal;">看全部</a>
<?php } ?>
</em>
<?php } if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
    <?php if($post['authorid'] != $_G['uid']) { ?>
                        <!--<em class="btnxxmem"><a href="home.php?mod=spacecp&amp;ac=pm&amp;touid=<?php echo $post['authorid'];?>&amp;pmid=0&amp;daterange=2&amp;pid=<?php echo $post['pid'];?>" style="font-size:12px;font-weight:normal;">发消息</a></em>-->
                        <?php } ?>
                        <?php } ?>
                        <em class="btnxxmem"><a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;reppost=<?php echo $_G['forum_firstpid'];?>&amp;page=<?php echo $page;?>" style="font-size:12px;font-weight:normal;">回复</a></em>
</div>

<?php } else { ?>

<em>
<?php if(isset($post['isstick'])) { ?><i class="rq">顶</i><?php } if(!$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])) { ?>
&nbsp;&nbsp;<a class="replyadd" href="forum.php?mod=misc&amp;action=postreview&amp;do=support&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;hash=<?php echo FORMHASH;?>" onmouseover="this.title = ($('review_support_<?php echo $post['pid'];?>').innerHTML ? $('review_support_<?php echo $post['pid'];?>').innerHTML : 0) + ' 人 支持'"><em class="grey xxmfst"><?php echo $post['postreview']['support'];?></em><i class="xxmfont iconzan1 xxmfst grey"></i></a>
<?php } ?>
</em>

<?php } if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile" class="blue name"><?php echo $post['author'];?></a>
<?php if(!$post['first'] && $_G['forum_thread']['special'] == 5) { if($post['stand'] == 1) { ?><i class="authortitle grey">正方</i>
<?php } elseif($post['stand'] == 2) { ?><i class="authortitle grey">反方</i>
<?php } else { ?><i class="authortitle grey">中立</i>
<?php } } } else { if(!$post['authorid']) { ?>
<a href="javascript:;" class="blue name">游客 <em class="grey"><?php echo $post['useip'];?><?php if($post['port']) { ?>:<?php echo $post['port'];?><?php } ?></em></a>
<?php } elseif($post['authorid'] && $post['username'] && $post['anonymous']) { if($_G['forum']['ismoderator']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>">匿名</a><?php } else { ?><span>匿名</span><?php } } else { ?>
<?php echo $post['author'];?> <em>该用户已被删除</em>
<?php } } $_self = $thread['author'] && $post['author'] == $thread['author'] && $post['position'] !== '1';?><?php if(!$post['authorid'] || $post['anonymous']) { } else { if($_self) { ?><i class="authortitle grey">楼主</i><?php } } if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
<i class="authortitle grey"><?php echo $post['authortitle'];?></i>
<?php } ?>

</li>
<?php if($post['first']) { ?>
<li class="grey rela"><?php echo $post['dateline'];?></li>
<?php } ?>
        </ul>
        <?php if($post['first']) { ?>
        <div class="view_ze_title">
<h2><?php echo $_G['forum_thread']['subject'];?><?php if($_G['forum_thread']['displayorder'] == -2) { ?> <span class="xxmfst grey">(审核中)</span><?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?> <span class="xxmfst grey">(已忽略)</span><?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?> <span class="xxmfst grey">(草稿)</span><?php } ?></h2>
        </div>
        <?php } ?>
<div class="message">
<?php if($post['first']) { if($_G['forum_threadstamp']) { ?>
<div id="threadstamp"><img src="<?php echo STATICURL;?>image/stamp/<?php echo $_G['forum_threadstamp']['url'];?>" title="<?php echo $_G['forum_threadstamp']['text'];?>" /></div>
<?php } } if($post['warned']) { ?>
<span class="grey quote">受到警告</span>
<?php } if(!$post['first'] && !empty($post['subject'])) { ?>
<h2><strong><?php echo $post['subject'];?></strong></h2>
<?php } if($_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])) { ?>
<div class="grey quote">提示: <em>作者被禁止或删除 内容自动屏蔽</em></div>
<?php } elseif($_G['adminid'] != 1 && $post['status'] & 1) { ?>
<div class="grey quote">提示: <em>该帖被管理员或版主屏蔽</em></div>
<?php } elseif($needhiddenreply) { ?>
<div class="grey quote">此帖仅作者可见</div>
<?php } elseif($post['first'] && $_G['forum_threadpay']) { include template('forum/viewthread_pay'); } else { if($_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
<div class="grey quote">提示: <em>作者被禁止或删除 内容自动屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } elseif($post['status'] & 1) { ?>
<div class="grey quote">提示: <em>该帖被管理员或版主屏蔽，只有管理员或有管理权限的成员可见</em></div>
<?php } if($post['first'] && $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0) { ?>
<div class="locked b_p mtw mbw">
付费主题, 价格: <i class="rq"><?php echo $_G['forum_thread']['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?></i>
<a href="forum.php?mod=misc&amp;action=viewpayments&amp;tid=<?php echo $_G['tid'];?>" class="dialog y blue">记录</a>
</div>
<?php } if($post['first'] && $threadsort && $threadsortshow) { if($threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']) { if($threadsortshow['optionlist'] == 'expire') { ?>
该信息已经过期
<?php } else { ?>
<div class="box_ex2 viewsort cl mtw mbw">
<div class="xxm-at-form mtw mbw">
<h4 class="hm mbn"><?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?></h4>
<table cellpadding="0" cellspacing="1" border="0"><?php if(is_array($threadsortshow['optionlist'])) foreach($threadsortshow['optionlist'] as $option) { ?> 
<?php if($option['type'] != 'info') { ?>
<tr>
<th><?php echo $option['title'];?>:</th>
<td><?php if($option['value']) { preg_match("/(".str_replace("/",'\/',$_G['setting']['attachurl']).")(.*?)((.gif)|(.jpg)|(.jpeg)|(.bmp)|(.png))/",strtolower($option['value']),$dzlab_match);?><?php if(count($dzlab_match)) { ?><img src='<?php echo $dzlab_match['0'];?>' /><?php } else { ?><?php echo $option['value'];?><?php } ?><?php echo $option['unit'];?><?php } else { ?>--<?php } ?></td>
</tr>
<?php } } ?>
</table>
</div>
</div>
<?php } } } if($post['first']) { if(!$_G['forum_thread']['special']) { ?>
<div class="not_special"><?php echo $post['message'];?></div>
<?php } elseif($_G['forum_thread']['special'] == 1) { include template('forum/viewthread_poll'); } elseif($_G['forum_thread']['special'] == 2) { include template('forum/viewthread_trade'); } elseif($_G['forum_thread']['special'] == 3) { include template('forum/viewthread_reward'); } elseif($_G['forum_thread']['special'] == 4) { include template('forum/viewthread_activity'); } elseif($_G['forum_thread']['special'] == 5) { include template('forum/viewthread_debate'); } elseif($threadplughtml) { ?>
<?php echo $threadplughtml;?>
<?php echo $post['message'];?>
<?php } else { ?>
<?php echo $post['message'];?>
<?php } } else { ?>
<?php echo $post['message'];?>
<?php } } ?>

</div>

<?php if($post['first']) { ?><div class="vtxxmb"><?php } if($_G['setting']['mobile']['mobilesimpletype'] == 0) { if($post['attachment']) { ?>
<div class="grey quote">
<?php if($_G['uid']) { ?>
<em>您所在的用户组无法下载或查看附件</em>
<?php } else { ?>
<p>您需要<a href="member.php?mod=logging&amp;action=login">登录</a>才可以下载或查看附件。没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="注册帐号"><?php echo $_G['setting']['reglinkname'];?></a></p>
<?php } ?>
</div>
        <?php } elseif($post['imagelist'] || $post['attachlist']) { ?>
           <?php if($post['imagelist']) { if(count($post['imagelist']) == 1) { ?>
<ul class="img_one"><?php echo showattach($post, 1); ?></ul>
<?php } else { ?>
<ul class="img_list cl vm"><?php echo showattach($post, 1); ?></ul>
<?php } } ?>
            <?php if($post['attachlist']) { ?>
<ul><?php echo showattach($post); ?></ul>
<?php } } } if($_G['uid'] && $allowpostreply && !$post['first']) { ?>
<div id="replybtn_<?php echo $post['pid'];?>" class="replybtn" display="true" style="display:none;position:absolute;right:0px;top:0px;">
<input type="button" class="redirect button2" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" value="回复">
</div>
<?php } if($post['first']) { ?></div><?php } if($post['first']) { ?>	

<div class="cl mtw z mbw" style="margin-left: -45px;">

<?php if($post['first'] && ($post['tags'] || $relatedkeywords) && $_GET['from'] != 'preview') { ?>
<div class="xxm-tag-list cl" style="margin-bottom: 20px;">
    <?php if($post['tags']) { $tagi = 0;?><?php if(is_array($post['tags'])) foreach($post['tags'] as $var) { if($tagi) { ?> <?php } ?><a title="<?php echo $var['1'];?>" href="misc.php?mod=tag&amp;id=<?php echo $var['0'];?>"><?php echo $var['1'];?></a><?php $tagi++;?><?php } } if($relatedkeywords) { ?><span><?php echo $relatedkeywords;?></span><?php } ?>
</div>
<?php } ?>

<a class="grey"><i class="xxmfont iconbrowse xxmfst"></i><?php echo $_G['forum_thread']['views'];?>&nbsp;&nbsp;</a>
<a class="grey"<?php if(!$_G['forum_thread']['allreplies']) { ?> style="display:none"<?php } ?>><i class="xxmfont iconcomment xxmfst"></i><?php echo $_G['forum_thread']['allreplies'];?>&nbsp;&nbsp;</a>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" class="grey"><?php echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];?>&nbsp;&nbsp;</a>
<?php if($_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]) { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $_G['forum_thread']['typeid'];?>" class="grey">#<?php echo $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']];?>&nbsp;&nbsp;</a><?php } if($_G['forum']['ismoderator']) { ?>
<!-- manage start -->
<?php if($post['first']) { ?>
<a href="#moption_<?php echo $post['pid'];?>" class="popup blue">管理</a>
<div id="moption_<?php echo $post['pid'];?>" popup="true" class="manage" style="display:none;">
<?php if(!$_G['forum_thread']['special']) { ?>
<input type="button" value="编辑" class="redirect button" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if($_G['forum_thread']['sortid']) { if($post['first']) { ?>&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?><?php } } if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">
<?php } ?>
<input type="button" value="删除" class="dialog button" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;operation=delete&amp;optgroup=3&amp;from=<?php echo $_G['tid'];?>">
<input type="button" value="关闭" class="dialog button" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;from=<?php echo $_G['tid'];?>&amp;optgroup=4">
<input type="button" value="屏蔽" class="dialog button" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
<input type="button" value="警告" class="dialog button" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
</div>
<?php } else { ?>
<a href="#moption_<?php echo $post['pid'];?>" class="popup blue">管理</a>
<div id="moption_<?php echo $post['pid'];?>" popup="true" class="manage" style="display:none;">
<input type="button" value="编辑" class="redirect button" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">
<?php if($_G['group']['allowdelpost']) { ?><input type="button" value="删除" class="dialog button" href="forum.php?mod=topicadmin&amp;action=delpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } if($_G['group']['allowbanpost']) { ?><input type="button" value="屏蔽" class="dialog button" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } if($_G['group']['allowwarnpost']) { ?><input type="button" value="警告" class="dialog button" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } ?>
</div>
<?php } ?>
<!-- manage end -->
<?php } if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))) { if($_G['forum_thread']['special'] != 2 || $_G['forum_thread']['special'] != 4 || !$post['first']) { if($_G['forum']['ismoderator']) { } else { ?>
<a class="blue" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if($_G['forum_thread']['sortid']) { if($post['first']) { ?>&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?><?php } } if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">编辑</a>
<?php } } } ?>

</div>

<?php } ?>

<div class="xxmclear"></div>

<?php if($post['first']) { ?><?php echo adshow("interthread/xxm_vt_ad hm/$postcount");?><?php } else { ?><?php echo adshow("interthread/xxm_vt_ad_reply hm/$postcount");?><div class="grey rela mtm">

<span>
<?php if(isset($post['isstick'])) { ?>
<?php echo $postnostick;?><?php echo $post['number'];?> &#8226;
<?php } elseif($post['number'] == -1) { ?>
<i class="xxmfcs">热门</i> &#8226;
<?php } else { if(!empty($postno[$post['number']])) { ?>
<?php echo $postno[$post['number']];?>
<?php } else { ?>
<?php echo $postnostick;?><?php echo $post['number'];?> &#8226;
<?php } } ?>
</span>
<span><?php echo $post['dateline'];?></span>

<?php if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))) { if($_G['forum_thread']['special'] != 2 || $_G['forum_thread']['special'] != 4 || !$post['first']) { if($_G['forum']['ismoderator']) { } else { ?>
<a class="blue" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if($_G['forum_thread']['sortid']) { if($post['first']) { ?>&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?><?php } } if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">&nbsp;&nbsp;编辑</a>
<?php } } } if($_G['forum']['ismoderator']) { ?>
<a href="#moption_<?php echo $post['pid'];?>" class="popup blue">&nbsp;&nbsp;管理</a>
<div id="moption_<?php echo $post['pid'];?>" popup="true" class="manage" style="display:none;">
<input type="button" value="编辑" class="redirect button" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">
<?php if($_G['group']['allowdelpost']) { ?><input type="button" value="删除" class="dialog button" href="forum.php?mod=topicadmin&amp;action=delpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } if($_G['group']['allowbanpost']) { ?><input type="button" value="屏蔽" class="dialog button" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } if($_G['group']['allowwarnpost']) { ?><input type="button" value="警告" class="dialog button" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } ?>
</div>
<?php } ?>

</div>
<?php } ?>

   </div>
</div>



<?php if($post['relateitem']) { ?>
<div class="xxmgap"></div>
<div class="xxm-relateitem-title b_p cl">
<h1 class="z">相关帖子</h1>
<a href="misc.php?mod=tag" class="y grey xxmfst"><?php echo xxm('tags');; ?><span class="xxmfont iconyou xxmfst"></span></a>
</div>
<div class="xxm-relateitem-list">
<ol class="cl" type="1"><?php if(is_array($post['relateitem'])) foreach($post['relateitem'] as $var) { ?><li>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $var['tid'];?>"><?php echo $var['subject'];?></a>
<p class="grey xxmfst">
<?php if($var['author']) { ?>
<i class="author"><?php echo $var['author'];?></i>
<?php } ?>
<i class="xxmfont iconbrowse xxmfst"></i><?php echo $var['views'];?>
</p>
</li>
<?php } ?>
</ol>
</div>
<?php } if($post['first']) { ?>
<div class="xxmgap"></div>
<div class="allxxmretitle b_p cl">
<h1 class="z">全部回复</h1><em<?php if(!$_G['forum_thread']['allreplies']) { ?> style="display:none"<?php } ?> class="z grey">&nbsp;&nbsp;<?php echo $_G['forum_thread']['allreplies'];?></em>
<?php if($ordertype != 1) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=1" class="y grey"><i class="xxmfont icondaoxu"></i></a>
<?php } else { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=2" class="y grey"><i class="xxmfont iconshunxu"></i></a>
<?php } ?>
</div>
<div class="xxmclear"></div>
<?php } if(count($postlist)<2) { ?>
    <div class="hm">
<p class="xxmfont iconnothing" style="font-size: 50px;color: rgba(0,0,0,0.1);"></p>
<p style="color: rgba(0,0,0,0.1);">全部回复</p>
</div>
    <?php } ?>

<?php if(!empty($_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount];?><?php $postcount++;?><?php } ?>

<div class="vtxxmpost">
<?php if(($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status'] || !empty($_G['setting']['recommendthread']['addtext'])) { ?>
<div class="recommend">
<div class="vtxxmpost-reply">
<ul>
<?php if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li><a class="fastre grey" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;reppost=<?php echo $_G['forum_firstpid'];?>&amp;page=<?php echo $page;?>"><em class="xxmfont iconxie xxmfsf"></em>回复...</a></li>
<?php } else { ?>
<li><a class="fastre grey" href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');"><em class="xxmfont iconxie xxmfsf"></em>回复...</a></li>
<?php } ?>
</ul>
</div>
<div class="vtxxmpost-share">
<ul>
<li><a href="forum.php?mod=misc&amp;action=recommend&amp;do=add&amp;tid=<?php echo $_G['tid'];?>&amp;hash=<?php echo FORMHASH;?>" class="recbtn xxmfont iconzan"><em id="recommendv_add"<?php if(!$_G['forum_thread']['recommend_add']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['recommend_add'];?></em></a></li>
<li><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" class="favbtn xxmfont iconcollection_fill"><em id="favoritenumber"<?php if(!$_G['forum_thread']['favtimes']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['favtimes'];?></em></a></li>
</ul>
</div>
</div>
<?php } else { ?>
<div class="norecommend">
<div class="vtxxmpost-reply">
<ul>
<?php if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li><a class="fastre grey" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;reppost=<?php echo $_G['forum_firstpid'];?>&amp;page=<?php echo $page;?>"><em class="xxmfont iconxie xxmfsf"></em>回复...</a></li>
<?php } else { ?>
<li><a class="fastre grey" href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');"><em class="xxmfont iconxie xxmfsf"></em>回复...</a></li>
<?php } ?>
</ul>
</div>
<div class="vtxxmpost-share">
<ul>
<li><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" class="favbtn xxmfont iconcollection_fill"><em id="favoritenumber"<?php if(!$_G['forum_thread']['favtimes']) { ?> style="display:none"<?php } ?>><?php echo $_G['forum_thread']['favtimes'];?></em></a></li>
</ul>
</div>
</div>
<?php } ?>
</div>

</div>
<!-- main postlist end -->

<?php echo $multipage;?>

<?php if(!empty($_G['setting']['pluginhooks']['viewthread_bottom_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_bottom_mobile'];?>

<script type="text/javascript">
$('.favbtn').on('click', function() {
var obj = $(this);
$.ajax({
type:'POST',
url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
data:{'favoritesubmit':'true', 'formhash':'<?php echo FORMHASH;?>'},
dataType:'xml',
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
return false;
});

$('.recbtn').on('click', function() {
var obj = $(this);
$.ajax({
type:'POST',
url:obj.attr('href') + '&handlekey=recbtn&inajax=1',
data:{'favoritesubmit':'true', 'formhash':'<?php echo FORMHASH;?>'},
dataType:'xml',
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
return false;
});

$('.replyadd').on('click', function() {
var obj = $(this);
$.ajax({
type:'POST',
url:obj.attr('href') + '&handlekey=replyadd&inajax=1',
data:{'favoritesubmit':'true', 'formhash':'<?php echo FORMHASH;?>'},
dataType:'xml',
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
return false;
});
</script><?php include template('common/footer'); ?>