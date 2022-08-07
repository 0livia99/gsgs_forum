<?php echo 'QQ:2399835618';exit;?>
<div class="xxm_reward b_p mbw cl">
	<div class="hm"><em></em></div>
	<div class="hm rq"><strong class="xxmfsft">$rewardprice</strong><span class="xxmfst">&nbsp;{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}</span></div>
	<div class="hm mbw">{lang thread_reward}{if $_G['forum_thread']['price'] > 0}<span class="grey xxmfst">&nbsp;/&nbsp;{lang unresolved}</span>{elseif $_G['forum_thread']['price'] < 0}<span class="grey xxmfst">&nbsp;/&nbsp;{lang resolved}</span>{/if}</div>
</div>
<!--{if !$_G['uid'] && $_G['forum_thread']['price'] > 0 && !$_G['forum_thread']['is_archived']}-->
<div class="mtw mbw btn-big"><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="touch">{lang reward_answer}</a></div>
<!--{elseif $_G['forum_thread']['price'] > 0}-->
<div class="mtw mbw btn-big"><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$_G[forum_firstpid]&page=$page" class="touch">{lang reward_answer}</a></div>
<!--{/if}-->
<div class="xxmclear"></div>

<!--{if $bestpost}-->
<div class="xxm_reward b_p cl">
	<div class="hm mtw mbw">{lang reward_bestanswer}</div>
	<div class="pstl mbw">
		<div class="psti cl">
			<div class="z" style="width: 10%;">$bestpost[avatar]</div>
			<div class="z" style="width: 90%;">
				<a href="home.php?mod=space&uid=$bestpost[authorid]&do=profile&mobile=2">$bestpost[author]</a>
				<p class="grey">$bestpost[message]</p>
			</div>
		</div>
	</div>
</div>
<div class="xxmclear"></div>
<!--{/if}-->

<div id="postmessage_$post[pid]" class="postmessage mtw mbw cl">$post[message]</div>

<!--{if $post['attachment']}-->
	<div class="warning">{lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em></div>
<!--{elseif $post['imagelist'] || $post['attachlist']}-->
    <!--{if $post['imagelist']}-->
         {echo showattach($post, 1)}
    <!--{/if}-->
    <!--{if $post['attachlist']}-->
         {echo showattach($post)}
    <!--{/if}-->
<!--{/if}-->
<!--{eval $post['attachment'] = $post['imagelist'] = $post['attachlist'] = '';}-->


