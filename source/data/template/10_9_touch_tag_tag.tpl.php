<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('tag');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
<span class="category">标签</span>
<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->

<?php if($type != 'countitem') { ?>
<div class="cl xxm-tag">

<form method="post" action="misc.php?mod=tag">
<div class="faqsearch">
<input type="text" name="name" placeholder="" class="input">
<button type="submit" class="button2"><em>搜索</em></button>
</div><?php $policymsgs = $p = '';?><?php if(is_array($_G['setting']['creditspolicy']['search'])) foreach($_G['setting']['creditspolicy']['search'] as $id => $policy) { ?><?php
$policymsg = <<<EOF

EOF;
 if($_G['setting']['extcredits'][$id]['img']) { 
$policymsg .= <<<EOF
{$_G['setting']['extcredits'][$id]['img']} 
EOF;
 } 
$policymsg .= <<<EOF
{$_G['setting']['extcredits'][$id]['title']} {$policy} {$_G['setting']['extcredits'][$id]['unit']}
EOF;
?><?php $policymsgs .= $p.$policymsg;$p = ', ';?><?php } if($policymsgs) { ?><p>!search_credit_msg!</p><?php } ?>
</form>

<div class="xxmclear"></div>
<div class="xxm-tag-list b_p">
<p class="xxmfst grey"><?php echo $_G['style']['tag'];?></p>
<div class="cl">
<?php if($tagarray) { if(is_array($tagarray)) foreach($tagarray as $tag) { ?><a href="misc.php?mod=tag&amp;id=<?php echo $tag['tagid'];?>" title="<?php echo $tag['tagname'];?>"><?php echo $tag['tagname'];?></a>
<?php } } else { ?>
<div class="hm grey xxmfst">还没有任何标签</div>
<?php } ?>
</div>
</div>
</div>
<?php } else { ?>
<?php echo $num;?>
<?php } include template('common/footer'); ?>