<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?>
<?php if($_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1 && $_G['setting']['guidestatus']) { dheader('Location:forum.php?mod=guide&view=hot&mobile=2&forcemobile=1');exit;?><?php } include template('common/header'); ?><script type="text/javascript">
function getvisitclienthref() {
var visitclienthref = '';
if(ios) {
visitclienthref = 'https://itunes.apple.com/cn/app/zhang-shang-lun-tan/id489399408?mt=8';
} else if(andriod) {
visitclienthref = 'http://www.discuz.net/mobile.php?platform=android';
}
return visitclienthref;
}
</script>

<?php if($_GET['visitclient']) { ?>

<header class="header">
    <div class="nav">
<span>温馨提示</span>
    </div>
</header>
<div class="cl">
<div class="clew_con">
<h2 class="tit">掌上论坛手机客户端</h2>
<p>随时随地上论坛<input class="redirect button" id="visitclientid" type="button" value="点击下载" href="" /></p>
<h2 class="tit">iPhone,Andriod等智能手机</h2>
<p>直接登录手机版，阅读体验更佳<input class="redirect button" type="button" value="访问手机版" href="<?php echo $_GET['visitclient'];?>" /></p>
</div>
</div>
<script type="text/javascript">
var visitclienthref = getvisitclienthref();
if(visitclienthref) {
$('#visitclientid').attr('href', visitclienthref);
} else {
window.location.href = '<?php echo $_GET['visitclient'];?>';
}
</script>

<?php } else { ?>

<!-- header start -->
<?php if($showvisitclient) { ?>

<div class="visitclienttip vm" style="display:block;">
<a href="javascript:;" id="visitclientid" class="btn_download">立即下载</a>	
<p>
下载新版掌上论坛客户端，尊享多项看帖特权!
</p>
</div>
<script type="text/javascript">
var visitclienthref = getvisitclienthref();
if(visitclienthref) {
$('#visitclientid').attr('href', visitclienthref);
$('.visitclienttip').css('display', 'block');
}
</script>

<?php } if($_G['setting']['domain']['app']['mobile']) { $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } if($_G['setting']['mobile']['mobilehotthread']) { } else { ?>
<div class="xxmhbg">
<div class="xxmhsm">
<ul>
<li class="z sea"><a href="search.php?mod=forum&amp;mobile=2"><em class="xxmfont iconsearch"></em>搜索</a></li>
<?php if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li class="y mail"><a href="home.php?mod=space&amp;do=pm"><em class="xxmfont iconmail1 y"><?php if($_G['member']['newpm']) { ?><i class="xxmfont icondian rq"></i><?php } ?></em></a></li>
<?php } else { ?>
<li class="y mail"><a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');"><em class="xxmfont iconmail1 y"><?php if($_G['member']['newpm']) { ?><i class="xxmfont icondian rq"></i><?php } ?></em></a></li>
<?php } ?>
</ul>
</div>
</div><?php include template('diy/diy'); } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_top_mobile'])) echo $_G['setting']['pluginhooks']['index_top_mobile'];?>
<div class="xxmdis_ad"><?php echo adshow("custom_4/hm");?></div>

<?php if($announcements) { ?>
<div class="mtm xxmbb1">
<div class="ann-box">
<div class="mtit">公告</div>
<div id="ann"><ul><?php echo $announcements;?></ul></div>
</div>
</div>
<script type="text/javascript">discuz_loop(24, 30, 3000, 'ann');</script>
<?php } ?>

<div class="wp cl"><?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><div class="bm">
<div class="subforumshow bm_h cl <?php if(!$_G['setting']['mobile']['mobileforumview']) { } else { ?>subforumclose<?php } ?>" href="#sub_forum_<?php echo $cat['fid'];?>">
<h2><a href="javascript:;"><?php echo $cat['name'];?></a><code></code></h2>
</div>

<?php if($cat['forumcolumns'] == 3) { ?>

<div class="sub_forum_box3">
<div id="sub_forum_<?php echo $cat['fid'];?>" class="sub-forum3 sub_forum cl">
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><li>
<span class="micon">
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/forum-icon.png" alt="<?php echo $forum['name'];?>" /></a>
<?php } if($forum['todayposts'] > 0) { ?><i class="news xxmsmallbg"><?php echo $forum['todayposts'];?></i><?php } ?>
</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="murl">
<p class="mtit"><?php echo $forum['name'];?></p>
</a>
</li>
<?php } ?>
</ul>
</div>
</div>

