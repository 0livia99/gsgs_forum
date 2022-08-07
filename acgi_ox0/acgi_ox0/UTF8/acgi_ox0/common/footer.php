<?php echo ' ';exit;?>
	</div><!--div.wp-->
	</div><!--div.in-wp-->
	<script language="javascript" type="text/javascript">
		minh=jq(window).height();
		jq("body").css({
			minHeight: minh
		})
	</script>
<!--{if empty($topic) || ($topic[usefooter])}-->
	<!--{eval $focusid = getfocus_rand($_G[basescript]);}-->
	<!--{if $focusid !== null}-->
		<!--{eval $focus = $_G['cache']['focus']['data'][$focusid];}-->
		<!--{eval $focusnum = count($_G['setting']['focus'][$_G[basescript]]);}-->
		<div class="focus" id="sitefocus">
			<div class="bm">
				<div class="bm_h cl">
					<a href="javascript:;" onclick="setcookie('nofocus_$_G[basescript]', 1, $_G['cache']['focus']['cookie']*3600);$('sitefocus').style.display='none'" class="y" title="{lang close}">{lang close}</a>
					<h2>
						<!--{if $_G['cache']['focus']['title']}-->{$_G['cache']['focus']['title']}<!--{else}-->{lang focus_hottopics}<!--{/if}-->
						<span id="focus_ctrl" class="fctrl"><img src="{IMGDIR}/pic_nv_prev.gif" alt="{lang footer_previous}" title="{lang footer_previous}" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/$focusnum</em> <img src="{IMGDIR}/pic_nv_next.gif" alt="{lang footer_next}" title="{lang footer_next}" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
					</h2>
				</div>
				<div class="bm_c" id="focus_con">
				</div>
			</div>
		</div>
		<!--{eval $focusi = 0;}-->
		<!--{loop $_G['setting']['focus'][$_G[basescript]] $id}-->
				<div class="bm_c" style="display: none" id="focus_$focusi">
					<dl class="xld cl bbda">
						<dt><a href="{$_G['cache']['focus']['data'][$id]['url']}" class="xi2" target="_blank">$_G['cache']['focus']['data'][$id]['subject']</a></dt>
						<!--{if $_G['cache']['focus']['data'][$id][image]}-->
						<dd class="m"><a href="{$_G['cache']['focus']['data'][$id]['url']}" target="_blank"><img src="{$_G['cache']['focus']['data'][$id]['image']}" alt="$_G['cache']['focus']['data'][$id]['subject']" /></a></dd>
						<!--{/if}-->
						<dd>$_G['cache']['focus']['data'][$id]['summary']</dd>
					</dl>
					<p class="ptn cl"><a href="{$_G['cache']['focus']['data'][$id]['url']}" class="xi2 y" target="_blank">{lang focus_show} &raquo;</a></p>
				</div>
		<!--{eval $focusi ++;}-->
		<!--{/loop}-->
		<script type="text/javascript">
			var focusnum = $focusnum;
			if(focusnum < 2) {
				$('focus_ctrl').style.display = 'none';
			}
			if(!$('focuscur').innerHTML) {
				var randomnum = parseInt(Math.round(Math.random() * focusnum));
				$('focuscur').innerHTML = Math.max(1, randomnum);
			}
			showfocus();
			var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
		</script>
	<!--{/if}-->
	<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1}-->
		<div class="focus patch" id="patch_notice"></div>
	<!--{/if}-->

	<!--{ad/footerbanner/wp a_f/1}--><!--{ad/footerbanner/wp a_f/2}--><!--{ad/footerbanner/wp a_f/3}-->
	<!--{ad/float/a_fl/1}--><!--{ad/float/a_fr/2}-->
	<!--{ad/couplebanner/a_fl a_cb/1}--><!--{ad/couplebanner/a_fr a_cb/2}-->
	<!--{ad/cornerbanner/a_cn}-->

	<!--{hook/global_footer}-->

    <div class="acfooter">
    	<div class="acftop">
			<div class="acftdiv" style="padding-left:0;">
				<h3>$_G[setting][bbname]</h3>
					<div class="acfurl">
						<a href="#" target="_blank">关于我们</a>
						<a href="#" target="_blank">商务合作</a>
						<a href="#" target="_blank">免责声明</a>
						<!--{if $_G['setting']['icp']}--><a href="#" target="_blank">$_G['setting']['icp']</a><!--{/if}-->
						<!--{hook/global_footerlink}-->

						<p class="dz_a">
							Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em>$_G['setting']['version']</em><!--{if !empty($_G['setting']['boardlicensed'])}--> <a href="http://license.comsenz.com/?pid=1&host=$_SERVER[HTTP_HOST]" target="_blank">Licensed</a><!--{/if}-->
						</p>
						<p class="dz">&copy; 2001-2013 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>
						</p>
				</div>
			</div><!--acftdiv-->
			<div class="acftdiv" style="padding-left:0;">
				<h3>官方</h3>
					<div class="acfurl">
						<a href="#" target="_blank">新浪微博</a>
						<a href="#" target="_blank">腾讯微博</a>
						<a href="#" target="_blank">微信公众号</a>
						<a href="#" target="_blank">站长博客</a>
						<a href="#" target="_blank">人人主页</a>
						<p class="dz_a">
							官方Q群:
							<a href="#" target="_blank">123456789</a>
							<a href="#" target="_blank">987654321</a>
						</p>
				</div>
			</div><!--acftdiv-->
			<div class="acftdiv" style="padding-left:0;">
				<h3>帮助</h3>
					<div class="acfurl">
						<a href="#" target="_blank">投稿规则</a>
						<a href="#" target="_blank">版权声明</a>
						<a href="#" target="_blank">留言板</a>
						<a href="#" target="_blank">捐助我们</a>
						<p class="dz_a">
							商务QQ:
							<a href="#" target="_blank">123456789</a>
							<a href="#" target="_blank">987654321</a>
						</p>
				</div>
			</div><!--acftdiv-->
			<div class="acftdiv" style="padding-left:0;">
				<h3>反馈</h3>
					<div class="acfurl">
						<a href="#" target="_blank">投诉举报</a>
						<a href="#" target="_blank">意见反馈</a>
						<a href="#" target="_blank">用户协议</a>
						<a href="#" target="_blank">论坛规则</a>
						<p class="dz_a">
							反馈须知：
							切勿滥用举报，任何与举报相关的信息必须属实！
						</p>
				</div>
			</div><!--acftdiv-->
			<div class="acftdiv">
				<h3>网站资源</h3>
				<div class="acficon">
					<ul>
						<li><span class="appico"><div class="foottip"><img src="$_G['style'][styleimgdir]/erweima1.gif"/></div></span><em>客户端</em></li>
						<li><span class="vxico"><div class="foottip"><img src="$_G['style'][styleimgdir]/erweima2.gif"/></div></span><em>微信</em></li>
						<li><span class="sinaico"><div class="foottip"><img src="$_G['style'][styleimgdir]/erweima3.gif"/></div></span><em>微博</em></li>
						<div class="clear"></div>
					</ul>
				</div>
			</div><!--acftdiv-->

			<div class="clear"></div>
		</div><!---acftop->
			<div class="clear"></div>
		</div>
		<div class="clear"></div>

             <!--<script type="text/javascript">
                jq(".acftdiv dl dd").each(function(){
                    jq(this).hover(function(){jq(this).addClass("animated flip")},function(){jq(this).removeClass("animated flip")})
                    })
            </script>-->
        <div class="acfbottom">
			<p class="dz">
				<!--{if $_G['setting']['site_qq']}--><a href="http://wpa.qq.com/msgrd?V=3&Uin=$_G['setting']['site_qq']&Site=$_G['setting']['bbname']&Menu=yes&from=discuz" target="_blank" title="QQ"><img src="{IMGDIR}/site_qq.jpg" alt="QQ" /></a><span class="pipe">|</span><!--{/if}-->
				<!--{loop $_G['setting']['footernavs'] $nav}--><!--{if $nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
						!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile' || $nav['id'] == 'darkroom'))}-->$nav[code]<span class="pipe">|</span><!--{/if}--><!--{/loop}-->
						<strong><a href="$_G['setting']['siteurl']" target="_blank">$_G['setting']['sitename']</a></strong>
				<!--{hook/global_footerlink}-->
			</p>
			<p class="dz">
				$_G[setting][bbname] <!--{if $_G['setting']['icp']}--> <a href="#" target="_blank">$_G['setting']['icp']</a> <!--{/if}-->
			<p class="dz xs0">
				{lang time_now}
				<span id="debuginfo">
				<!--{if debuginfo()}-->, Processed in $_G[debuginfo][time] second(s), $_G[debuginfo][queries] queries
					<!--{if $_G['gzipcompress']}-->, Gzip On<!--{/if}--><!--{if C::memory()->type}-->, <!--{echo ucwords(C::memory()->type)}--> On<!--{/if}-->.
				<!--{/if}-->
				</span>
				<!--{if $_G['setting']['statcode']}-->$_G['setting']['statcode']<!--{/if}-->
			</p>
		</div><!--acfbottom-->
        <script type="text/javascript">
        	jq(".acftdl dd").each(function(s){
				jq(this).hover(
					function(){
					jq(this).children("p").show();
					},function(){
						jq(this).children("p").hide();
						})
			})
        </script>

		<div id="ft" class="wp cl">
			<!--{eval updatesession();}-->
			<!--{if $_G['uid'] && $_G['group']['allowinvisible']}-->
				<script type="text/javascript">
				var invisiblestatus = '<!--{if $_G['session']['invisible']}-->{lang login_invisible_mode}<!--{else}-->{lang login_normal_mode}<!--{/if}-->';
				var loginstatusobj = $('loginstatusid');
				if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
				</script>
			<!--{/if}-->
		</div>
	</div>

<!--{/if}-->

<!--{if !$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry']}-->
	<!--{if $_G[uid] && !isset($_G['cookie']['checkpm'])}-->
	<script type="text/javascript" src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=$_G[timestamp]"></script>
	<!--{/if}-->

	<!--{if $_G[uid] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])}-->
	<script type="text/javascript" src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=$_G[timestamp]"></script>
	<!--{/if}-->

	<!--{if !isset($_G['cookie']['sendmail'])}-->
	<script type="text/javascript" src="home.php?mod=misc&ac=sendmail&rand=$_G[timestamp]"></script>
	<!--{/if}-->

	<!--{if $_G[uid] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])}-->
	<script type="text/javascript" src="misc.php?mod=patch&action=checkpatch&rand=$_G[timestamp]"></script>
	<!--{/if}-->
