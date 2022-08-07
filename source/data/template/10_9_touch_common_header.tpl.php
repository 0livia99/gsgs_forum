<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } ?>,<?php echo $_G['setting']['bbname'];?>" />
<title><?php if($_GET['forumlist'] == '1' || $_GET['mod'] == 'guide') { ?><?php echo $_G['setting']['bbname'];?><?php } else { if(!empty($navtitle)) { ?><?php echo $navtitle;?><?php } if(empty($nobbname)) { ?> - <?php echo $_G['setting']['bbname'];?><?php } } ?></title><?php include_once DISCUZ_ROOT.TPLDIR.'/touch/php/lang.php';?><style>
.xxmfcs, .xxm-filter a.a { color: <?php echo $_G['style']['zhuti'];?> !important; }
.xxmsmallbg, .searchxxm .xxmbutton, .button, .button2, .subforumshow h2 code:before, .button_pm, .btn-big .touch, .xxm-tattl-buy-button-fill a, .xxm-attach-buy-button-fill a, .btn-xxmlo .lrxxm, .btn-xxmregi .lrxxm, .btn_login .pn, .btn_qqlogin a, .btn_pn_blue, .btnxxmem, .xxm-filter a.a:after, .xxm-credit a.a:after, .balloon:focus + label, .balloon:active + label, .vtxxmpost-share li em { background: <?php echo $_G['style']['zhuti'];?> !important; }
.btn-xxmlo .lrxxm, .btn-xxmregi .lrxxm, .btn_login .pn, .btn_qqlogin a { border: 1px solid <?php echo $_G['style']['zhuti'];?> !important; }
.balloon:focus + label:after, .balloon:active + label:after { border-top: 4px solid <?php echo $_G['style']['zhuti'];?> !important; }
</style>
<link rel="stylesheet" href="<?php echo $_G['style']['styleimgdir'];?>/images/xxm.css?<?php echo VERHASH;?>" type="text/css" media="all">
<script src="<?php echo $_G['style']['styleimgdir'];?>/images/jquery.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo STATICURL;?>js/mobile/common.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<script src="<?php echo $_G['style']['styleimgdir'];?>/images/xxm.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<script src="<?php echo $_G['style']['styleimgdir'];?>/images/swiper.min.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<script src="<?php echo $_G['style']['styleimgdir'];?>/images/swiper-bundle.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $_G['style']['styleimgdir'];?>/images/swiper.min.css?<?php echo VERHASH;?>" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo $_G['style']['styleimgdir'];?>/images/font/iconfont.css?<?php echo VERHASH;?>">
</head>
<body class="bgxxmfff">
<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?>
