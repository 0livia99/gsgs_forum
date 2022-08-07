<?php echo 'QQ:2399835618';exit;?>
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->

<!--{if !$_GET['mycenter']}-->
	
	<!-- header start -->
	
	<!-- header end -->
	<!-- userinfo start -->
	<div class="user_notmy_info">
		<div class="user_notmy_bg" style="background-image: url(<!--{avatar($space[uid], big, true)}-->);background-size: cover;">
			<div class="user_notmy_avatar_h">
				<div class="user_notmy_avatar_h_l"><a href="javascript:history.back();" class="z xxmfont iconzuo"></a></div>
				<h2></h2>
				<div class="user_notmy_avatar_h_r"><a href="forum.php" class="y xxmfont iconhome"></a></div>
			</div>
			<div class="user_notmy_avatar">
				<div class="avatar_m"><span><img src="<!--{avatar($space[uid], big, true)}-->" /></span></div>
				<h2 class="name white fts">$space[username]</h2>
				<p>
					<span class="tips">Lv.{$_G['cache']['usergroups'][$space[groupid]][stars]}</span>
					<!--{if $space[gender]}-->
					{if $space[gender] == 1}<span class="tips">{lang male}</span>{elseif $space[gender] == 2}<span class="tips">{lang female}</span>{/if}
					<!--{/if}-->
				</p>
			</div>
			<!--{if $space[self]}-->
			<!--{else}-->
			<div class="user_notmy_avatar_bottom">
				<!--{if $_G[uid]}-->
				<a href="home.php?mod=space&do=pm&subop=view&touid=$space[uid]&mobile=2" class="xxmfst pm">{lang send_pm}</a>
				<!--{else}-->
				<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfst pm">{lang send_pm}</a>
				<!--{/if}-->
				<!--{if helper_access::check_module('follow')}-->
				<!--{eval $follow = 0;}-->
				<!--{eval $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);}-->
				<!--{if !$follow}-->
				<a href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$space[uid]" class="dialog xxmfst follow xxmsmallbg">{echo xxm('follow_add');}</a>
				<!--{else}-->
				<a href="home.php?mod=spacecp&ac=follow&op=del&fuid=$space[uid]" class="dialog xxmfst followed">{echo xxm('follow_del');}</a>
				<!--{/if}-->
				<!--{/if}-->
			</div>
			<!--{/if}-->
		</div>
		<div class="user_notmy_avatar_cover"></div>
		<div class="user_notmy_avatar_cover_yuanjiao"></div>
		<div class="user_notmy_avatar_info xxmbb1 cl">
			<ul class="cl">
				<!--{if $_G[uid]}-->
				<!--{eval $space['posts'] = $space['posts'] - $space['threads'];}-->
				<li>
					<div><span>$space[threads]</span></div>
					<div><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread" class="blue xxmfst"><em>{lang topic}</em></a></div>
				</li>
				<li>
					<div><span>$space[posts]</span></div>
					<div><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=reply" class="blue xxmfst"><em>{lang reply}</em></a></div>
				</li>
				<li>
					<div><span>$space['following']</span></div>
					<div><a href="home.php?mod=follow&do=following&uid=$space[uid]" class="blue xxmfst"><em>{echo xxm('follow_add');}</em></a></div>
				</li>
				<li>
					<div><span>$space['follower']</span></div>
					<div><a href="home.php?mod=follow&do=follower&uid=$space[uid]" class="blue xxmfst"><em>{echo xxm('follow_er');}</em></a></div>
				</li>
				<!--{else}-->
				<li>
					<div><span>$space[threads]</span></div>
					<div><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em>{lang topic}</em></a></div>
				</li>
				<li>
					<div><span>$space[posts]</span></div>
					<div><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em>{lang reply}</em></a></div>
				</li>
				<li>
					<div><span>$space['following']</span></div>
					<div><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em>{echo xxm('follow_add');}</em></a></div>
				</li>
				<li>
					<div><span>$space['follower']</span></div>
					<div><a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="blue xxmfst"><em>{echo xxm('follow_er');}</em></a></div>
				</li>
				<!--{/if}-->
			</ul>
		</div>
		<div class="user_notmy_box">
			<ul>
				<li>{lang users}ID<span>$space[uid]</span></li>
				<!--{if $space[adminid]}-->
				<li>{lang management_team}<span>{$space[admingroup][grouptitle]}</span></li>
				<!--{/if}-->
				<li>{lang usergroup}<span>{$space[group][grouptitle]}</span></li>
				<li>{lang credits}<span>$space[credits]</span></li>
				<!--{loop $_G[setting][extcredits] $key $value}-->
				<!--{if $value[title]}-->
				<li>$value[title]<span>{$space["extcredits$key"]} $value[unit]</span></li>
				<!--{/if}-->
				<!--{/loop}-->
				<!--{if $profiles}-->
				<!--{loop $profiles $value}-->
				<li>$value[title]<span>$value[value]</span></li>
				<!--{/loop}-->
				<!--{/if}-->
			</ul>
		</div>
	</div>
	<!-- userinfo end -->