<!--{/if}-->

<!--{if $_GET['diy'] == 'yes'}-->
	<!--{if check_diy_perm($topic) && (empty($do) || $do != 'index')}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}common_diy.js?{VERHASH}"></script>
		<script type="text/javascript" src="{$_G[setting][jspath]}portal_diy{if !check_diy_perm($topic, 'layout')}_data{/if}.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $space['self'] && CURMODULE == 'space' && $do == 'index'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}common_diy.js?{VERHASH}"></script>
		<script type="text/javascript" src="{$_G[setting][jspath]}space_diy.js?{VERHASH}"></script>
	<!--{/if}-->
<!--{/if}-->
<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1}-->
	<script type="text/javascript">patchNotice();</script>
<!--{/if}-->
<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])}-->
	<div class="focus plugin" id="plugin_notice"></div>
	<script type="text/javascript">pluginNotice();</script>
<!--{/if}-->
<!--{if !$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])}-->
	<div class="focus plugin" id="ip_notice"></div>
	<script type="text/javascript">ipNotice();</script>
<!--{/if}-->
<!--{if $_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G[uid]]) || $_G['cookie']['promptstate_'.$_G[uid]] != $_G['member']['newprompt']) && $_GET['do'] != 'notice'}-->
	<script type="text/javascript">noticeTitle();</script>
