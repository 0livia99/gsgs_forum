<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('post');
0
|| checktplrefresh('./template/xxm_twowap/touch/forum/post.htm', './template/xxm_twowap/touch/forum/post_editor_attribute.htm', 1659873246, '9', './data/template/10_9_touch_forum_post.tpl.php', './template/xxm_twowap', 'touch/forum/post')
|| checktplrefresh('./template/xxm_twowap/touch/forum/post.htm', './template/xxm_twowap/touch/common/seccheck.htm', 1659873246, '9', './data/template/10_9_touch_forum_post.tpl.php', './template/xxm_twowap', 'touch/forum/post')
;?><?php include template('common/header'); $adveditor = $isfirstpost && $special && ($_GET['action'] == 'newthread' || $_GET['action'] == 'reply' && !empty($_GET['addtrade']) || $_GET['action'] == 'edit' );?><form method="post" id="postform" 
<?php if($_GET['action'] == 'newthread') { ?>action="forum.php?mod=post&amp;action=<?php if($special != 2) { ?>newthread<?php } else { ?>newtrade<?php } ?>&amp;fid=<?php echo $_G['fid'];?>&amp;extra=<?php echo $extra;?>&amp;topicsubmit=yes&amp;mobile=2"
<?php } elseif($_GET['action'] == 'reply') { ?>action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $extra;?>&amp;replysubmit=yes&amp;mobile=2"
<?php } elseif($_GET['action'] == 'edit') { ?>action="forum.php?mod=post&amp;action=edit&amp;extra=<?php echo $extra;?>&amp;editsubmit=yes&amp;mobile=2" <?php echo $enctype;?>
<?php } ?>>


<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="posttime" id="posttime" value="<?php echo TIMESTAMP;?>" />
<?php if(!empty($_GET['modthreadkey'])) { ?><input type="hidden" name="modthreadkey" id="modthreadkey" value="<?php echo $_GET['modthreadkey'];?>" /><?php } if($_GET['action'] == 'reply') { ?>
<input type="hidden" name="noticeauthor" value="<?php echo $noticeauthor;?>" />
<input type="hidden" name="noticetrimstr" value="<?php echo $noticetrimstr;?>" />
<input type="hidden" name="noticeauthormsg" value="<?php echo $noticeauthormsg;?>" />
<?php if($reppid) { ?>
<input type="hidden" name="reppid" value="<?php echo $reppid;?>" />
<?php } if($_GET['reppost']) { ?>
<input type="hidden" name="reppost" value="<?php echo $_GET['reppost'];?>" />
<?php } elseif($_GET['repquote']) { ?>
<input type="hidden" name="reppost" value="<?php echo $_GET['repquote'];?>" />
<?php } } if($_GET['action'] == 'edit') { ?>
<input type="hidden" name="fid" id="fid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="tid" value="<?php echo $_G['tid'];?>" />
<input type="hidden" name="pid" value="<?php echo $pid;?>" />
<input type="hidden" name="page" value="<?php echo $_GET['page'];?>" />
<?php } if($special) { ?>
<input type="hidden" name="special" value="<?php echo $special;?>" />
<?php } if($specialextra) { ?>
<input type="hidden" name="specialextra" value="<?php echo $specialextra;?>" />
<?php } ?>

<!-- header start -->
<header class="header">
    <div class="nav">
   	 	<a href="<?php if($_GET['action'] == 'newthread') { ?>forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&page=<?php echo $_GET['page'];?><?php } else { ?>forum.php?mod=redirect&goto=findpost&ptid=<?php echo $_G['tid'];?>&pid=<?php echo $pid;?><?php } ?>" class="z xxmfont iconzuo xxmfstt"></a>