<?php } elseif($cat['forumcolumns'] == 2) { ?>

<div class="sub_forum_box2">
<div id="sub_forum_<?php echo $cat['fid'];?>" class="sub-forum2 sub_forum cl">
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><li>
<span class="micon">
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/forum-icon.png" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="murl">
<p class="mtit"><?php echo $forum['name'];?></p>
<div class="mtxt">
<div class="info-item">
<i class="grey xxmfont iconposts xxmfst"></i>
<span class="grey"><?php echo dnumber($forum['threads']); ?></span>
</div>
<div class="info-item">
<i class="grey xxmfont iconmessage xxmfst"></i>
<span class="grey"><?php echo dnumber($forum['posts']); ?></span>
</div>
<?php if($forum['todayposts'] > 0) { ?>
<div class="info-item">
<i class="news xxmfont iconcreativefill xxmfst">
<span><?php echo $forum['todayposts'];?></i></span>
</div>
<?php } ?>
</div>
</a>
</li>
<?php } ?>
</ul>
</div>
</div>

<?php } elseif($cat['forumcolumns'] == 1 || $cat['forumcolumns'] == 0) { ?>

<div class="sub-forum-box1">
<div id="sub_forum_<?php echo $cat['fid'];?>" class="sub-forum1 sub_forum cl">
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><?php $forum_favlist = C::t('home_favorite')->fetch_by_id_idtype($forum['fid'], 'fid', $_G['uid']);?><li>
<div class="list-item">
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/forum-icon.png" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
<div class="content">
<div class="title">
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><?php echo $forum['name'];?></a>
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=<?php echo $forum['fid'];?>&amp;handlekey=favoriteforum&amp;formhash=<?php echo FORMHASH;?>" class="y xxm-dis-fav dialog">
<?php if($forum_favlist && $_G['uid']) { ?><em class="grey xxmfont iconcollection_fill"></em><?php } else { ?><em class="grey xxmfont iconcollection"></em><?php } ?>
</a>
</div>
<?php if($forum['description']) { ?>
<div class="desc grey"><?php echo $forum['description'];?></div>
<?php } ?>
<div class="info">
<div class="info-item">
<i class="grey xxmfont iconposts xxmfst"></i>
<span class="text grey"> <?php echo dnumber($forum['threads']); ?></span>
</div>
<div class="info-item">
<i class="grey xxmfont iconmessage xxmfst"></i>
<span class="text grey"> <?php echo dnumber($forum['posts']); if($forum['todayposts'] > 0) { ?><i class="news xxmfont iconcreativefill xxmfst"><?php echo $forum['todayposts'];?></i><?php } ?></span>
</div>
</div>
</div>
</div>
</li>
<?php } ?>
</ul>
</div>
</div>

<?php } else { ?>

<div class="sub_forum_box4">
<div id="sub_forum_<?php echo $cat['fid'];?>" class="sub-forum4 sub_forum cl">
<ul><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><li>
<span class="micon">
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/forum-icon.png" alt="<?php echo $forum['name'];?>" /></a>
<?php } if($forum['todayposts'] > 0) { ?><i class="news xxmsmallbg"><?php echo $forum['todayposts'];?></i><?php } ?>
</span>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="murl">
<p class="mtit"><?php echo $forum['name'];?></p>
</a>
</li>
<?php } ?>
</ul>
</div>
</div>

<?php } ?>

</div>
<?php } ?>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
<script type="text/javascript">
(function() {
<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>
$('.sub_forum').css('display', 'block');
<?php } else { ?>
$('.sub_forum').css('display', 'none');
<?php } ?>
$('.subforumshow').on('click', function() {
var obj = $(this);
var subobj = $(obj.attr('href'));
if(subobj.css('display') == 'none') {
subobj.css('display', 'block');
obj.removeClass('subforumclose');
} else {
subobj.css('display', 'none');
obj.addClass('subforumclose');
}
});
 })();
</script>

<?php } ?>
<div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfcs"><i class="xxmfont iconmarkfill"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php } else { ?>
<li class="flex"><a href="forum.php?forumlist=1&amp;mobile=2&amp;forcemobile=1" class="xxmfcs"><i class="xxmfont iconhomefill"></i><span>首页</span></a></li>
<?php } if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li class="flex"><a href="forum.php?mod=misc&amp;action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } else { ?>
<li class="flex"><a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfca"><i class="xxmfont iconpeople"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>我的<?php } else { ?>登录<?php } ?></span></a></li>
</ul>
</div>

    		  	  		  	  		     	  		 	    		   		     		       	 			  	    		   		     		       	 			 		    		   		     		       	 			 		    		   		     		       	 				 	    		   		     		       	  			     		   		     		       	  	  	    		   		     		       	 					     		   		     		       	 			 		    		   		     		       	  				    		   		     		       	  	  	    		   		     		       	  			     		   		     		       	  	  	    		   		     		       	 			 		    		   		     		       	 			  	    		   		     		       	 			  	    		   		     		       	 			 	     		   		     		       	 			 	     		   		     		       	 				      		   		     		       	  			     		   		     		       	  	 	     		   		     		       	  	  	    		   		     		       	 			 		    		   		     		       	 			 		    		   		     		       	  			     		   		     		       	   			    		   		     		       	  		      		   		     		       	  	       		   		     		       	  	 	     		   		     		       	  	  	    		   		     		       	  	 		    		   		     		       	 				      		 	      	  		  	  		     <?php include template('common/footer'); ?>