<!--{/if}-->

<!--{if ($_G[member][newpm] || $_G[member][newprompt]) && empty($_G['cookie']['ignore_notice'])}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}html5notification.js?{VERHASH}"></script>
	<script type="text/javascript">
	var h5n = new Html5notification();
	if(h5n.issupport()) {
		<!--{if $_G[member][newpm] && $_GET[do] != 'pm'}-->
		h5n.shownotification('pm', '$_G[siteurl]home.php?mod=space&do=pm', '<!--{avatar($_G[uid],small,true)}-->', '{lang newpm_subject}', '{lang newpm_notice_info}');
		<!--{/if}-->
		<!--{if $_G[member][newprompt] && $_GET[do] != 'notice'}-->
				<!--{loop $_G['member']['category_num'] $key $val}-->
					<!--{eval $noticetitle = lang('template', 'notice_'.$key);}-->
					h5n.shownotification('notice_$key', '$_G[siteurl]home.php?mod=space&do=notice&view=$key', '<!--{avatar($_G[uid],small,true)}-->', '$noticetitle ($val)', '{lang newnotice_notice_info}');
				<!--{/loop}-->
		<!--{/if}-->
	}
	</script>
<!--{/if}-->

<!--{eval userappprompt();}-->
<!--{if $_G['basescript'] != 'userapp'}-->
<div id="scrolltop">
	<!--{if $_G[fid] && $_G['mod'] == 'viewthread'}-->
	<span><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$_GET[extra]&page=$page{if $_GET[from]}&from=$_GET[from]{/if}" onclick="showWindow('reply', this.href)" class="replyfast" title="{lang fastreply}"><b>{lang fastreply}</b></a></span>
	<!--{/if}-->
	<span hidefocus="true"><a title="{lang scrolltop}" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>{lang scrolltop}</b></a></span>
	<!--{if $_G[fid]}-->
	<span>
		<!--{if $_G['mod'] == 'viewthread'}-->
		<a href="forum.php?mod=forumdisplay&fid=$_G[fid]" hidefocus="true" class="returnlist" title="{lang return_list}"><b>{lang return_list}</b></a>
		<!--{else}-->
		<a href="forum.php" hidefocus="true" class="returnboard" title="{lang return_forum}"><b>{lang return_forum}</b></a>
		<!--{/if}-->
	</span>
	<!--{/if}-->
