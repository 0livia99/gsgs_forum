<?php echo 'QQ:2399835618';exit;?>
<!--{if $view == 'hot'}-->

	<!--{template common/header}-->
	<!--{if $_G['setting']['domain']['app']['mobile']}-->
		{eval $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];}
	<!--{else}-->
		{eval $nav = "forum.php";}
	<!--{/if}-->
	<div class="xxmhbg">
		<div class="xxmhsm">
			<ul>
				<li class="z sea"><a href="search.php?mod=forum&mobile=2"><em class="xxmfont iconsearch"></em>{lang search}</a></li>
				<!--{if $_G[uid] || $_G['group']['allowpost']}-->
				<li class="y mail"><a href="home.php?mod=space&do=pm"><em class="xxmfont iconmail1 y"><!--{if $_G[member][newpm]}--><i class="xxmfont icondian rq"></i><!--{/if}--></em></a></li>
				<!--{else}-->
				<li class="y mail"><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');"><em class="xxmfont iconmail1 y"><!--{if $_G[member][newpm]}--><i class="xxmfont icondian rq"></i><!--{/if}--></em></a></li>
				<!--{/if}-->
			</ul>
		</div>
	</div>
	<!--{template diy/diy}-->
	<div class="xxmclear"></div>
	<div class="xxmmore">
		<a href="forum.php?forumlist=1" class="grey">{lang more}<i class="xxmfont iconyou xxmfst"></i></a>
	</div>
	<script>
		var bzSwiper = new Swiper ('.diyswiper', {
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		  scrollbar: {
			el: '.swiper-scrollbar',
			hide: true,
		  },
		});
	</script>
	<div class="xxmclear"></div>
	<div class="xxmfooter bgxxmfff xxmbt1">
		<ul class="xxmfootflex">
		<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
		<li class="flex"><a href="forum.php" class="xxmfcs"><i class="xxmfont iconhomefill"></i><span>{lang homepage}</span></a></li>
		<!--{/if}-->
		<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span>{echo xxm('forumlist');}</span></a></li>
		<!--{if $_G[uid] || $_G['group']['allowpost']}-->
		<li class="flex"><a href="forum.php?mod=misc&action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
		<!--{else}-->
		<li class="flex"><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
		<!--{/if}-->
		<li class="flex"><a href="forum.php?mod=guide&view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><!--{if $_G[setting][navs][10][navname]}-->{$_G[setting][navs][10][navname]}<!--{else}-->Loading<!--{/if}--></span></a></li>
		<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="xxmfca"><i class="xxmfont iconpeople"><!--{if $_G[member][newpm]}--><span class="news bg-rq"></span><!--{/if}--></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
		</ul>
	</div>
	<!--{template common/footer}-->

<!--{else}-->


	<!--{template common/header}-->
	<!--{if $_G['setting']['domain']['app']['mobile']}-->
		{eval $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];}
	<!--{else}-->
		{eval $nav = "forum.php";}
	<!--{/if}-->
	<div class="cl bgxxmfff">
		<div class="guidebtn xxmbb1">
			<ul class="cl">
				<li $currentview['new']><a href="forum.php?mod=guide&view=new">{lang reply}</a></li>
				<li $currentview['newthread']><a href="forum.php?mod=guide&view=newthread">{lang latest}</a></li>
				<li $currentview['digest']><a href="forum.php?mod=guide&view=digest">{lang digest}</a></li>
			</ul>
		</div>
	</div>
	<!-- main threadlist start -->
	<div class="xxmlist">
		<!--{loop $data $key $list}-->
			<!--{subtemplate forum/guide_list_row}-->
		<!--{/loop}-->
	</div>
	<!-- main threadlist end -->

	$multipage

	<div class="pullrefresh" style="display:none;"></div>
	<div class="clear"></div>
	<div class="xxmfooter bgxxmfff xxmbt1">
		<ul class="xxmfootflex">
		<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
		<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>{lang homepage}</span></a></li>
		<!--{/if}-->
		<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
		<li class="flex"><a href="forum.php?forumlist=1" class="xxmfca"><i class="xxmfont iconmark"></i><span>{echo xxm('forumlist');}</span></a></li>
		<!--{else}-->
		<li class="flex"><a href="forum.php?forumlist=1&mobile=2&forcemobile=1" class="xxmfca"><i class="xxmfont iconhome"></i><span>{lang homepage}</span></a></li>
		<!--{/if}-->
		<!--{if $_G[uid] || $_G['group']['allowpost']}-->
		<li class="flex"><a href="forum.php?mod=misc&action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
		<!--{else}-->
		<li class="flex"><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
		<!--{/if}-->
		<li class="flex"><a href="forum.php?mod=guide&view=new" class="xxmfcs"><i class="xxmfont icontimefill"></i><span><!--{if $_G[setting][navs][10][navname]}-->{$_G[setting][navs][10][navname]}<!--{else}-->Loading<!--{/if}--></span></a></li>
		<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="xxmfca"><i class="xxmfont iconpeople"><!--{if $_G[member][newpm]}--><span class="news bg-rq"></span><!--{/if}--></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
		</ul>
	</div>
	<!--{template common/footer}-->

<!--{/if}-->
    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     	