<span class="y"><button id="postsubmit" class="btn_pn <?php if($_GET['action'] == 'edit') { ?>btn_pn_blue" disable="false"<?php } else { ?>btn_pn_grey" disable="true"<?php } ?>><span><?php if($_GET['action'] == 'newthread') { ?>����<?php } elseif($_GET['action'] == 'reply') { ?>�ظ�<?php } elseif($_GET['action'] == 'edit') { ?>����<?php } ?></span></button></span>
<input type="hidden" name="<?php if($_GET['action'] == 'newthread') { ?>topicsubmit<?php } elseif($_GET['action'] == 'reply') { ?>replysubmit<?php } elseif($_GET['action'] == 'edit') { ?>editsubmit<?php } ?>" value="yes">
<span><?php if($_GET['action'] == 'newthread') { ?>����<?php } elseif($_GET['action'] == 'reply') { ?>�ظ�<?php } elseif($_GET['action'] == 'edit') { ?>�༭<?php } else { ?>����<?php } ?></span>
    </div>
</header>
<!-- header end -->

<!-- main postbox start -->
<div class="wp">
<div class="post_from">
<ul class="cl">

<?php if($_GET['action'] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']) { ?>
<li class="bl_line">
ɾ������ ?&nbsp;&nbsp;<input type="checkbox" name="delete" id="delete" class="xxm-checkbox" value="1" title="ɾ������<?php if($thread['special'] == 3) { ?>���������ͷ��ã����˻�������<?php } ?>">
</li>
<?php } ?>

<li class="bl_line">
<span>��ǰ��� : </span><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" class="blue"><?php echo $_G['forum']['name'];?></a>
</li>

<?php if($_GET['action'] != 'reply') { ?>
<li>
<input type="text" tabindex="1" class="post_input" id="needsubject" size="30" autocomplete="off" value="<?php echo $postinfo['subject'];?>" name="subject" placeholder="����" fwin="login">
</li>
<?php } else { ?>
<li class="bl_line">
�ظ�: <?php echo $thread['subject'];?>
<?php if($quotemessage) { ?><?php echo $quotemessage;?><?php } ?>
</li>
<?php } if($isfirstpost && !empty($_G['forum']['threadtypes']['types'])) { ?>
<li class="bl_line">
<select id="typeid" name="typeid" class="sort_sel">
<option value="0" selected="selected">ѡ���������</option><?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $typeid => $name) { if(empty($_G['forum']['threadtypes']['moderators'][$typeid]) || $_G['forum']['ismoderator']) { ?>
<option value="<?php echo $typeid;?>"<?php if($thread['typeid'] == $typeid || $_GET['typeid'] == $typeid) { ?> selected="selected"<?php } ?>><?php echo strip_tags($name);; ?></option>
<?php } } ?>
</select>
</li>
<?php } if($_G['forum_thread']['special'] == 5 && empty($firststand)) { ?>
<li>
<select id="stand" name="stand" >
<option value="">ѡ��۵�</option>
<option value="0">����</option>
<option value="1">����</option>
<option value="2">����</option>
</select>
</li>
<?php } ?>

<li class="area">
<textarea class="pt" id="needmessage" tabindex="3" autocomplete="off" id="<?php echo $editorid;?>_textarea" name="<?php echo $editor['textarea'];?>" cols="80" rows="10"  placeholder="����" fwin="reply"><?php echo $postinfo['message'];?></textarea>
</li>

<li><a href="javascript:;" class="y photo"><input type="file" name="Filedata" id="filedata" /></a></li>

</ul>
<ul id="imglist" class="post_imglist cl"></ul>

<?php if(!empty($_G['setting']['pluginhooks']['post_middle_mobile'])) echo $_G['setting']['pluginhooks']['post_middle_mobile'];?><div id="post_extra" class="cl b_m xxmbt1 post_extra">

