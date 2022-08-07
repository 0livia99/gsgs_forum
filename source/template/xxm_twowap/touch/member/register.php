<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->

<div class="cl">
	<div class="logoxxmbox"><img src="{$_G['style']['styleimgdir']}/images/logo.png" /></div>
</div>

<!-- registerbox start -->
<div class="loginbox registerbox">
	<div class="login_from">
		<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod={$_G[setting][regname]}&mobile=2">
		<input type="hidden" name="regsubmit" value="yes" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<!--{eval $dreferer = str_replace('&amp;', '&', dreferer());}-->
		<input type="hidden" name="referer" value="$dreferer" />
		<input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
		<input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
		<!--{if $_G['setting']['sendregisterurl']}-->
		<input type="hidden" name="hash" value="$_GET[hash]" />
		<!--{/if}-->
		<ul>
			<!--{if $sendurl}-->
				<li><input type="email" tabindex="1" class="inxxm" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['email']}" placeholder="{lang registeremail}" fwin="login"></li>
			<!--{else}-->
				<!--{if empty($invite) && $_G['setting']['regstatus'] == 2 && !$invitestatus}-->
				<li><input type="text" tabindex="1" class="inxxm" size="30" autocomplete="off" value="{lang invite_code}" name="invitecode" placeholder="{lang invite_code}" fwin="login"></li>
				<!--{/if}-->
				<li><input type="text" tabindex="2" class="inxxm" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['username']}" placeholder="{lang registerinputtip}" fwin="login"></li>
				<li><input type="password" tabindex="3" class="inxxm" size="30" value="" name="{$_G['setting']['reginput']['password']}" placeholder="{lang login_password}" fwin="login"></li>
				<li><input type="password" tabindex="4" class="inxxm" size="30" value="" name="{$_G['setting']['reginput']['password2']}" placeholder="{lang registerpassword2}" fwin="login"></li>
				<li><input type="email" tabindex="5" class="inxxm" size="30" autocomplete="off" value="$hash[0]" name="{$_G['setting']['reginput']['email']}" placeholder="{lang registeremail}" fwin="login"></li>
				<!--{if $_G['setting']['regverify'] == 2}-->
					<li><input type="text" tabindex="6" class="inxxm" size="30" autocomplete="off" value="" name="regmessage" placeholder="{lang register_message}" fwin="login"></li>
				<!--{/if}-->
				<!--{if empty($invite) && $_G['setting']['regstatus'] == 3}-->
					<li><input type="text" tabindex="7" class="inxxm" size="30" autocomplete="off" value="" name="invitecode" placeholder="{lang invite_code}" fwin="login"></li>
				<!--{/if}-->
				<!--{loop $_G['cache']['fields_register'] $field}-->
					<!--{if $htmls[$field['fieldid']]}-->
					<li class="diy"><span>$field[title]<!--{if $field['required']}--> *<!--{/if}--></span>$htmls[$field['fieldid']]</li>	
					<!--{/if}-->
				<!--{/loop}-->
			<!--{/if}-->
		</ul>
		<!--{if $secqaacheck || $seccodecheck}-->
			<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
	</div>
	<div class="btn-xxmregi">
		<button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog lrxxm"><span>{lang register}</span></button>
	</div>
	</form>
	<p class="reg_link hm"><a href="member.php?mod=logging&action=login">{lang login}</a></p>
</div>
<!-- registerbox end -->

<!--{eval updatesession();}-->
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
	<li class="flex"><a href="forum.php?mod=misc&action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
	<!--{else}-->
	<li class="flex"><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
	<!--{/if}-->
	<li class="flex"><a href="forum.php?mod=guide&view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><!--{if $_G[setting][navs][10][navname]}-->{$_G[setting][navs][10][navname]}<!--{else}-->Loading<!--{/if}--></span></a></li>
	<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="xxmfcs"><i class="xxmfont iconpeoplefill"><!--{if $_G[member][newpm]}--><span class="news bg-rq"></span><!--{/if}--></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
	</ul>
</div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
