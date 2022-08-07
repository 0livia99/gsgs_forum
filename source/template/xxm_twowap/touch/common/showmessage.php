<?php echo 'QQ:2399835618';exit;?>
<!--{if $param['login']}-->
	<!--{if $_G['inajax']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login&inajax=1&infloat=1');exit;}-->
	<!--{else}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
	<!--{/if}-->
<!--{/if}-->
<!--{template common/header}-->

<!--{if $_G['inajax']}-->

	<div class="tip">
		<dt id="messagetext">
			<p>$show_message</p>
			<!--{if $_G['forcemobilemessage']}-->
				<p>
					<a href="{$_G['setting']['mobile']['pageurl']}" class="mtn">{lang continue}</a><br />
					<a href="javascript:history.back();">{lang goback}</a>
				</p>
			<!--{/if}-->
			<!--{if $url_forward && !$_GET['loc']}-->
				<!--<p><a class="grey" href="$url_forward">{lang message_forward_mobile}</a></p>-->
				<script type="text/javascript">
					setTimeout(function() {
						window.location.href = '$url_forward';
					}, '2000');
				</script>
			<!--{elseif $allowreturn}-->
				<p><input type="button" class="button" onclick="popup.close();" value="{lang close}"></p>
			<!--{/if}-->
		</dt>
	</div>

<!--{else}-->

	<!--{if $_G['setting']['domain']['app']['mobile']}-->
		{eval $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];}
	<!--{else}-->
		{eval $nav = "forum.php";}
	<!--{/if}-->
	<div class="cl">
		<div class="logoxxmbox"><img src="{$_G['style']['styleimgdir']}/images/logo.png" /></div>
	</div>
	<!-- main jump start -->
	<div class="hm">
	<div class="jump_c">
		<p class="mbm">$show_message</p>
		<!--{if $_G['forcemobilemessage']}-->
			<p class="b_p btn-big"><a href="{$_G['setting']['mobile']['pageurl']}" class="touch">{lang continue}</a></p>
			<p class="b_p btn-big"><a href="javascript:history.back();" class="touch">{lang goback}</a></p>
		<!--{/if}-->
		<!--{if $url_forward}-->
			<p class="b_p btn-big"><a class="touch" href="$url_forward">{lang message_forward_mobile}</a></p>
		<!--{elseif $allowreturn}-->
			<p class="b_p btn-big"><a class="touch" href="javascript:history.back();">{lang message_go_back}</a></p>
		<!--{/if}-->
	</div>
	</div>
	<!-- main jump end -->

<!--{/if}-->

<!--{template common/footer}-->

