<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!--{if in_array($do, array('buy', 'exit'))}-->
<!--{elseif $do == 'switch'}-->
<!--{elseif $do == 'forum'}-->

	<!--{subtemplate home/spacecp_header}-->
	<div class="xxm-at-form cl">
		<div class="b_p">
			<div class="mbm hm grey">{lang my_main_usergroup} - $_G[group][grouptitle]</div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th>{lang forum_name}</th>
					<!--{loop $perms $perm}-->
					<td>$permlang['perms_'.$perm]</td>
					<!--{/loop}-->
				</tr>
				<!--{eval $key = 1;}-->
				<!--{loop $_G['cache']['forums'] $fid $forum}-->
					<!--{if $forum['status']}-->
					<tr {if $key++%2==0}class="alt"{/if}>
						<th{if $forum['type'] == 'forum'} style=""{elseif $forum['type'] == 'sub'} style="font-size: 12px;padding-left: 20px;"{/if}><a href="forum.php?mod=forumdisplay&fid=$forum[fid]" class="grey">$forum[name]</th>
						<!--{loop $perms $perm}-->
						<td>
							<!--{if !empty($verifyperm[$fid][$perm])}-->
								<!--{if $myverifyperm[$fid][$perm] || $forumperm[$fid][$perm]}-->
									<img src="{IMGDIR}/data_valid.gif" alt="data_valid" class="vm" />
								<!--{else}-->
									<img src="{IMGDIR}/data_invalid.gif" alt="data_invalid" class="vm" />
								<!--{/if}-->
								&nbsp;$verifyperm[$fid][$perm]
							<!--{else}-->
								<!--{if $forumperm[$fid][$perm]}--><img src="{IMGDIR}/data_valid.gif" alt="data_valid" /><!--{else}--><img src="{IMGDIR}/data_invalid.gif" alt="data_invalid" /><!--{/if}-->
							<!--{/if}-->
						</td>
						<!--{/loop}-->
					</tr>
					<!--{/if}-->
				<!--{/loop}-->
			</table>
			<div class="hm b_p">
				<img src="{IMGDIR}/data_valid.gif" alt="data_valid" class="vm" /> {lang usergroup_right_message1}&nbsp;
				<img src="{IMGDIR}/data_invalid.gif" alt="data_invalid" class="vm" /> {lang usergroup_right_message2}&nbsp;
				<!--{if $_G['setting']['verify']['enabled']}-->
					<!--{echo implode('', $verifyicon)}--> {lang usergroup_right_message3}
				<!--{/if}-->
			</div>
		</div>
	</div>

<!--{elseif $do == 'expiry' || $do == 'list'}-->
<!--{else}-->
<!--{/if}-->

<!--{template common/footer}-->
    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     	