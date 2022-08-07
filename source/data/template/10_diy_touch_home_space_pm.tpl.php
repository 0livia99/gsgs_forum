<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_pm');
0
|| checktplrefresh('./template/xxm_twowap/touch/home/space_pm.htm', './template/xxm_twowap/touch/home/space_pm_node.htm', 1659876310, 'diy', './data/template/10_diy_touch_home_space_pm.tpl.php', './template/xxm_twowap', 'touch/home/space_pm')
;?>
<?php $_G['home_tpl_titles'] = array('短消息');?><?php include template('common/header'); if(in_array($filter, array('privatepm')) || in_array($_GET['subop'], array('view'))) { if(in_array($filter, array('privatepm'))) { ?>

<!-- header start -->
<header class="header">
    <div class="nav">
        <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
<span class="category"><span class="name">消息</span></span>
<div class="y"><a href="home.php?mod=spacecp&amp;ac=pm" class="xxmfont iconmessage"></a></div>
    </div>
</header>
<!-- header end -->
<!-- main pmlist start -->
<div class="pmbox">
<ul>
<?php if(!$list) { ?>
<li class="b_m b_p hm grey fs16">当前没有相应的短消息</li>
<?php } else { if(is_array($list)) foreach($list as $key => $value) { ?><li>
<div class="avatar_img">
<img style="height:32px;width:32px;" src="<?php if($value['pmtype'] == 2) { ?><?php echo STATICURL;?>image/common/grouppm.png<?php } else { ?><?php echo avatar($value[touid] ? $value[touid] : ($value[lastauthorid] ? $value[lastauthorid] : $value[authorid]), middle, true);?><?php } ?>" />
</div>
<a href="<?php if($value['touid']) { ?>home.php?mod=space&do=pm&subop=view&touid=<?php echo $value['touid'];?><?php } else { ?>home.php?mod=space&do=pm&subop=view&plid=<?php echo $value['plid'];?>&type=1<?php } ?>">
<div class="cl">
<?php if($value['new']) { ?><span class="num"><?php echo $value['pmnum'];?></span><?php } if($value['touid']) { if($value['msgfromid'] == $_G['uid']) { ?>
<span class="name"><?php echo $value['tousername'];?></span>
<?php } else { ?>
<span class="name"><?php echo $value['tousername'];?></span>
<?php } } elseif($value['pmtype'] == 2) { ?>
<span class="name">发起者 : <?php echo $value['firstauthor'];?></span>
<?php } ?>
<span class="time grey"><?php echo dgmdate($value[dateline], 'u');?></span>
</div>
<div class="cl grey">
<span><?php if($value['pmtype'] == 2) { ?>[群聊]<?php if($value['subject']) { ?><?php echo $value['subject'];?><br><?php } } if($value['pmtype'] == 2 && $value['lastauthor']) { ?><div style="padding:0 0 0 20px;">......<br><?php echo $value['lastauthor'];?> : <?php echo $value['message'];?></div><?php } else { ?><?php echo $value['message'];?><?php } ?></span>
</div>
</a>
</li>
<?php } } ?>
</ul>
</div>
<!-- main pmlist end -->

<?php } elseif(in_array($_GET['subop'], array('view'))) { ?>

<!-- header start -->
<header class="header">
    <div class="nav">
        <a href="home.php?mod=space&amp;do=pm" class="z xxmfont iconzuo xxmfstt"></a>
<span><?php if($tousername) { ?><?php echo $tousername;?><?php } else { ?>查看消息<?php } ?></span>
<div class="y"><a href="forum.php" class="xxmfont iconhome xxmfstt"></a></div>
    </div>
</header>
<!-- header end -->
<!-- main viewmsg_box start -->
<div class="wp">
<div class="msgbox b_m">
<?php if(!$list) { ?>
<p class="grey hm">当前没有相应的短消息</p>
<?php } else { if(is_array($list)) foreach($list as $key => $value) { if($value['msgfromid'] != $_G['uid']) { ?>
<div class="friend_msg cl">
<div class="avat z">
<a href="home.php?mod=space&amp;uid=<?php echo $value['msgfromid'];?>&amp;do=profile">
<img style="height:32px;width:32px;" src="<?php echo avatar($value[msgfromid], middle, true);?>" />
</a>
</div>
<div class="dialog_green z">
<?php if($value['pmtype'] == 2) { ?>
<div class="dialog_name"><?php echo $value['author'];?></div>
<?php } ?>
<div class="dialog_c">
<div class="dialog_t"><?php echo $value['message'];?></div>
</div>
<div class="dialog_b"></div>
<div class="date"><?php echo dgmdate($value[dateline], 'u');?></div>
</div>
</div>
<?php } else { ?>
<div class="self_msg cl">
<div class="avat y"><img style="height:32px;width:32px;" src="<?php echo avatar($value[msgfromid], middle, true);?>" /></div>
<div class="dialog_white y">			
<div class="dialog_c">
<div class="dialog_t"><?php echo $value['message'];?></div>
</div>
<div class="dialog_b"></div>
<div class="date"><?php echo dgmdate($value[dateline], 'u');?></div>
</div>
</div>
<?php } } ?>
<?php echo $multi;?>
<?php } ?>
</div>
        <form id="pmform" class="pmform" name="pmform" method="post" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;pmid=<?php echo $pmid;?>&amp;daterange=<?php echo $daterange;?>&amp;pmsubmit=yes&amp;mobile=2" >
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<?php if(!$touid) { ?>
<input type="hidden" name="plid" value="<?php echo $plid;?>" />
<?php } else { ?>
<input type="hidden" name="touid" value="<?php echo $touid;?>" />
<?php } ?>
<div class="pmreply b_m"><input type="text" value="" class="pminput" autocomplete="off" id="replymessage" name="message"></div>
<div class="reply b_m"><input type="button" name="pmsubmit" id="pmsubmit" class="formdialog button_pm" value="回复" /></div>
        </form>
</div>
<!-- main viewmsg_box end -->

<?php } } else { ?>

<div class="bm_c">
手机版不支持复杂短消息操作，请返回<a href="home.php?mod=space&amp;do=pm&amp;filter=privatepm">我的短消息</a>
</div>

<?php } include template('common/footer'); ?>    		  	  		  	  		     	  	  	    		   		     		       	 				 	    		   		     		       	 			 	     		   		     		       	   			    		   		     		       	 			  	    		   		     		       	  	 	     		   		     		       	  	 	     		   		     		       	   		     		   		     		       	 	  	     		   		     		       	  		      		   		     		       	  				    		   		     		       	  	  	    		   		     		       	  	 		    		   		     		       	 	  	     		   		     		       	  		      		   		     		       	  	       		   		     		       	 			 	     		   		     		       	  				    		   		     		       	 	  	     		   		     		       	   			    		   		     		       	   		     		   		     		       	  	 	     		   		     		       	 			  	    		   		     		       	 	  	     		   		     		       	   			    		   		     		       	 				 	    		   		     		       	   			    		   		     		       	  			     		   		     		       	  			     		   		     		       	  			     		   		     		       	 			 	     		   		     		       	  	  	    		   		     		       	   			    		   		     		       	  		      		   		     		       	 				      		   		     		       	 				      		 	      	  		  	  		     	