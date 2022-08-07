<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
<div class="nav">
	<a href="<!--{if $_GET[fromguid] == 'hot'}-->forum.php<!--{elseif $_GET[fromguid] == 'newthread'}-->forum.php?mod=guide&view=newthread&page=$_GET[page]<!--{elseif $_GET[fromguid] == 'digest'}-->forum.php?mod=guide&view=digest&page=$_GET[page]<!--{elseif $_GET[fromguid] == 'new'}-->forum.php?mod=guide&view=new&page=$_GET[page]<!--{else}-->forum.php?mod=forumdisplay&fid=$_G[fid]&<!--{eval echo rawurldecode($_GET[extra]);}--><!--{/if}-->" class="z xxmfont iconzuo xxmfstt"></a>
	<span class="name"><!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}--></span>
	<a href="forum.php" class="y xxmfont iconhome"></a>
</div>
</header>
<!-- header end -->
<!--{hook/viewthread_top_mobile}-->
<!-- main postlist start -->
<div class="postlist">

	<!--{eval $postcount = 0;}-->
	<!--{loop $postlist $post}-->
	<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
	<!--{eval
	$followed = 0;
	if($_G['uid']):
		$followed = C::t('home_follow')->fetch_by_uid_followuid($_G['uid'], $post['authorid']);
	endif;
	}-->
	<!--{hook/viewthread_posttop_mobile $postcount}-->
	<div class="plc cl<!--{if $post[first]}--> pfirstxxm<!--{/if}-->" id="pid$post[pid]">
		<!--{if !$post['authorid'] || $post['anonymous']}-->
		<a><span class="avatar"><img src="<!--{avatar(0, middle, true)}-->" style="width:32px;height:32px;" /></span></a>
		<!--{else}-->
		<a href="home.php?mod=space&uid=$post[authorid]&do=profile"><span class="avatar"><img src="<!--{avatar($post[authorid], middle, true)}-->" style="width:32px;height:32px;" /></span></a>
		<!--{/if}-->
		<div class="display pi" href="#replybtn_$post[pid]">
			<ul class="authi">
				<li class="grey">
					<!--{if $post[first]}-->
					
						<!--{if $post['authorid'] != $_G['uid'] }-->
						<!--{if !$post['authorid'] || $post['anonymous']}-->
						<!--{else}-->
							<!--{if $followed}-->
							<a class="dialog y followed" href="home.php?mod=spacecp&ac=follow&op=del&hash={FORMHASH}&fuid=$post[authorid]">{echo xxm('follow_del');}</a>
							<!--{else}-->
							<a class="dialog y follow xxmsmallbg" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$post[authorid]">{echo xxm('follow_add');}</a>
							<!--{/if}-->
						<!--{/if}-->
						<!--{/if}-->
						
						<div id="bztn_$post[pid]" popup="true" style="display:none;">
							<!--{if $post['authorid'] != $_G['uid'] }-->
							<!--<em class="btnxxmem"><a href="misc.php?mod=report&rtype=post&rid=$pid&tid=$_G[tid]&fid=$_G[fid]" class="dialog">{lang report}</a></em>-->
							<!--{/if}-->
							<!--{if $post[first] && $post['authorid'] && $post['username'] && !$post['anonymous']}-->
							<em class="btnxxmem">
								<!--{if !IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']}-->
								<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page&authorid=$_G[forum_thread][authorid]" rel="nofollow" style="font-size:12px;font-weight:normal;">{lang viewonlyauthorid}</a>
								<!--{elseif !$_G['forum_thread']['archiveid']}-->
								<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page" rel="nofollow" style="font-size:12px;font-weight:normal;">{lang thread_show_all}</a>
								<!--{/if}-->
							</em>
							<!--{/if}-->
							<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
						    <!--{if $post[authorid] != $_G[uid]}-->
	                        <!--<em class="btnxxmem"><a href="home.php?mod=spacecp&ac=pm&touid=$post[authorid]&pmid=0&daterange=2&pid=$post[pid]" style="font-size:12px;font-weight:normal;">{lang send_pm}</a></em>-->
	                        <!--{/if}-->
	                        <!--{/if}-->
	                        <em class="btnxxmem"><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$_G[forum_firstpid]&page=$page" style="font-size:12px;font-weight:normal;">{lang reply}</a></em>
						</div>
						
					<!--{else}-->
					
						<em>
							<!--{if isset($post[isstick])}--><i class="rq">{lang thread_sticky}</i><!--{/if}-->
							<!--{if !$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])}-->
							&nbsp;&nbsp;<a class="replyadd" href="forum.php?mod=misc&action=postreview&do=support&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}" onmouseover="this.title = ($('review_support_$post[pid]').innerHTML ? $('review_support_$post[pid]').innerHTML : 0) + ' {lang activity_member_unit} {lang support_reply}'"><em class="grey xxmfst">$post[postreview][support]</em><i class="xxmfont iconzan1 xxmfst grey"></i></a>
							<!--{/if}-->
						</em>
					
					<!--{/if}-->
					
					<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
						<a href="home.php?mod=space&uid=$post[authorid]&do=profile" class="blue name">$post[author]</a>
						<!--{if !$post[first] && $_G['forum_thread']['special'] == 5}-->
							<!--{if $post[stand] == 1}--><i class="authortitle grey">{lang debate_square}</i>
							<!--{elseif $post[stand] == 2}--><i class="authortitle grey">{lang debate_opponent}</i>
							<!--{else}--><i class="authortitle grey">{lang debate_neutral}</i>
							<!--{/if}-->
						<!--{/if}-->
					<!--{else}-->
						<!--{if !$post['authorid']}-->
						<a href="javascript:;" class="blue name">{lang guest} <em class="grey">$post[useip]{if $post[port]}:$post[port]{/if}</em></a>
						<!--{elseif $post['authorid'] && $post['username'] && $post['anonymous']}-->
						<!--{if $_G['forum']['ismoderator']}--><a href="home.php?mod=space&uid=$post[authorid]">{lang anonymous}</a><!--{else}--><span>{lang anonymous}</span><!--{/if}-->
						<!--{else}-->
						$post[author] <em>{lang member_deleted}</em>
						<!--{/if}-->
					<!--{/if}-->
					
					<!--{eval $_self = $thread['author'] && $post['author'] == $thread['author'] && $post['position'] !== '1';}-->
					<!--{if !$post['authorid'] || $post['anonymous']}-->
					<!--{else}-->
					<!--{if $_self}--><i class="authortitle grey">{lang thread_author}</i><!--{/if}-->
					<!--{/if}-->
					
					<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
						<i class="authortitle grey">$post[authortitle]</i>
					<!--{/if}-->
					
				</li>
				<!--{if $post[first]}-->
				<li class="grey rela">$post[dateline]</li>
				<!--{/if}-->
	        </ul>
	        <!--{if $post[first]}-->
	        <div class="view_ze_title">
				<h2>$_G[forum_thread][subject]<!--{if $_G['forum_thread'][displayorder] == -2}--> <span class="xxmfst grey">({lang moderating})</span><!--{elseif $_G['forum_thread'][displayorder] == -3}--> <span class="xxmfst grey">({lang have_ignored})</span><!--{elseif $_G['forum_thread'][displayorder] == -4}--> <span class="xxmfst grey">({lang draft})</span><!--{/if}--></h2>
	        </div>
	        <!--{/if}-->
			<div class="message">
				<!--{if $post[first]}-->
				<!--{if $_G['forum_threadstamp']}-->
				<div id="threadstamp"><img src="{STATICURL}image/stamp/$_G[forum_threadstamp][url]" title="$_G[forum_threadstamp][text]" /></div>
				<!--{/if}-->
				<!--{/if}-->
				<!--{if $post['warned']}-->
					<span class="grey quote">{lang warn_get}</span>
				<!--{/if}-->
				<!--{if !$post['first'] && !empty($post[subject])}-->
					<h2><strong>$post[subject]</strong></h2>
				<!--{/if}-->
				<!--{if $_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])}-->
					<div class="grey quote">{lang message_banned}</div>
				<!--{elseif $_G['adminid'] != 1 && $post['status'] & 1}-->
					<div class="grey quote">{lang message_single_banned}</div>
				<!--{elseif $needhiddenreply}-->
					<div class="grey quote">{lang message_ishidden_hiddenreplies}</div>
				<!--{elseif $post['first'] && $_G['forum_threadpay']}-->
					<!--{template forum/viewthread_pay}-->
				<!--{else}-->

					<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))}-->
						<div class="grey quote">{lang admin_message_banned}</div>
					<!--{elseif $post['status'] & 1}-->
						<div class="grey quote">{lang admin_message_single_banned}</div>
					<!--{/if}-->
					
					<!--{if $post['first'] && $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0}-->
						<div class="locked b_p mtw mbw">
								{lang pay_threads}: <i class="rq">$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</i>
								<a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" class="dialog y blue">{lang pay_view}</a>
						</div>
					<!--{/if}-->

					<!--{if $post['first'] && $threadsort && $threadsortshow}-->
						<!--{if $threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']}-->
							<!--{if $threadsortshow['optionlist'] == 'expire'}-->
								{lang has_expired}
							<!--{else}-->
								<div class="box_ex2 viewsort cl mtw mbw">
									<div class="xxm-at-form mtw mbw">
									<h4 class="hm mbn">$_G[forum][threadsorts][types][$_G[forum_thread][sortid]]</h4>
									<table cellpadding="0" cellspacing="1" border="0">
										<!--{loop $threadsortshow['optionlist'] $option}--> 
										<!--{if $option['type'] != 'info'}-->
										<tr>
											<th>$option[title]:</th>
											<td><!--{if $option['value']}--><!--{eval preg_match("/(".str_replace("/",'\/',$_G['setting']['attachurl']).")(.*?)((.gif)|(.jpg)|(.jpeg)|(.bmp)|(.png))/",strtolower($option['value']),$dzlab_match);}--><!--{if count($dzlab_match)}--><img src='$dzlab_match[0]' /><!--{else}-->$option[value]<!--{/if}-->$option[unit]<!--{else}-->--<!--{/if}--></td>
										</tr>
										<!--{/if}-->
										<!--{/loop}-->
									</table>
									</div>
								</div>
							<!--{/if}-->
						<!--{/if}-->
					<!--{/if}-->
					<!--{if $post['first']}-->
						<!--{if !$_G[forum_thread][special]}-->
							<div class="not_special">$post[message]</div>
						<!--{elseif $_G[forum_thread][special] == 1}-->
							<!--{template forum/viewthread_poll}-->
						<!--{elseif $_G[forum_thread][special] == 2}-->
							<!--{template forum/viewthread_trade}-->
						<!--{elseif $_G[forum_thread][special] == 3}-->
							<!--{template forum/viewthread_reward}-->
						<!--{elseif $_G[forum_thread][special] == 4}-->
							<!--{template forum/viewthread_activity}-->
						<!--{elseif $_G[forum_thread][special] == 5}-->
							<!--{template forum/viewthread_debate}-->
						<!--{elseif $threadplughtml}-->
							$threadplughtml
							$post[message]
						<!--{else}-->
							$post[message]
						<!--{/if}-->
					<!--{else}-->
						$post[message]
					<!--{/if}-->

				<!--{/if}-->

			</div>
			
			<!--{if $post[first]}--><div class="vtxxmb"><!--{/if}-->
			
			<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
			<!--{if $post['attachment']}-->
				<div class="grey quote">
					<!--{if $_G['uid']}-->
					<em>{lang attach_nopermission}</em>
					<!--{else}-->
					<p>{lang attach_nopermission_login}</p>
					<!--{/if}-->
				</div>
	        <!--{elseif $post['imagelist'] || $post['attachlist']}-->
	           <!--{if $post['imagelist']}-->
				<!--{if count($post['imagelist']) == 1}-->
				<ul class="img_one">{echo showattach($post, 1)}</ul>
				<!--{else}-->
				<ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
				<!--{/if}-->
				<!--{/if}-->
	            <!--{if $post['attachlist']}-->
				<ul>{echo showattach($post)}</ul>
				<!--{/if}-->
			<!--{/if}-->
			<!--{/if}-->
			
			<!--{if $_G[uid] && $allowpostreply && !$post[first]}-->
			<div id="replybtn_$post[pid]" class="replybtn" display="true" style="display:none;position:absolute;right:0px;top:0px;">
				<input type="button" class="redirect button2" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" value="{lang reply}">
			</div>
			<!--{/if}-->
			
			<!--{if $post[first]}--></div><!--{/if}-->
			
			<!--{if $post[first]}-->	
			
				<div class="cl mtw z mbw" style="margin-left: -45px;">
					
					<!--{if $post['first'] && ($post[tags] || $relatedkeywords) && $_GET['from'] != 'preview'}-->
					<div class="xxm-tag-list cl" style="margin-bottom: 20px;">
					    <!--{if $post[tags]}-->
							<!--{eval $tagi = 0;}-->
							<!--{loop $post[tags] $var}-->
								<!--{if $tagi}--> <!--{/if}--><a title="$var[1]" href="misc.php?mod=tag&id=$var[0]">$var[1]</a>
								<!--{eval $tagi++;}-->
							<!--{/loop}-->
						<!--{/if}-->
						<!--{if $relatedkeywords}--><span>$relatedkeywords</span><!--{/if}-->
					</div>
					<!--{/if}-->

					<a class="grey"><i class="xxmfont iconbrowse xxmfst"></i>$_G[forum_thread][views]&nbsp;&nbsp;</a>
					<a class="grey"{if !$_G[forum_thread][allreplies]} style="display:none"{/if}><i class="xxmfont iconcomment xxmfst"></i>$_G[forum_thread][allreplies]&nbsp;&nbsp;</a>
					<a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="grey">{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}&nbsp;&nbsp;</a>
					<!--{if $_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}--><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$_G[forum_thread][typeid]" class="grey">#{$_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}&nbsp;&nbsp;</a><!--{/if}-->

					<!--{if $_G['forum']['ismoderator']}-->
					<!-- manage start -->
					<!--{if $post[first]}-->
						<a href="#moption_$post[pid]" class="popup blue">{lang manage}</a>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<!--{if !$_G['forum_thread']['special']}-->
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{/if}-->
							<input type="button" value="{lang delete}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&operation=delete&optgroup=3&from={$_G[tid]}">
							<input type="button" value="{lang close}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&from={$_G[tid]}&optgroup=4">
							<input type="button" value="{lang admin_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
							<input type="button" value="{lang topicadmin_warn_add}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
						</div>
					<!--{else}-->
						<a href="#moption_$post[pid]" class="popup blue">{lang manage}</a>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
						</div>
					<!--{/if}-->
					<!-- manage end -->
					<!--{/if}-->
					
					<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))}-->
					<!--{if $_G['forum_thread']['special'] != 2 || $_G['forum_thread']['special'] != 4 || !$post['first']}-->
					<!--{if $_G['forum']['ismoderator']}-->
					<!--{else}-->
						<a class="blue" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">{lang edit}</a>
					<!--{/if}-->
					<!--{/if}-->
					<!--{/if}-->
				
				</div>
			
			<!--{/if}-->
			
			<div class="xxmclear"></div>
			
			<!--{if $post[first]}-->
				<!--{ad/interthread/xxm_vt_ad hm/$postcount}-->
			<!--{else}-->
				<!--{ad/interthread/xxm_vt_ad_reply hm/$postcount}-->
				<div class="grey rela mtm">
					
					<span>
						<!--{if isset($post[isstick])}-->
							{$postnostick}{$post[number]} &#8226;
						<!--{elseif $post[number] == -1}-->
							<i class="xxmfcs">{lang order_heats}</i> &#8226;
						<!--{else}-->
							<!--{if !empty($postno[$post[number]])}-->
								$postno[$post[number]]
							<!--{else}-->
								{$postnostick}{$post[number]} &#8226;
							<!--{/if}-->
						<!--{/if}-->
					</span>
					<span>$post[dateline]</span>
					
					<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))}-->
					<!--{if $_G['forum_thread']['special'] != 2 || $_G['forum_thread']['special'] != 4 || !$post['first']}-->
					<!--{if $_G['forum']['ismoderator']}-->
					<!--{else}-->
					<a class="blue" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">&nbsp;&nbsp;{lang edit}</a>
					<!--{/if}-->
					<!--{/if}-->
					<!--{/if}-->
				
					<!--{if $_G['forum']['ismoderator']}-->
					<a href="#moption_$post[pid]" class="popup blue">&nbsp;&nbsp;{lang manage}</a>
					<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
						<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
						<!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
						<!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
						<!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
					</div>
					<!--{/if}-->
					
				</div>
			<!--{/if}-->
			
	   </div>
	</div>
	
	
	
	<!--{if $post['relateitem']}-->
	<div class="xxmgap"></div>
	<div class="xxm-relateitem-title b_p cl">
		<h1 class="z">{lang related_thread}</h1>
		<a href="misc.php?mod=tag" class="y grey xxmfst">{echo xxm('tags');}<span class="xxmfont iconyou xxmfst"></span></a>
	</div>
	<div class="xxm-relateitem-list">
		<ol class="cl" type="1">
		<!--{loop $post['relateitem'] $var}-->
		<li>
			<a href="forum.php?mod=viewthread&tid=$var[tid]">$var[subject]</a>
			<p class="grey xxmfst">
				<!--{if $var[author]}-->
				<i class="author">$var[author]</i>
				<!--{/if}-->
				<i class="xxmfont iconbrowse xxmfst"></i>$var[views]
			</p>
		</li>
		<!--{/loop}-->
		</ol>
	</div>
	<!--{/if}-->
	
	<!--{if $post[first]}-->
	<div class="xxmgap"></div>
	<div class="allxxmretitle b_p cl">
		<h1 class="z">{lang all}{lang reply}</h1><em{if !$_G[forum_thread][allreplies]} style="display:none"{/if} class="z grey">&nbsp;&nbsp;$_G[forum_thread][allreplies]</em>
		<!--{if $ordertype != 1}-->
		<a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&ordertype=1" class="y grey"><i class="xxmfont icondaoxu"></i></a>
		<!--{else}-->
		<a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&ordertype=2" class="y grey"><i class="xxmfont iconshunxu"></i></a>
		<!--{/if}-->
	</div>
	<div class="xxmclear"></div>
	<!--{/if}-->
	
	<!--{if count($postlist)<2}-->
    <div class="hm">
		<p class="xxmfont iconnothing" style="font-size: 50px;color: rgba(0,0,0,0.1);"></p>
		<p style="color: rgba(0,0,0,0.1);">{lang all}{lang reply}</p>
	</div>
    <!--{/if}-->
	
	<!--{hook/viewthread_postbottom_mobile $postcount}-->
	<!--{eval $postcount++;}-->
	<!--{/loop}-->

	<div class="vtxxmpost">
		<!--{if ($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status'] || !empty($_G['setting']['recommendthread']['addtext'])}-->
		<div class="recommend">
			<div class="vtxxmpost-reply">
				<ul>
					<!--{if $_G[uid] || $_G['group']['allowpost']}-->
					<li><a class="fastre grey" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$_G[forum_firstpid]&page=$page"><em class="xxmfont iconxie xxmfsf"></em>{lang reply}...</a></li>
					<!--{else}-->
					<li><a class="fastre grey" href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');"><em class="xxmfont iconxie xxmfsf"></em>{lang reply}...</a></li>
					<!--{/if}-->
				</ul>
			</div>
			<div class="vtxxmpost-share">
				<ul>
					<li><a href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" class="recbtn xxmfont iconzan"><em id="recommendv_add"{if !$_G['forum_thread']['recommend_add']} style="display:none"{/if}>{$_G['forum_thread']['recommend_add']}</em></a></li>
					<li><a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]" class="favbtn xxmfont iconcollection_fill"><em id="favoritenumber"{if !$_G['forum_thread']['favtimes']} style="display:none"{/if}>{$_G['forum_thread']['favtimes']}</em></a></li>
				</ul>
			</div>
		</div>
		<!--{else}-->
		<div class="norecommend">
			<div class="vtxxmpost-reply">
				<ul>
					<!--{if $_G[uid] || $_G['group']['allowpost']}-->
					<li><a class="fastre grey" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$_G[forum_firstpid]&page=$page"><em class="xxmfont iconxie xxmfsf"></em>{lang reply}...</a></li>
					<!--{else}-->
					<li><a class="fastre grey" href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');"><em class="xxmfont iconxie xxmfsf"></em>{lang reply}...</a></li>
					<!--{/if}-->
				</ul>
			</div>
			<div class="vtxxmpost-share">
				<ul>
					<li><a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]" class="favbtn xxmfont iconcollection_fill"><em id="favoritenumber"{if !$_G['forum_thread']['favtimes']} style="display:none"{/if}>{$_G['forum_thread']['favtimes']}</em></a></li>
				</ul>
			</div>
		</div>
		<!--{/if}-->
	</div>

</div>
<!-- main postlist end -->

$multipage

<!--{hook/viewthread_bottom_mobile}-->

<script type="text/javascript">
	$('.favbtn').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
			data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
			dataType:'xml',
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});
		return false;
	});
	
	$('.recbtn').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=recbtn&inajax=1',
			data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
			dataType:'xml',
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});
		return false;
	});
	
	$('.replyadd').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=replyadd&inajax=1',
			data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
			dataType:'xml',
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});
		return false;
	});
</script>


<!--{template common/footer}-->
