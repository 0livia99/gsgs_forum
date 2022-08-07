<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');
0
|| checktplrefresh('./template/xxm_twowap/touch/member/login.htm', './template/xxm_twowap/touch/common/seccheck.htm', 1659872278, '9', './data/template/10_9_touch_member_login.tpl.php', './template/xxm_twowap', 'touch/member/login')
;?><?php include template('common/header'); if(!$_GET['infloat']) { ?>
<div class="cl">
<div class="logoxxmbox"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/logo.png" /></div>
</div>
<?php } if(!$_GET['lostpasswd']) { $loginhash = 'L'.random(4);?><!-- userinfo start -->
<?php if($_GET['infloat']) { ?>
<a href="javascript:;" onclick="popup.close();"><span class="icon_close xxmfont iconclose grey y"></span></a>
<?php } ?>
<div class="loginbox<?php if($_GET['infloat']) { ?> login_pop<?php } ?>">
<form id="loginform" method="post" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;loginhash=<?php echo $loginhash;?>&amp;mobile=2" onsubmit="<?php if($_G['setting']['pwdsafety']) { ?>pwmd5('password3_<?php echo $loginhash;?>');<?php } ?>" >
<input type="hidden" name="formhash" id="formhash" value='<?php echo FORMHASH;?>' />
<input type="hidden" name="referer" id="referer" value="<?php if(dreferer()) { echo dreferer(); } else { ?>forum.php?mobile=2<?php } ?>" />
<input type="hidden" name="fastloginfield" value="username">
<input type="hidden" name="cookietime" value="2592000">
<?php if($auth) { ?>
<input type="hidden" name="auth" value="<?php echo $auth;?>" />
<?php } ?>
<div class="login_from">
<ul>
<div class="moviebox">
<div class="movie">
<input type="text" id="xxmname" name="username" class="balloon" <?php if($_G['setting']['autoidselect']) { ?>placeholder="用户名 / Email<?php if(getglobal('setting/uidlogin')) { ?> / UID<?php } ?>"<?php } else { ?>placeholder="用户名"<?php } ?> fwin="login">
<label for="xxmname">用户名</label>
</div>
<div class="movie">
<input type="password" id="xxmpw" tabindex="2" class="balloon" name="password" placeholder="密码" fwin="login">
<label for="xxmpw">密码</label>
</div>
</div>
<?php if($_G['style']['questionli'] == 'on' ) { ?>
<li class="questionli">
<div class="login_select">
<span class="login-btn-inner">
<span class="login-btn-text">
<span class="span_question">安全提问(未设置请忽略)</span>
</span>
<span class="icon-arrow xxmfont icongengduo"></span>
</span>
<select id="questionid_<?php echo $loginhash;?>" name="questionid" class="sel_list">
<option value="0" selected="selected">安全提问(未设置请忽略)</option>
<option value="1">母亲的名字</option>
<option value="2">爷爷的名字</option>
<option value="3">父亲出生的城市</option>
<option value="4">您其中一位老师的名字</option>
<option value="5">您个人计算机的型号</option>
<option value="6">您最喜欢的餐馆名称</option>
<option value="7">驾驶执照最后四位数字</option>
</select>
</div>
</li>
<li class="bl_none answerli" style="display:none;"><input type="text" name="answer" id="answer_<?php echo $loginhash;?>" class="inxxm" size="30" placeholder="答案"></li>
<?php } ?>
</ul>
<?php if($seccodecheck) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<div class="b_p xxmfsf">
        验证问答: 
        <span><?php echo $secqaa;?></span>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="inxxm" placeholder="答案" />
        </div>
<?php } if($seccodecheck) { ?>
<div class="sec_code vm">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
<input type="text" class="sec_code_input" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="验证码" fwin="seccode">
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
<div class="btn-xxmlo">
<button tabindex="3" value="true" name="submit" type="submit" class="formdialog lrxxm"><span>登录</span></button>
</div>
</form>
<p class="reg_link hm">
<?php if($_G['setting']['regstatus']) { ?><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>">还没有注册？</a>&nbsp;&nbsp;<em style="color: #D7D7D7;">|</em>&nbsp;&nbsp;<?php } ?>
<a href="member.php?mod=logging&amp;action=login&amp;lostpasswd=yes" class="grey">找回密码</a>
</p>
<?php if($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']) { ?>
<div class="btn-xxmqqlo hm"><a href="<?php echo $_G['connect']['login_url'];?>&statfrom=login_simple" class="xxmfont iconQQ"></a></div>
<?php } ?>

<div class="hm b_p"><?php if(!empty($_G['setting']['pluginhooks']['logging_bottom_mobile'])) echo $_G['setting']['pluginhooks']['logging_bottom_mobile'];?></div>

</div>
<!-- userinfo end -->

<?php } else { ?>

<div id="layer_lostpw_<?php echo $loginhash;?>" class="loginbox">
<form method="post" autocomplete="off" id="lostpwform_<?php echo $loginhash;?>" action="member.php?mod=lostpasswd&amp;lostpwsubmit=yes&amp;infloat=yes">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="handlekey" value="lostpwform" />
<div class="login_from">
<ul>
<li><input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" placeholder="Email *" class="inxxm" /></li>
<li><input type="text" name="username" id="lostpw_username" size="30" value="" placeholder="用户名" tabindex="1" class="inxxm" /></li>			
</ul>
</div>
<div class="btn-xxmlo">
<button type="submit" name="lostpwsubmit" value="true" tabindex="100" class="formdialog lrxxm"><span>提交</span></button>
</div>
</form>
<?php if($_G['setting']['regstatus']) { ?>
<p class="reg_link hm"><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>">还没有注册？</a></p>
<?php } ?>
</div>

<?php } if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } updatesession();?><script type="text/javascript">
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
<?php if(!$_GET['infloat']) { ?>
<div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
<ul class="xxmfootflex">
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span><?php echo xxm('forumlist');; ?></span></a></li>
<?php } else { ?>
<li class="flex"><a href="forum.php?forumlist=1&amp;mobile=2&amp;forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>首页</span></a></li>
<?php } if($_G['uid'] || $_G['group']['allowpost']) { ?>
<li class="flex"><a href="forum.php?mod=misc&amp;action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } else { ?>
<li class="flex"><a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>发帖</span></a></li>
<?php } ?>
<li class="flex"><a href="forum.php?mod=guide&amp;view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><?php if($_G['setting']['navs']['10']['navname']) { ?><?php echo $_G['setting']['navs']['10']['navname'];?><?php } else { ?>Loading<?php } ?></span></a></li>
<li class="flex"><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="xxmfcs"><i class="xxmfont iconpeoplefill"><?php if($_G['member']['newpm']) { ?><span class="news bg-rq"></span><?php } ?></i><span><?php if($_G['uid']) { ?>我的<?php } else { ?>登录<?php } ?></span></a></li>
</ul>
</div>
<?php } $nofooter = true;?><?php include template('common/footer'); ?>