<div id="post_extra_tb" class="cl post_extra_tb" onselectstart="return false">
<label id="extra_additional_b" onclick="showExtra('extra_additional')"><span id="extra_additional_chk">����ѡ��</span></label>
<?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { if($_G['group']['allowsetreadperm']) { ?>
<label id="extra_readperm_b" onclick="showExtra('extra_readperm')"><span id="extra_readperm_chk">�Ķ�Ȩ��</span></label>
<?php } if($_G['group']['allowreplycredit'] && !in_array($special, array(2, 3))) { if($_GET['action'] == 'newthread') { $extcreditstype = $_G['setting']['creditstransextra'][10];?><?php } else { $extcreditstype = $replycredit_rule['extcreditstype'] ? $replycredit_rule['extcreditstype'] : $_G['setting']['creditstransextra'][10];?><?php } $userextcredit = getuserprofile('extcredits'.$extcreditstype);?><?php if(($_GET['action'] == 'newthread' && $userextcredit > 0) || ($_GET['action'] == 'edit' && $isorigauthor && isfirstpost)) { ?>
<label id="extra_replycredit_b" onclick="showExtra('extra_replycredit')"><span id="extra_replycredit_chk">��������</span></label>
<?php } } if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
<label id="extra_rushreplyset_b" onclick="showExtra('extra_rushreplyset')" style="display: none;"><span id="extra_rushreplyset_chk">��¥����</span></label>
<?php } if($_G['group']['maxprice'] && !$special) { ?>
<label id="extra_price_b" onclick="showExtra('extra_price')"><span id="extra_price_chk">�����ۼ�</span></label>
<?php } if($_G['group']['allowposttag']) { ?>
<label id="extra_tag_b" onclick="showExtra('extra_tag')"><span id="extra_tag_chk">�����ǩ</span></label>
<?php } if($_G['group']['allowsetpublishdate'] && ($_GET['action'] == 'newthread' || ($_GET['action'] == 'edit' && $isfirstpost && $thread['displayorder'] == -4))) { ?>
<label id="extra_pubdate_b" onclick="showExtra('extra_pubdate')"><span id="extra_pubdate_chk">��ʱ����</span></label>
<?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['post_attribute_extra'])) echo $_G['setting']['pluginhooks']['post_attribute_extra'];?>
</div>

<div id="post_extra_c">

