<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
		<!--{if $viewself}-->
		<a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
		<!--{else}-->
		<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
		<!--{/if}-->
	   <span><!--{if $viewself}--><!--{if $do=='following'}-->{lang myitem}{echo xxm('follow_add');}<!--{else}-->{lang myitem}{echo xxm('follow_er');}<!--{/if}--><!--{else}--><!--{if $do=='following'}-->TA'{echo xxm('follow_add');}<!--{else}-->TA'{echo xxm('follow_er');}<!--{/if}--><!--{/if}--></span>
	   <div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
   </div>
</header>
<!-- header end -->
<!--{if in_array($do, array('following', 'follower'))}-->

	<!--{if $list}-->

		<div class="cl">
			<!--{if $do=='following'}-->
			<div class="xxmfollowerlist b_p">
				<h3 class="grey hm">{echo xxm('follow_add');} $space['following']</h3>
				<ul>
				<!--{loop $list $fuid $fuser}-->
					<li class="cl<!--{if in_array($fuser['uid'], $newfollower_list)}--> unread<!--{/if}-->">
						<a href="home.php?mod=space&uid=$fuser['followuid']&do=profile" title="$fuser['fusername']" id="edit_avt" class="avatar" shref="home.php?mod=space&uid=$fuser['followuid']"><!--{avatar($fuser['followuid'],middle)}--></a>
						<p class="tit"><a href="home.php?mod=space&uid=$fuser['followuid']&do=profile" title="$fuser['fusername']" c="1" shref="home.php?mod=space&uid=$fuser['followuid']">$fuser['fusername']</a><!--{if $fuser['bkname']}--><span id="followbkame_{$fuser['followuid']}" class="grey xxmfst">&nbsp;$fuser[bkname]</span><!--{/if}--><!--{if $fuser[followuid] != $_G[uid]}--><!--{if $fuser['mutual']}--><!--{if $fuser['mutual'] > 0}--><span class="flw_status_2 grey xxmfst">&nbsp;{echo xxm('huxiang');}{echo xxm('follow_add');}</span><!--{else}--><span class="flw_status_1 grey xxmfst">&nbsp;{lang did_not_follow_to_me}</span><!--{/if}--><!--{elseif helper_access::check_module('follow')}--><!--{/if}--><!--{/if}--></p>
						<p class="txt grey">
							<a><span class="rq" id="followernum_$fuser['followuid']">$memberinfo[$fuid]['follower']</span></a>{echo xxm('follow_er');}&nbsp;
							<a><span class="rq">$memberinfo[$fuid]['following']</span></a>{echo xxm('follow_add');}
						</p>
					</li>
				<!--{/loop}-->
				</ul>
				<!--{if !empty($multi)}--><div>$multi</div><!--{/if}-->
			</div>
			<!--{else}-->
			<div class="xxmfollowerlist b_p">
				<h3 class="grey hm">{echo xxm('follow_er');} $space['follower']</h3>
				<ul>
				<!--{loop $list $fuid $fuser}-->
					<li class="cl<!--{if in_array($fuser['uid'], $newfollower_list)}--> unread<!--{/if}-->">
						<a href="home.php?mod=space&uid=$fuser['uid']&do=profile" title="$fuser['username']" id="edit_avt" class="avatar" c="1" shref="home.php?mod=space&uid=$fuser['uid']"><!--{avatar($fuser['uid'],middle)}--></a>
						<p class="tit"><a href="home.php?mod=space&uid=$fuser['uid']&do=profile" title="$fuser['username']" c="1" shref="home.php?mod=space&uid=$fuser['uid']">$fuser['username']</a><!--{if $fuser[uid] != $_G[uid]}--><!--{if $fuser['mutual']}--><!--{if $fuser['mutual'] > 0}--><span class="flw_status_2 grey xxmfst">&nbsp;{echo xxm('huxiang');}{echo xxm('follow_add');}</span><!--{else}--><span class="flw_status_1 grey xxmfst">&nbsp;{lang did_not_follow_to_me}</span><!--{/if}--><!--{elseif helper_access::check_module('follow')}--><!--{/if}--><!--{/if}--></p>
						<p class="txt grey">
							<a><span class="rq" id="followernum_$fuser['uid']">$memberinfo[$fuid]['follower']</span></a>{echo xxm('follow_er');}&nbsp;
							<a><span class="rq">$memberinfo[$fuid]['following']</span></a>{echo xxm('follow_add');}
						</p>
					</li>
				<!--{/loop}-->
				</ul>
				<!--{if !empty($multi)}--><div>$multi</div><!--{/if}-->
			</div>
			<!--{/if}-->
		</div>

	<!--{else}-->

		<div id="nofollowmsg" class="grey hm b_p">
		<!--{if $viewself}-->
			<!--{if $do=='following'}-->
				{echo xxm('none');}{echo xxm('follow_add');}
			<!--{else}-->
				{echo xxm('none');}{echo xxm('follow_er');}
			<!--{/if}-->
		<!--{else}-->
			<!--{if $do=='following'}-->
				TA{echo xxm('none');}{echo xxm('follow_add');}
			<!--{else}-->
				TA{echo xxm('none');}{echo xxm('follow_er');}
			<!--{/if}-->
		<!--{/if}-->
		</div>

	<!--{/if}-->

<!--{/if}-->

<!--{template common/footer}-->

    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     	