</div>
<script type="text/javascript">_attachEvent(window, 'scroll', function () { showTopLink(); });checkBlind();</script>
<!--{/if}-->
<!--{if isset($_G['makehtml'])}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}html2dynamic.js?{VERHASH}"></script>
	<script type="text/javascript">
		var html_lostmodify = {TIMESTAMP};
		htmlGetUserStatus();
		<!--{if isset($_G['htmlcheckupdate'])}-->
		htmlCheckUpdate();
		<!--{/if}-->
	</script>
<!--{/if}-->
<!--{eval output();}-->

<div id="acgi_loaderbox" style="display: none;">
<div class="acgi_loader">
<div class="acgicircle1"></div>
<div class="acgicircle2"></div>
<div class="acgicircle3"></div>
<div class="acgicircle4"></div>
<div class="acgicircle5"></div>
</div>
</div>

<script type="text/javascript">
<!--
function showProcess()
{
     GetMsg();
}
var timerId=null;
function GetMsg()
{
    var msg = document.getElementById("acgi_loaderbox");
    msg.style.left = (document.body.clientWidth - 220) / 2;
    msg.style.top = window.screen.height / 3 - 120;
    if(window.document.readyState != null && window.document.readyState != 'complete')
    {
        msg.style.display = "block";
    }
    else
    {
        msg.style.display = "none";
        window.clearTimeout(timerId);
        return;
    }
    timerId=window.setTimeout('GetMsg()',1000);
}
showProcess();
//-->
</script>
</body>
</html>


