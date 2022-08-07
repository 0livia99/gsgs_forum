<?php echo 'QQ:2399835618';exit;?>
{eval
function tpl_hide_credits_hidden($creditsrequire) {
global $_G;
}
<!--{block return}--><div class="locked hide_credits_hidden"><!--{if $_G[uid]}-->{$_G[username]}<!--{else}-->{lang guest}<!--{/if}-->{lang post_hide_credits_hidden}</div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_hide_credits($creditsrequire, $message) {
}
<!--{block return}-->
<div class="hide_credits"><h4>{lang post_hide_credits}</h4>$message</div>
<!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_codedisp($code) {
}
<!--{block return}--><div class="blockcode codedisp"><div><ol><li>$code</ol></div></div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_quote() {
}
<!--{block return}--><div class="grey quote xxmfsf"><blockquote>\\1</blockquote></div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_free() {
}
<!--{block return}--><div class="grey quote free"><blockquote>\\1</blockquote></div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_hide_reply() {
global $_G;
}
<!--{block return}-->
<div class="showhide hide_reply"><h4>{lang post_hide}</h4>\\1</div>
<!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_hide_reply_hidden() {
global $_G;
}
<!--{block return}--><div class="locked hide_reply_hidden"><!--{if $_G[uid]}-->{$_G[username]}<!--{else}-->{lang guest}<!--{/if}-->{lang post_hide_reply_hidden}</div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}


function attachlist($attach) {
	global $_G;
	$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
	$aidencode = packaids($attach);
	$widthcode = attachwidth($attach['width']);
	$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';
	$pluginhook = !empty($_G['setting']['pluginhooks']['viewthread_attach_extra'][$attach[aid]]) ? $_G['setting']['pluginhooks']['viewthread_attach_extra'][$attach[aid]] : '';
}
<!--{block return}-->
<!--{if !$attach['price'] || $attach['payed']}-->
<div class="box box_ex2 attach">
	<dd>
		<p class="attnm">
			<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
				$attach[attachicon]
			<!--{/if}-->
			<!--{if !$attach['price'] || $attach['payed']}-->
				<a href="forum.php?mod=attachment{$is_archive}&aid=$aidencode" id="aid$attach[aid]" target="_blank">$attach[filename]</a>
			<!--{else}-->
				<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]">$attach[filename]</a>
			<!--{/if}-->
			<span class="xg1">($attach[dateline] {lang upload})</span>
		</p>
		<p class="xg1">$attach[attachsize]<!--{if $attach['readperm']}-->, {lang readperm}: <strong>$attach[readperm]</strong><!--{/if}-->, {lang downloads}: $attach[downloads]<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->, {lang attachcredits}: $_G[getattachcredits]<!--{/if}--></p>
		<!--{if $attach['description']}--><p class="xg2">{$attach[description]}</p><!--{/if}-->
	</dd>
</div>
<!--{/if}-->
<!--{/block}-->

<!--{block return}-->
<div class="xxm-tattl b_p mtm mbm bg">
	<div class="xxm-tattl-box">
		<!--{if $_G[uid]}-->
			<!--{if !$attach['price'] || $attach['payed']}-->
			<a href="forum.php?mod=attachment{$is_archive}&aid=$aidencode" id="aid$attach[aid]" class="y"><i class="xxmfont iconxiazai blue"></i></a>
			<!--{else}-->
			<!--{if !$attach['payed']}-->
			<!--{else}-->
			<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog y"><i class="xxmfont iconxiazai blue"></i></a>
			<!--{/if}-->
			<!--{/if}-->
		<!--{else}-->
			<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="y"><i class="xxmfont iconxiazai blue"></i></a>
		<!--{/if}-->
		<p class="tattl-name">$attach[attachicon]<span class="blue xxmfsf">$attach[filename]</span></p>
		<p class="tattl-size xxmfst grey">$attach[dateline]{lang upload}</p>
		<p class="tattl-size xxmfst grey">$attach[attachsize]&nbsp;,&nbsp;{lang downloads}: $attach[downloads]<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->&nbsp;,&nbsp;{lang attachcredits}: $_G[getattachcredits]<!--{/if}--><!--{if $attach['price']}-->&nbsp;,&nbsp;{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}:&nbsp;<strong class="rq">$attach[price]</strong><!--{/if}--><!--{if $attach['readperm']}-->&nbsp;,&nbsp;{lang readperm}: <strong class="rq">$attach[readperm]</strong><!--{/if}--></p>
	</div>
	<!--{if $attach['description']}-->
	<div class="xxm-tattl-txt"><span class="grey xxmfst">{$attach[description]}</span></div>
	<!--{/if}-->
	<div class="xxm-tattl-buy-button cl">
		<!--{if $attach['price']}-->
			<!--{if $_G[uid]}-->
				<!--{if !$attach['payed']}-->
				<div class="xxm-tattl-buy-button-fill">
					<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog xxmfst">{lang attachment_buy}</a>
				</div>
				<!--{else}-->
				<div class="xxm-tattl-buy-button-fill-o"><a class="grey xxmfst">&#24050;{lang attachment_buy}</a></div>
				<!--{/if}-->
			<!--{else}-->
			<div class="xxm-tattl-buy-button-fill">
				<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfst">{lang attachment_buy}</a>
			</div>
			<!--{/if}-->
		<!--{/if}-->
		<!--{if $attach['price']}-->
		<div class="xxm-tattl-buy-button-empty"><a href="forum.php?mod=misc&action=viewattachpayments&aid=$attach[aid]" class="dialog blue xxmfst">{lang pay_view}</a></div>
		<!--{/if}-->
	</div>