<?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { if(!empty($userextcredit)) { ?>
<div id="extra_replycredit_c" class="exfm cl" style="display: none;">
<p class="ptm">
<em class="xxmfst grey">���λ�������: <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?> (���ջ��� 0 Ϊ������)</em>
<input type="text" name="replycredit_extcredits" id="replycredit_extcredits" class="xxm-p-input" value="<?php if($replycredit_rule['extcredits'] && $thread['replycredit'] > 0) { ?><?php echo $replycredit_rule['extcredits'];?><?php } else { ?>0<?php } ?>" onkeyup="javascript:getreplycredit();" />
</p>
<p class="ptm">
<em class="xxmfst grey">������ (��)</em>
<input type="text" name="replycredit_times" id="replycredit_times" class="xxm-p-input" value="<?php if($replycredit_rule['lasttimes']) { ?><?php echo $replycredit_rule['lasttimes'];?><?php } else { ?>1<?php } ?>" onkeyup="javascript:getreplycredit();" />
</p>
<p class="ptm">
<label>
ÿ�����ɻ�� 
<select id="replycredit_membertimes" name="replycredit_membertimes" class="ps vm"><?php for($i=1;$i<11;$i++) {;?><option value="<?php echo $i;?>"<?php if($replycredit_rule['membertimes'] == $i) { ?> selected="selected"<?php } ?>><?php echo $i;?></option><?php };?></select> ��
</label>, 
<label>
�н��� 
<select id="replycredit_random" name="replycredit_random" class="ps vm"><?php for($i=100;$i>9;$i=$i-10) {;?><option value="<?php echo $i;?>"<?php if($replycredit_rule['random'] == $i) { ?> selected="selected"<?php } ?>><?php echo $i;?></option><?php };?></select> %
</label>
</p>
<p class="ptm grey">���������ܶ�: <span id="replycredit_sum"><?php if($thread['replycredit']) { ?><?php echo $thread['replycredit'];?><?php } else { ?>0<?php } ?></span> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?><?php if($thread['replycredit']) { ?><span class="xg1">(�������� <?php echo $thread['replycredit'];?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?>)</span><?php } ?>, <span id="replycredit">˰��֧�� <?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?> 0</span> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?>, ���� <?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?> <?php echo $userextcredit;?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?></p>
</div>
<?php } if($_G['group']['allowsetreadperm']) { ?>
<div id="extra_readperm_c" class="exfm cl" style="display:none">
<p class="ptm grey">�Ķ�Ȩ�ް��ɸߵ������У����ڻ����ѡ������û��ſ����Ķ�</p>
<p class="ptm grey">
<select name="readperm" id="readperm" class="readperm-ps">
<option value="">����</option><?php if(is_array($_G['cache']['groupreadaccess'])) foreach($_G['cache']['groupreadaccess'] as $val) { ?><option value="<?php echo $val['readaccess'];?>" title="�Ķ�Ȩ��: <?php echo $val['readaccess'];?>"<?php if($thread['readperm'] == $val['readaccess']) { ?> selected="selected"<?php } ?>><?php echo $val['grouptitle'];?></option>
<?php } ?>
<option value="255"<?php if($thread['readperm'] == 255) { ?> selected="selected"<?php } ?>>���Ȩ��</option>
</select>
</p>
</div>
<?php } if($_G['group']['maxprice'] && !$special) { ?>
<div id="extra_price_c" class="exfm cl" style="display:none">
<p class="ptm">
<em class="xxmfst grey">�ۼ� :  <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?>(��� <?php echo $_G['group']['maxprice'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?>)</em>
<input type="text" id="price" name="price" class="xxm-p-input" value="<?php echo $thread['pricedisplay'];?>" />
<em class="xxmfst grey"><?php if($_G['group']['maxprice'] && ($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost)) { if($_G['setting']['maxincperthread']) { ?>������������������Ϊ <?php echo $_G['setting']['maxincperthread'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } if($_G['setting']['maxchargespan']) { ?>������������� <?php echo $_G['setting']['maxchargespan'];?> ��Сʱ<?php if($_GET['action'] == 'edit' && $freechargehours) { ?>�������⻹������ <?php echo $freechargehours;?> ��Сʱ<?php } } } ?></em>
</p>
</div>
<?php } if($_G['group']['allowposttag']) { ?>
<div id="extra_tag_c" class="exfm cl" style="display: none;">
<p class="ptm">
<em class="xxmfst grey">��ǩ : �ö��Ż�ո���������ǩ��������д 5 ��</em>
<input type="text" class="xxm-p-input" size="60" id="tags" name="tags" value="<?php echo $postinfo['tag'];?>" />
</p>
</div>
<?php } if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
<div class="exfm cl" id="extra_rushreplyset_c" style="display: none;">
<div class="sinf sppoll ptm">
<p>
<label for="rushreply" class="grey"><input type="checkbox" name="rushreply" id="rushreply" class="pc vm" value="1" <?php if($_GET['action'] == 'edit' && getstatus($thread['status'], 3)) { ?>disabled="disabled" checked="checked"<?php } ?> onclick="extraCheck(3)" /> ��Ϊ��¥����</label>
</p>
<p class="ptm">
<em class="xxmfst grey">��¥ʱ��:</em>
<input type="text" name="rushreplyfrom" id="rushreplyfrom" class="xxm-p-input" onclick="showcalendar(event, this, true)" autocomplete="off" value="<?php echo $postinfo['rush']['starttimefrom'];?>" onkeyup="$('rushreply').checked = true;" />
<span> ~ </span>
<input type="text" onclick="showcalendar(event, this, true)" autocomplete="off" id="rushreplyto" name="rushreplyto" class="xxm-p-input" value="<?php echo $postinfo['rush']['starttimeto'];?>" onkeyup="$('rushreply').checked = true;" />
</p>
<p class="ptm">
<em class="xxmfst grey">����¥��:</em>
<input type="text" name="rewardfloor" id="rewardfloor" class="xxm-p-input" value="<?php echo $postinfo['rush']['rewardfloor'];?>" onkeyup="$('rushreply').checked = true;" />
<em class="xxmfst grey">��¥����Ӣ�Ķ��Ÿ���,*�ſ�ƥ�����������ֵ,��:8,88,*88</em>
</p>
</div>
<div class="sadd">
<p class="ptm">
<em class="xxmfst grey">�������� : ÿ���û�������������</em>
<input type="text" name="replylimit" id="replylimit" class="xxm-p-input" autocomplete="off" value="<?php echo $postinfo['rush']['replylimit'];?>" onkeyup="$('rushreply').checked = true;" />
</p>
<p class="ptm">
<label for="stopfloor" class="xxmfst grey">��ֹ¥��:</label>
<input type="text" name="stopfloor" id="stopfloor" class="xxm-p-input" autocomplete="off" value="<?php echo $postinfo['rush']['stopfloor'];?>" onkeyup="$('rushreply').checked = true;" />
</p>
<p class="ptm">
<label for="creditlimit" class="xxmfst grey"><?php if($_G['setting']['creditstransextra']['11']) { ?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?><?php } else { ?>����<?php } ?>���� : <?php if($_G['setting']['creditstransextra']['11']) { ?>(<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?>)<?php } else { ?>�ܻ���<?php } ?>���ڴ����ò��ܲ�����¥���ɲ���</label>
<input type="text" name="creditlimit" id="creditlimit" class="xxm-p-input" autocomplete="off" value="<?php echo $postinfo['rush']['creditlimit'];?>" onkeyup="$('rushreply').checked = true;" />
</p>
</div>
</div>
<?php } if($_G['group']['allowsetpublishdate'] && ($_GET['action'] == 'newthread' || ($_GET['action'] == 'edit' && $isfirstpost && $thread['displayorder'] == -4))) { ?>
<div class="exfm cl" id="extra_pubdate_c" style="display: none;">
<label><input type="checkbox" name="cronpublish" onclick="if(this.checked) {$('cronpublishdate').click();doane(event,false);};extraCheck(5);hidenFollowBtn(this.checked);" id="cronpublish" value="true" class="pc"<?php if($cronpublish) { ?> checked="checked"<?php } ?> />��ʱ����</label>
<input type="text" name="cronpublishdate" id="cronpublishdate" class="px" onclick="showcalendar(event, this, true, false, false, true);" autocomplete="off" value="<?php echo $cronpublishdate;?>" onchange="if(this.value) $('cronpublish').checked = true;">
</div>
<?php } } ?>

<div class="exfm cl" id="extra_additional_c" style="display: none;">
<div class="ptm cl">
<p><em class="xxmfst grey">��������</em></p>
<p class="xxm-label">
<?php if($_GET['action'] != 'edit') { if($_G['group']['allowanonymous']) { ?><label for="isanonymous"><input type="checkbox" name="isanonymous" id="isanonymous" class="pc" value="1" />ʹ����������</label><?php } } else { if($_G['group']['allowanonymous'] || (!$_G['group']['allowanonymous'] && $orig['anonymous'])) { ?><label for="isanonymous"><input type="checkbox" name="isanonymous" id="isanonymous" class="pc" value="1" <?php if($orig['anonymous']) { ?>checked="checked"<?php } ?> />ʹ����������</label><?php } } if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
<label for="hiddenreplies"><input type="checkbox" name="hiddenreplies" id="hiddenreplies" class="pc"<?php if($thread['hiddenreplies']) { ?> checked="checked"<?php } ?> value="1">���������߿ɼ�</label>
<?php } if($_G['uid'] && ($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) && $special != 3) { ?>
<label for="ordertype"><input type="checkbox" name="ordertype" id="ordertype" class="pc" value="1" <?php echo $ordertypecheck;?> />������������</label>
<?php } if(($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost)) { ?>
<label for="allownoticeauthor"><input type="checkbox" name="allownoticeauthor" id="allownoticeauthor" class="pc" value="1"<?php if($allownoticeauthor) { ?> checked="checked"<?php } ?> />���ջظ�֪ͨ</label>
<?php } if($_GET['action'] != 'edit' && helper_access::check_module('feed') && $_G['forum']['allowfeed']) { ?>
<label for="addfeed"><input type="checkbox" name="addfeed" id="addfeed" class="pc" value="1" <?php echo $addfeedcheck;?>>���Ͷ�̬</label>
<?php } ?>
<label for="usesig"><input type="checkbox" name="usesig" id="usesig" class="pc" value="1" <?php if(!$_G['group']['maxsigsize']) { ?>disabled <?php } else { ?><?php echo $usesigcheck;?> <?php } ?>/>ʹ�ø���ǩ��</label>
</p>
</div>
<div class="ptm cl">
<p><em class="xxmfst grey">�ı�����</em></p>
<p class="xxm-label">
<?php if(($_G['forum']['allowhtml'] || ($_GET['action'] == 'edit' && ($orig['htmlon'] & 1))) && $_G['group']['allowhtml']) { ?>
<label for="htmlon"><input type="checkbox" name="htmlon" id="htmlon" class="pc" value="1" <?php echo $htmloncheck;?> />HTML ����</label>
<?php } else { ?>
<label for="htmlon"><input type="checkbox" name="htmlon" id="htmlon" class="pc" value="0" <?php echo $htmloncheck;?> disabled="disabled" />HTML ����</label>
<?php } ?>
<label for="allowimgcode"><input type="checkbox" id="allowimgcode" class="pc" disabled="disabled"<?php if($_G['forum']['allowimgcode']) { ?> checked="checked"<?php } ?> />[img] ����</label>
<?php if($_G['forum']['allowimgcode']) { ?>
<label for="allowimgurl"><input type="checkbox" id="allowimgurl" class="pc" checked="checked" />����ͼƬ����</label>
<?php } ?>
<label for="parseurloff"><input type="checkbox" name="parseurloff" id="parseurloff" class="pc" value="1" <?php echo $urloffcheck;?> />��������ʶ��</label>
<label for="smileyoff"><input type="checkbox" name="smileyoff" id="smileyoff" class="pc" value="1" <?php echo $smileyoffcheck;?> />���ñ���</label>
<label for="bbcodeoff"><input type="checkbox" name="bbcodeoff" id="bbcodeoff" class="pc" value="1" <?php echo $codeoffcheck;?> />���ñ༭������</label>
<?php if($_G['group']['allowimgcontent']) { ?>
<label for="imgcontent"><input type="checkbox" name="imgcontent" id="imgcontent" class="pc" value="1" <?php echo $imgcontentcheck;?> onclick="switchEditor(this.checked?0:1);$('e_switchercheck').checked=this.checked;" />��������ͼƬ</label>
<?php } else { ?>
<label for="imgcontent"><input type="checkbox" name="imgcontent" id="imgcontent" class="pc" value="0" <?php echo $imgcontentcheck;?> disabled="disabled"/>��������ͼƬ</label>
<?php } ?>
</p>
</div>

