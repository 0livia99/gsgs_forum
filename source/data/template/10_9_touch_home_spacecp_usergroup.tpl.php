<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_usergroup');
0
|| checktplrefresh('./template/xxm_twowap/touch/home/spacecp_usergroup.htm', './template/xxm_twowap/touch/home/spacecp_header.htm', 1659872593, '9', './data/template/10_9_touch_home_spacecp_usergroup.tpl.php', './template/xxm_twowap', 'touch/home/spacecp_usergroup')
|| checktplrefresh('./template/xxm_twowap/touch/home/spacecp_usergroup.htm', './template/xxm_twowap/touch/home/spacecp_header_name.htm', 1659872593, '9', './data/template/10_9_touch_home_spacecp_usergroup.tpl.php', './template/xxm_twowap', 'touch/home/spacecp_usergroup')
;?><?php include template('common/header'); if(in_array($do, array('buy', 'exit'))) { } elseif($do == 'switch') { } elseif($do == 'forum') { ?><!-- header start -->
<header class="header">
    <div class="nav">
       <a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1" class="z xxmfont iconzuo xxmfstt"></a>
   <span><?php if($actives['profile']) { ?>
��������
<?php } elseif($actives['verify']) { ?>
��֤
<?php } elseif($actives['avatar']) { ?>
�޸�ͷ��
<?php } elseif($actives['credit']) { ?>
����
<?php } elseif($actives['usergroup']) { ?>
�ҵ�<?php echo $_G['setting']['navs']['2']['navname'];?>Ȩ��
<?php } elseif($actives['privacy']) { ?>
��˽ɸѡ
<?php } elseif($actives['sendmail']) { ?>
�ʼ�����
<?php } elseif($actives['password']) { ?>
���밲ȫ
<?php } elseif($actives['promotion']) { ?>
�����ƹ�
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?>
    		  	  		  	  		     	  			     		   		     		       	  				    		   		     		       	  			     		   		     		       	 	   	    		   		     		       	  		      		   		     		       	  		 	    		   		     		       	 	   	    		   		     		       	  		 	    		   		     		       	  				    		   		     		       	  	 	     		   		     		       	 	   	    		   		     		       	  			     		   		     		       	   			    		   		     		       	   		     		 	      	  		  	  		     	</span>
   <div class="y"><a href="forum.php"><span class="xxmfont iconhome"></span></a></div>
   </div>
</header>
<!-- header end -->

<div class="xxm-at-form cl">
<div class="b_p">
<div class="mbm hm grey">�ҵ����û��� - <?php echo $_G['group']['grouptitle'];?></div>
<table cellpadding="0" cellspacing="0">
<tr>
<th>�������</th><?php if(is_array($perms)) foreach($perms as $perm) { ?><td><?php echo $permlang['perms_'.$perm];?></td>
<?php } ?>
</tr><?php $key = 1;?><?php if(is_array($_G['cache']['forums'])) foreach($_G['cache']['forums'] as $fid => $forum) { if($forum['status']) { ?>
<tr <?php if($key++%2==0) { ?>class="alt"<?php } ?>>
<th<?php if($forum['type'] == 'forum') { ?> style=""<?php } elseif($forum['type'] == 'sub') { ?> style="font-size: 12px;padding-left: 20px;"<?php } ?>><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="grey"><?php echo $forum['name'];?></th><?php if(is_array($perms)) foreach($perms as $perm) { ?><td>
<?php if(!empty($verifyperm[$fid][$perm])) { if($myverifyperm[$fid][$perm] || $forumperm[$fid][$perm]) { ?>
<img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" class="vm" />
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" class="vm" />
<?php } ?>
&nbsp;<?php echo $verifyperm[$fid][$perm];?>
<?php } else { if($forumperm[$fid][$perm]) { ?><img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" /><?php } else { ?><img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" /><?php } } ?>
</td>
<?php } ?>
</tr>
<?php } } ?>
</table>
<div class="hm b_p">
<img src="<?php echo IMGDIR;?>/data_valid.gif" alt="data_valid" class="vm" /> ��ʾ��Ȩ����&nbsp;
<img src="<?php echo IMGDIR;?>/data_invalid.gif" alt="data_invalid" class="vm" /> ��ʾ��Ȩ����&nbsp;
<?php if($_G['setting']['verify']['enabled']) { echo implode('', $verifyicon); ?> ��ʾ����ӵ��ָ������֤
<?php } ?>
</div>
</div>
</div>

<?php } elseif($do == 'expiry' || $do == 'list') { } else { } include template('common/footer'); ?>    		  	  		  	  		     	  	 			    		   		     		       	   	 		    		   		     		       	   	 		    		   		     		       	   				    		   		     		       	   		      		   		     		       	   	 	    		   		     		       	 	        		   		     		       	 	        		   		     		       	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		   		     		       	 	        		 	      	  		  	  		     	