<?php echo 'QQ:2399835618';exit;?>
<div class="xxm_poll b_p mtw mbw">
	<form id="poll" name="poll" method="post" autocomplete="off" action="forum.php?mod=misc&action=votepoll&fid=$_G[fid]&tid=$_G[tid]&pollsubmit=yes{if $_GET[from]}&from=$_GET[from]{/if}&quickforward=yes&mobile=2" >
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="hm mtw">$_G[forum_thread][subject]</div>
		<div class="grey xxmfst cl hm"><!--{if $multiple}-->{lang poll_multiple}{lang thread_poll}<!--{else}-->{lang poll_single}{lang thread_poll}<!--{/if}-->&nbsp;/&nbsp;<!--{if $multiple}--><!--{if $maxchoices}-->{lang poll_more_than}&nbsp;/&nbsp;<!--{/if}--><!--{/if}-->{lang poll_voterscount}</div>
		<!--{if $_G[forum_thread][remaintime]}-->
		<div class="grey xxmfst cl hm"><!--{if $visiblepoll && $_G['group']['allowvote']}-->{lang poll_after_result}&nbsp;/&nbsp;<!--{/if}-->{lang poll_count_down}&nbsp;:&nbsp;&nbsp;<!--{if $_G[forum_thread][remaintime][0]}-->$_G[forum_thread][remaintime][0]{lang days}<!--{/if}--><!--{if $_G[forum_thread][remaintime][1]}-->$_G[forum_thread][remaintime][1]{lang poll_hour}<!--{/if}-->$_G[forum_thread][remaintime][2]{lang poll_minute}</div>
		<!--{/if}-->
		<div class="cl">

			<!--{if $isimagepoll}-->
			
				<!--{eval $i = 0;}-->
				<div class="isimage cl">
					<!--{loop $polloptions $key $option}-->
					<!--{eval $i++;}-->
					<!--{eval $imginfo=$option['imginfo'];}-->
					<div valign="bottom" id="polloption_$option[polloptionid]" class="z pad">
						<div class="polltd cl">
							<!--{if $imginfo}-->
							<a title="$imginfo[filename]" class="comimg">
								<img id="aimg_$imginfo[aid]" aid="$imginfo[aid]" src="$imginfo[small]" width="100%" alt="$imginfo[filename]" title="$imginfo[filename]" w="$imginfo[width]" />
							</a>
							<!--{else}-->
							<a class="comimg"><img src="{$_G['style']['styleimgdir']}/images/forum-icon.png" width="100%" /></a>
							<!--{/if}-->
							<p class="mtn mbn">
								<!--{if $_G['group']['allowvote']}--><label><input  type="$optiontype" id="option_$key" name="pollanswers[]" value="$option[polloptionid]" {if $_G['forum_thread']['is_archived']}disabled="disabled"{/if} {if $optiontype=='checkbox'}onclick="poll_checkbox(this)"{else}onclick="$('pollsubmit').disabled = false"{/if} /></label><!--{/if}--> $option[polloption]
							</p>
							<!--{if !$visiblepoll}-->
							<div class="img">
								<span class="jdt" style="width: $option[width]; background-color:#$option[color]">&nbsp;</span>
								<p class="imgfc">
									<span class="xxmfst z">$option[votes]{lang debate_poll}</span>
									<span class="xxmfst y grey">{$option[percent]}% </span>
								</p>
							</div>
							<!--{/if}-->
						</div>
					</div>
					<!--{if $key % 4 == 0 && isset($polloptions[$key])}-->
					<!--{/if}-->
					<!--{/loop}-->
					<!--{if ($imgpad = $key % 4) > 0}--><!--{/if}-->
				</div>
			
			<!--{else}-->
		
				<!--{loop $polloptions $key $option}-->
					<div class="noimage">
						<div class="cl">
						<!--{if $_G['group']['allowvote']}-->
							<input type="$optiontype" id="option_$key" name="pollanswers[]" value="$option[polloptionid]" {if $_G['forum_thread']['is_archived']}disabled="disabled"{/if}  />
						<!--{/if}-->
							<label for="option_$key">$key.$option[polloption]</label>
						<!--{if !$visiblepoll}-->
							<span class="grey xxmfst y">$option[percent]% <em style="color:#$option[color]">($option[votes])</em></span>
						<!--{/if}-->
						</div>
						<!--{if !$visiblepoll}-->
						<div class="xxm_visiblepoll">
							<div class="xxm_pbg">
								<div class="xxm_pbr" style="width: $option[width]; background-color:#$option[color]"></div>
							</div>
						</div>
						<!--{/if}-->
					</div>
				<!--{/loop}-->
			
			<!--{/if}-->
	        
	        <!--{if $_G['group']['allowvote'] && !$_G['forum_thread']['is_archived']}-->
	            <div class="mtw mbw btn-big">
					 <input type="submit" name="pollsubmit" id="pollsubmit" value="{lang submit}" class="touch" />
				</div>
	            <!--{if $overt}-->
	            <div class="grey xxmfst cl hm mbw mtw">{lang poll_msg_overt}</div>
	            <!--{/if}-->
	        <!--{elseif !$allwvoteusergroup}-->
				<!--{if $expiration && $expirations < TIMESTAMP}-->
				<div class="grey xxmfst cl hm mbw">{lang poll_end}</div>
				<!--{else}-->
				<!--{if !$_G['uid']}-->
				<div class="mtw mbw btn-big">
					<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="touch">{lang thread_poll}</a>
				</div>
				<!--{else}-->
				<div class="grey xxmfst cl hm mbw">{lang poll_msg_allwvoteusergroup}</div>
				<!--{/if}-->
				<!--{/if}-->
	        <!--{elseif !$allowvotepolled}-->
	            <div class="grey xxmfst cl hm mbw mtw">{lang poll_msg_allowvotepolled}</div>
	        <!--{elseif !$allowvotethread}-->
	            <div class="grey xxmfst cl hm mbw mtw">{lang poll_msg_allowvotethread}</div>
	        <!--{/if}-->
		</div>
	</form>
</div>
<div class="clear cl"></div>
<div id="postmessage_$post[pid]" class="postmessage mtw mbw">$post[message]</div>