<?php if($_GET['action'] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts'])) { if($_GET['action'] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts']) && ($_G['group']['allowstickthread'] || $_G['group']['allowdigestthread'])) { ?>
<div class="ptm cl">
<p><em class="xxmfst grey">�������</em></p>
<p class="xxm-label">
<?php if($_G['group']['allowstickthread']) { ?>
<label for="sticktopic"><input type="checkbox" name="sticktopic" id="sticktopic" class="pc" value="1" <?php echo $stickcheck;?> />�����ö�</label>
<?php } if($_G['group']['allowdigestthread']) { ?>
<label for="addtodigest"><input type="checkbox" name="addtodigest" id="addtodigest" class="pc" value="1" <?php echo $digestcheck;?> />��������</label>
<?php } ?>
</p>
</div>
<?php } } elseif($_GET['action'] == 'edit' && $_G['forum_auditstatuson']) { ?>
<div class="ptm cl">
<p><em class="xxmfst grey">�������</em></p>
<p class="xxm-label">
<label for="audit"><input type="checkbox" name="audit" id="audit" class="pc" value="1">ͨ�����</label>
</p>
</div>
<?php } ?>

</div>

<?php if(!empty($_G['setting']['pluginhooks']['post_attribute_extra_body'])) echo $_G['setting']['pluginhooks']['post_attribute_extra_body'];?>
</div>
</div>


