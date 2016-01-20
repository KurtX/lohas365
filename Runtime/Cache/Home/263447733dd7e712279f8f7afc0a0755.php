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
  <div class="lead_content do">
  <h6><?php echo ($question["title"]); ?></h6>
  <p class="w_tips"><?php echo ($question["intro"]); ?></p>
  <form id="form" action="<?php echo U('exam?exam_id='.$_GET['exam_id']);?>" method="post" onSubmit="return checkForm();">
    <input name="next_id" value="<?php echo ($next_id); ?>" type="hidden">
    <input name="question_id" value="<?php echo ($question["id"]); ?>" type="hidden">
    <?php switch($question["type"]): case "textarea": ?><!-- 文本框 -->
        <div class="form-item cf">
          <label class="item-label"><span class="check-tips"></span></label>
          <div class="controls">
            <textarea type="text" placeholder="请输入" class="text input-medium" name="answer"><?php echo ($data); ?></textarea>
          </div>
        </div><?php break;?>
      <?php case "checkbox": if(is_array($extra)): $i = 0; $__LIST__ = $extra;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-item cf">
            <label class="checkbox"> <input type="checkbox" value="<?php echo ($key); ?>" name="answer[]" 
              <?php if(in_array(($key), is_array($data)?$data:explode(',',$data))): ?>checked="checked"<?php endif; ?>
              ><?php echo ($key); ?>: <?php echo ($vo); ?> </label>
          </div><?php endforeach; endif; else: echo "" ;endif; break;?>
      <?php default: ?>
      <?php if(is_array($extra)): $i = 0; $__LIST__ = $extra;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-item cf">
          <label class="radio"> <input type="radio" value="<?php echo ($key); ?>" name="answer"                               
        
            <?php if(($data) == $key): ?>checked="checked"<?php endif; ?>
            ><?php echo ($key); ?>: <?php echo ($vo); ?> </label>
        </div><?php endforeach; endif; else: echo "" ;endif; endswitch;?>
    </div>
    <input class="lead_btn" id="submit" type="submit" value="下一题">
  </form>
  
</div>
<div class="bottom"></div>
<p class="copyright"><?php echo ($system_copy_right); ?></p>
<script type="text/javascript">
var is_require = "<?php echo ($question["is_must"]); ?>";
var widget = "<?php echo ($question["type"]); ?>";
function checkForm(){
	if(is_require=='0') return true;
	
	var content = '';
	var msg = '请先选择选项。';
	if(widget=='textarea'){
		content = $('textarea').val();
		msg = '当前的题目不能为空.';
	}else if(widget=='checkbox'){
		content = $("input[type='checkbox']:checked").val();
	}else{
		content = $("input[type='radio']:checked").val();
	}
	//console.log(content);
	//return false;
	if(content=='' || content==undefined){
		$.Dialog.fail(msg);
		return false;
	}

	return true;
}
</script> 
</body>
</html>