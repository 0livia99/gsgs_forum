<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="forum.php?forumlist=1" class="z xxmfont iconzuo xxmfstt"></a>
		<span class="name">
			<!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}-->
		</span>
		<div class="y">
			<!--{if $_G[uid] || $_G['group']['allowpost']}-->
				<!--{eval}-->
				if($_G['uid']){$favfids = C::t('home_favorite')->fetch_all_by_uid_idtype($_G['uid'], 'fid');foreach($favfids as $val){if($val['id'] == $_G[fid]){$isFav = $val['favid'];}}}
				<!--{/eval}-->
				<!--{if $isFav}-->
				<a href="home.php?mod=space&do=favorite&type=all"><span class="xxmfont iconcollection_fill xxmfstt grey"></span></a>
				<!--{else}-->
				<a href="home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&handlekey=favoriteforum&formhash={FORMHASH}" onclick="favforum_ajax(this.id);return false;" id="favorite_forum_{$_G[fid]}"><span class="xxmfont iconcollection xxmfstt"></span></a>
				<!--{/if}-->
			<!--{else}-->
			<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');"><span class="xxmfont iconcollection xxmfstt"></span></a>
			<!--{/if}-->
		</div>
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
    </div>
</header>
<!-- header end -->
<div style="height: 100%;background: #FFF;">
<!--{hook/forumdisplay_top_mobile}-->
<div class="cl">
<div class="xxm_passwd">
	<form method="post" autocomplete="off" action="forum.php?mod=forumdisplay&fid=$_G[fid]&action=pwverify">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="cl"><input type="password" name="pw" class="inxxm hm" placeholder="{lang m_login_pw_ph}" /></div>
		<div class="mtw btn-big">
			<button class="touch" type="submit" name="loginsubmit" value="true">{lang submit}</button>
		</div>
		<div class="mtw btn-big-bor">
			<button class="touch" type="button" onclick="history.go(-1)">{lang cancel}</button>
		</div>
	</form>
</div>
</div>
<!--{hook/forumdisplay_bottom_mobile}-->
</div>

<div class="clear"></div>
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