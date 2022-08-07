<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('guide');
0
|| checktplrefresh('./template/xxm_twowap/touch/forum/guide.htm', './template/xxm_twowap/touch/forum/guide_list_row.htm', 1659871904, '9', './data/template/10_9_touch_forum_guide.tpl.php', './template/xxm_twowap', 'touch/forum/guide')
;?>
<?php if($view == 'hot') { include template('common/header'); if($_G['setting']['domain']['app']['mobile']) { $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
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
</div><?php include template('diy/diy'); ?><div class="xxmclear"></div>
<div class="xxmmore">
<a href="forum.php?forumlist=1" class="grey">更多<i class="xxmfont iconyou xxmfst"></i></a>
</div>
<script>
var bzSwiper = new Swiper ('.diyswiper', {
loop: true,
autoplay: {
delay: 2000,
disableOnInteraction: false,
},
  scrollbar: {
el: '.swiper-scrollbar',
hide: true,
  },
});
</script>
<div class="xxmclear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfcs"><i class="xxmfont iconhomefill"></i><span>首页</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li class="flex"><a href="forum.php?mod=misc&amp;action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } else { ?>
<li class="flex"><a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfca"><i class="xxmfont iconpeople"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>我的<?php } else { ?>登录<?php } ?></span></a></li>
</ul>
</div><?php include template('common/footer'); } else { include template('common/header'); if($_G['setting']['domain']['app']['mobile']) { $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<div class="cl bgxxmfff">
<div class="guidebtn xxmbb1">
<ul class="cl">
<li <?php echo $currentview['new'];?>><a href="forum.php?mod=guide&amp;view=new">回复</a></li>
<li <?php echo $currentview['newthread'];?>><a href="forum.php?mod=guide&amp;view=newthread">最新</a></li>
<li <?php echo $currentview['digest'];?>><a href="forum.php?mod=guide&amp;view=digest"><span class="xi1">精华</span></a></li>
</ul>
</div>
</div>
<!-- main threadlist start -->
<div class="xxmlist"><?php if(is_array($data)) foreach($data as $key => $list) { if($list['threadcount']) { ?>
<ul class="hotlist"><?php require_once(DISCUZ_ROOT.'./template/xxm_twowap/touch/php/xxmlist.php');?><?php if(is_array($list['threadlist'])) foreach($list['threadlist'] as $key => $thread) { $threadtable = substr($thread[tid], -1);?><?php $img_number = xxmlist_img_num($thread[tid], $thread[authorid], $threadtable);?><li>
<?php if($img_number == 1) { ?>
<div class="cardxxmone">
<div class="img_one">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=<?php if($_GET['view'] == 'newthread') { ?>newthread<?php } elseif($_GET['view'] == 'hot') { ?>hot<?php } elseif($_GET['view'] == 'digest') { ?>digest<?php } elseif($_GET['view'] == 'new') { ?>new<?php } ?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><?php $list_img1 = xxmlist_img($thread[tid], $thread[authorid], 1, $threadtable);?><?php if(is_array($list_img1)) foreach($list_img1 as $list_img1_1) { ?><em style="background-image:url(<?php echo(getforumimg($list_img1_1[aid],0,200,200))?>);"></em>
<?php } ?>
</a>
</div>
<div class="tnr">
<div class="p">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=<?php if($_GET['view'] == 'newthread') { ?>newthread<?php } elseif($_GET['view'] == 'hot') { ?>hot<?php } elseif($_GET['view'] == 'digest') { ?>digest<?php } elseif($_GET['view'] == 'new') { ?>new<?php } ?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>">
<h2>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } ?>
        <?php if($thread['special'] == 1) { ?>
<span class="xxmcsp z">投票 &#8226;</span>
<?php } elseif($thread['special'] == 2) { ?>
<span class="xxmcsp z">商品 &#8226;</span>
<?php } elseif($thread['special'] == 3) { ?>
<span class="xxmcsp z">悬赏 &#8226;</span>
<?php } elseif($thread['special'] == 4) { ?>
<span class="xxmcsp z">活动 &#8226;</span>
<?php } elseif($thread['special'] == 5) { ?>
<span class="xxmcsp z">辩论 &#8226;</span>
<?php } if($thread['readperm']) { ?><span class="xxmcsp z">阅读权限<?php echo $thread['readperm'];?> &#8226;</span><?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
<span class="rq"><?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?> &#8226;</span>
<?php } else { ?>
<span class="rq">售价 <?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> &#8226;</span>
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
<span class="grey">已解决 &#8226;</span>
<?php } ?>
<span <?php echo $thread['highlight'];?>><?php echo $thread['subject'];?></span>
</h2>
</a>
</div>
<div class="span grey">
<?php if(!$thread['author']) { ?>
      	<a class="avatar"><?php echo avatar($thread[0],small);?> <i class="grey">匿名</i></a>
      	<?php } else { ?>
      	<a class="avatar" href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>&amp;do=profile"><?php echo avatar($thread[authorid],small);?> <i class="grey"><?php echo $thread['author'];?></i></a>
      	<?php } if($view == 'new') { ?>
最新回复 <?php echo $thread['lastpost'];?>
<?php } else { ?>
<?php echo $thread['dateline'];?>
<?php } if($thread['replies'] > 0) { ?><em class="xxmfont iconcomment xxmfst"><?php echo $thread['replies'];?></em><?php } ?>
<em class="xxmfont iconbrowse xxmfst"><?php echo $thread['views'];?></em>
</div>
</div>
</div>
<?php } elseif($img_number == 2) { ?>
<div class="cardxxmt">
        <header class="xxmfdtlh">
            <div class="xxmfdtlhl">
        <?php if(!$thread['author']) { ?>
              	<a class="avatar"><?php echo avatar($thread[0],middle);?></a>
              	<?php } else { ?>
              	<a class="avatar" href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>&amp;do=profile"><?php echo avatar($thread[authorid],middle);?></a>
              	<?php } ?>
    </div>
    	<div class="xxmfdtlhm">
    <div class="name">
<?php if(!$thread['author']) { ?>
<a class="grey">匿名</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>&amp;do=profile" class="blue"><?php echo $thread['author'];?></a>
<?php } ?>
    </div>
    <div class="data">
   		<?php if($view == 'new') { ?>
   		<span class="grey xxmfst">最新回复 <?php echo $thread['lastpost'];?></span>
   		<?php } else { ?>
   		<span class="grey xxmfst"><?php echo $thread['dateline'];?></span>
   		<?php } ?>
   		<?php if($thread['isgroup'] != 1) { ?>
   		<?php if($thread['replies'] > 0) { ?>
   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $thread['replies'];?></em></span>
   		<?php } ?>
   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $thread['views'];?></em></span>
   		<?php } else { ?>
   		<?php if($groupnames[$thread['tid']]['replies'] > 0) { ?>
   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['replies'];?></em></span>
   		<?php } ?>
   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['views'];?></em></span>
   		<?php } ?>
    </div>
    </div>
        </header>
        <section class="xxmfdtlb cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=<?php if($_GET['view'] == 'newthread') { ?>newthread<?php } elseif($_GET['view'] == 'hot') { ?>hot<?php } elseif($_GET['view'] == 'digest') { ?>digest<?php } elseif($_GET['view'] == 'new') { ?>new<?php } ?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>">
            <?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
            <h2>
            <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } ?>
            <?php if($thread['special'] == 1) { ?>
<span class="xxmcsp z">投票 &#8226;</span>
<?php } elseif($thread['special'] == 2) { ?>
<span class="xxmcsp z">商品 &#8226;</span>
<?php } elseif($thread['special'] == 3) { ?>
<span class="xxmcsp z">悬赏 &#8226;</span>
<?php } elseif($thread['special'] == 4) { ?>
<span class="xxmcsp z">活动 &#8226;</span>
<?php } elseif($thread['special'] == 5) { ?>
<span class="xxmcsp z">辩论 &#8226;</span>
<?php } if($thread['readperm']) { ?><span class="xxmcsp z">阅读权限<?php echo $thread['readperm'];?> &#8226;</span><?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
<span class="rq"><?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?> &#8226;</span>
<?php } else { ?>
<span class="rq">售价 <?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> &#8226;</span>
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
<span class="grey">已解决 &#8226;</span>
<?php } ?>
            	<span <?php echo $thread['highlight'];?>><?php echo $thread['subject'];?></span>
            </h2>
<div class="img_two"><?php $list_img2 = xxmlist_img($thread[tid], $thread[authorid], 2, $threadtable);?><?php if(is_array($list_img2)) foreach($list_img2 as $list_img2_1) { ?><em style="background-image:url(<?php echo(getforumimg($list_img2_1[aid],0,300,300))?>);"></em>
<?php } ?>
</div>
       	   </a>
        </section>
    </div>
<?php } elseif($img_number > 2) { ?>
        <div class="cardxxmt">
            <header class="xxmfdtlh">
            <div class="xxmfdtlhl">
        <?php if(!$thread['author']) { ?>
              	<a class="avatar"><?php echo avatar($thread[0],middle);?></a>
              	<?php } else { ?>
              	<a class="avatar" href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>&amp;do=profile"><?php echo avatar($thread[authorid],middle);?></a>
              	<?php } ?>
    </div>
    	<div class="xxmfdtlhm">
    <div class="name">
<?php if(!$thread['author']) { ?>
<a class="grey">匿名</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>&amp;do=profile" class="blue"><?php echo $thread['author'];?></a>
<?php } ?>
    </div>
    <div class="data">
   		<?php if($view == 'new') { ?>
   		<span class="grey xxmfst">最新回复 <?php echo $thread['lastpost'];?></span>
   		<?php } else { ?>
   		<span class="grey xxmfst"><?php echo $thread['dateline'];?></span>
   		<?php } ?>
   		<?php if($thread['isgroup'] != 1) { ?>
   		<?php if($thread['replies'] > 0) { ?>
   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $thread['replies'];?></em></span>
   		<?php } ?>
   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $thread['views'];?></em></span>
   		<?php } else { ?>
   		<?php if($groupnames[$thread['tid']]['replies'] > 0) { ?>
   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['replies'];?></em></span>
   		<?php } ?>
   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['views'];?></em></span>
   		<?php } ?>
    </div>
    </div>
            </header>
            <section class="xxmfdtlb cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=<?php if($_GET['view'] == 'newthread') { ?>newthread<?php } elseif($_GET['view'] == 'hot') { ?>hot<?php } elseif($_GET['view'] == 'digest') { ?>digest<?php } elseif($_GET['view'] == 'new') { ?>new<?php } ?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>">
                <?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
                <h2>
                <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } ?>
                <?php if($thread['special'] == 1) { ?>
<span class="xxmcsp z">投票 &#8226;</span>
<?php } elseif($thread['special'] == 2) { ?>
<span class="xxmcsp z">商品 &#8226;</span>
<?php } elseif($thread['special'] == 3) { ?>
<span class="xxmcsp z">悬赏 &#8226;</span>
<?php } elseif($thread['special'] == 4) { ?>
<span class="xxmcsp z">活动 &#8226;</span>
<?php } elseif($thread['special'] == 5) { ?>
<span class="xxmcsp z">辩论 &#8226;</span>
<?php } if($thread['readperm']) { ?><span class="xxmcsp z">阅读权限<?php echo $thread['readperm'];?> &#8226;</span><?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
<span class="rq"><?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?> &#8226;</span>
<?php } else { ?>
<span class="rq">售价 <?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> &#8226;</span>
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
<span class="grey">已解决 &#8226;</span>
<?php } ?>
                	<span <?php echo $thread['highlight'];?>><?php echo $thread['subject'];?></span>
                </h2>
<div class="img_three"><?php $list_img3 = xxmlist_img($thread[tid], $thread[authorid], 3, $threadtable);?><?php if(is_array($list_img3)) foreach($list_img3 as $list_img3_1) { ?><em style="background-image:url(<?php echo(getforumimg($list_img3_1[aid],0,500,500))?>);"></em>
<?php } ?>
</div>
           	   </a>
            </section>
        </div>
    <?php } elseif($img_number == 0) { ?>
        <div class="cardxxmt">
            <header class="xxmfdtlh">
            <div class="xxmfdtlhl">
        <?php if(!$thread['author']) { ?>
              	<a class="avatar"><?php echo avatar($thread[0],middle);?></a>
              	<?php } else { ?>
              	<a class="avatar" href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>&amp;do=profile"><?php echo avatar($thread[authorid],middle);?></a>
              	<?php } ?>
    </div>
    	<div class="xxmfdtlhm">
    <div class="name">
<?php if(!$thread['author']) { ?>
<a class="grey">匿名</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>&amp;do=profile" class="blue"><?php echo $thread['author'];?></a>
<?php } ?>
    </div>
    <div class="data">
   		<?php if($view == 'new') { ?>
   		<span class="grey xxmfst">最新回复 <?php echo $thread['lastpost'];?></span>
   		<?php } else { ?>
   		<span class="grey xxmfst"><?php echo $thread['dateline'];?></span>
   		<?php } ?>
   		<?php if($thread['isgroup'] != 1) { ?>
   		<?php if($thread['replies'] > 0) { ?>
   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $thread['replies'];?></em></span>
   		<?php } ?>
   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $thread['views'];?></em></span>
   		<?php } else { ?>
   		<?php if($groupnames[$thread['tid']]['replies'] > 0) { ?>
   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['replies'];?></em></span>
   		<?php } ?>
   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['views'];?></em></span>
   		<?php } ?>
    </div>
    </div>
            </header>
            <section class="xxmfdtlb cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;fromguid=<?php if($_GET['view'] == 'newthread') { ?>newthread<?php } elseif($_GET['view'] == 'hot') { ?>hot<?php } elseif($_GET['view'] == 'digest') { ?>digest<?php } elseif($_GET['view'] == 'new') { ?>new<?php } ?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>">
                <?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
                <h2>
                <?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } ?>
                <?php if($thread['special'] == 1) { ?>
<span class="xxmcsp z">投票 &#8226;</span>
<?php } elseif($thread['special'] == 2) { ?>
<span class="xxmcsp z">商品 &#8226;</span>
<?php } elseif($thread['special'] == 3) { ?>
<span class="xxmcsp z">悬赏 &#8226;</span>
<?php } elseif($thread['special'] == 4) { ?>
<span class="xxmcsp z">活动 &#8226;</span>
<?php } elseif($thread['special'] == 5) { ?>
<span class="xxmcsp z">辩论 &#8226;</span>
<?php } if($thread['readperm']) { ?><span class="xxmcsp z">阅读权限<?php echo $thread['readperm'];?> &#8226;</span><?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
<span class="rq"><?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?> &#8226;</span>
<?php } else { ?>
<span class="rq">售价 <?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> &#8226;</span>
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
<span class="grey">已解决 &#8226;</span>
<?php } ?>
                	<span <?php echo $thread['highlight'];?>><?php echo $thread['subject'];?></span>
                </h2>
           	   </a>
            </section>
        </div>
    <?php } ?>
    </li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="b_p hm grey xxmbb1">暂时还没有帖子</p>
<?php } } ?>
</div>
<!-- main threadlist end -->

<?php echo $multipage;?>

<div class="pullrefresh" style="display:none;"></div>
<div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php } else { ?>
<li class="flex"><a href="forum.php?forumlist=1&amp;mobile=2&amp;forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li class="flex"><a href="forum.php?mod=misc&amp;action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } else { ?>
<li class="flex"><a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfcs"><i class="xxmfont icontimefill"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfca"><i class="xxmfont iconpeople"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>我的<?php } else { ?>登录<?php } ?></span></a></li>
</ul>
</div><?php include template('common/footer'); } ?>
    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     	