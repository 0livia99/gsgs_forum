<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('announcement');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
<span class="category">公告</span>
<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->

<div class="cl">

<div class="xxm-anno-nav b_p">
<a href="forum.php?mod=announcement" class="xxmfsf blue<?php if(empty($_GET['m'])) { ?> a<?php } ?>">全部</a><?php if(is_array($months)) foreach($months as $month) { ?><a href="forum.php?mod=announcement&amp;m=<?php echo $month['0'].$month['1'];?>" class="xxmfsf blue<?php if($_GET['m'] == $month['0'].$month['1']) { ?> a<?php } ?>"><?php echo $month['0'];?>/<?php echo $month['1'];?></a>
<?php } ?>
</div>
<div class="xxmclear"></div>
<div class="xxmgap"></div>

<div class="annlist cl">
<ul><?php $nn = 0;?><?php if(is_array($announcelist)) foreach($announcelist as $ann) { $nn++;?><li class="cl">
<h2><a href="javascript:;" class="ann_more" id="ann_<?php echo $ann['id'];?>"><i class="<?php if($nn == 1 && !$annid || $ann['id'] == $annid) { ?>xxmfont iconyou<?php } else { ?>xxmfont iconxia<?php } ?>"></i><?php echo $ann['subject'];?></a></h2>
<h3><span class="my"><?php echo $ann['starttime'];?></span><span class="mz">作者:</span> <a href="home.php?mod=space&amp;username=<?php echo $ann['authorenc'];?>&amp;do=profile" class="blue"><?php echo $ann['author'];?></a></h3>
<div class="annlist_box" style="display:<?php if($nn == 1 && !$annid || $ann['id'] == $annid) { ?>block<?php } else { ?>none<?php } ?>;" id="ann_<?php echo $ann['id'];?>_box">				
<?php echo $ann['message'];?>
</div>
</li>
<?php } ?>
</ul>
</div>

<script>
$('.ann_more').on('click', function() {
var obj = $(this);
var sub_obj = $('#' + obj.attr('id') + '_box');
if(sub_obj.css('display') == 'none') {
sub_obj.css('display', 'block');
obj.find('i').removeClass().addClass('xxmfont iconyou');
} else {
sub_obj.css('display', 'none');
obj.find('i').removeClass().addClass('xxmfont iconxia');
}
});
</script>
</div><?php include template('common/footer'); ?>