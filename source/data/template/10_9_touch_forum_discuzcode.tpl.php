<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); function tpl_hide_credits_hidden($creditsrequire) {
global $_G;?><?php
$return = <<<EOF
<div class="locked hide_credits_hidden">
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
{$_G['username']}
EOF;
 } else { 
$return .= <<<EOF
游客
EOF;
 } 
$return .= <<<EOF
，本帖隐藏的内容需要积分高于 {$creditsrequire} 才可浏览，您当前积分为 {$_G['member']['credits']}</div>
EOF;
?><?php return $return;?><?php }

function tpl_hide_credits($creditsrequire, $message) {?><?php
$return = <<<EOF

<div class="hide_credits"><h4>以下内容需要积分高于 {$creditsrequire} 才可浏览</h4>{$message}</div>

EOF;
?><?php return $return;?><?php }

function tpl_codedisp($code) {?><?php
$return = <<<EOF
<div class="blockcode codedisp"><div><ol><li>{$code}</ol></div></div>
EOF;
?><?php return $return;?><?php }

function tpl_quote() {?><?php
$return = <<<EOF
<div class="grey quote xxmfsf"><blockquote>\\1</blockquote></div>
EOF;
?><?php return $return;?><?php }

function tpl_free() {?><?php
$return = <<<EOF
<div class="grey quote free"><blockquote>\\1</blockquote></div>
EOF;
?><?php return $return;?><?php }

function tpl_hide_reply() {
global $_G;?><?php
$return = <<<EOF

<div class="showhide hide_reply"><h4>本帖隐藏的内容</h4>\\1</div>

EOF;
?><?php return $return;?><?php }

function tpl_hide_reply_hidden() {
global $_G;?><?php
$return = <<<EOF
<div class="locked hide_reply_hidden">
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
{$_G['username']}
EOF;
 } else { 
$return .= <<<EOF
游客
EOF;
 } 
$return .= <<<EOF
，如果您要查看本帖隐藏内容请<a href="forum.php?mod=post&amp;action=reply&amp;fid={$_G['fid']}&amp;tid={$_G['tid']}" onclick="showWindow('reply', this.href)">回复</a></div>
EOF;
?><?php return $return;?><?php }


function attachlist($attach) {
global $_G;
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$aidencode = packaids($attach);
$widthcode = attachwidth($attach['width']);
$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';
$pluginhook = !empty($_G['setting']['pluginhooks']['viewthread_attach_extra'][$attach[aid]]) ? $_G['setting']['pluginhooks']['viewthread_attach_extra'][$attach[aid]] : '';?><?php
$return = <<<EOF


EOF;
 if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF

<div class="box box_ex2 attach">
<dd>
<p class="attnm">

EOF;
 if($_G['setting']['mobile']['mobilesimpletype'] == 0) { 
$return .= <<<EOF

{$attach['attachicon']}

EOF;
 } if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF

<a href="forum.php?mod=attachment{$is_archive}&amp;aid={$aidencode}" id="aid{$attach['aid']}" target="_blank">{$attach['filename']}</a>

EOF;
 } else { 
$return .= <<<EOF

<a href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}">{$attach['filename']}</a>

EOF;
 } 
$return .= <<<EOF

<span class="xg1">({$attach['dateline']} 上传)</span>
</p>
<p class="xg1">{$attach['attachsize']}
EOF;
 if($attach['readperm']) { 
$return .= <<<EOF
, 阅读权限: <strong>{$attach['readperm']}</strong>
EOF;
 } 
$return .= <<<EOF
, 下载次数: {$attach['downloads']}
EOF;
 if(!$attach['attachimg'] && $_G['getattachcredits']) { 
$return .= <<<EOF
, 下载积分: {$_G['getattachcredits']}
EOF;
 } 
$return .= <<<EOF
</p>

EOF;
 if($attach['description']) { 
$return .= <<<EOF
<p class="xg2">{$attach['description']}</p>
EOF;
 } 
$return .= <<<EOF

</dd>
</div>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php
$return = <<<EOF

<div class="xxm-tattl b_p mtm mbm bg">
<div class="xxm-tattl-box">

