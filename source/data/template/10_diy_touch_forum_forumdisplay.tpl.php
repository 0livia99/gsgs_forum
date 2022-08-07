<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay');
0
|| checktplrefresh('./template/xxm_twowap/touch/forum/forumdisplay.htm', './template/xxm_twowap/touch/forum/forumdisplay_subforumonly.htm', 1659871925, 'diy', './data/template/10_diy_touch_forum_forumdisplay.tpl.php', './template/xxm_twowap', 'touch/forum/forumdisplay')
;?><?php include template('common/header'); ?><?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_top_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_top_mobile'];?>


<div class="forum-fd-box">
<div class="forum-fd-banner" style="<?php if($_G['forum']['banner'] && !$subforumonly) { ?>background-image:url(<?php echo $_G['forum']['banner'];?>);background-size:cover;<?php } else { ?>background: <?php echo $_G['style']['zhuti'];?>;<?php } ?>"><div class="fd-cover"></div></div>
<div class="forum-fd-data cl">
<div class="b_p">
<div class="fd-header cl">
<a href="forum.php?forumlist=1" class="z xxmfont iconzuo fts white"></a>
<a href="forum.php" class="y xxmfont iconhome fts white xxmfst"></a>
</div>
<div class="fd-info cl">
<div class="fd-icon z">
<img src="<?php if($_G['forum']['icon']) { ?>data/attachment/common/<?php echo $_G['forum']['icon'];?><?php } else { ?><?php echo $_G['style']['styleimgdir'];?>/images/forum-icon.png<?php } ?>">
</div>
<div class="fd-record z">
<p class="white fts xxmfstt name"><?php echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];?></p>
<p class="white fts">主题 <?php echo $_G['forum']['threads'];?></p>
<p class="white fts">收藏 <?php echo $_G['forum']['favtimes'];?></p>
</div>

<?php if($_G['uid'] || $_G['group']['allowpost']) { if($_G['uid']){$favfids = C::t('home_favorite')->fetch_all_by_uid_idtype($_G['uid'], 'fid');foreach($favfids as $val){if($val['id'] == $_G[fid]){$isFav = $val['favid'];}}}?><?php if($isFav) { ?>
<div class="fd-fav"><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=<?php echo $_G['fid'];?>&amp;formhash=<?php echo FORMHASH;?>" class="dialog xxmfst b"><?php echo xxm('was');; ?>收藏</a></div>
<?php } else { ?>
<div class="fd-fav"><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=<?php echo $_G['fid'];?>&amp;formhash=<?php echo FORMHASH;?>" class="dialog xxmfst a">收藏</a></div>
<?php } } else { ?>
<div class="fd-fav"><a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="dialog xxmfst a">收藏</a></div>
<?php } ?>

</div>
</div>
</div>
</div>
<div class="forum-fd-round"></div>
<script type="text/javascript">
function favforum_ajax(obj) {
var forum_id = '#' + obj;
if(<?php echo $_G['uid'];?>){
jQuery.ajax({
url: jQuery(forum_id).attr('href') + '&inajax=1',
type: 'POST',
dataType: 'xml',
success: function(s){
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
},
error: function(){
window.location.href = jQuery(forum_id).attr('href');
popup.close();
},
});
}else{
landingPrompt();
}
}
</script>



