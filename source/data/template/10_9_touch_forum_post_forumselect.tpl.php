<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } ?>,<?php echo $_G['setting']['bbname'];?>" />
<title><?php if($_GET['forumlist'] == '1' || $_GET['mod'] == 'guide') { ?><?php echo $_G['setting']['bbname'];?><?php } else { if(!empty($navtitle)) { ?><?php echo $navtitle;?><?php } if(empty($nobbname)) { ?> - <?php echo $_G['setting']['bbname'];?><?php } } ?></title><?php include_once DISCUZ_ROOT.TPLDIR.'/touch/php/lang.php';?><style>
.xxmfcs, .user_avatar .name { color: <?php echo $_G['style']['zhuti'];?> !important; }
.searchxxm .xxmbutton, .button, .button2, .subforumshow h2 code:before, .button_pm, .btn-big .touch, .xxm-tattl-buy-button-fill a, .xxm-attach-buy-button-fill a, .btn-xxmlo .lrxxm, .btn-xxmregi .lrxxm, .btn_pn_blue, .xxmwrbtn, .btnxxmem, .forumlistpbl_box .pnc { background: <?php echo $_G['style']['zhuti'];?> !important; }
.btn-xxmlo .lrxxm, .btn-xxmregi .lrxxm { border: 1px solid <?php echo $_G['style']['zhuti'];?> !important; }
</style>
<link rel="stylesheet" href="<?php echo $_G['style']['styleimgdir'];?>/images/xxm.css" type="text/css" media="all">
<script src="<?php echo $_G['style']['styleimgdir'];?>/images/jquery.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="static/js/common.js?g9O" type="text/javascript" type="text/javascript"></script>
<script src="<?php echo $_G['style']['styleimgdir'];?>/images/xxm.js" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_G['style']['styleimgdir'];?>/images/font/iconfont.css">
</head>
<body class="bgxxmfff">
<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?>

<div class="cl">
<div style="display: none">
<ul id="fs_group"><?php echo $grouplist;?></ul>
<ul id="fs_forum_common"><?php echo $commonlist;?></ul><?php if(is_array($forumlist)) foreach($forumlist as $forumid => $forum) { ?><ul id="fs_forum_<?php echo $forumid;?>"><?php echo $forum;?></ul>
<?php } if(is_array($subforumlist)) foreach($subforumlist as $forumid => $forum) { ?><ul id="fs_subforum_<?php echo $forumid;?>"><?php echo $forum;?></ul>
<?php } ?>
</div>
<div class="c forumlistpbl_box">
<div class="b_p">
<span class="pbnv grey"><?php echo $_G['setting']['sitename'];?><span id="pbnv"></span> <a id="enterbtn" class="xg1 grey" href="javascript:;" onclick="locationforums(currentblock, currentfid)">[进入版块]</a></span>
</div>
<ul class="forumlistpbl cl">
<li id="block_group"></li>
<li id="block_forum"></li>
<li id="block_subforum"></li>
</ul>
    <p class="cl z pbut">
<?php if($_G['group']['allowpost'] || !$_G['uid']) { if($special === null) { ?>
<button id="postbtn" class="pn pnc z" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&mobile=2'" disabled="disabled">发新帖</button>
<?php } else { ?>
<button id="postbtn" class="pn pnc z" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&special=<?php echo $special;?>&mobile=2'" disabled="disabled"><?php echo $actiontitle;?></button>
<?php } } ?>
</p>
</div>
<script type="text/javascript" reload="1">
var s = '<?php if($commonfids) { ?><p><a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, \'common\')" class="pbsb lightlink">常用版块</a></p><?php } ?>';
var lis = $('fs_group').getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
var gid = lis[i].getAttribute('fid');
if($('fs_forum_' + gid)) {
s += '<p><a href="javascript:;" ondblclick="locationforums(1, ' + gid + ')" onclick="switchforums(this, 1, ' + gid + ')" class="pbsb">' + lis[i].innerHTML + '</a></p>';
}
}
$('block_group').innerHTML = s;
var lastswitchobj = null;
var selectfid = 0;
var switchforum = switchsubforum = '';
switchforums($('commonforum'), 1, 'common');
function switchforums(obj, block, fid) {
if(lastswitchobj != obj) {
if(lastswitchobj) {
lastswitchobj.parentNode.className = '';
}
obj.parentNode.className = 'pbls';
}
var s = '';
if(fid != 'common') {
$('enterbtn').className = 'xi2 grey';
currentblock = block;
currentfid = fid;
} else {
$('enterbtn').className = 'xg1 grey';
}
if(block == 1) {
var lis = $('fs_forum_' + fid).getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
fid = lis[i].getAttribute('fid');
if(fid != '') {
s += '<p><a href="javascript:;" ondblclick="locationforums(2, ' + fid + '\)" onclick="switchforums(this, 2, ' + fid + ')"' + ($('fs_subforum_' + fid) ?  ' class="pbsb"' : '') + '>' + lis[i].innerHTML + '</a></p>';
}
}
$('block_forum').innerHTML = s;
$('block_subforum').innerHTML = '';
switchforum = switchsubforum = '';
selectfid = 0;
$('postbtn').setAttribute("disabled", "disabled");
$('postbtn').className = 'pn xg1 y';
} else if(block == 2) {
selectfid = fid;
if($('fs_subforum_' + fid)) {
var lis = $('fs_subforum_' + fid).getElementsByTagName('LI');
for(i = 0;i < lis.length;i++) {
fid = lis[i].getAttribute('fid');
s += '<p><a href="javascript:;" ondblclick="locationforums(3, ' + fid + ')" onclick="switchforums(this, 3, ' + fid + ')">' + lis[i].innerHTML + '</a></p>';
}
$('block_subforum').innerHTML = s;
} else {
$('block_subforum').innerHTML = '';
}
switchforum = obj.innerHTML;
switchsubforum = '';
$('postbtn').removeAttribute("disabled");
$('postbtn').className = 'pn pnc y';
} else {
selectfid = fid;
switchsubforum = obj.innerHTML;
$('postbtn').removeAttribute("disabled");
$('postbtn').className = 'pn pnc y';
}
lastswitchobj = obj;
$('pbnv').innerHTML = switchforum ? '&nbsp;&gt;&nbsp;' + switchforum + (switchsubforum ? '&nbsp;&gt;&nbsp;' + switchsubforum : '') : '';
}
function locationforums(block, fid) {
location.href = block == 1 ? 'forum.php?gid=' + fid : 'forum.php?mod=forumdisplay&fid=' + fid;
}
</script>
</div>

<div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php } else { ?>
<li class="flex"><a href="forum.php?forumlist=1&amp;mobile=2&amp;forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=misc&amp;action=nav" class="xxmfca"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfca"><i class="xxmfont iconpeople"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>我的<?php } else { ?>登录<?php } ?></span></a></li>
</ul>
</div><?php $nofooter = true;?><?php include template('common/footer'); ?>