<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
		<span class="category">{lang all}{lang faq}</span>
		<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->

<div class="cl xxm-faq">

	<form method="post" autocomplete="off" action="misc.php?mod=faq&action=search">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="searchtype" value="all" />
		<div class="faqsearch">
			<input type="text" name="keyword" value="$keyword" class="input" placeholder="">
			<button type="submit" name="searchsubmit" class="button2" value="yes"><em>{lang search}</em></button>
		</div>
	</form>

	<div class="xxm-faq-appl b_p xxmbb1">
		<a href="misc.php?mod=faq"{if empty($_GET[action])} class="a"{/if}>{lang all}</a>
		<!--{loop $faqparent $fpid $parent}-->
		<a href="misc.php?mod=faq&action=faq&id=$fpid" {if $_GET[id] == $fpid}class="a"{/if}>$parent[title]</a>
		<!--{/loop}-->
		<!--{if !empty($_G['setting']['plugins']['faq'])}-->
		<!--{loop $_G['setting']['plugins']['faq'] $id $module}-->
		<a href="misc.php?mod=faq&action=plugin&id=$id" {if $_GET[id] == $id}class="a"{/if}>$module[name]</a>
		<!--{/loop}-->
		<!--{/if}-->
	</div>
	<div class="xxmclear"></div>
	
	<div class="b_p mtw">
		<!--{if empty($_GET[action])}-->
			<div class="all">
				<!--{if $fpid}-->
					<!--{loop $faqparent $fpid $parent}-->
					<h2><a href="misc.php?mod=faq&action=faq&id=$fpid" class="xxmfss">$parent[title]</a></h2>
					<ul name="$parent[title]">
						<!--{loop $faqsub[$parent[id]] $sub}-->
						<li><a href="misc.php?mod=faq&action=faq&id=$sub[fpid]&messageid=$sub[id]" class="xxmfsf">$sub[title]</a></li>
						<!--{/loop}-->
					</ul>
					<!--{/loop}-->
				<!--{else}-->
					<div class="hm ddd xxmfst">No Help</div>
				<!--{/if}-->
			</div>
		<!--{elseif $_GET[action] == 'faq'}-->
			<!--{loop $faqlist $faq}-->
			<div id="messageid$faq[id]_c"><h2 class="xxmfss">$faq[title]</h2></div>
			<div class="detail" id="messageid$faq[id]">$faq[message]</div>
			<!--{/loop}-->
		<!--{elseif $_GET[action] == 'search'}-->
			<div class="xxmfst mbw hm ddd">{lang keyword_faq}</div>
			<!--{if $faqlist}-->
				<!--{loop $faqlist $faq}-->
				<h2 class="xxmfss">$faq[title]</h2>
				<div class="detail">$faq[message]</div>
				<!--{/loop}-->
			<!--{else}-->
				<div class="hm ddd xxmfst">No Help</div>
			<!--{/if}-->
		<!--{elseif $_GET[action] == 'plugin' && !empty($_GET['id'])}-->
			<!--{eval include(template($_GET['id']));}-->
		<!--{/if}-->
	</div>
	
</div>

<!--{template common/footer}-->
