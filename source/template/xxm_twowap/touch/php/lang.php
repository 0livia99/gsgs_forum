<?php

/**
 *      This is NOT a freeware, use is subject to license terms
 *      应用名称: 小熊猫-TWO手机版 商业版
 *      下载地址: https://addon.dismall.com/templates/xxm_twowap.html
 *      应用开发者: 小熊猫设计
 *      开发者QQ: 2399835618
 *      更新日期: 202208022103
 *      授权域名: www.jujugsgs.com
 *      授权码: 2022051311pz4iu7uQGu
 *      未经应用程序开发者/所有者的书面许可，不得进行反向工程、反向汇编、反向编译等，不得擅自复制、修改、链接、转载、汇编、发表、出版、发展与之有关的衍生产品、作品等
 */

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

function xxm($language)
{
    $lang = array(

		'follow_add' => '关注',
		'follow_del' => '已关注',
		'follow_er' => '粉丝',
		'huxiang' => '互相',
		'was' => '已',
		'none' => '暂无',
		'tags' => '标签云',
		'announcement' => '公告',
		'forumlist' => '社区',
		'detail' => '详情',

	);
    $language = $lang[$language];
    if (CHARSET == 'gbk') {
        return $language;
    }
    return diconv($language, 'GBK', CHARSET);
}
    		  	  		  	  		     	   	       		   		     		       	   	       		   		     		       	   	       		   		     		       	 	   	    		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  	 	 	    		   		     		       	   	 	     		   		     		       	  		       		   		     		       	   		      		   		     		       	  		       		   		     		       	   		      		   		     		       	 	   	    		   		     		       	  			      		   		     		       	  	        		   		     		       	  	  	     		 	      	  		  	  		     	