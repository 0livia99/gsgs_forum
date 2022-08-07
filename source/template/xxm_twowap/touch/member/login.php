<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->

<!--{if !$_GET['infloat']}-->
<div class="cl">
	<div class="logoxxmbox"><img src="{$_G['style']['styleimgdir']}/images/logo.png" /></div>
</div>
<!--{/if}-->

<!--{if !$_GET['lostpasswd']}-->

{eval $loginhash = 'L'.random(4);}

<!-- userinfo start -->
<!--{if $_GET[infloat]}-->
<a href="javascript:;" onclick="popup.close();"><span class="icon_close xxmfont iconclose grey y"></span></a>
<!--{/if}-->
<div class="loginbox<!--{if $_GET[infloat]}--> login_pop<!--{/if}-->">
	<form id="loginform" method="post" action="member.php?mod=logging&action=login&loginsubmit=yes&loginhash=$loginhash&mobile=2" onsubmit="{if $_G['setting']['pwdsafety']}pwmd5('password3_$loginhash');{/if}" >
	<input type="hidden" name="formhash" id="formhash" value='{FORMHASH}' />
	<input type="hidden" name="referer" id="referer" value="<!--{if dreferer()}-->{echo dreferer()}<!--{else}-->forum.php?mobile=2<!--{/if}-->" />
	<input type="hidden" name="fastloginfield" value="username">
	<input type="hidden" name="cookietime" value="2592000">
	<!--{if $auth}-->
		<input type="hidden" name="auth" value="$auth" />
	<!--{/if}-->
	<div class="login_from">
		<ul>
			<div class="moviebox">
				<div class="movie">
					<input type="text" id="xxmname" name="username" class="balloon" {if $_G['setting']['autoidselect']}placeholder="{lang username} / Email{if getglobal('setting/uidlogin')} / UID{/if}"{else}placeholder="{lang username}"{/if} fwin="login">
					<label for="xxmname">{lang username}</label>
				</div>
				<div class="movie">
					<input type="password" id="xxmpw" tabindex="2" class="balloon" name="password" placeholder="{lang login_password}" fwin="login">
					<label for="xxmpw">{lang login_password}</label>
				</div>
			</div>
			<!--{if $_G['style']['questionli'] == 'on' }-->
			<li class="questionli">
				<div class="login_select">
				<span class="login-btn-inner">
					<span class="login-btn-text">
						<span class="span_question">{lang security_question}</span>
					</span>
					<span class="icon-arrow xxmfont icongengduo"></span>
				</span>
				<select id="questionid_{$loginhash}" name="questionid" class="sel_list">
					<option value="0" selected="selected">{lang security_question}</option>
					<option value="1">{lang security_question_1}</option>
					<option value="2">{lang security_question_2}</option>
					<option value="3">{lang security_question_3}</option>
					<option value="4">{lang security_question_4}</option>
					<option value="5">{lang security_question_5}</option>
					<option value="6">{lang security_question_6}</option>
					<option value="7">{lang security_question_7}</option>
				</select>
				</div>
			</li>
			<li class="bl_none answerli" style="display:none;"><input type="text" name="answer" id="answer_{$loginhash}" class="inxxm" size="30" placeholder="{lang security_a}"></li>
			<!--{/if}-->
		</ul>
		<!--{if $seccodecheck}-->
		<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
	</div>
	<div class="btn-xxmlo">
		<button tabindex="3" value="true" name="submit" type="submit" class="formdialog lrxxm"><span>{lang login}</span></button>
	</div>
	</form>
	<p class="reg_link hm">
		<!--{if $_G['setting']['regstatus']}--><a href="member.php?mod={$_G[setting][regname]}">{lang noregister}</a>&nbsp;&nbsp;<em style="color: #D7D7D7;">|</em>&nbsp;&nbsp;<!--{/if}-->
		<a href="member.php?mod=logging&action=login&lostpasswd=yes" class="grey">{lang getpassword}</a>
	</p>
	<!--{if $_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']}-->
	<div class="btn-xxmqqlo hm"><a href="$_G[connect][login_url]&statfrom=login_simple" class="xxmfont iconQQ"></a></div>
	<!--{/if}-->
	
	<div class="hm b_p"><!--{hook/logging_bottom_mobile}--></div>

</div>
<!-- userinfo end -->

<!--{else}-->

<div id="layer_lostpw_$loginhash" class="loginbox">
	<form method="post" autocomplete="off" id="lostpwform_$loginhash" action="member.php?mod=lostpasswd&lostpwsubmit=yes&infloat=yes">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="handlekey" value="lostpwform" />
		<div class="login_from">
			<ul>
				<li><input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" placeholder="{lang email} *" class="inxxm" /></li>
				<li><input type="text" name="username" id="lostpw_username" size="30" value="" placeholder="{lang username}" tabindex="1" class="inxxm" /></li>			
			</ul>
		</div>
		<div class="btn-xxmlo">
			<button type="submit" name="lostpwsubmit" value="true" tabindex="100" class="formdialog lrxxm"><span>{lang submit}</span></button>
		</div>
	</form>
	<!--{if $_G['setting']['regstatus']}-->
	<p class="reg_link hm"><a href="member.php?mod={$_G[setting][regname]}">{lang noregister}</a></p>
	<!--{/if}-->
</div>

<!--{/if}-->

<!--{if $_G['setting']['pwdsafety']}-->
	<script type="text/javascript" src="{$_G['setting']['jspath']}md5.js?{VERHASH}" reload="1"></script>
<!--{/if}-->
<!--{eval updatesession();}-->

<script type="text/javascript">
	(function() {
		$(document).on('change', '.sel_list', function() {
			var obj = $(this);
			$('.span_question').text(obj.find('option:selected').text());
			if(obj.val() == 0) {
				$('.answerli').css('display', 'none');
				$('.questionli').addClass('bl_none');
			} else {
				$('.answerli').css('display', 'block');
				$('.questionli').removeClass('bl_none');
			}
		});
	 })();
</script>
<!--{if !$_GET['infloat']}-->
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
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
