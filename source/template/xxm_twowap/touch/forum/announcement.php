<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="javascript:history.back();" class="z xxmfont iconzuo xxmfstt"></a>
		<span class="category">{lang announcement}</span>
		<div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
    </div>
</header>
<!-- header end -->

<div class="cl">

	<div class="xxm-anno-nav b_p">
		<a href="forum.php?mod=announcement" class="xxmfsf blue{if empty($_GET[m])} a{/if}">{lang all}</a>
		<!--{loop $months $month}-->
		<a href="forum.php?mod=announcement&m=$month[0].$month[1]" class="xxmfsf blue{if $_GET[m] == $month[0].$month[1]} a{/if}">$month[0]/$month[1]</a>
		<!--{/loop}-->
	</div>
	<div class="xxmclear"></div>
	<div class="xxmgap"></div>

	<div class="annlist cl">
		<ul>
			<!--{eval $nn = 0;}-->
			<!--{loop $announcelist $ann}-->
			<!--{eval $nn++;}-->
			<li class="cl">
				<h2><a href="javascript:;" class="ann_more" id="ann_{$ann['id']}"><i class="{if $nn == 1 && !$annid || $ann['id'] == $annid}xxmfont iconyou{else}xxmfont iconxia{/if}"></i>$ann['subject']</a></h2>
				<h3><span class="my">$ann['starttime']</span><span class="mz">{lang author}:</span> <a href="home.php?mod=space&username=$ann['authorenc']&do=profile" class="blue">$ann['author']</a></h3>
				<div class="annlist_box" style="display:{if $nn == 1 && !$annid || $ann['id'] == $annid}block{else}none{/if};" id="ann_{$ann['id']}_box">				
					$ann['message']
				</div>
			</li>
			<!--{/loop}-->
		</ul>
	</div>

	<script>
		$('.ann_more').on('click', function() {
			var obj = $(this);
			var sub_obj = $('#' + obj.attr('id') + '_box');
			if(sub_obj.css('display') == 'none') {
				sub_obj.css('display', 'block');
				obj.find('i').removeClass().addClass('xxmfont iconyou');
			} else {
				sub_obj.css('display', 'none');
				obj.find('i').removeClass().addClass('xxmfont iconxia');
			}
		});
	</script>
</div>

<!--{template common/footer}-->

