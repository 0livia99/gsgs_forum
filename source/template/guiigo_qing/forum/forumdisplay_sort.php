<?php exit('贵古互联版权所有 客服QQ:99972466');?>
<div id="threadlist" class="bm bmw ggq-bkfl"{if $_G['uid']} style="position: relative;"{/if}>
	<!--{if $quicksearchlist && !$_GET['archiveid']}-->
		<!--{subtemplate forum/search_sortoption}-->
	<!--{/if}-->
	$sorttemplate['header']
	<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&action=moderate&fid=$_G[fid]&infloat=yes&nopost=yes">
		$sorttemplate['body']
		<!--{if $_G['forum']['ismoderator'] && $_G['forum_threadcount']}-->
			<!--{template forum/topicadmin_modlayer}-->
		<!--{/if}-->
	</form>
	$sorttemplate['footer']
</div>
<div class="bm bw0 pgs ggq-zfan cl">
	$multipage
	<!--{if !$_GET['archiveid']}--><a href="javascript:;" id="newspecialtmp" onmouseover="$('newspecial').id = 'newspecialtmp';this.id = 'newspecial';showMenu({'ctrlid':this.id})"{if !$_G['forum']['allowspecialonly'] && empty($_G['forum']['picstyle'])} onclick="showWindow('newthread', 'forum.php?mod=post&action=newthread&fid=$_G[fid]')"{else} onclick="location.href='forum.php?mod=post&action=newthread&fid=$_G[fid]';return false;"{/if} title="{lang send_posts}">发布主题</a><!--{/if}-->
	<!--{hook/forumdisplay_postbutton_bottom}-->
</div>