<?php if(!$subforumonly) { if($subexists) { ?>
<div class="xxmsubnamelist bgxxmfff">
<span class="xxmfsf grey">子版块&nbsp;:&nbsp;</span><?php if(is_array($sublist)) foreach($sublist as $sub) { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $sub['fid'];?>" class="xxmfsf blue"><?php echo $sub['name'];?><?php if(empty($sub['redirect'])) { if($sub['threads'] > 0) { ?><em class="subdata xxmfst"><?php if($sub['todayposts']) { ?><i class="rq"><?php echo $sub['todayposts'];?></i> / <?php } echo dnumber($sub['posts']); ?></em><?php } } ?></a>
<?php } ?>
</div>
<?php } if(!$_G['setting']['mobile']['mobilesimpletype']) { if(($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']) { if($_G['forum']['threadtypes']) { ?>
<div class="xxmttp ptm bgxxmfff">
    <span class="xxmfsf grey">主题分类&nbsp;:&nbsp;</span>
    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="xxmfsf blue<?php if($_GET['filter'] != 'typeid') { ?> a<?php } ?>">全部</a>
    <?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { ?>    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?>" class="xxmfsf blue<?php if($_GET['filter'] == 'typeid' && $_GET['typeid'] == $id) { ?> a<?php } ?>"><?php echo $name;?><?php if($showthreadclasscount['typeid'][$id]) { ?><em class="subdata xxmfst"><?php echo $showthreadclasscount['typeid'][$id];?></em><?php } ?></a>
    <?php } ?>
</div>
<?php } if($_G['forum']['threadsorts']) { ?>
<div class="xxmtst ptm bgxxmfff">
    <span class="xxmfsf grey">分类信息&nbsp;:&nbsp;</span>
    <?php if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $name) { ?>    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $id;?><?php echo $forumdisplayadd['sortid'];?>" class="xxmfsf blue<?php if($_GET['sortid'] == $id) { ?> a<?php } ?>"><?php echo $name;?><?php if($showthreadclasscount['sortid'][$id]) { ?><em class="subdata xxmfst"><?php echo $showthreadclasscount['sortid'][$id];?></em><?php } ?></a>
    <?php } ?>
</div>
<?php } } } ?>

<div class="xxm-filter b_p">
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=lastpost&amp;orderby=lastpost" <?php if($_GET['orderby'] == 'lastpost' && $_GET['digest'] != '1') { ?>class="a"<?php } ?>>全部</a>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=author&amp;orderby=dateline" <?php if($_GET['orderby'] == 'dateline' && $_GET['digest'] != '1') { ?>class="a"<?php } ?>>最新</a>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=heat&amp;orderby=heats" <?php if($_GET['orderby'] == 'heats' && $_GET['digest'] != '1') { ?>class="a"<?php } ?>>热门</a>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=digest&amp;digest=1<?php echo $forumdisplayadd['digest'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" <?php if($_GET['filter'] == 'digest') { ?>class="a"<?php } ?>>精华</a>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=replies" <?php if($_GET['orderby'] == 'replies' && $_GET['digest'] != '1') { ?>class="a"<?php } ?>>回复</a>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=reply&amp;orderby=views" <?php if($_GET['orderby'] == 'views' && $_GET['digest'] != '1') { ?>class="a"<?php } ?>>查看</a>
</div>

<?php if((!$simplestyle || !$_G['forum']['allowside'] && $page == 1) && !empty($announcement)) { ?>
<div class="xxmgap"></div>
<div class="cl fd-announcement b_plr15">
    <a href="forum.php?mod=announcement&amp;id=<?php echo $announcement['id'];?>#<?php echo $announcement['id'];?>" class="xxmfss"><span class="xxmfont icongonggao rq"></span> <em><?php echo $announcement['subject'];?></em></a>
</div>
<?php } ?>

<!-- main threadlist start -->

