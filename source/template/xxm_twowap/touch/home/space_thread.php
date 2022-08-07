<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
       <a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
	   <!--{if $viewtype == 'reply' || $viewtype == 'postcomment'}-->
	   <span>$space[username]'{lang reply}</span>
	   <!--{else}-->
	   <span>$space[username]'{lang topic}</span>
	   <!--{/if}-->
	   <div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
   </div>
</header>
<!-- header end -->
<!-- main threadlist start -->
<div class="threadxxmlist">
<ul>
<!--{if $list}-->
<!--{loop $list $thread}-->
	<li>
		<!--{if $viewtype == 'reply' || $viewtype == 'postcomment'}-->
		<a href="forum.php?mod=redirect&goto=findpost&ptid=$thread[tid]&pid=$thread[pid]">
			<span>$thread[subject]</span>
		</a>
		<!--{else}-->
		<a href="forum.php?mod=viewthread&tid=$thread[tid]" {if $thread['displayorder'] == -1}class="grey"{/if}>
			<span>$thread[subject]</span>
		</a>
		<!--{/if}-->
		<!--{if {$thread[replies]} > 0}--><span class="num xxmfont iconcomment">{$thread[replies]}</span><!--{/if}-->
	</li>
<!--{/loop}-->
<!--{else}-->
<li class="b_m b_p hm grey">{lang no_related_posts}</li>
<!--{/if}-->
</ul>
$multi
</div>
<!-- main threadlist end -->

<!--{template common/footer}-->

