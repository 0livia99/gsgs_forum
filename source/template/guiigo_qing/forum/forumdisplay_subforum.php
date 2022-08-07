<?php exit('贵古互联版权所有 客服QQ:99972466');?>
<div class="ggq-sbon ggq-sbone">
	<div class="bm bmw fl{if $_G['forum']['forumcolumns']} flg{/if}">
		<div class="bm_h cl">
			<span class="o"><img id="subforum_{$_G[forum][fid]}_img" src="{IMGDIR}/$collapseimg[subforum]" title="{lang spread}" alt="{lang spread}" onclick="toggle_collapse('subforum_$_G['forum'][fid]');" /></span>
			<h2>二级版块</h2>
		</div>

		<div id="subforum_{$_G[forum][fid]}" class="bm_c sbso-wdsc sbso-ejbk cl" style="$collapse[subforum]">
			<ul>
				<!--{loop $sublist $sub}-->
				<!--{eval $forumurl = !empty($sub['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? $_G['scheme'].'://'.$sub['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$sub['fid'];}-->
					<li>
						<!--{if $sub[icon]}-->
							$sub[icon]
						<!--{else}-->
							<a href="$forumurl"{if $forum[redirect]} target="_blank"{/if}><img src="{IMGDIR}/forum{if $sub[folder]}_new{/if}.gif" alt="$sub[name]" /></a>
						<!--{/if}-->
						<a href="$forumurl"{if $forum[redirect]} target="_blank"{/if} class="wdsc-bkmc">$sub[name]<!--{if $sub[todayposts] && !$sub['redirect']}--><em class="xi1">$sub[todayposts]</em><!--{/if}--></a>
						<!--{if empty($forum[redirect])}--><p><em>{lang forum_threads}: <!--{echo dnumber($sub[threads])}--></em> <em>{lang forum_posts}: <!--{echo dnumber($sub[posts])}--></em></p><!--{/if}-->
					</li>
				<!--{/loop}-->
				$_G['forum']['endrows']
			</ul>
		</div>
	</div>
</div>

