<?php

/**
 *      This is NOT a freeware, use is subject to license terms
 *      Ӧ������: С��è-TWO�ֻ��� ��ҵ��
 *      ���ص�ַ: https://addon.dismall.com/templates/xxm_twowap.html
 *      Ӧ�ÿ�����: С��è���
 *      ������QQ: 2399835618
 *      ��������: 202208022103
 *      ��Ȩ����: www.jujugsgs.com
 *      ��Ȩ��: 2022051311pz4iu7uQGu
 *      δ��Ӧ�ó��򿪷���/�����ߵ�������ɣ����ý��з��򹤳̡������ࡢ�������ȣ��������Ը��ơ��޸ġ����ӡ�ת�ء���ࡢ�������桢��չ��֮�йص�������Ʒ����Ʒ��
 */

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

function xxm($language)
{
    $lang = array(

		'follow_add' => '��ע',
		'follow_del' => '�ѹ�ע',
		'follow_er' => '��˿',
		'huxiang' => '����',
		'was' => '��',
		'none' => '����',
		'tags' => '��ǩ��',
		'announcement' => '����',
		'forumlist' => '����',
		'detail' => '����',

	);
    $language = $lang[$language];
    if (CHARSET == 'gbk') {
        return $language;
    }
    return diconv($language, 'GBK', CHARSET);
}
    		  	  		  	  		     	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		 	      	  		  	  		     	