<?php if(!empty($_G['forum']['picstyle']) && !$_G['cookie']['forumdefstyle']) { if($_G['forum_threadcount']) { ?>
<div class="piclist cl bg xxmbt1">
<div class="piclistbox"><?php if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if(!$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } ?>
<div class="xxm-pic-card">
<div class="xp-pic">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>" title="<?php echo $thread['subject'];?>">
<?php if($thread['cover']) { ?>
<img src="<?php echo $thread['coverpath'];?>" alt="<?php echo $thread['subject'];?>"/>
<?php } else { ?>
<img src="<?php echo $_G['style']['styleimgdir'];?>/images/forum-icon.png">
<?php } ?>
</a>
</div>
<?php if(!$thread['author']) { ?>
<div class="ava-img cl"><?php echo avatar($thread[0],middle);?></div>
<?php } else { ?>
<div class="ava-img cl"><?php echo avatar($thread[authorid],middle);?></div>
<?php } ?>
<div class="cl xp-data">
<p>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis">&#8226; 顶</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig">&#8226; 精</span>
<?php } if($thread['special'] == 1) { ?>
<span class="xxmcsp">&#8226; 投票</span>
<?php } elseif($thread['special'] == 2) { ?>
<span class="xxmcsp">&#8226; 商品</span>
<?php } elseif($thread['special'] == 3) { ?>
<span class="xxmcsp">&#8226; 悬赏</span>
<?php } elseif($thread['special'] == 4) { ?>
<span class="xxmcsp">&#8226; 活动</span>
<?php } elseif($thread['special'] == 5) { ?>
<span class="xxmcsp">&#8226; 辩论</span>
<?php } if($thread['readperm']) { ?><span class="xxmcsp">&#8226; 阅读权限<?php echo $thread['readperm'];?></span><?php } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
<span class="rq">&#8226; <?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['2']]['title'];?></span>
<?php } else { ?>
<span class="rq">&#8226; 售价 <?php echo $thread['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?></span>
<?php } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
<span class="grey">&#8226; 已解决</span>
<?php } ?>
</p>
<div class="xp-title">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;<?php if($_GET['archiveid']) { ?>archiveid=<?php echo $_GET['archiveid'];?>&amp;<?php } ?>extra=<?php echo $extra;?>"><span <?php echo $thread['highlight'];?>><?php echo $thread['subject'];?></span></a>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
</div>
</div>					
<?php } ?>
</div>
</div>
<script type="text/javascript">
$(function(){
$('.piclistbox').waterbzfall({ item: '.xxm-pic-card' });
});
</script>
<?php } else { ?>
<div class="b_p hm grey">本版块或指定的范围内尚无主题</div>
<?php } ?>
<div class="bg"><?php echo $multipage;?></div>

<?php } else { ?>

<div class="xxmgap"></div>
<div class="ptm xxmlist">
<ul>
<?php if($_G['forum_threadcount']) { require_once(DISCUZ_ROOT.'./template/xxm_twowap/touch/php/xxmlist.php');?><?php if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if(!$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0) { continue;?><?php } if($thread['displayorder'] > 0 && !$displayorder_thread) { $displayorder_thread = 1;?><?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } $threadtable = substr($thread[tid], -1);?><?php $img_number = xxmlist_img_num($thread[tid], $thread[authorid], $threadtable);?><li>
<?php if($img_number == 1) { ?>
<div class="cardxxmone">
<div class="img_one">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php $list_img1 = xxmlist_img($thread[tid], $thread[authorid], 1, $threadtable);?><?php if(is_array($list_img1)) foreach($list_img1 as $list_img1_1) { ?><em style="background-image:url(<?php echo(getforumimg($list_img1_1[aid],0,200,200))?>);"></em>
<?php } ?>
</a>
</div>
<div class="tnr">
<div class="p">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<h2>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } if($thread['special'] == 1) { ?>
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
<?php } ?>
<?php echo $thread['dateline'];?>
<?php if($thread['replies'] > 0) { ?><em class="xxmfont iconcomment xxmfst"><?php echo $thread['replies'];?></em><?php } ?>
<?php echo $thread['typehtml'];?> <?php echo $thread['sorthtml'];?>
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
<span class="grey xxmfst"><?php echo $thread['dateline'];?></span>
<?php if($thread['isgroup'] != 1) { if($thread['replies'] > 0) { ?>
<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $thread['replies'];?></em></span>
<?php } ?>
<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $thread['views'];?></em></span>
<?php } else { if($groupnames[$thread['tid']]['replies'] > 0) { ?>
<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['replies'];?></em></span>
<?php } ?>
<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['views'];?></em></span>
<?php } ?>
<span class="grey y"><?php echo $thread['typehtml'];?> <?php echo $thread['sorthtml'];?>&nbsp;&nbsp;</span>
</div>
</div>
</header>
<section class="xxmfdtlb cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<h2>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } if($thread['special'] == 1) { ?>
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
<span class="grey xxmfst"><?php echo $thread['dateline'];?></span>
<?php if($thread['isgroup'] != 1) { if($thread['replies'] > 0) { ?>
<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $thread['replies'];?></em></span>
<?php } ?>
<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $thread['views'];?></em></span>
<?php } else { if($groupnames[$thread['tid']]['replies'] > 0) { ?>
<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['replies'];?></em></span>
<?php } ?>
<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['views'];?></em></span>
<?php } ?>
<span class="grey y"><?php echo $thread['typehtml'];?> <?php echo $thread['sorthtml'];?>&nbsp;&nbsp;</span>
</div>
</div>
</header>
<section class="xxmfdtlb cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<h2>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } if($thread['special'] == 1) { ?>
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
<span class="grey xxmfst"><?php echo $thread['dateline'];?></span>
<?php if($thread['isgroup'] != 1) { if($thread['replies'] > 0) { ?>
<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $thread['replies'];?></em></span>
<?php } ?>
<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $thread['views'];?></em></span>
<?php } else { if($groupnames[$thread['tid']]['replies'] > 0) { ?>
<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['replies'];?></em></span>
<?php } ?>
<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em><?php echo $groupnames[$thread['tid']]['views'];?></em></span>
<?php } ?>
<span class="grey y"><?php echo $thread['typehtml'];?> <?php echo $thread['sorthtml'];?>&nbsp;&nbsp;</span>
</div>
</div>
</header>
<section class="xxmfdtlb cl">
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
<h2>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="xxmcdis z">顶 &#8226;</span>
<?php } if($thread['digest'] > 0 ) { ?>
<span class="xxmcdig z">精 &#8226;</span>
<?php } if($thread['special'] == 1) { ?>
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
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
</li>
<?php } } else { ?>
<li class="b_p mtw mbw hm grey">本版块或指定的范围内尚无主题</li>
<?php } ?>
</ul>
</div>
<?php echo $multipage;?>

