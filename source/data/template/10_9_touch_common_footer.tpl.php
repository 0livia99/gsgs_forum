<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?><?php $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''?><?php if(strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';?><?php } elseif(strpos($useragent, 'android') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';?><?php } elseif(strpos($useragent, 'windows phone') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';?><?php } ?>
<div id="mask" style="display:none;"></div>
<?php if(!$nofooter) { ?>
<div class="footer">
<?php if($_G['setting']['sitename']) { ?>
<p>&copy; <?php echo $_G['setting']['sitename'];?></p>
<?php } if($_G['setting']['icp']) { ?>
<p><a href="https://beian.miit.gov.cn" target="_blank"><?php echo $_G['setting']['icp'];?></a></p>
<?php } ?>
<p><a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">╡И©╢╣Гдт╟Ф</a></p>
</div>
<?php } ?>
<div class="xxm-bottom"></div>
</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>
