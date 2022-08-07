<?php echo 'QQ:2399835618';exit;?>
<!--{if $sublist > 0}-->
<div class="xxmclear"></div>
<div class="cl">
<div class="sub_forum_box_only">
	<div class="sub_forum_only cl">
		<ul>
			<!--{loop $sublist $sub}-->
			<!--{eval $forum=$forumlist[$sub];}-->
			<!--{eval $forum_favlist = C::t('home_favorite')->fetch_by_id_idtype($sub['fid'], 'fid', $_G['uid']);}-->
			<li>
				<div class="list-item">
					<!--{if $sub[icon]}-->
					{$sub[icon]}
					<!--{else}-->
					<a href="forum.php?mod=forumdisplay&fid={$sub[fid]}"><img src="{$_G['style']['styleimgdir']}/images/forum-icon.png" alt="{$sub['name']}" /></a>
					<!--{/if}-->
					<div class="content">
						<div class="title">
							<a href="forum.php?mod=forumdisplay&fid={$sub['fid']}">{$sub[name]}</a>
							<a href="home.php?mod=spacecp&ac=favorite&type=forum&id=$sub['fid']&handlekey=favoriteforum&formhash={FORMHASH}" class="y xxm-dis-fav dialog">
							<!--{if $forum_favlist && $_G['uid']}--><em class="grey xxmfont iconcollection_fill"></em><!--{else}--><em class="grey xxmfont iconcollection"></em><!--{/if}-->
							</a>
						</div>
						<!--{if $sub[description]}-->
						<div class="desc grey">$sub[description]</div>
						<!--{/if}-->
						<div class="info">
							<div class="info-item">
								<i class="grey xxmfont iconposts xxmfst"></i>
								<span class="text grey"> <!--{echo dnumber($sub[threads])}--></span>
							</div>
							<div class="info-item">
								<i class="grey xxmfont iconmessage xxmfst"></i>
								<span class="text grey"> <!--{echo dnumber($sub[posts])}--><!--{if $sub[todayposts] > 0}--><i class="news xxmfont iconcreative xxmfst">$sub[todayposts]</i><!--{/if}--></span>
							</div>
						</div>
					</div>
				</div>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
</div>
</div>
<div class="xxmclear"></div>
<!--{else}-->
<div class="ptm xxmlist"><ul><li class="b_p mtw mbw hm grey">{lang none}{lang forum_subforums}</li></ul></div>
<!--{/if}-->

