<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!--{if empty($_GET['infloat'])}-->
<!--{/if}-->

<div class="cl xxm_pay_dialog b_p">
<form id="payform" method="post" autocomplete="off" action="forum.php?mod=misc&action=pay&paysubmit=yes&infloat=yes{if !empty($_GET['from'])}&from=$_GET['from']{/if}"{if !empty($_GET['infloat'])} onsubmit="ajaxpost('payform', 'return_$_GET['handlekey']', 'return_$_GET['handlekey']', 'onerror');return false;"{/if}>
	<div class="cl">
		<h3 class="hm mbw xxmfss"><em id="return_$_GET['handlekey']">{lang pay}</em></h3>
		<a href="javascript:;" onclick="popup.close();" class="close xxmfont iconclose grey" title="{lang close}"></a>
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="tid" value="$_G[tid]" />
		<!--{if !empty($_GET['infloat'])}--><input type="hidden" name="handlekey" value="$_GET['handlekey']" /><!--{/if}-->
		<div class="cl">
			<table class="list" cellspacing="0" cellpadding="0" style="width:200px;">
				<tr>
					<th>{lang author}</th>
					<td>$thread[author]</td>
				</tr>
				<tr>
					<th valign="top">{lang price}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</th>
					<td>$thread[price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</td>
				</tr>
				<tr>
					<th valign="top">{lang pay_author_income}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</th>
					<td>$thread[netprice] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</td>
				</tr>
				<tr>
					<th valign="top">{lang pay_balance}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]})</th>
					<td>$balance {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="mtw btn-big">
		<button type="submit" name="paysubmit" class="touch" value="true"><span>{lang confirmyourpay}</span></button>
	</div>
</form>
</div>

<!--{if !empty($_GET['infloat'])}-->
<script type="text/javascript" reload="1">
function succeedhandle_$_GET['handlekey'](locationhref) {
	<!--{if !empty($_GET['from'])}-->
		location.href = locationhref;
	<!--{else}-->
		ajaxget('forum.php?mod=viewthread&tid=$_G[tid]&viewpid=$_GET[pid]', 'post_$_GET[pid]');
		hideWindow('$_GET['handlekey']');
		showCreditPrompt();
	<!--{/if}-->
}
</script>
<!--{/if}-->

<!--{if empty($_GET['infloat'])}-->
<!--{/if}-->
    		  	  		  	  		     	  			     		   		     		       	  				    		   		     		       	  			     		   		     		       	 	   	    		   		     		       	  		      		   		     		       	  		 	    		   		     		       	 	   	    		   		     		       	  		 	    		   		     		       	  				    		   		     		       	  	 	     		   		     		       	 	   	    		   		     		       	  			     		   		     		       	   			    		   		     		       	   		     		 	      	  		  	  		     	
<!--{template common/footer}-->