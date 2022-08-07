<?php echo 'QQ:2399835618';exit;?>
<!--{if $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1 && $_G['setting']['guidestatus']}-->
	<!--{eval dheader('Location:forum.php?mod=guide&view=hot&mobile=2&forcemobile=1');exit;}-->
<!--{/if}-->
<!--{template common/header}-->

<script type="text/javascript">
	function getvisitclienthref() {
		var visitclienthref = '';
		if(ios) {
			visitclienthref = 'https://itunes.apple.com/cn/app/zhang-shang-lun-tan/id489399408?mt=8';
		} else if(andriod) {
			visitclienthref = 'http://www.discuz.net/mobile.php?platform=android';
		}
		return visitclienthref;
	}
</script>

<!--{if $_GET['visitclient']}-->

<header class="header">
    <div class="nav">
		<span>{lang warmtip}</span>
    </div>
</header>
<div class="cl">
	<div class="clew_con">
		<h2 class="tit">{lang zsltmobileclient}</h2>
		<p>{lang visitbbsanytime}<input class="redirect button" id="visitclientid" type="button" value="{lang clicktodownload}" href="" /></p>
		<h2 class="tit">{lang iphoneandriodmobile}</h2>
		<p>{lang visitwapmobile}<input class="redirect button" type="button" value="{lang clicktovisitwapmobile}" href="$_GET[visitclient]" /></p>
	</div>
</div>
<script type="text/javascript">
	var visitclienthref = getvisitclienthref();
	if(visitclienthref) {
		$('#visitclientid').attr('href', visitclienthref);
	} else {
		window.location.href = '$_GET[visitclient]';
	}
</script>

<!--{else}-->

<!-- header start -->
<!--{if $showvisitclient}-->

<div class="visitclienttip vm" style="display:block;">
	<a href="javascript:;" id="visitclientid" class="btn_download">{lang downloadnow}</a>	
	<p>
		{lang downloadzslttoshareview}
	</p>
</div>
<script type="text/javascript">
	var visitclienthref = getvisitclienthref();
	if(visitclienthref) {
		$('#visitclientid').attr('href', visitclienthref);
		$('.visitclienttip').css('display', 'block');
	}
</script>

<!--{/if}-->

<!--{if $_G['setting']['domain']['app']['mobile']}-->
	{eval $nav = $_G['scheme'].'://'.$_G['setting']['domain']['app']['mobile'];}
<!--{else}-->
	{eval $nav = "forum.php";}
<!--{/if}-->
<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
<!--{else}-->
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
<!--{/if}-->
<!--{hook/index_top_mobile}-->
<div class="xxmdis_ad"><!--{ad/custom_4/hm}--></div>

<!--{if $announcements}-->
<div class="mtm xxmbb1">
<div class="ann-box">
	<div class="mtit">{lang announcements}</div>
	<div id="ann"><ul>$announcements</ul></div>
</div>
</div>
<script type="text/javascript">discuz_loop(24, 30, 3000, 'ann');</script>
<!--{/if}-->

