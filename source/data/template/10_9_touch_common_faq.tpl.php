<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('faq');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
<span class="category">全部帮助</span>
<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->

<div class="cl xxm-faq">

<form method="post" autocomplete="off" action="misc.php?mod=faq&amp;action=search">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="searchtype" value="all" />
<div class="faqsearch">
<input type="text" name="keyword" value="<?php echo $keyword;?>" class="input" placeholder="">
<button type="submit" name="searchsubmit" class="button2" value="yes"><em>搜索</em></button>
</div>
</form>

<div class="xxm-faq-appl b_p xxmbb1">
<a href="misc.php?mod=faq"<?php if(empty($_GET['action'])) { ?> class="a"<?php } ?>>全部</a><?php if(is_array($faqparent)) foreach($faqparent as $fpid => $parent) { ?><a href="misc.php?mod=faq&amp;action=faq&amp;id=<?php echo $fpid;?>" <?php if($_GET['id'] == $fpid) { ?>class="a"<?php } ?>><?php echo $parent['title'];?></a>
<?php } if(!empty($_G['setting']['plugins']['faq'])) { if(is_array($_G['setting']['plugins']['faq'])) foreach($_G['setting']['plugins']['faq'] as $id => $module) { ?><a href="misc.php?mod=faq&amp;action=plugin&amp;id=<?php echo $id;?>" <?php if($_GET['id'] == $id) { ?>class="a"<?php } ?>><?php echo $module['name'];?></a>
<?php } } ?>
</div>
<div class="xxmclear"></div>

<div class="b_p mtw">
<?php if(empty($_GET['action'])) { ?>
<div class="all">
<?php if($fpid) { if(is_array($faqparent)) foreach($faqparent as $fpid => $parent) { ?><h2><a href="misc.php?mod=faq&amp;action=faq&amp;id=<?php echo $fpid;?>" class="xxmfss"><?php echo $parent['title'];?></a></h2>
<ul name="<?php echo $parent['title'];?>"><?php if(is_array($faqsub[$parent['id']])) foreach($faqsub[$parent['id']] as $sub) { ?><li><a href="misc.php?mod=faq&amp;action=faq&amp;id=<?php echo $sub['fpid'];?>&amp;messageid=<?php echo $sub['id'];?>" class="xxmfsf"><?php echo $sub['title'];?></a></li>
<?php } ?>
</ul>
<?php } } else { ?>
<div class="hm ddd xxmfst">No Help</div>
<?php } ?>
</div>
<?php } elseif($_GET['action'] == 'faq') { if(is_array($faqlist)) foreach($faqlist as $faq) { ?><div id="messageid<?php echo $faq['id'];?>_c"><h2 class="xxmfss"><?php echo $faq['title'];?></h2></div>
<div class="detail" id="messageid<?php echo $faq['id'];?>"><?php echo $faq['message'];?></div>
<?php } } elseif($_GET['action'] == 'search') { ?>
<div class="xxmfst mbw hm ddd">关键字为“<span class="xi1"><?php echo $keyword;?></span>”的帮助</div>
<?php if($faqlist) { if(is_array($faqlist)) foreach($faqlist as $faq) { ?><h2 class="xxmfss"><?php echo $faq['title'];?></h2>
<div class="detail"><?php echo $faq['message'];?></div>
<?php } } else { ?>
<div class="hm ddd xxmfst">No Help</div>
<?php } } elseif($_GET['action'] == 'plugin' && !empty($_GET['id'])) { include(template($_GET['id']));?><?php } ?>
</div>

</div><?php include template('common/footer'); ?>