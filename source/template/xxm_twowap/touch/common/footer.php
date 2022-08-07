<?php echo 'QQ:2399835618';exit;?>
<!--{hook/global_footer_mobile}-->
<!--{eval $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''}-->
<!--{if strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';}-->
<!--{elseif strpos($useragent, 'android') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';}-->
<!--{elseif strpos($useragent, 'windows phone') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';}-->
<!--{/if}-->
<div id="mask" style="display:none;"></div>
<!--{if !$nofooter}-->
<div class="footer">
	<!--{if $_G['setting']['sitename']}-->
	<p>&copy; $_G['setting']['sitename']</p>
	<!--{/if}-->
	<!--{if $_G['setting']['icp']}-->
	<p><a href="https://beian.miit.gov.cn" target="_blank">$_G['setting']['icp']</a></p>
	<!--{/if}-->
	<p><a href="{$_G['setting']['mobile']['nomobileurl']}">{lang focus_show}{lang nomobiletype}</a></p>
</div>
<!--{/if}-->
<div class="xxm-bottom"></div>
</body>
</html>
<!--{eval updatesession();}-->
<!--{if defined('IN_MOBILE')}-->
	<!--{eval output();}-->
<!--{else}-->
	<!--{eval output_preview();}-->
<!--{/if}-->
