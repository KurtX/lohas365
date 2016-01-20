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
<style type="text/css">
body,html{ background:#414e5f}
.head_hd img{ display:block; width:100%;}
.main_body{ margin:0 14px; position:relative;}
.main_body h6{ text-align:center; line-height:50px; padding:0 15px; font-size:20px; color:#eee;}
.main_body .intro{ padding:0 10px 0; color:#fff; font-size:13px; color:#ddd;}
.intro_content{ padding:5px 0; margin-bottom:10px;}
.vs{ overflow:hidden; position:relative; padding-bottom:30px; overflow:hidden; color:#fff}
.vs_item{ width:33%; text-align:center; position:relative; float:left; margin-bottom:15px;}
.vs_item img{ width:70px; height:70px; border-radius:100%; border:5px solid #fff; display:block; margin:20px auto; position:relative; z-index:100;}
.vs_item .count{ line-height:30px; font-size:12px; display:none}
.vs_item .name{ padding: 6px 5px;background: #647284;color:#fff;border-radius:5px;font-size:10px;display: block;margin: 0 10px;}
.circle_name{ border-radius:100%; background:#fff; color:#333; width:60px; height:40px; padding:20px 10px; display:inline-block; font-size:13px; text-align:center;}
.total_tips{ border-radius:10px; color:#fff; text-align:center; padding:5px 0; margin:0 50px; border:1px dashed #647284}
</style>
<body>
<div id="container" class="container">
	  <div class="head_hd">
          <img src="<?php echo (get_cover_url($info["cover"])); ?>" width="100%"/>
      </div>
      <div class="main_body">
      	   <h6><?php echo ($info["title"]); ?></h6>  
            <div class="intro">
               <p class="intro_content">
                    <?php echo ($info["desc"]); ?>
              </p>
           </div>
           <form class="vs" id="form">
           		<?php if(is_array($opts)): $i = 0; $__LIST__ = $opts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="vs_item vs_item_<?php echo ($i); ?>" data-count = "<?php echo ($vo["guess_count"]); ?>">
                        <input type="radio" name="optArr[]" value="<?php echo ($vo["id"]); ?>" style="display:none"/>
                        <?php if(!empty($vo[image])): ?><img <?php if(in_array($vo[id], $joinData)) echo 'style="border-color:#018455" '; ?> src="<?php echo (get_cover_url($vo["image"])); ?>"/>
                         	<span class="name"><?php echo ($vo["name"]); ?></span>
                        <?php else: ?>
                        	<span class="circle_name" <?php if(in_array($vo[id], $joinData)) echo 'style="background:#89dbfa" '; ?>><?php echo ($vo["name"]); ?></span><?php endif; ?>
                        
                       
                        <div><span class="count"><?php echo (intval($vo["guess_count"])); ?></span>人猜TA</div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <input type="hidden" value="<?php echo I('token');?>" name="token" />
                <input type="hidden" value="<?php echo I('wecha_id');?>" name="wecha_id" />
                <input type="hidden" value="<?php echo ($info["id"]); ?>" name="guess_id" />
           </form>
           <div class="total_tips"><span id="totalCount"><?php echo (intval($info["guess_count"])); ?></span>人参加</div>
          
      </div>
    </div>
<p class="copyright"><?php echo ($system_copy_right); ?></p>
<!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div> 
<script>
$.WeiPHP.initWxShare({
	title:"<?php echo ($info["title"]); ?>",
	imgUrl:"<?php echo (get_cover_url($info["cover"])); ?>",
	desc:"<?php echo ($info["desc"]); ?>",
	link:window.location.href
})

var canJoin = '<?php echo ($canJoin); ?>';
if(canJoin=="" || canJoin=='false'){
	$('.vs_item .count').show();
	$('.vs_item .progress').show();
}
$('.vs_item').click(function(){
	$.Dialog.loading();
	$(this).find('input').prop('checked',true);
	__this = $(this);
	$.ajax({
		url:"<?php echo U( 'saveGuess' );?>",
		data:$('#form').serializeArray(),
		dataType:"json",
		type:"POST",
		success:function(data){
			//console.log(data);
			if(data.result=='success'){
				$.Dialog.confirm("提示",data.msg);
				var totalCount = parseInt($('#totalCount').text())+1;
				$('#totalCount').text(totalCount)
				__this.find('.count').text(parseInt(__this.find('.count').text())+1);
				$('.vs_item .count').show();
				$('.vs_item .progress').show();
			}else{
				$.Dialog.fail(data.msg);
			}
			
		}
	})
})
</script>
</body>
</html>