<?php

//网站地图文件，更有利于搜索引擎收录，如不需要可在FTP中删除

require './source/class/class_core.php';


C::app()->init();
global $_G;



echo <<<EOT
   
<style type="text/css">
@charset "gb2312";

#zm {
	   font-size:0px;
}


#jr {
	color: #000;
}


#zr {
	color: #000;
}


#tz {
	color: #000;
}


#hy {
	color: #000;
}


#mh1 {
	   font-size:0px;
}


#mh2 {
	color: #000;
}


#mh3 {
	color: #000;
}


#mh4 {
	color: #000;
}


#mh5 {
	color: #000;
}


#bbname {
	color: #e6175b;
	font-size:16px;
}

body {
	background-color: #CCC;
}


.author{
   color:3f3f3f;
   font-size:12px;
   padding-right: 1.55em;
}


.date{
   color:3f3f3f;
   font-size:10px;
}


.subject{
   color:fff;
}


a{
color:000;
text-decoration:none;
font-size:15px;
padding-right: 0.55em;
}


a:hover{
color: #a5a5a5;
}
</style>
    
<body>

     
EOT;

$forums = C::t('forum_forum')->fetch_all_by_status(1);
$fids = array();
foreach($forums as $forum) {
    $fids[$forum['fid']] = $forum['fid'];
}

$forum_fields = C::t('forum_forumfield')->fetch_all($fids);

foreach($forums as $forum) {
    if($forum_fields[$forum['fid']]['fid']) {
        $forum = array_merge($forum, $forum_fields[$forum['fid']]);
    }
 
    if($forum['type'] != 'group') {
        $threads += $forum['threads'];
        $posts += $forum['yesterdayposts'];
        $todayposts += $forum['todayposts'];
    } 
}

$today = strtotime(date("Y-m-d"),time());
$yesterday = $today - 24*60*60;

$today_ct = DB::result_first('SELECT count(*) FROM %t WHERE dateline>%i',array('forum_thread',$today));
$yesterday_ct = DB::result_first('SELECT count(*) FROM %t WHERE dateline>=%i and dateline<=%i',array('forum_thread',$yesterday,$today));

$count = C::t('common_member')->count();
$bbname = $_G['setting']['bbname'];
echo <<<EOT
    <div class="wp cl">
        <div class="bm bw0 cl">
        <p class="chart z"><span id="zm">???</span><span id="mh1">:</span><a href="../" target="_blank"><span id="bbname">$bbname</span></a><p><span id="jr">今日</span><span id="mh2">:</span><span id="todayposts">$today_ct</span> <span id="zr">昨日</span><span id="mh3">:</span><span id="posts">$yesterday_ct</span> <span id="tz">帖子</span><span id="mh4">:</span><span id="threads">$threads</span> <span id="hy">会员</span><span id="mh5">:</span><span id="count">$count</span></p>
  </div>
    </div>
    <div class="wp cl">
     <table   style="font-size:18px; color: #309;">

   
EOT;


$arr = array();

$pagesize = $data->pagesize ? $data->pagesize :40 ;  // ???????
$query = DB::query("SELECT COUNT(*) FROM %t ORDER BY dateline DESC",array('forum_thread'));
$amount = DB::result($query, 0);  // ??????????
$pagecount = $amount ? (($amount < $pagesize) ? 1 : (($amount % $pagesize) ? ((int)($amount / $pagesize) + 1) : ($amount / $pagesize))) : 0;  // ?????????
$page = !empty($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$page = $page > $pagecount ? 1 : $page;  // ???????
$startlimit = ($page - 1) * $pagesize;  // ?????????????

$query = DB::query("SELECT * FROM %t ORDER BY dateline DESC LIMIT {$startlimit}, {$pagesize}",array('forum_thread'));  // ????????
$multipage = multi($amount, $pagesize, $page, 'sitemap.php?get=string', $pagecount,20);  // ??????
if($amount){
    while($arr = DB::fetch($query)){
     $date = date('Y-m-d',$arr['dateline']);


     echo "<tr><td><a href=forum.php?mod=viewthread&tid=$arr[tid] ] target=\"_blank\">$arr[subject]</a></td><td>$post</td><td class=\"author\"><a href=\"../admin.php?action=members&operation=repeat&username=$arr[author]&submit=yes\" target=\"_blank\">$arr[author]</a></td><td class=\"date\">$date</td></tr>";
	 
             
    }
    
    echo "<tr style=\"whdth:20px;\"><td>$multipage</td></tr>" ;
}else{
    echo '没有记录';
}


echo <<<EOT
    </table>
    </div>
    </body>
    </html>
EOT;


