</div>
<!--{/block}-->
<!--{eval return $return;}-->
{eval
}


function imagelist($attach) {
global $_G, $post;
$fix = count($post[imagelist]) == 1 ? 6000 : 600;
$fixtype = count($post[imagelist]) == 1 ? 'fixnone' : 'fixwr';
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? getforumimg($attach['aid'], 0, $fix, $fix, $fixtype) : '' ;
$aidencode = packaids($attach);
$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';
}
<!--{block return}-->
<!--{if $attach['attachimg'] && $_G['setting']['showimages'] && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) && (!$attach['price'] || $attach['payed'])}-->
<!--{if !$attach['price'] || $attach['payed']}-->
<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
<li><a href="forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]" class="orange"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a></li>
<!--{/if}-->
<!--{/if}-->
<!--{/if}-->
<!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function attachinpost($attach) {
global $_G;
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? getforumimg($attach['aid'], 0, 10000, 0, 'fixnone') : '' ;
$aidencode = packaids($attach);
$is_archive = $_G['forum_thread']['is_archived'] ? '&fid='.$_G['fid'].'&archiveid='.$_G[forum_thread][archiveid] : '';
}


<!--{block return}-->
	<!--{if $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid'])}-->
		<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
		<a href="forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]" class="bz_orange"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a>
		<!--{/if}-->
	<!--{else}-->
		<div id="attach_$attach[aid]" class="xxm-attach b_p mtm mbm bg">
			<div class="xxm-attach-box">
				<!--{if $_G[uid]}-->
					<!--{if !$attach['price'] || $attach['payed']}-->
					<a href="forum.php?mod=attachment{$is_archive}&aid=$aidencode" class="y"><i class="xxmfont iconxiazai blue"></i></a>
					<!--{else}-->
					<!--{if !$attach['payed']}-->
					<!--{else}-->
					<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog y"><i class="xxmfont iconxiazai blue"></i></a>
					<!--{/if}-->
					<!--{/if}-->
				<!--{else}-->
					<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="y"><i class="xxmfont iconxiazai blue"></i></a>
				<!--{/if}-->
				<p class="attach-name"><!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->$attach[attachicon]<!--{/if}--><span class="blue xxmfsf">$attach[filename]</span></p>
				<p class="attach-size xxmfst grey">$attach[dateline]{lang upload}</p>
				<p class="attach-size xxmfst grey">$attach[attachsize]&nbsp;,&nbsp;{lang downloads}: $attach[downloads]<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->&nbsp;,&nbsp;{lang attachcredits}: $_G[getattachcredits]<!--{/if}--><!--{if $attach['price']}-->&nbsp;,&nbsp;{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}:&nbsp;<strong class="rq">$attach[price]</strong><!--{/if}--><!--{if $attach['readperm']}-->&nbsp;,&nbsp;{lang readperm}: <strong class="rq">$attach[readperm]</strong><!--{/if}--></p>
			</div>
			<!--{if $attach['description']}-->
			<div class="xxm-attach-txt"><span class="grey xxmfst">{$attach[description]}</span></div>
			<!--{/if}-->
			<div class="xxm-attach-buy-button cl">
				<!--{if $attach['price']}-->
					<!--{if $_G[uid]}-->
						<!--{if !$attach['payed']}-->
						<div class="xxm-attach-buy-button-fill">
							<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog xxmfst">{lang attachment_buy}</a>
						</div>
						<!--{else}-->
						<div class="xxm-attach-buy-button-fill-o"><a class="grey xxmfst">&#24050;{lang attachment_buy}</a></div>
						<!--{/if}-->
					<!--{else}-->
					<div class="xxm-attach-buy-button-fill">
						<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfst">{lang attachment_buy}</a>
					</div>
					<!--{/if}-->
				<!--{/if}-->
				<!--{if $attach['price']}-->
				<div class="xxm-attach-buy-button-empty"><a href="forum.php?mod=misc&action=viewattachpayments&aid=$attach[aid]" class="dialog blue xxmfst">{lang pay_view}</a></div>
				<!--{/if}-->
			</div>
		</div>
	<!--{/if}-->
<!--{/block}-->


<!--{eval return $return;}-->
<!--{eval
}

}-->