<script type="text/javascript">
function showExtra(id) {
if ($('#'+id+'_c').css('display') == 'block') {
$('#'+id+'_b').attr("class","");
$('#'+id+'_c').css({'display':'none'});
} else {
var extraButton = $('#post_extra_tb').children('label');
var extraForm = $('#post_extra_c').children('div');

$.each($('#post_extra_tb > label'), function(){
$(this).attr("class","");
});

$.each($('#post_extra_c > div'), function(){
if($(this).hasClass('exfm')) {
$(this).css({'display':'none'});
}
});
$('#'+id+'_b').addClass('blue');
$('#'+id+'_c').css({'display':'block'});
}
}
</script>

    		  	  		  	  		     	  	  	    		   		     		       	 				 	    		   		     		       	 			 	     		   		     		       	   			    		   		     		       	 			  	    		   		     		       	  	 	     		   		     		       	  	 	     		   		     		       	   		     		   		     		       	 	  	     		   		     		       	  		      		   		     		       	  				    		   		     		       	  	  	    		   		     		       	  	 		    		   		     		       	 	  	     		   		     		       	  		      		   		     		       	  	       		   		     		       	 			 	     		   		     		       	  				    		   		     		       	 	  	     		   		     		       	   			    		   		     		       	   		     		   		     		       	  	 	     		   		     		       	 			  	    		   		     		       	 	  	     		   		     		       	   			    		   		     		       	 				 	    		   		     		       	   			    		   		     		       	  			     		   		     		       	  			     		   		     		       	  			     		   		     		       	 			 	     		   		     		       	  	  	    		   		     		       	   			    		   		     		       	  		      		   		     		       	 				      		   		     		       	 				      		 	      	  		  	  		     	<?php if($_GET['action'] != 'edit' && ($secqaacheck || $seccodecheck)) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<div class="b_p xxmfsf">
        ��֤�ʴ�: 
        <span><?php echo $secqaa;?></span>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="inxxm" placeholder="��" />
        </div>
