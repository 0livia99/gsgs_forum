<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_thread');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
       <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
   <?php if($viewtype == 'reply' || $viewtype == 'postcomment') { ?>
   <span><?php echo $space['username'];?>'回复</span>
   <?php } else { ?>
   <span><?php echo $space['username'];?>'主题</span>
   <?php } ?>
   <div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
   </div>
</header>
<!-- header end -->
<!-- main threadlist start -->
<div class="threadxxmlist">
<ul>
<?php if($list) { if(is_array($list)) foreach($list as $thread) { ?><li>
<?php if($viewtype == 'reply' || $viewtype == 'postcomment') { ?>
<a href="forum.php?mod=redirect&amp;goto=findpost&amp;ptid=<?php echo $thread['tid'];?>&amp;pid=<?php echo $thread['pid'];?>">
<span><?php echo $thread['subject'];?></span>
</a>
<?php } else { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" <?php if($thread['displayorder'] == -1) { ?>class="grey"<?php } ?>>
<span><?php echo $thread['subject'];?></span>
</a>
<?php } if($thread['replies'] > 0) { ?><span class="num xxmfont iconcomment"><?php echo $thread['replies'];?></span><?php } ?>
</li>
<?php } } else { ?>
<li class="b_m b_p hm grey">还没有相关的帖子</li>
<?php } ?>
</ul>
<?php echo $multi;?>
</div>
<!-- main threadlist end --><?php include template('common/footer'); ?>