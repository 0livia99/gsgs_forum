<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('register');
0
|| checktplrefresh('./template/xxm_twowap/touch/member/register.htm', './template/xxm_twowap/touch/common/seccheck.htm', 1659872283, '9', './data/template/10_9_touch_member_register.tpl.php', './template/xxm_twowap', 'touch/member/register')
;?><?php include template('common/header'); ?><div class="cl">
<div class="logoxxmbox"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/logo.png" /></div>
</div>

<!-- registerbox start -->
<div class="loginbox registerbox">
<div class="login_from">
<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod=<?php echo $_G['setting']['regname'];?>&amp;mobile=2">
<input type="hidden" name="regsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" /><?php $dreferer = str_replace('&amp;', '&', dreferer());?><input type="hidden" name="referer" value="<?php echo $dreferer;?>" />
<input type="hidden" name="activationauth" value="<?php if($_GET['action'] == 'activation') { ?><?php echo $activationauth;?><?php } ?>" />
<input type="hidden" name="agreebbrule" value="<?php echo $bbrulehash;?>" id="agreebbrule" checked="checked" />
<?php if($_G['setting']['sendregisterurl']) { ?>
<input type="hidden" name="hash" value="<?php echo $_GET['hash'];?>" />
<?php } ?>
<ul>
<?php if($sendurl) { ?>
<li><input type="email" tabindex="1" class="inxxm" size="30" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['email'];?>" placeholder="ÓÊÏä" fwin="login"></li>
<?php } else { if(empty($invite) && $_G['setting']['regstatus'] == 2 && !$invitestatus) { ?>
<li><input type="text" tabindex="1" class="inxxm" size="30" autocomplete="off" value="ÑûÇëÂë" name="invitecode" placeholder="ÑûÇëÂë" fwin="login"></li>
<?php } ?>
<li><input type="text" tabindex="2" class="inxxm" size="30" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['username'];?>" placeholder="ÓÃ»§Ãû£º3-15Î»" fwin="login"></li>
<li><input type="password" tabindex="3" class="inxxm" size="30" value="" name="<?php echo $_G['setting']['reginput']['password'];?>" placeholder="ÃÜÂë" fwin="login"></li>
<li><input type="password" tabindex="4" class="inxxm" size="30" value="" name="<?php echo $_G['setting']['reginput']['password2'];?>" placeholder="È·ÈÏÃÜÂë" fwin="login"></li>
<li><input type="email" tabindex="5" class="inxxm" size="30" autocomplete="off" value="<?php echo $hash['0'];?>" name="<?php echo $_G['setting']['reginput']['email'];?>" placeholder="ÓÊÏä" fwin="login"></li>
<?php if($_G['setting']['regverify'] == 2) { ?>
<li><input type="text" tabindex="6" class="inxxm" size="30" autocomplete="off" value="" name="regmessage" placeholder="×¢²áÔ­Òò" fwin="login"></li>
<?php } if(empty($invite) && $_G['setting']['regstatus'] == 3) { ?>
<li><input type="text" tabindex="7" class="inxxm" size="30" autocomplete="off" value="" name="invitecode" placeholder="ÑûÇëÂë" fwin="login"></li>
<?php } if(is_array($_G['cache']['fields_register'])) foreach($_G['cache']['fields_register'] as $field) { if($htmls[$field['fieldid']]) { ?>
<li class="diy"><span><?php echo $field['title'];?><?php if($field['required']) { ?> *<?php } ?></span><?php echo $htmls[$field['fieldid']];?></li>	
<?php } } } ?>
</ul>
<?php if($secqaacheck || $seccodecheck) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<div class="b_p xxmfsf">
        ÑéÖ¤ÎÊ´ð: 
        <span><?php echo $secqaa;?></span>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="inxxm" placeholder="´ð°¸" />
        </div>
<?php } if($seccodecheck) { ?>
<div class="sec_code vm">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
<input type="text" class="sec_code_input" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="ÑéÖ¤Âë" fwin="seccode">
        <img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=2" class="seccodeimg"/>
</div>
<?php } } ?>
<script type="text/javascript">
(function() {
$('.seccodeimg').on('click', function() {
$('#seccodeverify_<?php echo $sechash;?>').attr('value', '');
var tmprandom = 'S' + Math.floor(Math.random() * 1000);
$('.sechash').attr('value', tmprandom);
$(this).attr('src', 'misc.php?mod=seccode&update=<?php echo $ran;?>&idhash='+ tmprandom +'&mobile=2');
});
})();
</script>
<?php } ?>
</div>
<div class="btn-xxmregi">
<button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog lrxxm"><span>×¢²á</span></button>
</div>
</form>
<p class="reg_link hm"><a href="member.php?mod=logging&amp;action=login">µÇÂ¼</a></p>
</div>
<!-- registerbox end --><?php updatesession();?><div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>Ê×Ò³</span></a></li>
<?php } if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php } else { ?>
<li class="flex"><a href="forum.php?forumlist=1&amp;mobile=2&amp;forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>Ê×Ò³</span></a></li>
<?php } if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li class="flex"><a href="forum.php?mod=misc&amp;action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>·¢Ìû</span></a></li>
<?php } else { ?>
<li class="flex"><a href="javascript:popup.open('Äú»¹Î´µÇÂ¼£¬Á¢¼´µÇÂ¼?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>·¢Ìû</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfcs"><i class="xxmfont iconpeoplefill"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>ÎÒµÄ<?php } else { ?>µÇÂ¼<?php } ?></span></a></li>
</ul>
</div><?php $nofooter = true;?><?php include template('common/footer'); ?>