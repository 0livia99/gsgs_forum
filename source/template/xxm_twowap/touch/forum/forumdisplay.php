<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!--{hook/forumdisplay_top_mobile}-->


<div class="forum-fd-box">
	<div class="forum-fd-banner" style="<!--{if $_G[forum][banner] && !$subforumonly}-->background-image:url($_G[forum][banner]);background-size:cover;<!--{else}-->background: $_G['style']['zhuti'];<!--{/if}-->"><div class="fd-cover"></div></div>
	<div class="forum-fd-data cl">
		<div class="b_p">
			<div class="fd-header cl">
				<a href="forum.php?forumlist=1" class="z xxmfont iconzuo fts white"></a>
				<a href="forum.php" class="y xxmfont iconhome fts white xxmfst"></a>
			</div>
			<div class="fd-info cl">
				<div class="fd-icon z">
					<img src="<!--{if $_G['forum'][icon]}-->data/attachment/common/$_G['forum'][icon]<!--{else}-->{$_G['style']['styleimgdir']}/images/forum-icon.png<!--{/if}-->">
				</div>
				<div class="fd-record z">
					<p class="white fts xxmfstt name"><!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}--></p>
					<p class="white fts">{lang index_threads} $_G[forum][threads]</p>
					<p class="white fts">{lang favorite} $_G[forum][favtimes]</p>
				</div>
				
				<!--{if $_G[uid] || $_G['group']['allowpost']}-->
					<!--{eval}-->
					if($_G['uid']){$favfids = C::t('home_favorite')->fetch_all_by_uid_idtype($_G['uid'], 'fid');foreach($favfids as $val){if($val['id'] == $_G[fid]){$isFav = $val['favid'];}}}
					<!--{/eval}-->
					<!--{if $isFav}-->
					<div class="fd-fav"><a href="home.php?mod=spacecp&ac=favorite&type=forum&id={$_G[fid]}&formhash={FORMHASH}" class="dialog xxmfst b">{echo xxm('was');}{lang favorite}</a></div>
					<!--{else}-->
					<div class="fd-fav"><a href="home.php?mod=spacecp&ac=favorite&type=forum&id={$_G[fid]}&formhash={FORMHASH}" class="dialog xxmfst a">{lang favorite}</a></div>
					<!--{/if}-->
				<!--{else}-->
					<div class="fd-fav"><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="dialog xxmfst a">{lang favorite}</a></div>
				<!--{/if}-->
				
			</div>
		</div>
	</div>
</div>
<div class="forum-fd-round"></div>
<script type="text/javascript">
	function favforum_ajax(obj) {
		var forum_id = '#' + obj;
		if($_G[uid]){
			jQuery.ajax({
				url: jQuery(forum_id).attr('href') + '&inajax=1',
				type: 'POST',
				dataType: 'xml',
				success: function(s){
					popup.open(s.lastChild.firstChild.nodeValue);
					evalscript(s.lastChild.firstChild.nodeValue);
				},
				error: function(){
					window.location.href = jQuery(forum_id).attr('href');
					popup.close();
				},
			});
		}else{
			landingPrompt();
		}
	}
</script>



