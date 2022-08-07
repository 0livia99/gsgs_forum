<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!--{subtemplate home/spacecp_header}-->
<!--{subtemplate home/spacecp_credit_header}-->

<!--{if in_array($_GET['op'], array('base'))}-->
	<ul class="creditl cl mtm xxmbb1">
	<!--{eval $creditid=0;}-->
	<!--{if $_GET['op'] == 'base' && $_G['setting']['creditstrans']}-->
		<!--{eval $creditid=$_G['setting']['creditstrans'];}-->
		<!--{if $_G['setting']['extcredits'][$creditid]}-->
		<!--{eval $credit=$_G['setting']['extcredits'][$creditid]; }-->
		<!--{if ($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting'][ec_tenpay_bargainor] || $_G['setting']['ec_account'])) || $_G['setting']['card']['open']}-->
		<li><a class="xxmbb1 xxmfsf">{$credit[title]}<span class="grey xxmfst"><!--{echo getuserprofile('extcredits'.$creditid);}--></span></a></li>
		<!--{else}-->
		<li><a class="xxmbb1 xxmfsf">{$credit[title]}<span class="grey xxmfst"><!--{echo getuserprofile('extcredits'.$creditid);}--></span></a></li>
		<!--{/if}-->
		<!--{/if}-->
	<!--{/if}-->
	<!--{loop $_G['setting']['extcredits'] $id $credit}-->
		<!--{if $id!=$creditid}-->
		<li><a class="xxmbb1 xxmfsf">{$credit[title]}<span class="grey xxmfst"><!--{echo getuserprofile('extcredits'.$id);}--></span></a></li>
		<!--{/if}-->
	<!--{/loop}-->
		<li><a class="xxmfss xxmfcs" style="font-weight:700;">{lang credits}<span class="xxmfcs xxmfss">$_G['member']['credits']</span></a></li>
	<!--{hook/spacecp_credit_extra}-->
	</ul>
	<!--{if $_GET['op'] == 'base'}-->
	<div class="b_p grey">$creditsformulaexp</div>
	<!--{/if}-->
<!--{/if}-->


<!--{if $_GET['op'] == 'buy'}-->

	<!--{if ($_G[setting][ec_ratio] && ($_G[setting][ec_account] || $_G[setting][ec_tenpay_opentrans_chnid] || $_G[setting][ec_tenpay_bargainor])) || $_G[setting][card][open]}-->
	<div class="xxm-credit-buy cl b_p">
		<form id="addfundsform" name="addfundsform" method="post" class="form" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=buy">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="addfundssubmit" value="true" />
			<input type="hidden" name="handlekey" value="buycredit" />
			<table cellspacing="0" cellpadding="0">
				<tr>
					<th>{lang mode_of_payment}&nbsp;:</th>
					<td colspan="2">
						<div class="cl">
							<ul>
							<!--{if $_G[setting][card][open]}-->
							<li>
								<input name="bank_type" type="radio" value="card" checked="checked" id="apitype_card" class="vm" $ecchecked /><label><span class="xs2">{lang card_credit}</span></label>
							</li>
							<!--{/if}-->
							</ul>
						</div>
					</td>
				</tr>
				<!--{if $_G[setting][card][open]}-->
				<tr id="cardbox">
					<th>{lang card}&nbsp;:</th>
					<td colspan="2">
						<input type="text" class="credit-input" id="cardid" placeholder="&#36755;&#20837;&#21345;&#21495;" name="cardid" />
					</td>
				</tr>
				<!--{if $seccodecheck}-->
					</table>
					<!--{block sectpl}--><table id="card_box_sec" cellspacing="0" cellpadding="0" class="tfm mtn"><tr><th><sec></th><td colspan="2"><span id="sec<hash>" onclick="showMenu({'ctrlid':this.id,'win':'{$_GET[handlekey]}'})"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div></td></tr></table><!--{/block}-->
					<!--{subtemplate common/seccheck}-->
					<table cellspacing="0" cellpadding="0" class="tfm">
				<!--{/if}-->
				<!--{/if}-->
			</table>
			<div class="mtw btn-big b_p">
				<button type="submit" name="addfundssubmit_btn" class="touch" id="addfundssubmit_btn" value="true">{lang memcp_credits_addfunds}</button>
			</div>
		</form>
		<div class="btn-big-bor b_p">
			<a href="misc.php?mod=faq" class="touch">{lang medals_draw}{lang card}</a>
		</div>
	</div>
	<!--{/if}-->
	
<!--{elseif $_GET['op'] == 'rule'}-->

	{eval
		$_TPL['cycletype'] = array(
			'0' => '{lang one_time}',
			'1' => '{lang everyday}',
			'2' => '{lang the_time}',
			'3' => '{lang interval_minutes}',
			'4' => '{lang open_cycle}'
		);
	}
	<p class="grey b_p">{lang activity_award_message}</p>
	<div class="b_p credit_rule">
		<select onchange="location.href='home.php?mod=spacecp&ac=credit&op=rule&fid='+this.value"><option value="">{lang credit_rule_global}</option>$select</select>
	</div>
	<div class="xxm-at-form b_p">
		<table cellspacing="0" cellpadding="0" class="">
			<tr>
				<th class="xw1">{lang action_name}</th>
				<th class="xw1">{lang cycle_range}</th>
				<th class="xw1">{lang max_award_per_week}</th>
				<!--{loop $_G['setting']['extcredits'] $key $value}-->
				<th class="xw1">$value[title]</th>
				<!--{/loop}-->
			</tr>
			<!--{eval $i = 0;}-->
			<!--{loop $list $key $value}-->
			<!--{eval $i++;}-->
			<tr{if $i % 2 == 0} class="alt"{/if}>
				<td>$value[rulename]</td>
				<td>$_TPL[cycletype][$value[cycletype]]</td>
				<td><!--{if $value[rewardnum]}-->$value[rewardnum]<!--{else}-->{lang unlimited_time}<!--{/if}--></td>
				<!--{loop $_G['setting']['extcredits'] $key $credit}-->
				<!--{eval $creditkey = 'extcredits'.$key;}-->
				<td><!--{if $value[$creditkey] > 0}-->+$value[$creditkey]<!--{elseif $value[$creditkey] < 0}-->$value[$creditkey]<!--{else}-->0<!--{/if}--></td>
				<!--{/loop}-->
			</tr>
			<!--{/loop}-->
		</table>
	</div>
	
<!--{/if}-->

    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     	
<!--{template common/footer}-->