<!--{else}-->
	
	<!--{if $_G['setting']['domain']['app']['mobile']}-->
		{eval $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];}
	<!--{else}-->
		{eval $nav = "forum.php";}
	<!--{/if}-->

	<!-- userinfo start -->
	<div class="userinfo">
		<div class="user_avatar cl xxmsmallbg">
			<div class="avatar_m"><span><a href=""><img src="<!--{avatar($_G[uid], big, true)}-->" /></a></span></div>
			<h2 class="white name fts">$_G[username]</h2>
			<p>
				<span class="tips xxmfcs">Lv.{$_G['cache']['usergroups'][$space[groupid]][stars]}</span>
				<!--{if $space[gender]}-->
				{if $space[gender] == 1}<span class="tips xxmfcs">{lang male}</span>{elseif $space[gender] == 2}<span class="tips xxmfcs">{lang female}</span>{/if}
				<!--{/if}-->
			</p>
		</div>
		<div class="user_avatar_yuanjiao"></div>
		<div class="user_avatar_info xxmbb1 cl">
			<!--{eval $space['posts'] = $space['posts'] - $space['threads'];}-->
			<ul class="cl">
				<li>
					<div><span>$space[threads]</span></div>
					<div><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread" class="blue xxmfst"><em>{lang topic}</em></a></div>
				</li>
				<li>
					<div><span>$space[posts]</span></div>
					<div><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=reply" class="blue xxmfst"><em>{lang reply}</em></a></div>
				</li>
				<li>
					<div><span>$space['following']</span></div>
					<div><a href="home.php?mod=follow&do=following&uid={$_G[uid]}" class="blue xxmfst"><em>{echo xxm('follow_add');}</em></a></div>
				</li>
				<li>
					<div><span>$space['follower']</span></div>
					<div><a href="home.php?mod=follow&do=follower&uid={$_G[uid]}" class="blue xxmfst"><em>{echo xxm('follow_er');}</em></a></div>
				</li>
			</ul>
		</div>
		<div class="myinfo_list cl mtm">
			<ul>
				<li><a href="home.php?mod=space&uid={$_G[uid]}&do=profile" class="xxmbb1">{lang visit_my_space}<span class="y xxmfont iconyou ddd"></span></a></li>
				<li><a href="home.php?mod=spacecp&ac=usergroup&do=forum" class="xxmbb1">{lang my_usergroups}<span class="y xxmfont iconyou ddd"></span><em class="y xxmfst grey">{$space[group][grouptitle]}&nbsp;&nbsp;</em></a></li>
				<li><a href="home.php?mod=spacecp&ac=credit" class="xxmbb1">{lang credits}{lang buy_credits}<span class="y xxmfont iconyou ddd"></span><em class="y xxmfst grey">$space[credits]&nbsp;{lang credits}&nbsp;&nbsp;</em></a></li>
				<li><a href="home.php?mod=space&do=pm" class="xxmbb1">{lang mypm}<span class="y xxmfont iconyou ddd"></span><!--{if $_G[member][newpm]}--><i class="xxmfont icondian rq y"></i><!--{/if}--></a></li>
				<li><a href="home.php?mod=space&do=favorite&type=all" class="xxmbb1">{lang myfavorite}<span class="y xxmfont iconyou ddd"></span></a></li>
				<li><a href="misc.php?mod=tag" class="xxmbb1">{echo xxm('tags');}<span class="y xxmfont iconyou ddd"></span></a></li>
				<li><a href="forum.php?mod=announcement" class="xxmbb1">{echo xxm('announcement');}<span class="y xxmfont iconyou ddd"></span></a></li>
				<li><a href="misc.php?mod=faq" class="xxmbb1">{lang faq}<span class="y xxmfont iconyou ddd"></span></a></li>
				<li class="xxmbb1"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}" class="dialog">{lang logout_mobile}<span class="y xxmfont iconyou ddd"></span></a></li>
			</ul>
		</div>
	</div>
	<!-- userinfo end -->
	
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
		<li class="flex"><a href="forum.php?mod=misc&action=nav" class="xxmfcs"><i class="xxmfont iconjiahao"></i><span>{lang send_threads}</span></a></li>
		<li class="flex"><a href="forum.php?mod=guide&view=new" class="xxmfca"><i class="xxmfont icontime"></i><span><!--{if $_G[setting][navs][10][navname]}-->{$_G[setting][navs][10][navname]}<!--{else}-->Loading<!--{/if}--></span></a></li>
		<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="xxmfcs"><i class="xxmfont iconpeoplefill"><!--{if $_G[member][newpm]}--><span class="news bg-rq"></span><!--{/if}--></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
		</ul>
	</div>

<!--{/if}-->


    		  	  		  	  		     	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		 	      	  		  	  		     	
<!--{template common/footer}-->