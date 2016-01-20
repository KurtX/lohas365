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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/scratch.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body id="scratch">
<div class="container body">
    
</div>
<script type="text/javascript">  
 var prize=null;
$(function(){
	$('#scratch').css('min-height',$(window).height());
	$.Dialog.loading();
	$.ajax({
            url:"<?php echo ($ajaxDataUrl); ?>",
            async:false,
            dataType : "jsonp",
            timeout : 10000,
			success : function (d) {
				$.Dialog.close();
				$('#scratch .container').html(decodeURIComponent(d.html));
  				prize=$.parseJSON(decodeURIComponent(d.prizeJson));
				try{ 
					initCanvas(document.body.style);
				}catch(e){ 
					alert('您的手机不支持刮刮卡效果哦~!'+e); 
				} 
			}
	})
	
})   
var is_set = 0;
function initCanvas(bodyStyle){ 
	var u = navigator.userAgent;
	var mobile = ''; 
	if(u.indexOf('iPhone') > -1 || u.indexOf('iPod') > -1 || u.indexOf('iPad') > -1) mobile = 'iphone'; 
	if(u.indexOf('Android') > -1 || u.indexOf('Linux') > -1 || u.indexOf('windows') > -1) mobile = 'Android';         
	bodyStyle.mozUserSelect = 'none';         
	bodyStyle.webkitUserSelect = 'none';           
	var img = new Image();         
	var canvas = $('canvas');         
	canvas.css({'background-color':'transparent'}); 
	var w = $('.container').width()/2; 
	var h =  w/2;      
	$('.prize_text').css({'width':w,'height':h,'margin-left':-w/2,'line-height':h+'px'});
	$('.scratch_area').css({'width':w,'height':h,'margin-left':-w/2}); 
	
	$('canvas').css({'margin-left':-w/2});
	//alert($('.container').width()+"="+w+"=="+h);
	canvas[0].width = w;
	canvas[0].height = h;  
	img.addEventListener('load',function(e){  
		var ctx;
		///var w = img.width, h = img.height;             
		var offsetX = canvas.offset().left, offsetY =  canvas.offset().top;             
		var mousedown = false;               
		function layer(ctx){                 
			//ctx.fillStyle = 'gray';                 
			//ctx.fillRect(0, 0, w, h);
			
			var coverImg = new Image();
			coverImg.src = "<?php echo ADDON_PUBLIC_PATH;?>/text_bg.jpg";
			coverImg.onload=function(){
				ctx.drawImage(coverImg,0,0,w,h);    
			}
			
		}   
		function eventDown(e){                 
			e.preventDefault();                 
			mousedown=true;             
		}   
		function eventUp(e){                 
			e.preventDefault();                 
			mousedown = false;
			var data=ctx.getImageData(0,0,w,h).data;
			for(var i=0,j=0;i<data.length;i+=4){
				if(data[i] && data[i+1] && data[i+2] && data[i+3]){
					j++;
				}
			}
			//console.log(j+"=="+(w*h*0.7));
			if(j<=w*h*0.9 && is_set==0){
				set_sn_code(); //刮开记录中奖情况
			//	var prize_id = <?php echo (intval($prize["id"])); ?>;
 				var prize_id=prize.id
				if(prize_id>0){
					//中奖
					openSuccessDialog();
					$('#now_my_prize').show();
				}else{
					openErrorDialog();
				}
				
				is_set = 1; //只能更新一次
			}             
		}    
		function eventMove(e){                 
			e.preventDefault();                 
			if(mousedown){       
				if(e.changedTouches){           
					e=e.changedTouches[e.changedTouches.length-1];                     
				}                     
				 
					var x = e.pageX - offsetX; 
					var y = e.pageY - offsetY; 
				
				//alert(x+"=="+y);
				with(ctx){  
					//beginPath();					
					//arc(x, y, 7, 0, Math.PI * 2);   
					//ctx.fillStyle =  'RGBA(255,255,255,.4)'; 
					//fill();     
					var radius=10;
					ctx.clearRect(x, y, radius, radius);
					/*
					$('canvas').css("opacity",0.99);  
					setTimeout(function(){
						$('canvas').css("opacity",1);  
						},5);
					   */          
				}                
			}             
		}               
		canvas.width=w;             
		canvas.height=h;    
		                
		ctx=canvas[0].getContext('2d');             
		//ctx.fillStyle='transparent';             
		//ctx.fillRect(0, 0, w, h);    
		layer(ctx);  
		             
		//ctx.globalCompositeOperation = 'destination-out'; 
		ctx.globalCompositeOperation = 'xor';               
		canvas[0].addEventListener('touchstart', eventDown);             
		canvas[0].addEventListener('touchend', eventUp);             
		canvas[0].addEventListener('touchmove', eventMove);             
		canvas[0].addEventListener('mousedown', eventDown);             
		canvas[0].addEventListener('mouseup', eventUp);             
		canvas[0].addEventListener('mousemove', eventMove);    
		$('.prize_text').show();
		canvas.css({'background-image':'url('+img.src+')'});
		
		
	});
	
	img.src = '<?php echo ADDON_PUBLIC_PATH;?>/text_bg.png';

};    
function openSuccessDialog(){
//		$.Dialog.confirm('提示','恭喜你获得了<?php echo ($prize["title"]); ?>,奖品是<?php echo ($prize["name"]); ?>，请联系客服领取。');
 		if(prize.img==undefined||prize.img==""){
 			$.Dialog.confirm('提示','恭喜你获得了'+prize.title+',奖品是'+prize.name+'，请联系客服领取。');
 		}else{
 			$.Dialog.confirm('提示','恭喜你获得了'+prize.title+',奖品是'+prize.name+'，请联系客服领取。'+'<center><img width="90%" src="'+prize.img+'"/></center>');
 		}
 		
	}
function openErrorDialog(){
		var leftCount = $('#leftCount').text();
		var p='';
		if(leftCount==0||leftCount==null){
			var p='';
		}else{
			p='你还有'+leftCount+'次机会';
		}
		
		$.Dialog.confirm('提示','很抱歉！没有中奖，还需继续努力。'+p);
	}
function set_sn_code(){
	var url = "<?php echo addons_url('Scratch://Scratch/set_sn_code');?>";
	var id = "<?php echo ($data["id"]); ?>";
//	var prize_id = "<?php echo (intval($prize["id"])); ?>";
 	var prize_id=prize.id;
	$.post(url, {id:id, prize_id:prize_id});	
}
</script>
</body>
</html>