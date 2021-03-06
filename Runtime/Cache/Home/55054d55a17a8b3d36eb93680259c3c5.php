<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" type="text/css" href="/weiphp3.0/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript">
		//静态变量
		var IMG_PATH = "/weiphp3.0/Public/Home/images";
		var STATIC_PATH = "/weiphp3.0/Public/static";
		var SITE_URL = "<?php echo SITE_URL;?>";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <script type="text/javascript" src="/weiphp3.0/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="http://yaotv.qq.com/shake_tv/include/js/lib/zepto.1.1.4.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="minify.php?f=/weiphp3.0/Public/Home/js/prefixfree.min.js,/weiphp3.0/Public/Home/js/m/dialog.js,/weiphp3.0/Public/Home/js/m/flipsnap.min.js,/weiphp3.0/Public/Home/js/m/mobile_module.js&v=<?php echo SITE_VERSION;?>"></script>
</head>	
<link href="<?php echo ADDON_PUBLIC_PATH;?>/css.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
	<div id="container" class="container">
    	<div class="top"></div>
    	<div class="lead_box">
        	<h6><?php if(empty($info['finish_tip'])): ?>考试完成，谢谢参与<?php else: echo ($info["finish_tip"]); endif; ?></h6>
            <p class="course">你的得分为：<span><?php echo ($score); ?>分</span></p>
        	
         <?php $event_url = event_url ( '微考试', $info[id] ); if(!empty($event_url)) { ?>
        <a class="share_btn" href="<?php echo ($event_url); ?>">参加抽奖活动</a>
        <?php } ?>
        
            <a href="javascript:;" onClick="closepage();" class="share_btn">返回微信</a>
        </div>
        <div class="bottom"></div>
    </div>
    <p class="copyright"><?php echo ($system_copy_right); ?></p>
    
<script type="text/javascript">
function closepage(){
	WeixinJSBridge.call('closeWindow');
}
</script>
</body>
</html>