<?php } if($seccodecheck) { ?>
<div class="sec_code vm">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
<input type="text" class="sec_code_input" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="��֤��" fwin="seccode">
        <img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=2" class="seccodeimg"/>
</div>
<?php } } ?>
<script type="text/javascript">
(function() {
$('.seccodeimg').on('click', function() {
$('#seccodeverify_<?php echo $sechash;?>').attr('value', '');
var tmprandom = 'S' + Math.floor(Math.random() * 1000);
$('.sechash').attr('value', tmprandom);
$(this).attr('src', 'misc.php?mod=seccode&update=<?php echo $ran;?>&idhash='+ tmprandom +'&mobile=2');
});
})();
</script>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['post_bottom_mobile'])) echo $_G['setting']['pluginhooks']['post_bottom_mobile'];?>
</div>
</div>
<!-- main postbox start -->



</form>


<script type="text/javascript">
(function() {
var needsubject = needmessage = false;

<?php if($_GET['action'] == 'reply') { ?>
needsubject = true;
<?php } elseif($_GET['action'] == 'edit') { ?>
needsubject = needmessage = true;
<?php } if($_GET['action'] == 'newthread' || ($_GET['action'] == 'edit' && $isfirstpost)) { ?>
$('#needsubject').on('keyup input', function() {
var obj = $(this);
if(obj.val()) {
needsubject = true;
if(needmessage == true) {
$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
$('.btn_pn').attr('disable', 'false');
}
} else {
needsubject = false;
$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
$('.btn_pn').attr('disable', 'true');
}
});
<?php } ?>
$('#needmessage').on('keyup input', function() {
var obj = $(this);
if(obj.val()) {
needmessage = true;
if(needsubject == true) {
$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
$('.btn_pn').attr('disable', 'false');
}
} else {
needmessage = false;
$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
$('.btn_pn').attr('disable', 'true');
}
});

$('#needmessage').on('scroll', function() {
var obj = $(this);
if(obj.scrollTop() > 0) {
obj.attr('rows', parseInt(obj.attr('rows'))+2);
}
}).scrollTop($(document).height());
 })();
</script>

