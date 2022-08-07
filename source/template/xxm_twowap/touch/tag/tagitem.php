<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
		<span class="category"><!--{if $tagname}-->{lang tag}: $tagname<!--{else}-->{lang tag}: $searchtagname<!--{/if}--></span>
		<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->

<!--{if $tagname}-->

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
	<div class="cl">
		<!--{if empty($showtype) || $showtype == 'thread'}-->
			<div class="cl">
				<p class="xxmfsf b_p xxmbb1 grey">{lang related_thread}</p>
				<!--{if $threadlist}-->
					<ul>
						<!--{loop $threadlist $thread}-->
						
						<li>
							<div class="cardxxmt">
								<header class="xxmfdtlh">
								    <div class="xxmfdtlhl">
								        <!--{if !$thread[author]}-->
								      	<a class="avatar">{avatar($thread[0],middle)}</a>
								      	<!--{else}-->
								      	<a class="avatar" href="home.php?mod=space&uid=$thread[authorid]&do=profile">{avatar($thread[authorid],middle)}</a>
								      	<!--{/if}-->
								    </div>
								    	<div class="xxmfdtlhm">
									    <div class="name">
											<!--{if !$thread[author]}-->
											<a class="grey">{lang anonymous}</a>
											<!--{else}-->
											<a href="home.php?mod=space&uid=$thread[authorid]&do=profile" class="blue">$thread[author]</a>
											<!--{/if}-->
									    </div>
									    <div class="data">
									   		<span class="grey xxmfst">$thread[dateline]</span>
									   		<!--{if $thread['isgroup'] != 1}-->
										   		<!--{if $thread[replies] > 0}-->
										   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>$thread[replies]</em></span>
										   		<!--{/if}-->
										   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>$thread[views]</em></span>
									   		<!--{else}-->
										   		<!--{if {$groupnames[$thread[tid]][replies]} > 0}-->
										   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>{$groupnames[$thread[tid]][replies]}</em></span>
										   		<!--{/if}-->
										   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>{$groupnames[$thread[tid]][views]}</em></span>
									   		<!--{/if}-->
											<span class="grey y">$thread[typehtml] $thread[sorthtml]&nbsp;&nbsp;</span>
									    </div>
								    </div>
								</header>
								<section class="xxmfdtlb cl">
								    <a href="forum.php?mod=viewthread&tid=$thread[tid]">
								        <h2>
								        <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
										<span class="xxmcdis z">{lang thread_sticky} &#8226;</span>
										<!--{/if}-->
										<!--{if $thread['digest'] > 0 }-->
										<span class="xxmcdig z">{lang thread_digest} &#8226;</span>
										<!--{/if}-->
								        <!--{if $thread['special'] == 1}-->
										<span class="xxmcsp z">{lang thread_poll} &#8226;</span>
										<!--{elseif $thread['special'] == 2}-->
										<span class="xxmcsp z">{lang thread_trade} &#8226;</span>
										<!--{elseif $thread['special'] == 3}-->
										<span class="xxmcsp z">{lang thread_reward} &#8226;</span>
										<!--{elseif $thread['special'] == 4}-->
										<span class="xxmcsp z">{lang thread_activity} &#8226;</span>
										<!--{elseif $thread['special'] == 5}-->
										<span class="xxmcsp z">{lang thread_debate} &#8226;</span>
										<!--{/if}-->
										<!--{if $thread['readperm']}--><span class="xxmcsp z">{lang readperm}$thread[readperm] &#8226;</span><!--{/if}-->
										<!--{if $thread['price'] > 0}-->
											<!--{if $thread['special'] == '3'}-->
											<span class="rq">$thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]} &#8226;</span>
											<!--{else}-->
											<span class="rq">{lang price} $thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]} &#8226;</span>
											<!--{/if}-->
										<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
											<span class="grey">{lang resolved} &#8226;</span>
										<!--{/if}-->
								        	<span $thread[highlight]>$thread[subject]</span>
								        </h2>
								   </a>
								</section>
							</div>
							
						</li>
						<!--{/loop}-->
					</ul>
					<!--{if empty($showtype)}-->
						<div class="hm grey b_p">
							<a href="misc.php?mod=tag&id=$id&type=thread" class="xxmfst blue">{lang more}...</a>
						</div>
					<!--{else}-->
						<!--{if $multipage}--><div class="pgs mtm cl">$multipage</div><!--{/if}-->
					<!--{/if}-->
				<!--{else}-->
					<div class="hm grey b_p xxmfst">{lang no_content}</div>
				<!--{/if}-->
			</div>
		<!--{/if}-->
		<!--{if helper_access::check_module('blog') && (empty($showtype) || $showtype == 'blog')}-->
		<!--{/if}-->
	</div>

<!--{else}-->

	<div class="cl">
		
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
		<div class="hm grey b_p xxmfst">Nothing</div>
	</div>
	
<!--{/if}-->

<!--{template common/footer}-->