EOF;
 if($_G['uid']) { if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF

<a href="forum.php?mod=attachment{$is_archive}&amp;aid={$aidencode}" id="aid{$attach['aid']}" class="y"><i class="xxmfont iconxiazai blue"></i></a>

EOF;
 } else { if(!$attach['payed']) { } else { 
$return .= <<<EOF

<a href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog y"><i class="xxmfont iconxiazai blue"></i></a>

EOF;
 } } } else { 
$return .= <<<EOF

<a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="y"><i class="xxmfont iconxiazai blue"></i></a>

EOF;
 } 
$return .= <<<EOF

<p class="tattl-name">{$attach['attachicon']}<span class="blue xxmfsf">{$attach['filename']}</span></p>
<p class="tattl-size xxmfst grey">{$attach['dateline']}上传</p>
<p class="tattl-size xxmfst grey">{$attach['attachsize']}&nbsp;,&nbsp;下载次数: {$attach['downloads']}
EOF;
 if(!$attach['attachimg'] && $_G['getattachcredits']) { 
$return .= <<<EOF
&nbsp;,&nbsp;下载积分: {$_G['getattachcredits']}
EOF;
 } if($attach['price']) { 
$return .= <<<EOF
&nbsp;,&nbsp;{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title']}:&nbsp;<strong class="rq">{$attach['price']}</strong>
EOF;
 } if($attach['readperm']) { 
$return .= <<<EOF
&nbsp;,&nbsp;阅读权限: <strong class="rq">{$attach['readperm']}</strong>
EOF;
 } 
$return .= <<<EOF
</p>
</div>

EOF;
 if($attach['description']) { 
$return .= <<<EOF

<div class="xxm-tattl-txt"><span class="grey xxmfst">{$attach['description']}</span></div>

EOF;
 } 
$return .= <<<EOF

<div class="xxm-tattl-buy-button cl">

EOF;
 if($attach['price']) { if($_G['uid']) { if(!$attach['payed']) { 
$return .= <<<EOF

<div class="xxm-tattl-buy-button-fill">
<a href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog xxmfst">购买</a>
</div>

EOF;
 } else { 
$return .= <<<EOF

<div class="xxm-tattl-buy-button-fill-o"><a class="grey xxmfst">&#24050;购买</a></div>

EOF;
 } } else { 
$return .= <<<EOF

<div class="xxm-tattl-buy-button-fill">
<a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfst">购买</a>
</div>

EOF;
 } } if($attach['price']) { 
$return .= <<<EOF

<div class="xxm-tattl-buy-button-empty"><a href="forum.php?mod=misc&amp;action=viewattachpayments&amp;aid={$attach['aid']}" class="dialog blue xxmfst">记录</a></div>

EOF;
 } 
$return .= <<<EOF

</div>
</div>

EOF;
?><?php return $return;?><?php }


