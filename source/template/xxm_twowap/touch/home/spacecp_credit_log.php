<?php echo 'QQ:2399835618';exit;?>
<!--{template common/header}-->
<!--{subtemplate home/spacecp_header}-->
<!--{subtemplate home/spacecp_credit_header}-->

<div class="credit-log-tab bg xxmbb1 log-flex-box cl">
    <a href="home.php?mod=spacecp&op=log&ac=credit" class="log-flex<!--{if !$_GET['income']}--> a<!--{/if}-->">{lang all}</a>
    <a href="home.php?mod=spacecp&op=log&ac=credit&income=1" class="log-flex<!--{if $_GET['income'] == 1}--> a<!--{/if}-->">{lang credit_income_1}</a>
    <a href="home.php?mod=spacecp&op=log&ac=credit&income=-1" class="log-flex<!--{if $_GET['income'] == -1}--> a<!--{/if}-->">{lang credit_income_2}</a>
</div>

<!--{if $loglist}-->
<div class="credit-log-detail mtm mbm cl">
    <ul>
        <!--{loop $loglist $value}-->
        <!--{eval $value = makecreditlog($value, $otherinfo);}-->
        <li class="cl">
            <p class="log-flex-box log-align-items-center log-justify-content-between">
                <span>
                    <!--{if $value['operation']}-->
                    <a href="home.php?mod=spacecp&ac=credit&op=log&optype=$value['operation']">$value['optype']</a>
                    <!--{else}-->
                    $value['title']
                    <!--{/if}-->
                </span>
                <span>{$value['credit']}</span>
            </p>
            <p class="log-flex-box log-align-items-center log-justify-content-between">
                <span class="txt grey">
                    <!--{if $value['operation']}-->
                    $value['opinfo']
                    <!--{else}-->
                    $value['text']
                    <!--{/if}-->
                </span>
                <span class="mtime">$value['dateline']</span>
            </p>
        </li>
        <!--{/loop}-->
    </ul>
    <!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
</div>
<!--{else}-->
<div class="hm grey mtm mbm cl">
    <p>{lang doing_no_replay}</p>
</div>
<!--{/if}-->

<!--{template common/footer}-->
    		  	  		  	  		     	  		      		   		     		       	  			     		   		     		       	   		     		   		     		       	  		      		   		     		       	   		     		   		     		       	  	 		    		   		     		       	   		     		 	      	  		  	  		     	