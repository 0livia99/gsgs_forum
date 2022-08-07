<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_favorite');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
<span class="category">我的收藏</span>
<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->
<!-- main collectlist start -->

<div class="threadxxmlist">
<ul>
<?php if($list) { if(is_array($list)) foreach($list as $k => $value) { ?><li>
<a class="y dialog" href="home.php?mod=spacecp&amp;ac=favorite&amp;op=delete&amp;favid=<?php echo $k;?>"><em class="xxmfont iconclose grey"></em></a>
<a href="<?php echo $value['url'];?>"><?php if($_GET['type'] == 'all') { ?><?php echo $value['icon'];?><?php } ?><?php echo $value['title'];?></a>
</li>
<?php } } else { ?>
<li class="hm"><a>您还没有添加任何收藏</a></li>
<?php } ?>
</ul>
</div>

<!-- main collectlist end -->
<?php echo $multi;?>

<script type="text/javascript">
function favorite_delete(favid) {
var el = $('fav_' + favid);
if(el) {
el.style.display = "none";
}
}
<?php if($_GET['type'] == "thread") { ?>
function collection_favorite() {
var form = $('delform');
var prefix = '^favorite';
var tids = '';
for(var i = 0; i < form.elements.length; i++) {
var e = form.elements[i];		
if(e.name.match(prefix) && e.checked) {
tids += 'tids[]=' + e.getAttribute('vid') + '&';
}
}
if(tids) {
showWindow(null, 'forum.php?mod=collection&action=edit&op=addthread&' + tids);
}
}
function update_collection() {}
<?php } ?>
</script><?php include template('common/footer'); ?>