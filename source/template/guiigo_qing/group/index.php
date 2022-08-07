<?php exit('贵古互联版权所有 客服QQ:99972466');?>
<!--{template common/header}-->
{eval $forumfield = C::t('forum_forumfield')->range();} 
	<div id="pt" class="bm cl">
		<div class="z">
			<a href="./" class="nvhm" title="{lang homepage}">$_G[setting][bbname]</a><em>&raquo;</em><a href="group.php">{$_G[setting][navs][3][navname]}</a>$navigation
		</div>
	</div>
	<!--{ad/text/wp a_t}-->
	<style id="diy_style" type="text/css"></style>
	<div class="wp">
		<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
	</div>
	<div id="ct" class="ct2 wp cl">
		<div class="mn">
			<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
			<div class="ggq-qzhd">
				<!--[diy=ggq-diy13]--><div id="ggq-diy13" class="area"></div><!--[/diy]-->
			</div>
			<!--[diy=diycommendtop]--><div id="diycommendtop" class="area"></div><!--[/diy]-->
			<!--{hook/index_header}-->
			<div id="g_commend" class="bm">
				<div class="bm_h cl">
					<h2>{lang recommend_group}</h2>
				</div>
				<div class="bm_c ggq-tjqz cl">
					<!--{loop dunserialize($_G['setting']['group_recommend']) $val}-->
						<a href="forum.php?mod=group&fid=$val[fid]">
							<img src="$val[icon]" alt="$val[name]"/>
							<h2>$val[name]</h2>
							<p>$val[description]</p>
						</a>
					<!--{/loop}-->
				</div>
			</div>

			<!--[diy=diycategorytop]--><div id="diycategorytop" class="area"></div><!--[/diy]-->
			<!--{hook/index_top}-->
			<div class="bm">
				<div class="bm_h cl">
					<h2>{lang group_categories}</h2>
				</div>
				<div class="bm_c">
					<!--{loop $first $groupid $group}-->
							<dl class="mbm pbm bbda ggq-qbqz">
								<dt class="pbn">
									<span class="y xi2"><!--{loop $group['secondlist'] $fid}--><a href="group.php?sgid=$fid">$second[$fid][name]</a> <!--{/loop}--><a href="group.php?gid=$groupid">{lang more} &rsaquo;</a></span>
									<strong class="xs2"><a href="group.php?gid=$groupid">$group[name]</a></strong><!--{if $group[groupnum]}--><span class="xg1">($group[groupnum])</span><!--{/if}-->
								</dt>
								<dd class="cl">
									<!--{loop $lastupdategroup[$groupid] $val}-->
										<a href="forum.php?mod=group&fid=$val[fid]"><img src="{$_G['siteurl']}{$_G['setting']['attachurl']}group/{$forumfield[$val[fid]]['icon']}" alt="$val[name]"/>$val[name]</a>
									<!--{/loop}-->
								</dd>
							</dl>
					<!--{/loop}-->
				</div>
			</div>
			<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]-->
			<!--{hook/index_bottom}-->
		</div>

		<div class="sd">
			<div class="drag">
				<!--[diy=diysidetop]--><div id="diysidetop" class="area"></div><!--[/diy]-->
			</div>
			<!--{hook/index_side_top}-->
			<div class="ggq-cwqz cl">
				<a href="forum.php?mod=group&action=create" class="z">创建圈子</a>
				<a href="group.php?mod=my" class="y">我的圈子</a>
			</div>
			<div class="drag">
				<!--[diy=diysidemiddle]--><div id="diysidemiddle" class="area"></div><!--[/diy]-->
			</div>
			
			<div class="ggq-bbsc">
				<!--[diy=ggq-diy14]--><div id="ggq-diy14" class="area"></div><!--[/diy]-->
			</div>
			<div class="ggq-bbsc ggq-bbsd">
				<!--[diy=ggq-diy15]--><div id="ggq-diy15" class="area"></div><!--[/diy]-->
			</div>
			<div class="drag">
				<!--[diy=diysidebottom]--><div id="diysidebottom" class="area"></div><!--[/diy]-->
			</div>
			<!--{hook/index_side_bottom}-->
		</div>
	</div>
<div class="wp mtn">
	<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
</div>
<script>
var jq = jQuery.noConflict(); 
jq(function(){
	jq('#owl-demo').owlCarousel({
		items: 1,
		navigation: true,
		navigationText: ["",""],
		autoPlay: true,
		stopOnHover: true
	}).hover(function(){
		jq('.owl-buttons').show();
	}, function(){
		jq('.owl-buttons').hide();
	});
});
</script>
<!--{template common/footer}-->