<div class="wp cl">
	<!--{loop $catlist $key $cat}-->	
	<div class="bm">
		<div class="subforumshow bm_h cl <!--{if !$_G[setting][mobile][mobileforumview]}--><!--{else}-->subforumclose<!--{/if}-->" href="#sub_forum_$cat[fid]">
			<h2><a href="javascript:;">$cat[name]</a><code></code></h2>
		</div>
		
		<!--{if $cat['forumcolumns'] == 3}-->
	
		<div class="sub_forum_box3">
			<div id="sub_forum_$cat[fid]" class="sub-forum3 sub_forum cl">
				<ul>
					<!--{loop $cat[forums] $forumid}-->
					<!--{eval $forum=$forumlist[$forumid];}-->
					<li>
						<span class="micon">
							<!--{if $forum[icon]}-->
							$forum[icon]
							<!--{else}-->
							<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="{$_G['style']['styleimgdir']}/images/forum-icon.png" alt="$forum[name]" /></a>
							<!--{/if}-->
							<!--{if $forum[todayposts] > 0}--><i class="news xxmsmallbg">$forum[todayposts]</i><!--{/if}-->
						</span>
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="murl">
							<p class="mtit">{$forum['name']}</p>
						</a>
					</li>
					<!--{/loop}-->
				</ul>
			</div>
		</div>
		
		<!--{elseif $cat['forumcolumns'] == 2}-->
		
		<div class="sub_forum_box2">
			<div id="sub_forum_$cat[fid]" class="sub-forum2 sub_forum cl">
				<ul>
					<!--{loop $cat[forums] $forumid}-->
					<!--{eval $forum=$forumlist[$forumid];}-->
					<li>
						<span class="micon">
							<!--{if $forum[icon]}-->
							$forum[icon]
							<!--{else}-->
							<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="{$_G['style']['styleimgdir']}/images/forum-icon.png" alt="$forum[name]" /></a>
							<!--{/if}-->
						</span>
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="murl">
							<p class="mtit">{$forum['name']}</p>
							<div class="mtxt">
								<div class="info-item">
									<i class="grey xxmfont iconposts xxmfst"></i>
									<span class="grey"><!--{echo dnumber($forum[threads])}--></span>
								</div>
								<div class="info-item">
									<i class="grey xxmfont iconmessage xxmfst"></i>
									<span class="grey"><!--{echo dnumber($forum[posts])}--></span>
								</div>
								<!--{if $forum[todayposts] > 0}-->
								<div class="info-item">
									<i class="news xxmfont iconcreativefill xxmfst">
									<span>$forum[todayposts]</i></span>
								</div>
								<!--{/if}-->
							</div>
						</a>
					</li>
					<!--{/loop}-->
				</ul>
			</div>
		</div>
		
		<!--{elseif $cat['forumcolumns'] == 1 || $cat['forumcolumns'] == 0}-->
		
		<div class="sub-forum-box1">
			<div id="sub_forum_$cat[fid]" class="sub-forum1 sub_forum cl">
				<ul>
				<!--{loop $cat[forums] $forumid}-->
				<!--{eval $forum=$forumlist[$forumid];}-->
				<!--{eval $forum_favlist = C::t('home_favorite')->fetch_by_id_idtype($forum['fid'], 'fid', $_G['uid']);}-->
				<li>
					<div class="list-item">
						<!--{if $forum[icon]}-->
						$forum[icon]
						<!--{else}-->
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="{$_G['style']['styleimgdir']}/images/forum-icon.png" alt="$forum[name]" /></a>
						<!--{/if}-->
						<div class="content">
							<div class="title">
								<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}">{$forum[name]}</a>
								<a href="home.php?mod=spacecp&ac=favorite&type=forum&id=$forum['fid']&handlekey=favoriteforum&formhash={FORMHASH}" class="y xxm-dis-fav dialog">
								<!--{if $forum_favlist && $_G['uid']}--><em class="grey xxmfont iconcollection_fill"></em><!--{else}--><em class="grey xxmfont iconcollection"></em><!--{/if}-->
								</a>
							</div>
							<!--{if $forum[description]}-->
							<div class="desc grey">$forum[description]</div>
							<!--{/if}-->
							<div class="info">
								<div class="info-item">
									<i class="grey xxmfont iconposts xxmfst"></i>
									<span class="text grey"> <!--{echo dnumber($forum[threads])}--></span>
								</div>
								<div class="info-item">
									<i class="grey xxmfont iconmessage xxmfst"></i>
									<span class="text grey"> <!--{echo dnumber($forum[posts])}--><!--{if $forum[todayposts] > 0}--><i class="news xxmfont iconcreativefill xxmfst">$forum[todayposts]</i><!--{/if}--></span>
								</div>
							</div>
						</div>
					</div>
				</li>
				<!--{/loop}-->
				</ul>
			</div>
		</div>

		<!--{else}-->
		
		<div class="sub_forum_box4">
			<div id="sub_forum_$cat[fid]" class="sub-forum4 sub_forum cl">
				<ul>
					<!--{loop $cat[forums] $forumid}-->
					<!--{eval $forum=$forumlist[$forumid];}-->
					<li>
						<span class="micon">
							<!--{if $forum[icon]}-->
							$forum[icon]
							<!--{else}-->
							<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="{$_G['style']['styleimgdir']}/images/forum-icon.png" alt="$forum[name]" /></a>
							<!--{/if}-->
							<!--{if $forum[todayposts] > 0}--><i class="news xxmsmallbg">$forum[todayposts]</i><!--{/if}-->
						</span>
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="murl">
							<p class="mtit">{$forum['name']}</p>
						</a>
					</li>
					<!--{/loop}-->
				</ul>
			</div>
		</div>
		
		<!--{/if}-->
	
	</div>
	<!--{/loop}-->
</div>

<!--{hook/index_middle_mobile}-->
<script type="text/javascript">
	(function() {
		<!--{if !$_G[setting][mobile][mobileforumview]}-->
			$('.sub_forum').css('display', 'block');
		<!--{else}-->
			$('.sub_forum').css('display', 'none');
		<!--{/if}-->
		$('.subforumshow').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
			subobj.css('display', 'block');
			obj.removeClass('subforumclose');
			} else {
			subobj.css('display', 'none');
			obj.addClass('subforumclose');
			}
		});
	 })();
</script>

<!--{/if}-->
<div class="clear"></div>
<div class="xxmfooter bgxxmfff xxmbt1">
	<ul class="xxmfootflex">
	<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
	<li class="flex"><a href="forum.php" class="xxmfca"><i class="xxmfont iconhome"></i><span>{lang homepage}</span></a></li>
	<!--{/if}-->
	<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
	<li class="flex"><a href="forum.php?forumlist=1" class="xxmfcs"><i class="xxmfont iconmarkfill"></i><span>{echo xxm('forumlist');}</span></a></li>
	<!--{else}-->
	<li class="flex"><a href="forum.php?forumlist=1&mobile=2&forcemobile=1" class="xxmfcs"><i class="xxmfont iconhomefill"></i><span>{lang homepage}</span></a></li>
	<!--{/if}-->
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