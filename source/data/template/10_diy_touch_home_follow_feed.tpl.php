<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('follow_feed');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
<?php if($viewself) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
<?php } else { ?>
<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
<?php } ?>
   <span><?php if($viewself) { if($do=='following') { ?>我的<?php echo xxm('follow_add');; } else { ?>我的<?php echo xxm('follow_er');; } } else { if($do=='following') { ?>TA'<?php echo xxm('follow_add');; } else { ?>TA'<?php echo xxm('follow_er');; } } ?></span>
   <div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
   </div>
</header>
<!-- header end -->
<?php if(in_array($do, array('following', 'follower'))) { if($list) { ?>

<div class="cl">
<?php if($do=='following') { ?>
<div class="xxmfollowerlist b_p">
<h3 class="grey hm"><?php echo xxm('follow_add');; ?> <?php echo $space['following'];?></h3>
<ul><?php if(is_array($list)) foreach($list as $fuid => $fuser) { ?><li class="cl<?php if(in_array($fuser['uid'], $newfollower_list)) { ?> unread<?php } ?>">
<a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>&amp;do=profile" title="<?php echo $fuser['fusername'];?>" id="edit_avt" class="avatar" shref="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>"><?php echo avatar($fuser['followuid'],middle);?></a>
<p class="tit"><a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>&amp;do=profile" title="<?php echo $fuser['fusername'];?>" c="1" shref="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>"><?php echo $fuser['fusername'];?></a><?php if($fuser['bkname']) { ?><span id="followbkame_<?php echo $fuser['followuid'];?>" class="grey xxmfst">&nbsp;<?php echo $fuser['bkname'];?></span><?php } if($fuser['followuid'] != $_G['uid']) { if($fuser['mutual']) { if($fuser['mutual'] > 0) { ?><span class="flw_status_2 grey xxmfst">&nbsp;<?php echo xxm('huxiang');; echo xxm('follow_add');; ?></span><?php } else { ?><span class="flw_status_1 grey xxmfst">&nbsp;TA未收听您</span><?php } } elseif(helper_access::check_module('follow')) { } } ?></p>
<p class="txt grey">
<a><span class="rq" id="followernum_<?php echo $fuser['followuid'];?>"><?php echo $memberinfo[$fuid]['follower'];?></span></a><?php echo xxm('follow_er');; ?>&nbsp;
<a><span class="rq"><?php echo $memberinfo[$fuid]['following'];?></span></a><?php echo xxm('follow_add');; ?></p>
</li>
<?php } ?>
</ul>
<?php if(!empty($multi)) { ?><div><?php echo $multi;?></div><?php } ?>
</div>
<?php } else { ?>
<div class="xxmfollowerlist b_p">
<h3 class="grey hm"><?php echo xxm('follow_er');; ?> <?php echo $space['follower'];?></h3>
<ul><?php if(is_array($list)) foreach($list as $fuid => $fuser) { ?><li class="cl<?php if(in_array($fuser['uid'], $newfollower_list)) { ?> unread<?php } ?>">
<a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>&amp;do=profile" title="<?php echo $fuser['username'];?>" id="edit_avt" class="avatar" c="1" shref="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>"><?php echo avatar($fuser['uid'],middle);?></a>
<p class="tit"><a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>&amp;do=profile" title="<?php echo $fuser['username'];?>" c="1" shref="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>"><?php echo $fuser['username'];?></a><?php if($fuser['uid'] != $_G['uid']) { if($fuser['mutual']) { if($fuser['mutual'] > 0) { ?><span class="flw_status_2 grey xxmfst">&nbsp;<?php echo xxm('huxiang');; echo xxm('follow_add');; ?></span><?php } else { ?><span class="flw_status_1 grey xxmfst">&nbsp;TA未收听您</span><?php } } elseif(helper_access::check_module('follow')) { } } ?></p>
<p class="txt grey">
<a><span class="rq" id="followernum_<?php echo $fuser['uid'];?>"><?php echo $memberinfo[$fuid]['follower'];?></span></a><?php echo xxm('follow_er');; ?>&nbsp;
<a><span class="rq"><?php echo $memberinfo[$fuid]['following'];?></span></a><?php echo xxm('follow_add');; ?></p>
</li>
<?php } ?>
</ul>
<?php if(!empty($multi)) { ?><div><?php echo $multi;?></div><?php } ?>
</div>
<?php } ?>
</div>

<?php } else { ?>

<div id="nofollowmsg" class="grey hm b_p">
<?php if($viewself) { if($do=='following') { echo xxm('none');; echo xxm('follow_add');; } else { echo xxm('none');; echo xxm('follow_er');; } } else { if($do=='following') { ?>
TA<?php echo xxm('none');; echo xxm('follow_add');; } else { ?>
TA<?php echo xxm('none');; echo xxm('follow_er');; } } ?>
</div>

<?php } } include template('common/footer'); ?>    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     	