<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<div class="b_p bgxxmfff attachpay_view_list">
	<a href="javascript:;" onclick="popup.close();" class="delete"><i class="xxmfont iconclose grey"></i></a>
	<h3 class="mbm hm">{lang pay_view}</h3>
	<div>
		<table class="list" cellspacing="0" cellpadding="0" style="width: 250px;">
			<!--{if $loglist}-->
				<tr>
					<th>{lang username}</th>
					<th>{lang time}</th>
					<th>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</th>
				</tr>
				<!--{loop $loglist $log}-->
				<tr>
					<td><a href="home.php?mod=space&uid=$log[uid]&do=profile" class="blue">$log[username]</a></td>
					<td>$log[dateline]</td>
					<td>{$log[$extcreditname]} {$_G[setting][extcredits][$_G[setting][creditstransextra][1]][unit]}</td>
				</tr>
				<!--{/loop}-->
			<!--{else}-->
				<tr><td colspan="3" class="grey hm">{lang attachment_buy_not}</td></tr>
			<!--{/if}-->
		</table>
	</div>
</div>
<!--{template common/footer}-->