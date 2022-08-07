<?php echo 'QQ:2399835618';exit;?>
<!--{if $value[msgfromid] != $_G['uid']}-->
<div class="friend_msg cl">
	<div class="avat z">
		<a href="home.php?mod=space&uid=$value[msgfromid]&do=profile">
			<img style="height:32px;width:32px;" src="<!--{avatar($value[msgfromid], middle, true)}-->" />
		</a>
	</div>
	<div class="dialog_green z">
		<!--{if $value['pmtype'] == 2}-->
		<div class="dialog_name">{$value[author]}</div>
		<!--{/if}-->
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>
		<div class="dialog_b"></div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{else}-->
<div class="self_msg cl">
	<div class="avat y"><img style="height:32px;width:32px;" src="<!--{avatar($value[msgfromid], middle, true)}-->" /></div>
	<div class="dialog_white y">			
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>
		<div class="dialog_b"></div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{/if}-->