<?php } ?>

<!-- main threadlist end -->

<?php } else { if($sublist > 0) { ?>
<div class="xxmclear"></div>
<div class="cl">
<div class="sub_forum_box_only">
<div class="sub_forum_only cl">
<ul><?php if(is_array($sublist)) foreach($sublist as $sub) { $forum=$forumlist[$sub];?><?php $forum_favlist = C::t('home_favorite')->fetch_by_id_idtype($sub['fid'], 'fid', $_G['uid']);?><li>
<div class="list-item">
<?php if($sub['icon']) { ?>
<?php echo $sub['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $sub['fid'];?>"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/forum-icon.png" alt="<?php echo $sub['name'];?>" /></a>
<?php } ?>
<div class="content">
<div class="title">
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $sub['fid'];?>"><?php echo $sub['name'];?></a>
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=<?php echo $sub['fid'];?>&amp;handlekey=favoriteforum&amp;formhash=<?php echo FORMHASH;?>" class="y xxm-dis-fav dialog">
<?php if($forum_favlist && $_G['uid']) { ?><em class="grey xxmfont iconcollection_fill"></em><?php } else { ?><em class="grey xxmfont iconcollection"></em><?php } ?>
</a>
</div>
<?php if($sub['description']) { ?>
<div class="desc grey"><?php echo $sub['description'];?></div>
<?php } ?>
<div class="info">
<div class="info-item">
<i class="grey xxmfont iconposts xxmfst"></i>
<span class="text grey"> <?php echo dnumber($sub['threads']); ?></span>
</div>
<div class="info-item">
<i class="grey xxmfont iconmessage xxmfst"></i>
<span class="text grey"> <?php echo dnumber($sub['posts']); if($sub['todayposts'] > 0) { ?><i class="news xxmfont iconcreative xxmfst"><?php echo $sub['todayposts'];?></i><?php } ?></span>
</div>
</div>
</div>
</div>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
<div class="xxmclear"></div>
<?php } else { ?>
<div class="ptm xxmlist"><ul><li class="b_p mtw mbw hm grey">无子版块</li></ul></div>
<?php } } ?>

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'];?>
<div class="pullrefresh" style="display:none;"></div>

<div class="xxmclear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php } else { ?>
<li class="flex"><a href="forum.php?forumlist=1&amp;mobile=2&amp;forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li class="flex"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } else { ?>
<li class="flex"><a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfca"><i class="xxmfont iconpeople"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>我的<?php } else { ?>登录<?php } ?></span></a></li>
</ul>
</div><?php include template('common/footer'); ?>