<script src="<?php echo STATICURL;?>js/mobile/ajaxfileupload.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['style']['styleimgdir'];?>/images/buildfileupload.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<script type="text/javascript">
var imgexts = typeof imgexts == 'undefined' ? 'jpg, jpeg, gif, png' : imgexts;
var STATUSMSG = {
'-1' : '�ڲ�����������',
'0' : '�ϴ��ɹ�',
'1' : '��֧�ִ�����չ��',
'2' : '�����������޷��ϴ���ô��ĸ���',
'3' : '�û��������޷��ϴ���ô��ĸ���',
'4' : '��֧�ִ�����չ��',
'5' : '�ļ����������޷��ϴ���ô��ĸ���',
'6' : '���������޷��ϴ�����ĸ���',
'7' : '��ѡ��ͼƬ�ļ�(' + imgexts + ')',
'8' : '�����ļ��޷�����',
'9' : 'û�кϷ����ļ����ϴ�',
'10' : '�Ƿ�����',
'11' : '���������޷��ϴ���ô��ĸ���'
};
var form = $('#postform');
$(document).on('change', '#filedata', function() {
popup.open('<img src="' + IMGDIR + '/imageloading.gif">');

uploadsuccess = function(data) {
if(data == '') {
popup.open('�ϴ�ʧ�ܣ����Ժ�����', 'alert');
}
var dataarr = data.split('|');
if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
popup.close();
$('#imglist').append('<li><span aid="'+dataarr[3]+'" class="del"><a href="javascript:;"><img src="<?php echo STATICURL;?>image/mobile/images/icon_del.png"></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_'+dataarr[3]+'" title="'+dataarr[6]+'" src="<?php echo $_G['setting']['attachurl'];?>forum/'+dataarr[5]+'" /></a></span><input type="hidden" name="attachnew['+dataarr[3]+'][description]" /></li>');
} else {
var sizelimit = '';
if(dataarr[7] == 'ban') {
sizelimit = '(�������ͱ���ֹ)';
} else if(dataarr[7] == 'perday') {
sizelimit = '(���ܳ���'+Math.ceil(dataarr[8]/1024)+'K)';
} else if(dataarr[7] > 0) {
sizelimit = '(���ܳ���'+Math.ceil(dataarr[7]/1024)+'K)';
}
popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
}
};

if(typeof FileReader != 'undefined' && this.files[0]) {//note

$.buildfileupload({
uploadurl:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
files:this.files,
uploadformdata:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
uploadinputname:'Filedata',
maxfilesize:"<?php echo $swfconfig['max'];?>",
success:uploadsuccess,
error:function() {
popup.open('�ϴ�ʧ�ܣ����Ժ�����', 'alert');
}
});

} else {

$.ajaxfileupload({
url:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
data:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
dataType:'text',
fileElementId:'filedata',
success:uploadsuccess,
error: function() {
popup.open('�ϴ�ʧ�ܣ����Ժ�����', 'alert');
}
});

}
});

<?php if(0 && $_G['setting']['mobile']['geoposition']) { ?>
geo.getcurrentposition();
<?php } ?>
$('#postsubmit').on('click', function() {
var obj = $(this);
if(obj.attr('disable') == 'true') {
return false;
}

obj.attr('disable', 'true').removeClass('btn_pn_blue').addClass('btn_pn_grey');
popup.open('<img src="' + IMGDIR + '/imageloading.gif">');

var postlocation = '';
if(geo.errmsg === '' && geo.loc) {
postlocation = geo.longitude + '|' + geo.latitude + '|' + geo.loc;
}

$.ajax({
type:'POST',
url:form.attr('action') + '&geoloc=' + postlocation + '&handlekey='+form.attr('id')+'&inajax=1',
data:form.serialize(),
dataType:'xml'
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
})
.error(function() {
popup.open('����������⣬���Ժ�����', 'alert');
});
return false;
});

$(document).on('click', '.del', function() {
var obj = $(this);
$.ajax({
type:'GET',
url:'forum.php?mod=ajax&action=deleteattach&inajax=yes&aids[]=' + obj.attr('aid'),
})
.success(function(s) {
obj.parent().remove();
})
.error(function() {
popup.open('����������⣬���Ժ�����', 'alert');
});
return false;
});

</script><?php include template('common/footer'); ?>