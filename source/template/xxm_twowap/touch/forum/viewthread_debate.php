<?php echo 'QQ:2399835618';exit;?>
<div class="cl xxm_debate mbw">
	<!--{if $debate[endtime]}-->
	<div class="grey xxmfst cl hm">{lang endtime}: $debate[endtime] <!--{if $debate[umpire]}--><em class="name">{lang debate_umpire}: $debate[umpire]</em><!--{/if}--></div>
	<!--{/if}-->
	<div class="mtw mbw cl xxm_debate-box">

	    <div class="z xxm_debate-half square">
		    	<div class="main b_p cl">
		    		<div class="z info">
			        <p class="statement">$debate[affirmpoint]</p>
				</div>
				<div class="y point_chart">
					<div class="chart" style="height: {echo $debate[affirmvoteswidth]}%;" title="{lang debate_square} ($debate[affirmvotes])"></div>
				</div>
				<!--{if !$_G['forum_thread']['is_archived']}-->
				<div class="xxmclear"></div>
			    <div class="mtm mbm btn-big">
		        		<!--{if !$_G['uid']}-->
					<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="touch_square">{lang debate_support}&#27491;&#26041;</a>
		            <!--{else}-->
					<a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=1" id="affirmbutton" class="touch_square dialog">{lang debate_support}&#27491;&#26041;</a>
					<!--{/if}-->
				</div>
				<!--{/if}-->
			    <div class="grey xxmfst cl hm">$debate[affirmvotes] &#20154;</div>
		    </div>
		    	<!--{if $debate[affirmdebaters] > 0 }-->
		    	<div class="xxmclear"></div>
	        <div class="debater grey xxmfst cl mbw b_p" style="display: none;">
	        		{lang debater}: 
	        		<!--{loop $debate[affirmavatars] $user}--><a href="home.php?mod=space&uid=$user[authorid]&do=profile" class="blue">$user[author] </a><!--{/if}-->
	        </div>
	        <!--{/if}-->
	    </div>
	    
	    <div class="y xxm_debate-half opponent">
			<div class="main b_p cl">
				<div class="y info">
			        <p class="statement">$debate[negapoint]</p>
			    </div>
			    <div class="z point_chart">
					<div class="chart" style="height: {echo $debate[negavoteswidth]}%;" title="{lang debate_opponent} ($debate[negavotes])"></div>
			    </div>
		        <div class="xxmclear"></div>
		        <div class="mtm mbm btn-big">
		        		<!--{if !$_G['uid']}-->
					<a href="javascript:popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');" class="touch_opponent">{lang debate_support}&#21453;&#26041;</a>
		            <!--{else}-->
					<a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=2" id="negabutton" class="touch_opponent dialog">{lang debate_support}&#21453;&#26041;</a>
					<!--{/if}-->
				</div>
			    <div class="grey xxmfst cl hm">$debate[negavotes] &#20154;</div>
		    </div>
		    <!--{if $debate[negadebaters] > 0 }-->
		    <div class="xxmclear"></div>
	        <div class="grey xxmfst cl mbw" style="display: none;">
	        		{lang debater}: 
	        		<!--{loop $debate[negaavatars] $user}--><a href="home.php?mod=space&uid=$user[authorid]&do=profile" class="blue">$user[author] </a><!--{/if}-->
	        </div>
	        <!--{/if}-->
	    </div>
	    
    </div>

	<!--{if !$_G['forum_thread']['is_archived']}-->
	<div class="xxm_debater">
		<div class="cl mbm">
			<div class="title z xxmfst">&#27491;&#26041;{lang debater}: </div>
			<div class="image z">
				<ul class="cl">
					<!--{loop $debate[affirmavatars] $user}-->
					<li class="z">
						<a title="$user[author]" href="home.php?mod=space&uid=$user[authorid]&do=profile" class="avt">$user[avatar]</a>
					</li>
					<!--{/if}-->
				</ul>
			</div>
		</div>
		<div class="cl">
			<div class="title z xxmfst">&#21453;&#26041;{lang debater}: </div>
			<div class="image z">
				<ul class="cl">
					<!--{loop $debate[negaavatars] $user}-->
					<li class="z">
						<a title="$user[author]" href="home.php?mod=space&uid=$user[authorid]&do=profile" class="avt">$user[avatar]</a>
					</li>
					<!--{/if}-->
				</ul>
			</div>
		</div>
	</div>
	<!--{/if}-->

	<!--{if $debate[umpire] && $_G['username'] && $debate[umpire] == $_G['member']['username']}-->
	<div class="xxmclear"></div>
	<div class="mtw mbw grey xxmfst cl hm">
		<p>{lang mobile2version}&#26242;&#19981;{lang debate_support} " {lang debate_umpire_end}/{lang debate_umpirepoint_edit} "</p>
		<p>&#35831;&#20351;&#29992;{lang nomobiletype}{lang manage}{lang thread_debate}&#20027;&#39064;</p>
	</div>
	<!--{/if}-->
</div>

<!--{if $debate[umpire]}-->
	<!--{if $debate['umpirepoint']}-->
	<div class="cl xxm_debate b_p mtw mbw">
		<div class="hm mtw">
		<!--{if $debate[winner]}-->
			<!--{if $debate[winner] == 1}-->{lang debate_square}{lang debate_winner}<!--{elseif $debate[winner] == 2}-->{lang debate_opponent}{lang debate_winner}<!--{else}-->{lang debate_draw}<!--{/if}-->
		<!--{/if}-->
		</div>
		<div class="grey xxmfst cl hm">{lang debate_comment_dateline}: $debate[endtime]</div>
		<!--{if $debate[bestdebater]}-->
		<div class="hm mtw">{lang debate_bestdebater}</div>
		<div class="blue xxmfst cl hm">$debate[bestdebater]</div>
		<!--{/if}-->
		<!--{if $debate[umpirepoint]}-->
		<div class="hm mtw">{lang debate_umpirepoint}</div>
		<div class="grey xxmfst cl hm mbw">$debate[umpirepoint]</div>
		<!--{/if}-->
	</div>
	<!--{/if}-->
<!--{/if}-->

<div class="xxmclear"></div>
<div id="postmessage_$post[pid]" class="postmessage mtw mbw">$post[message]</div>