<!--{if !$subforumonly}-->

	<!--{if $subexists}-->
	<div class="xxmsubnamelist bgxxmfff">
	<span class="xxmfsf grey">{lang forum_subforums}&nbsp;:&nbsp;</span>
	<!--{loop $sublist $sub}-->
	<a href="forum.php?mod=forumdisplay&fid={$sub[fid]}" class="xxmfsf blue">{$sub['name']}<!--{if empty($sub[redirect])}--><!--{if $sub[threads] > 0}--><em class="subdata xxmfst"><!--{if $sub[todayposts]}--><i class="rq">$sub[todayposts]</i> / <!--{/if}--><!--{echo dnumber($sub[posts])}--></em><!--{/if}--><!--{/if}--></a>
	<!--{/loop}-->
	</div>
	<!--{/if}-->

	<!--{if !$_G[setting][mobile][mobilesimpletype]}-->
	<!--{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']}-->
	<!--{if $_G['forum']['threadtypes']}-->
	<div class="xxmttp ptm bgxxmfff">
	    <span class="xxmfsf grey">{lang threadtype}&nbsp;:&nbsp;</span>
	    <a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="xxmfsf blue<!--{if $_GET['filter'] != 'typeid'}--> a<!--{/if}-->">{lang forum_viewall}</a>
	    <!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
	    <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]" class="xxmfsf blue{if $_GET['filter'] == 'typeid' && $_GET['typeid'] == $id} a{/if}">$name<!--{if $showthreadclasscount[typeid][$id]}--><em class="subdata xxmfst">{$showthreadclasscount[typeid][$id]}</em><!--{/if}--></a>
	    <!--{/loop}-->
	</div>
	<!--{/if}-->
	<!--{if $_G['forum']['threadsorts']}-->
	<div class="xxmtst ptm bgxxmfff">
	    <span class="xxmfsf grey">{lang threadsort}&nbsp;:&nbsp;</span>
	    <!--{loop $_G['forum']['threadsorts']['types'] $id $name}-->
	    <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]" class="xxmfsf blue<!--{if $_GET[sortid] == $id}--> a<!--{/if}-->">$name<!--{if $showthreadclasscount[sortid][$id]}--><em class="subdata xxmfst">{$showthreadclasscount[sortid][$id]}</em><!--{/if}--></a>
	    <!--{/loop}-->
	</div>
	<!--{/if}-->
	<!--{/if}-->
	<!--{/if}-->

	<div class="xxm-filter b_p">
		<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost" {if $_GET['orderby'] == 'lastpost' && $_GET['digest'] != '1'}class="a"{/if}>{lang all}</a>
		<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline" {if $_GET['orderby'] == 'dateline' && $_GET['digest'] != '1'}class="a"{/if}>{lang latest}</a>
		<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats" {if $_GET['orderby'] == 'heats' && $_GET['digest'] != '1'}class="a"{/if}>{lang order_heats}</a>
		<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['filter'] == 'digest'}class="a"{/if}>{lang digest_posts}</a>
		<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=replies" {if $_GET['orderby'] == 'replies' && $_GET['digest'] != '1'}class="a"{/if}>{lang reply}</a>
		<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=views" {if $_GET['orderby'] == 'views' && $_GET['digest'] != '1'}class="a"{/if}>{lang views}</a>
	</div>
	
	<!--{if (!$simplestyle || !$_G['forum']['allowside'] && $page == 1) && !empty($announcement)}-->
	<div class="xxmgap"></div>
	<div class="cl fd-announcement b_plr15">
	    <a href="forum.php?mod=announcement&id=$announcement[id]#$announcement[id]" class="xxmfss"><span class="xxmfont icongonggao rq"></span> <em>$announcement[subject]</em></a>
	</div>
	<!--{/if}-->
	
	<!-- main threadlist start -->
	
	<!--{if !empty($_G['forum']['picstyle']) && !$_G['cookie']['forumdefstyle']}-->
	
		<!--{if $_G['forum_threadcount']}-->
			<div class="piclist cl bg xxmbt1">
				<div class="piclistbox">
				<!--{loop $_G['forum_threadlist'] $key $thread}-->
					<!--{if !$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0}-->
						{eval continue;}
					<!--{/if}-->
						<!--{if $thread['displayorder'] > 0 && !$displayorder_thread}-->
						{eval $displayorder_thread = 1;}
					<!--{/if}-->
					<!--{if $thread['moved']}-->
						<!--{eval $thread[tid]=$thread[closed];}-->
					<!--{/if}-->
					<div class="xxm-pic-card">
						<div class="xp-pic">
							<a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="$thread[subject]">
								<!--{if $thread['cover']}-->
								<img src="$thread[coverpath]" alt="$thread[subject]"/>
								<!--{else}-->
								<img src="{$_G['style']['styleimgdir']}/images/forum-icon.png">
								<!--{/if}-->
							</a>
						</div>
						<!--{if !$thread[author]}-->
						<div class="ava-img cl">{avatar($thread[0],middle)}</div>
						<!--{else}-->
						<div class="ava-img cl">{avatar($thread[authorid],middle)}</div>
						<!--{/if}-->
						<div class="cl xp-data">
							<p>
								<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
								<span class="xxmcdis">&#8226; {lang thread_sticky}</span>
								<!--{/if}-->
								<!--{if $thread['digest'] > 0 }-->
								<span class="xxmcdig">&#8226; {lang thread_digest}</span>
								<!--{/if}-->
								<!--{if $thread['special'] == 1}-->
								<span class="xxmcsp">&#8226; {lang thread_poll}</span>
								<!--{elseif $thread['special'] == 2}-->
								<span class="xxmcsp">&#8226; {lang thread_trade}</span>
								<!--{elseif $thread['special'] == 3}-->
								<span class="xxmcsp">&#8226; {lang thread_reward}</span>
								<!--{elseif $thread['special'] == 4}-->
								<span class="xxmcsp">&#8226; {lang thread_activity}</span>
								<!--{elseif $thread['special'] == 5}-->
								<span class="xxmcsp">&#8226; {lang thread_debate}</span>
								<!--{/if}-->
								
								<!--{if $thread['readperm']}--><span class="xxmcsp">&#8226; {lang readperm}$thread[readperm]</span><!--{/if}-->
								
								<!--{if $thread['price'] > 0}-->
									<!--{if $thread['special'] == '3'}-->
									<span class="rq">&#8226; $thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]}</span>
									<!--{else}-->
									<span class="rq">&#8226; {lang price} $thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]}</span>
									<!--{/if}-->
								<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
									<span class="grey">&#8226; {lang resolved}</span>
								<!--{/if}-->
							</p>
							<div class="xp-title">
								<a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"><span $thread[highlight]>$thread[subject]</span></a>
							</div>
							<!--{hook/forumdisplay_thread_mobile $key}-->
						</div>
					</div>					
				<!--{/loop}-->
				</div>
			</div>
			<script type="text/javascript">
				$(function(){
					$('.piclistbox').waterbzfall({ item: '.xxm-pic-card' });
				});
			</script>
		<!--{else}-->
			<div class="b_p hm grey">{lang forum_nothreads}</div>
		<!--{/if}-->
		<div class="bg">$multipage</div>
		
	<!--{else}-->

		<div class="xxmgap"></div>
		<div class="ptm xxmlist">
			<ul>
			<!--{if $_G['forum_threadcount']}-->
			<!--{eval require_once(DISCUZ_ROOT.'./template/xxm_twowap/touch/php/xxmlist.php');}-->
				<!--{loop $_G['forum_threadlist'] $key $thread}-->
					<!--{if !$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0}-->
						{eval continue;}
					<!--{/if}-->
					<!--{if $thread['displayorder'] > 0 && !$displayorder_thread}-->
						{eval $displayorder_thread = 1;}
					<!--{/if}-->
					<!--{if $thread['moved']}-->
						<!--{eval $thread[tid]=$thread[closed];}-->
					<!--{/if}-->
					<!--{eval $threadtable = substr($thread[tid], -1);}-->
					<!--{eval $img_number = xxmlist_img_num($thread[tid], $thread[authorid], $threadtable);}-->
					<li>
						<!--{if $img_number == 1}-->
							<div class="cardxxmone">
								<div class="img_one">
									<a href="forum.php?mod=viewthread&tid=$thread[tid]">
									<!--{eval $list_img1 = xxmlist_img($thread[tid], $thread[authorid], 1, $threadtable);}-->
									<!--{loop $list_img1 $list_img1_1}-->
									<em style="background-image:url({eval echo(getforumimg($list_img1_1[aid],0,200,200))});"></em>
									<!--{/loop}-->
									</a>
								</div>
								<div class="tnr">
									<div class="p">
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
									</div>
									<div class="span grey">
										<!--{if !$thread[author]}-->
										<a class="avatar">{avatar($thread[0],small)} <i class="grey">{lang anonymous}</i></a>
										<!--{else}-->
										<a class="avatar" href="home.php?mod=space&uid=$thread[authorid]&do=profile">{avatar($thread[authorid],small)} <i class="grey">$thread[author]</i></a>
										<!--{/if}-->
										$thread[dateline]
										<!--{if {$thread[replies]} > 0}--><em class="xxmfont iconcomment xxmfst">{$thread[replies]}</em><!--{/if}-->
										$thread[typehtml] $thread[sorthtml]
									</div>
								</div>
							</div>
						<!--{elseif $img_number == 2}-->
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
										<div class="img_two">
										<!--{eval $list_img2 = xxmlist_img($thread[tid], $thread[authorid], 2, $threadtable);}-->
										<!--{loop $list_img2 $list_img2_1}-->
										<em style="background-image:url({eval echo(getforumimg($list_img2_1[aid],0,300,300))});"></em>
										<!--{/loop}-->
										</div>
								   </a>
								</section>
							</div>
						<!--{elseif $img_number > 2}-->
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
										<div class="img_three">
										<!--{eval $list_img3 = xxmlist_img($thread[tid], $thread[authorid], 3, $threadtable);}-->
										<!--{loop $list_img3 $list_img3_1}-->
										<em style="background-image:url({eval echo(getforumimg($list_img3_1[aid],0,500,500))});"></em>
										<!--{/loop}-->
										</div>
								   </a>
								</section>
							</div>
						<!--{elseif $img_number == 0}-->
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
						<!--{/if}-->
						<!--{hook/forumdisplay_thread_mobile $key}-->
					</li>
				<!--{/loop}-->
			<!--{else}-->
				<li class="b_p mtw mbw hm grey">{lang forum_nothreads}</li>
			<!--{/if}-->
			</ul>
		</div>
		$multipage
		
	<!--{/if}-->
	
	<!-- main threadlist end -->

<!--{else}-->
	<!--{subtemplate forum/forumdisplay_subforumonly}-->
<!--{/if}-->

<!--{hook/forumdisplay_bottom_mobile}-->
<div class="pullrefresh" style="display:none;"></div>

<div class="xxmclear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
	<ul class="xxmfootflex">
	<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
	<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>{lang homepage}</span></a></li>
	<!--{/if}-->
	<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
	<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span>{echo xxm('forumlist');}</span></a></li>
	<!--{else}-->
	<li class="flex"><a href="forum.php?forumlist=1&mobile=2&forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>{lang homepage}</span></a></li>
	<!--{/if}-->
	<!--{if $_G[uid] || $_G['group']['allowpost']}-->
	<li class="flex"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
	<!--{else}-->
	<li class="flex"><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
	<!--{/if}-->
	<li class="flex"><a href="forum.php?mod=guide&view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><!--{if $_G[setting][navs][10][navname]}-->{$_G[setting][navs][10][navname]}<!--{else}-->Loading<!--{/if}--></span></a></li>
	<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="xxmfca"><i class="xxmfont iconpeople"><!--{if $_G[member][newpm]}--><span class="news bg-rq"></span><!--{/if}--></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
	</ul>
</div>

<!--{template common/footer}-->
