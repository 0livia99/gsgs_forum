<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('showmessage');?>
<?php if($param['login']) { if($_G['inajax']) { dheader('Location:member.php?mod=logging&action=login&inajax=1&infloat=1');exit;?><?php } else { dheader('Location:member.php?mod=logging&action=login');exit;?><?php } } include template('common/header'); if($_G['inajax']) { ?>

<div class="tip">
<dt id="messagetext">
<p><?php echo $show_message;?></p>
<?php if($_G['forcemobilemessage']) { ?>
<p>
<a href="<?php echo $_G['setting']['mobile']['pageurl'];?>" class="mtn">��������</a><br />
<a href="javascript:history.back();">������һҳ</a>
</p>
<?php } if($url_forward && !$_GET['loc']) { ?>
<!--<p><a class="grey" href="<?php echo $url_forward;?>">��������ӽ�����ת</a></p>-->
<script type="text/javascript">
setTimeout(function() {
window.location.href = '<?php echo $url_forward;?>';
}, '2000');
</script>
<?php } elseif($allowreturn) { ?>
<p><input type="button" class="button" onclick="popup.close();" value="�ر�"></p>
<?php } ?>
</dt>
</div>

<?php } else { if($_G['setting']['domain']['app']['mobile']) { $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<div class="cl">
<div class="logoxxmbox"><img src="<?php echo $_G['style']['styleimgdir'];?>/images/logo.png" /></div>
</div>
<!-- main jump start -->
<div class="hm">
<div class="jump_c">
<p class="mbm"><?php echo $show_message;?></p>
<?php if($_G['forcemobilemessage']) { ?>
<p class="b_p btn-big"><a href="<?php echo $_G['setting']['mobile']['pageurl'];?>" class="touch">��������</a></p>
<p class="b_p btn-big"><a href="javascript:history.back();" class="touch">������һҳ</a></p>
<?php } if($url_forward) { ?>
<p class="b_p btn-big"><a class="touch" href="<?php echo $url_forward;?>">��������ӽ�����ת</a></p>
<?php } elseif($allowreturn) { ?>
<p class="b_p btn-big"><a class="touch" href="javascript:history.back();">[ ������ﷵ����һҳ ]</a></p>
<?php } ?>
</div>
</div>
<!-- main jump end -->

<?php } include template('common/footer'); ?>