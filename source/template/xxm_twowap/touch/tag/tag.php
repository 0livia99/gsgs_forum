<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
		<span class="category">{lang tag}</span>
		<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->

<!--{if $type != 'countitem'}-->
<div class="cl xxm-tag">
	
	<form method="post" action="misc.php?mod=tag">
		<div class="faqsearch">
			<input type="text" name="name" placeholder="" class="input">
			<button type="submit" class="button2"><em>{lang search}</em></button>
		</div>
		<!--{eval $policymsgs = $p = '';}-->
		<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
		<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
		<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
		<!--{/loop}-->
		<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
	</form>
	
	<div class="xxmclear"></div>
	<div class="xxm-tag-list b_p">
		<p class="xxmfst grey">{$_G['style']['tag']}</p>
		<div class="cl">
		<!--{if $tagarray}-->
			<!--{loop $tagarray $tag}-->
			<a href="misc.php?mod=tag&id=$tag[tagid]" title="$tag[tagname]">$tag[tagname]</a>
			<!--{/loop}-->
		<!--{else}-->
			<div class="hm grey xxmfst">{lang no_tag}</div>
		<!--{/if}-->
		</div>
	</div>
</div>
<!--{else}-->
$num
<!--{/if}-->


<!--{template common/footer}-->

	