function imagelist($attach) {
global $_G, $post;
$fix = count($post[imagelist]) == 1 ? 6000 : 600;
$fixtype = count($post[imagelist]) == 1 ? 'fixnone' : 'fixwr';
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? getforumimg($attach['aid'], 0, $fix, $fix, $fixtype) : '' ;
$aidencode = packaids($attach);
$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';?><?php
$return = <<<EOF


EOF;
 if($attach['attachimg'] && $_G['setting']['showimages'] && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) && (!$attach['price'] || $attach['payed'])) { if(!$attach['price'] || $attach['payed']) { if($_G['setting']['mobile']['mobilesimpletype'] == 0) { 
$return .= <<<EOF

<li><a href="forum.php?mod=viewthread&amp;tid={$attach['tid']}&amp;aid={$attach['aid']}&amp;from=album&amp;page={$_G['page']}" class="orange"><img id="aimg_{$attach['aid']}" src="{$mobilethumburl}" alt="{$attach['imgalt']}" title="{$attach['imgalt']}" /></a></li>

EOF;
 } } } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function attachinpost($attach) {
global $_G;
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? getforumimg($attach['aid'], 0, 10000, 0, 'fixnone') : '' ;
$aidencode = packaids($attach);
$is_archive = $_G['forum_thread']['is_archived'] ? '&fid='.$_G['fid'].'&archiveid='.$_G[forum_thread][archiveid] : '';?><?php
$return = <<<EOF


EOF;
 if($attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid'])) { if($_G['setting']['mobile']['mobilesimpletype'] == 0) { 
$return .= <<<EOF

<a href="forum.php?mod=viewthread&amp;tid={$attach['tid']}&amp;aid={$attach['aid']}&amp;from=album&amp;page={$_G['page']}" class="bz_orange"><img id="aimg_{$attach['aid']}" src="{$mobilethumburl}" alt="{$attach['imgalt']}" title="{$attach['imgalt']}" /></a>

EOF;
 } } else { 
$return .= <<<EOF

<div id="attach_{$attach['aid']}" class="xxm-attach b_p mtm mbm bg">
<div class="xxm-attach-box">

EOF;
 if($_G['uid']) { if(!$attach['price'] || $attach['payed']) { 
$return .= <<<EOF

<a href="forum.php?mod=attachment{$is_archive}&amp;aid={$aidencode}" class="y"><i class="xxmfont iconxiazai blue"></i></a>

EOF;
 } else { if(!$attach['payed']) { } else { 
$return .= <<<EOF

<a href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog y"><i class="xxmfont iconxiazai blue"></i></a>

EOF;
 } } } else { 
$return .= <<<EOF

<a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="y"><i class="xxmfont iconxiazai blue"></i></a>

EOF;
 } 
$return .= <<<EOF

<p class="attach-name">
EOF;
 if($_G['setting']['mobile']['mobilesimpletype'] == 0) { 
$return .= <<<EOF
{$attach['attachicon']}
EOF;
 } 
$return .= <<<EOF
<span class="blue xxmfsf">{$attach['filename']}</span></p>
<p class="attach-size xxmfst grey">{$attach['dateline']}上传</p>
<p class="attach-size xxmfst grey">{$attach['attachsize']}&nbsp;,&nbsp;下载次数: {$attach['downloads']}
EOF;
 if(!$attach['attachimg'] && $_G['getattachcredits']) { 
$return .= <<<EOF
&nbsp;,&nbsp;下载积分: {$_G['getattachcredits']}
EOF;
 } if($attach['price']) { 
$return .= <<<EOF
&nbsp;,&nbsp;{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title']}:&nbsp;<strong class="rq">{$attach['price']}</strong>
EOF;
 } if($attach['readperm']) { 
$return .= <<<EOF
&nbsp;,&nbsp;阅读权限: <strong class="rq">{$attach['readperm']}</strong>
EOF;
 } 
$return .= <<<EOF
</p>
</div>

EOF;
 if($attach['description']) { 
$return .= <<<EOF

<div class="xxm-attach-txt"><span class="grey xxmfst">{$attach['description']}</span></div>

EOF;
 } 
$return .= <<<EOF

<div class="xxm-attach-buy-button cl">

EOF;
 if($attach['price']) { if($_G['uid']) { if(!$attach['payed']) { 
$return .= <<<EOF

<div class="xxm-attach-buy-button-fill">
<a href="forum.php?mod=misc&amp;action=attachpay&amp;aid={$attach['aid']}&amp;tid={$attach['tid']}" class="dialog xxmfst">购买</a>
</div>

EOF;
 } else { 
$return .= <<<EOF

<div class="xxm-attach-buy-button-fill-o"><a class="grey xxmfst">&#24050;购买</a></div>

EOF;
 } } else { 
$return .= <<<EOF

<div class="xxm-attach-buy-button-fill">
<a href="javascript:popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');" class="xxmfst">购买</a>
</div>

EOF;
 } } if($attach['price']) { 
$return .= <<<EOF

<div class="xxm-attach-buy-button-empty"><a href="forum.php?mod=misc&amp;action=viewattachpayments&amp;aid={$attach['aid']}" class="dialog blue xxmfst">记录</a></div>

EOF;
 } 
$return .= <<<EOF

</div>
</div>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }?>