<?php echo 'QQ:2399835618';exit;?>
<!--{if $list['threadcount']}-->
	<ul class="hotlist">
	<!--{eval require_once(DISCUZ_ROOT.'./template/xxm_twowap/touch/php/xxmlist.php');}-->
	<!--{loop $list['threadlist'] $key $thread}-->
	<!--{eval $threadtable = substr($thread[tid], -1);}-->
	<!--{eval $img_number = xxmlist_img_num($thread[tid], $thread[authorid], $threadtable);}-->
	<li>
	<!--{if $img_number == 1}-->
		<div class="cardxxmone">
			<div class="img_one">
				<a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=<!--{if $_GET['view'] == 'newthread'}-->newthread<!--{elseif $_GET['view'] == 'hot'}-->hot<!--{elseif $_GET['view'] == 'digest'}-->digest<!--{elseif $_GET['view'] == 'new'}-->new<!--{/if}-->&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
				<!--{eval $list_img1 = xxmlist_img($thread[tid], $thread[authorid], 1, $threadtable);}-->
				<!--{loop $list_img1 $list_img1_1}-->
				<em style="background-image:url({eval echo(getforumimg($list_img1_1[aid],0,200,200))});"></em>
				<!--{/loop}-->
				</a>
			</div>
			<div class="tnr">
				<div class="p">
					<a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=<!--{if $_GET['view'] == 'newthread'}-->newthread<!--{elseif $_GET['view'] == 'hot'}-->hot<!--{elseif $_GET['view'] == 'digest'}-->digest<!--{elseif $_GET['view'] == 'new'}-->new<!--{/if}-->&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
					<h2>
					<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
					<span class="xxmcdis z">{lang thread_sticky} &#8226;</span>
					<!--{/if}-->
					<!--{if $thread['digest'] > 0 }-->
					<span class="xxmcdig z">{lang thread_digest} &#8226;</span>
					<!--{/if}-->
			        <!--{if $thread['special'] == 1}-->
					<span class="xxmcsp z">{lang thread_poll} &#8226;</span>
					<!--{elseif $thread['special'] == 2}-->
					<span class="xxmcsp z">{lang thread_trade} &#8226;</span>
					<!--{elseif $thread['special'] == 3}-->
					<span class="xxmcsp z">{lang thread_reward} &#8226;</span>
					<!--{elseif $thread['special'] == 4}-->
					<span class="xxmcsp z">{lang thread_activity} &#8226;</span>
					<!--{elseif $thread['special'] == 5}-->
					<span class="xxmcsp z">{lang thread_debate} &#8226;</span>
					<!--{/if}-->
					<!--{if $thread['readperm']}--><span class="xxmcsp z">{lang readperm}$thread[readperm] &#8226;</span><!--{/if}-->
					<!--{if $thread['price'] > 0}-->
						<!--{if $thread['special'] == '3'}-->
						<span class="rq">$thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]} &#8226;</span>
						<!--{else}-->
						<span class="rq">{lang price} $thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]} &#8226;</span>
						<!--{/if}-->
					<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
						<span class="grey">{lang resolved} &#8226;</span>
					<!--{/if}-->
					<span $thread[highlight]>$thread[subject]</span>
					</h2>
				</a>
				</div>
				<div class="span grey">
					<!--{if !$thread[author]}-->
			      	<a class="avatar">{avatar($thread[0],small)} <i class="grey">{lang anonymous}</i></a>
			      	<!--{else}-->
			      	<a class="avatar" href="home.php?mod=space&uid=$thread[authorid]&do=profile">{avatar($thread[authorid],small)} <i class="grey">$thread[author]</i></a>
			      	<!--{/if}-->
					<!--{if $view == 'new'}-->
					{lang guide_new} $thread[lastpost]
					<!--{else}-->
					$thread[dateline]
					<!--{/if}-->
					<!--{if {$thread[replies]} > 0}--><em class="xxmfont iconcomment xxmfst">{$thread[replies]}</em><!--{/if}-->
					<em class="xxmfont iconbrowse xxmfst">$thread[views]</em>
				</div>
			</div>
		</div>
	<!--{elseif $img_number == 2}-->
		<div class="cardxxmt">
	        <header class="xxmfdtlh">
	            <div class="xxmfdtlhl">
			        <!--{if !$thread[author]}-->
	              	<a class="avatar">{avatar($thread[0],middle)}</a>
	              	<!--{else}-->
	              	<a class="avatar" href="home.php?mod=space&uid=$thread[authorid]&do=profile">{avatar($thread[authorid],middle)}</a>
	              	<!--{/if}-->
			    </div>
			    	<div class="xxmfdtlhm">
				    <div class="name">
						<!--{if !$thread[author]}-->
						<a class="grey">{lang anonymous}</a>
						<!--{else}-->
						<a href="home.php?mod=space&uid=$thread[authorid]&do=profile" class="blue">$thread[author]</a>
						<!--{/if}-->
				    </div>
				    <div class="data">
				   		<!--{if $view == 'new'}-->
				   		<span class="grey xxmfst">{lang guide_new} $thread[lastpost]</span>
				   		<!--{else}-->
				   		<span class="grey xxmfst">$thread[dateline]</span>
				   		<!--{/if}-->
				   		<!--{if $thread['isgroup'] != 1}-->
					   		<!--{if $thread[replies] > 0}-->
					   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>$thread[replies]</em></span>
					   		<!--{/if}-->
					   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>$thread[views]</em></span>
				   		<!--{else}-->
					   		<!--{if {$groupnames[$thread[tid]][replies]} > 0}-->
					   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>{$groupnames[$thread[tid]][replies]}</em></span>
					   		<!--{/if}-->
					   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>{$groupnames[$thread[tid]][views]}</em></span>
				   		<!--{/if}-->
				    </div>
			    </div>
	        </header>
	        <section class="xxmfdtlb cl">
				<a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=<!--{if $_GET['view'] == 'newthread'}-->newthread<!--{elseif $_GET['view'] == 'hot'}-->hot<!--{elseif $_GET['view'] == 'digest'}-->digest<!--{elseif $_GET['view'] == 'new'}-->new<!--{/if}-->&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
	            <!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
					<!--{eval $thread[tid]=$thread[closed];}-->
				<!--{/if}-->
	            <h2>
	            <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
				<span class="xxmcdis z">{lang thread_sticky} &#8226;</span>
				<!--{/if}-->
				<!--{if $thread['digest'] > 0 }-->
				<span class="xxmcdig z">{lang thread_digest} &#8226;</span>
				<!--{/if}-->
	            <!--{if $thread['special'] == 1}-->
				<span class="xxmcsp z">{lang thread_poll} &#8226;</span>
				<!--{elseif $thread['special'] == 2}-->
				<span class="xxmcsp z">{lang thread_trade} &#8226;</span>
				<!--{elseif $thread['special'] == 3}-->
				<span class="xxmcsp z">{lang thread_reward} &#8226;</span>
				<!--{elseif $thread['special'] == 4}-->
				<span class="xxmcsp z">{lang thread_activity} &#8226;</span>
				<!--{elseif $thread['special'] == 5}-->
				<span class="xxmcsp z">{lang thread_debate} &#8226;</span>
				<!--{/if}-->
				<!--{if $thread['readperm']}--><span class="xxmcsp z">{lang readperm}$thread[readperm] &#8226;</span><!--{/if}-->
				<!--{if $thread['price'] > 0}-->
					<!--{if $thread['special'] == '3'}-->
					<span class="rq">$thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]} &#8226;</span>
					<!--{else}-->
					<span class="rq">{lang price} $thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]} &#8226;</span>
					<!--{/if}-->
				<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
					<span class="grey">{lang resolved} &#8226;</span>
				<!--{/if}-->
	            	<span $thread[highlight]>$thread[subject]</span>
	            </h2>
				<div class="img_two">
				<!--{eval $list_img2 = xxmlist_img($thread[tid], $thread[authorid], 2, $threadtable);}-->
				<!--{loop $list_img2 $list_img2_1}-->
				<em style="background-image:url({eval echo(getforumimg($list_img2_1[aid],0,300,300))});"></em>
				<!--{/loop}-->
				</div>
	       	   </a>
	        </section>
	    </div>
	<!--{elseif $img_number > 2}-->
        <div class="cardxxmt">
            <header class="xxmfdtlh">
	            <div class="xxmfdtlhl">
			        <!--{if !$thread[author]}-->
	              	<a class="avatar">{avatar($thread[0],middle)}</a>
	              	<!--{else}-->
	              	<a class="avatar" href="home.php?mod=space&uid=$thread[authorid]&do=profile">{avatar($thread[authorid],middle)}</a>
	              	<!--{/if}-->
			    </div>
			    	<div class="xxmfdtlhm">
				    <div class="name">
						<!--{if !$thread[author]}-->
						<a class="grey">{lang anonymous}</a>
						<!--{else}-->
						<a href="home.php?mod=space&uid=$thread[authorid]&do=profile" class="blue">$thread[author]</a>
						<!--{/if}-->
				    </div>
				    <div class="data">
				   		<!--{if $view == 'new'}-->
				   		<span class="grey xxmfst">{lang guide_new} $thread[lastpost]</span>
				   		<!--{else}-->
				   		<span class="grey xxmfst">$thread[dateline]</span>
				   		<!--{/if}-->
				   		<!--{if $thread['isgroup'] != 1}-->
					   		<!--{if $thread[replies] > 0}-->
					   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>$thread[replies]</em></span>
					   		<!--{/if}-->
					   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>$thread[views]</em></span>
				   		<!--{else}-->
					   		<!--{if {$groupnames[$thread[tid]][replies]} > 0}-->
					   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>{$groupnames[$thread[tid]][replies]}</em></span>
					   		<!--{/if}-->
					   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>{$groupnames[$thread[tid]][views]}</em></span>
				   		<!--{/if}-->
				    </div>
			    </div>
            </header>
            <section class="xxmfdtlb cl">
				<a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=<!--{if $_GET['view'] == 'newthread'}-->newthread<!--{elseif $_GET['view'] == 'hot'}-->hot<!--{elseif $_GET['view'] == 'digest'}-->digest<!--{elseif $_GET['view'] == 'new'}-->new<!--{/if}-->&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
                <!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
					<!--{eval $thread[tid]=$thread[closed];}-->
				<!--{/if}-->
                <h2>
                <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
				<span class="xxmcdis z">{lang thread_sticky} &#8226;</span>
				<!--{/if}-->
				<!--{if $thread['digest'] > 0 }-->
				<span class="xxmcdig z">{lang thread_digest} &#8226;</span>
				<!--{/if}-->
                <!--{if $thread['special'] == 1}-->
				<span class="xxmcsp z">{lang thread_poll} &#8226;</span>
				<!--{elseif $thread['special'] == 2}-->
				<span class="xxmcsp z">{lang thread_trade} &#8226;</span>
				<!--{elseif $thread['special'] == 3}-->
				<span class="xxmcsp z">{lang thread_reward} &#8226;</span>
				<!--{elseif $thread['special'] == 4}-->
				<span class="xxmcsp z">{lang thread_activity} &#8226;</span>
				<!--{elseif $thread['special'] == 5}-->
				<span class="xxmcsp z">{lang thread_debate} &#8226;</span>
				<!--{/if}-->
				<!--{if $thread['readperm']}--><span class="xxmcsp z">{lang readperm}$thread[readperm] &#8226;</span><!--{/if}-->
				<!--{if $thread['price'] > 0}-->
					<!--{if $thread['special'] == '3'}-->
					<span class="rq">$thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]} &#8226;</span>
					<!--{else}-->
					<span class="rq">{lang price} $thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]} &#8226;</span>
					<!--{/if}-->
				<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
					<span class="grey">{lang resolved} &#8226;</span>
				<!--{/if}-->
                	<span $thread[highlight]>$thread[subject]</span>
                </h2>
				<div class="img_three">
				<!--{eval $list_img3 = xxmlist_img($thread[tid], $thread[authorid], 3, $threadtable);}-->
				<!--{loop $list_img3 $list_img3_1}-->
				<em style="background-image:url({eval echo(getforumimg($list_img3_1[aid],0,500,500))});"></em>
				<!--{/loop}-->
				</div>
           	   </a>
            </section>
        </div>
    <!--{elseif $img_number == 0}-->
        <div class="cardxxmt">
            <header class="xxmfdtlh">
	            <div class="xxmfdtlhl">
			        <!--{if !$thread[author]}-->
	              	<a class="avatar">{avatar($thread[0],middle)}</a>
	              	<!--{else}-->
	              	<a class="avatar" href="home.php?mod=space&uid=$thread[authorid]&do=profile">{avatar($thread[authorid],middle)}</a>
	              	<!--{/if}-->
			    </div>
			    	<div class="xxmfdtlhm">
				    <div class="name">
						<!--{if !$thread[author]}-->
						<a class="grey">{lang anonymous}</a>
						<!--{else}-->
						<a href="home.php?mod=space&uid=$thread[authorid]&do=profile" class="blue">$thread[author]</a>
						<!--{/if}-->
				    </div>
				    <div class="data">
				   		<!--{if $view == 'new'}-->
				   		<span class="grey xxmfst">{lang guide_new} $thread[lastpost]</span>
				   		<!--{else}-->
				   		<span class="grey xxmfst">$thread[dateline]</span>
				   		<!--{/if}-->
				   		<!--{if $thread['isgroup'] != 1}-->
					   		<!--{if $thread[replies] > 0}-->
					   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>$thread[replies]</em></span>
					   		<!--{/if}-->
					   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>$thread[views]</em></span>
				   		<!--{else}-->
					   		<!--{if {$groupnames[$thread[tid]][replies]} > 0}-->
					   		<span class="grey y">&nbsp;&nbsp;<i class="xxmfont iconcomment xxmfst"></i><em>{$groupnames[$thread[tid]][replies]}</em></span>
					   		<!--{/if}-->
					   		<span class="grey y"><i class="xxmfont iconbrowse xxmfst"></i><em>{$groupnames[$thread[tid]][views]}</em></span>
				   		<!--{/if}-->
				    </div>
			    </div>
            </header>
            <section class="xxmfdtlb cl">
				<a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=<!--{if $_GET['view'] == 'newthread'}-->newthread<!--{elseif $_GET['view'] == 'hot'}-->hot<!--{elseif $_GET['view'] == 'digest'}-->digest<!--{elseif $_GET['view'] == 'new'}-->new<!--{/if}-->&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
                <!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
					<!--{eval $thread[tid]=$thread[closed];}-->
				<!--{/if}-->
                <h2>
                <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
				<span class="xxmcdis z">{lang thread_sticky} &#8226;</span>
				<!--{/if}-->
				<!--{if $thread['digest'] > 0 }-->
				<span class="xxmcdig z">{lang thread_digest} &#8226;</span>
				<!--{/if}-->
                <!--{if $thread['special'] == 1}-->
				<span class="xxmcsp z">{lang thread_poll} &#8226;</span>
				<!--{elseif $thread['special'] == 2}-->
				<span class="xxmcsp z">{lang thread_trade} &#8226;</span>
				<!--{elseif $thread['special'] == 3}-->
				<span class="xxmcsp z">{lang thread_reward} &#8226;</span>
				<!--{elseif $thread['special'] == 4}-->
				<span class="xxmcsp z">{lang thread_activity} &#8226;</span>
				<!--{elseif $thread['special'] == 5}-->
				<span class="xxmcsp z">{lang thread_debate} &#8226;</span>
				<!--{/if}-->
				<!--{if $thread['readperm']}--><span class="xxmcsp z">{lang readperm}$thread[readperm] &#8226;</span><!--{/if}-->
				<!--{if $thread['price'] > 0}-->
					<!--{if $thread['special'] == '3'}-->
					<span class="rq">$thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]} &#8226;</span>
					<!--{else}-->
					<span class="rq">{lang price} $thread[price] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]} &#8226;</span>
					<!--{/if}-->
				<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
					<span class="grey">{lang resolved} &#8226;</span>
				<!--{/if}-->
                	<span $thread[highlight]>$thread[subject]</span>
                </h2>
           	   </a>
            </section>
        </div>
    <!--{/if}-->
    </li>
	<!--{/loop}-->
	</ul>
<!--{else}-->
	<p class="b_p hm grey xxmbb1">{lang guide_nothreads}</p>
<!--{/if}-->

