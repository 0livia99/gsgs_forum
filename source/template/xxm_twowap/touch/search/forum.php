<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
		<span class="name">{lang search}</span>
		<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->
<!--{if $_G['setting']['domain']['app']['mobile']}-->
	{eval $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];}
<!--{else}-->
	{eval $nav = "forum.php";}
<!--{/if}-->
<form id="searchform" class="searchform" method="post" autocomplete="off" action="search.php?mod=forum&mobile=2">
<input type="hidden" name="formhash" value="{FORMHASH}" />
<!--{subtemplate search/pubsearch}-->
<!--{eval $policymsgs = $p = '';}-->
<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
<!--{/loop}-->
<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
</form>
<!--{if $_GET['searchsubmit'] !== 'yes'}-->
<div class="circlexxm">
	<!--{if $_G['setting']['srchhotkeywords']}-->
	<div class="hotxxmse">
		<a class="grey">{lang hot_search}: </a>
		<!--{loop $_G['setting']['srchhotkeywords'] $val}-->
			<!--{if $val=trim($val)}-->
			<!--{eval $valenc=rawurlencode($val);}-->
			<!--{block srchhotkeywords[]}-->
			<!--{if !empty($searchparams[url])}-->
				<a href="$searchparams[url]?q=$valenc&source=hotsearch{$srchotquery}" sc="1">$val</a>
			<!--{else}-->
				<a href="search.php?mod=forum&srchtxt=$valenc&formhash={FORMHASH}&searchsubmit=true&source=hotsearch" sc="1">$val</a>
			<!--{/if}-->
			<!--{/block}-->
			<!--{/if}-->
		<!--{/loop}-->
		<!--{echo implode('', $srchhotkeywords);}-->
	</div>
	<!--{/if}-->
</div>
<!--{/if}-->

<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
	<!--{subtemplate search/thread_list}-->
<!--{/if}-->

<!--{eval $nofooter = true;}-->
    		  	  		  	  		     	  		      		   		     		       	  			     		   		     		       	   		     		   		     		       	  		      		   		     		       	   		     		   		     		       	  	 		    		   		     		       	   		     		 	      	  		  	  		     	
<!--{template common/footer}-->