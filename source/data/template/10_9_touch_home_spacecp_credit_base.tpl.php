<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_credit_base');
0
|| checktplrefresh('./template/xxm_twowap/touch/home/spacecp_credit_base.htm', './template/xxm_twowap/touch/home/spacecp_header.htm', 1659886763, '9', './data/template/10_9_touch_home_spacecp_credit_base.tpl.php', './template/xxm_twowap', 'touch/home/spacecp_credit_base')
|| checktplrefresh('./template/xxm_twowap/touch/home/spacecp_credit_base.htm', './template/xxm_twowap/touch/home/spacecp_credit_header.htm', 1659886763, '9', './data/template/10_9_touch_home_spacecp_credit_base.tpl.php', './template/xxm_twowap', 'touch/home/spacecp_credit_base')
|| checktplrefresh('./template/xxm_twowap/touch/home/spacecp_credit_base.htm', './template/xxm_twowap/touch/common/seccheck.htm', 1659886763, '9', './data/template/10_9_touch_home_spacecp_credit_base.tpl.php', './template/xxm_twowap', 'touch/home/spacecp_credit_base')
|| checktplrefresh('./template/xxm_twowap/touch/home/spacecp_credit_base.htm', './template/xxm_twowap/touch/home/spacecp_header_name.htm', 1659886763, '9', './data/template/10_9_touch_home_spacecp_credit_base.tpl.php', './template/xxm_twowap', 'touch/home/spacecp_credit_base')
;?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
       <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
   <span><?php if($actives['profile']) { ?>
��������
<?php } elseif($actives['verify']) { ?>
��֤
<?php } elseif($actives['avatar']) { ?>
�޸�ͷ��
<?php } elseif($actives['credit']) { ?>
����
<?php } elseif($actives['usergroup']) { ?>
�ҵ�<?php echo $_G['setting']['navs']['2']['navname'];?>Ȩ��
<?php } elseif($actives['privacy']) { ?>
��˽ɸѡ
<?php } elseif($actives['sendmail']) { ?>
�ʼ�����
<?php } elseif($actives['password']) { ?>
���밲ȫ
<?php } elseif($actives['promotion']) { ?>
�����ƹ�
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?>
    		  	  		  	  		     	  			     		   		     		       	  				    		   		     		       	  			     		   		     		       	 	   	    		   		     		       	  		      		   		     		       	  		 	    		   		     		       	 	   	    		   		     		       	  		 	    		   		     		       	  				    		   		     		       	  	 	     		   		     		       	 	   	    		   		     		       	  			     		   		     		       	   			    		   		     		       	   		     		 	      	  		  	  		     	</span>
   <div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
   </div>
</header>
<!-- header end -->

<div class="xxm-credit b_p xxmbb1">
<a href="home.php?mod=spacecp&amp;ac=credit&amp;op=base" <?php echo $opactives['base'];?>>�ҵĻ���</a>
<a href="home.php?mod=spacecp&amp;op=log&amp;ac=credit" <?php echo $opactives['log'];?>>���ּ�¼</a>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;op=rule" <?php echo $opactives['rule'];?>>���ֹ���</a>
<?php if($_G['setting']['ec_ratio'] && ($_G['setting']['ec_account'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor']) || $_G['setting']['card']['open']) { ?>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;op=buy" <?php echo $opactives['buy'];?>>��ֵ</a>
<?php } ?>
</div>

    		  	  		  	  		     	  		 	    		   		     		       	 			  	    		   		     		       	 			 		    		   		     		       	 			 		    		   		     		       	 				 	    		   		     		       	  			     		   		     		       	  	  	    		   		     		       	 					     		   		     		       	 			 		    		   		     		       	  				    		   		     		       	  	  	    		   		     		       	  			     		   		     		       	  	  	    		   		     		       	 			 		    		   		     		       	 			  	    		   		     		       	 			  	    		   		     		       	 			 	     		   		     		       	 			 	     		   		     		       	 				      		   		     		       	  			     		   		     		       	  	 	     		   		     		       	  	  	    		   		     		       	 			 		    		   		     		       	 			 		    		   		     		       	  			     		   		     		       	   			    		   		     		       	  		      		   		     		       	  	       		   		     		       	  	 	     		   		     		       	  	  	    		   		     		       	  	 		    		   		     		       	 				      		 	      	  		  	  		     	<?php if(in_array($_GET['op'], array('base'))) { ?>
<ul class="creditl cl mtm xxmbb1"><?php $creditid=0;?><?php if($_GET['op'] == 'base' && $_G['setting']['creditstrans']) { $creditid=$_G['setting']['creditstrans'];?><?php if($_G['setting']['extcredits'][$creditid]) { $credit=$_G['setting']['extcredits'][$creditid];?><?php if(($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor'] || $_G['setting']['ec_account'])) || $_G['setting']['card']['open']) { ?>
<li><a class="xxmbb1 xxmfsf"><?php echo $credit['title'];?><span class="grey xxmfst"><?php echo getuserprofile('extcredits'.$creditid);; ?></span></a></li>
<?php } else { ?>
<li><a class="xxmbb1 xxmfsf"><?php echo $credit['title'];?><span class="grey xxmfst"><?php echo getuserprofile('extcredits'.$creditid);; ?></span></a></li>
<?php } } } if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $credit) { if($id!=$creditid) { ?>
<li><a class="xxmbb1 xxmfsf"><?php echo $credit['title'];?><span class="grey xxmfst"><?php echo getuserprofile('extcredits'.$id);; ?></span></a></li>
<?php } } ?>
<li><a class="xxmfss xxmfcs" style="font-weight:700;">����<span class="xxmfcs xxmfss"><?php echo $_G['member']['credits'];?></span></a></li>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_extra'])) echo $_G['setting']['pluginhooks']['spacecp_credit_extra'];?>
</ul>
<?php if($_GET['op'] == 'base') { ?>
<div class="b_p grey"><?php echo $creditsformulaexp;?></div>
<?php } } if($_GET['op'] == 'buy') { if(($_G['setting']['ec_ratio'] && ($_G['setting']['ec_account'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor'])) || $_G['setting']['card']['open']) { ?>
<div class="xxm-credit-buy cl b_p">
<form id="addfundsform" name="addfundsform" method="post" class="form" autocomplete="off" action="home.php?mod=spacecp&amp;ac=credit&amp;op=buy">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="addfundssubmit" value="true" />
<input type="hidden" name="handlekey" value="buycredit" />
<table cellspacing="0" cellpadding="0">
<tr>
<th>֧����ʽ&nbsp;:</th>
<td colspan="2">
<div class="cl">
<ul>
<?php if($_G['setting']['card']['open']) { ?>
<li>
<input name="bank_type" type="radio" value="card" checked="checked" id="apitype_card" class="vm" <?php echo $ecchecked;?> /><label><span class="xs2">��ֵ����ֵ</span></label>
</li>
<?php } ?>
</ul>
</div>
</td>
</tr>
<?php if($_G['setting']['card']['open']) { ?>
<tr id="cardbox">
<th>��ֵ��&nbsp;:</th>
<td colspan="2">
<input type="text" class="credit-input" id="cardid" placeholder="&#36755;&#20837;&#21345;&#21495;" name="cardid" />
</td>
</tr>
<?php if($seccodecheck) { ?>
</table><?php
$sectpl = <<<EOF
<table id="card_box_sec" cellspacing="0" cellpadding="0" class="tfm mtn"><tr><th><sec></th><td colspan="2"><span id="sec<hash>" onclick="showMenu({'ctrlid':this.id,'win':'{$_GET['handlekey']}'})"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div></td></tr></table>
EOF;
?><?php $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<div class="b_p xxmfsf">
        ��֤�ʴ�: 
        <span><?php echo $secqaa;?></span>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="inxxm" placeholder="��" />
        </div>
<?php } if($seccodecheck) { ?>
<div class="sec_code vm">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
<input type="text" class="sec_code_input" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="��֤��" fwin="seccode">
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
<table cellspacing="0" cellpadding="0" class="tfm">
<?php } } ?>
</table>
<div class="mtw btn-big b_p">
<button type="submit" name="addfundssubmit_btn" class="touch" id="addfundssubmit_btn" value="true">��ֵ</button>
</div>
</form>
<div class="btn-big-bor b_p">
<a href="misc.php?mod=faq" class="touch">��ȡ��ֵ��</a>
</div>
</div>
<?php } } elseif($_GET['op'] == 'rule') { $_TPL['cycletype'] = array(
'0' => 'һ����',
'1' => 'ÿ��',
'2' => '����',
'3' => '�������',
'4' => '��������'
);?><p class="grey b_p">���������¼���������õ����ֽ�������������һ�������ڣ������õ��Ľ������������� </p>
<div class="b_p credit_rule">
<select onchange="location.href='home.php?mod=spacecp&ac=credit&op=rule&fid='+this.value"><option value="">ȫ�ֹ���</option><?php echo $select;?></select>
</div>
<div class="xxm-at-form b_p">
<table cellspacing="0" cellpadding="0" class="">
<tr>
<th class="xw1">��������</th>
<th class="xw1">���ڷ�Χ</th>
<th class="xw1">��������ཱ������</th><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { ?><th class="xw1"><?php echo $value['title'];?></th>
<?php } ?>
</tr><?php $i = 0;?><?php if(is_array($list)) foreach($list as $key => $value) { $i++;?><tr<?php if($i % 2 == 0) { ?> class="alt"<?php } ?>>
<td><?php echo $value['rulename'];?></td>
<td><?php echo $_TPL['cycletype'][$value['cycletype']];?></td>
<td><?php if($value['rewardnum']) { ?><?php echo $value['rewardnum'];?><?php } else { ?>���޴���<?php } ?></td><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $credit) { $creditkey = 'extcredits'.$key;?><td><?php if($value[$creditkey] > 0) { ?>+<?php echo $value[$creditkey];?><?php } elseif($value[$creditkey] < 0) { ?><?php echo $value[$creditkey];?><?php } else { ?>0<?php } ?></td>
<?php } ?>
</tr>
<?php } ?>
</table>
</div>

<?php } ?>

    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     <?php include template('common/footer'); ?>