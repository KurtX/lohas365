<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/weiphp3.0/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/weiphp3.0/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/weiphp3.0/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/weiphp3.0/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/weiphp3.0/Public/static/emoji.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/weiphp3.0/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/weiphp3.0/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/weiphp3.0/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/weiphp3.0/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/weiphp3.0/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/weiphp3.0/Public/static/zclip/ZeroClipboard.min.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/weiphp3.0/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/weiphp3.0/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/weiphp3.0/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/weiphp3.0/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/weiphp3.0/Public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script type="text/javascript">
var  IMG_PATH = "/weiphp3.0/Public/Home/images";
var  STATIC = "/weiphp3.0/Public/static";
var  ROOT = "/weiphp3.0";
var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">
    
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>">
       <?php if(!empty($userInfo[website_logo])): ?><img height="52" src="<?php echo (get_cover_url($userInfo["website_logo"])); ?>"/>
       	<?php else: ?>
       		<img height="52" src="/weiphp3.0/Public/Home/images/logo.png"/><?php endif; ?>
       </a>
        <?php if(is_login()): ?><div class="switch_mp">
            	<a href="#"><?php echo ($public_info["public_name"]); ?><b class="pl_5 fa fa-sort-down"></b></a>
                <ul>
                <?php if(is_array($myPublics)): $i = 0; $__LIST__ = $myPublics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/index/main', array('publicid'=>$vo[mp_id]));?>"><?php echo ($vo["public_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; ?>
      <?php $index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' ); $index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME ); ?>
       
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<?php if($myinfo["is_init"] == 0 ): ?><li><p>该账号配置信息尚未完善，功能还不能使用</p></li>
                    		<?php elseif($myinfo["is_audit"] == 0 and !$reg_audit_switch): ?>
                    		<li><p>该账号配置信息已提交，请等待审核</p></li>
                            <?php elseif($index_2 == 'home/public/*' or $index_3 == 'home/user/profile' or $index_2 == 'home/publiclink/*'): ?>
                    		
                    		<?php else: ?> 
                    		<?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    	
                    	
                        
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style="">
                                <?php if(!empty($myinfo[headimgurl])): ?><img class="admin_head url" src="<?php echo ($myinfo["headimgurl"]); ?>"/>
                                <?php else: ?>
                                    <img class="admin_head default" src="/weiphp3.0/Public/Home/images/default.png"/><?php endif; ?>
                                <?php echo (getShort($myinfo["nickname"],4)); ?><b class="pl_5 fa fa-sort-down"></b>
                            </a>
                            <ul class="dropdown-menu" style="display:none">
                               <?php if($mid==C('USER_ADMINISTRATOR')): ?><li><a href="<?php echo U ('Admin/Index/Index');?>" target="_blank">后台管理</a></li><?php endif; ?>
                            	<li><a href="<?php echo U ('Home/Public/lists');?>">公众号列表</a></li>
                                <li><a href="<?php echo U ('Home/Public/add');?>">账号配置</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php  if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>4))); } ?>
<div id="main-container" class="admin_container">
  <?php if(!empty($core_side_menu)): ?><div class="sidebar">
      <ul class="sidenav">
        <li>
          <?php if(!empty($now_top_menu_name)): ?><a class="sidenav_parent" href="javascript:;"> 
            <!--<img src="/weiphp3.0/Public/Home/images/left_icon_<?php echo ($core_side_category["left_icon"]); ?>.png"/>--> 
            <?php echo ($now_top_menu_name); ?></a><?php endif; ?>
          <ul class="sidenav_sub">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li>
        <?php if(!empty($addonList)): ?><li> <a class="sidenav_parent" href="javascript:;"> <img src="/weiphp3.0/Public/Home/images/ico1.png"/> 其它功能</a>
            <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> <i class="icon-chevron-right">
                  <?php if(!empty($vo['icon'])) { ?>
                  <img src="<?php echo ($vo["icon"]); ?>" />
                  <?php } ?>
                  </i> <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </li><?php endif; ?>
      </ul>
    </div><?php endif; ?>
  <div class="main_body">
    
  <div class="span9 page_message">
    <section id="contents">
      <ul class="tab-nav nav">
        <li class=""><a href="<?php echo U('lists');?>">竞猜列表<b class="arrow fa fa-sort"></b></a></li>
        <li class="current"><a href="javascript:;">新增竞猜活动<b class="arrow fa fa-sort"></b></a></li>
      </ul>
      <div class="tab-content"> 
        <!-- 表单 -->
        <?php $post_url || $post_url = U('add?model='.$model['id'], $get_param); ?>
        <form id="form" action="<?php echo ($post_url); ?>" method="post" class="form-horizontal form-center">
        	<ul id="tab" class="tab-pane in">
            	 <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>竞猜标题<span class="check-tips"></span></label>
                    <div class="controls">
                      <input type="text" class="text input-large" name="title" value="">
                    </div>
                  </li>  
                  <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>活动说明<span class="check-tips"></span></label>
                    <div class="controls">
                      <label class="textarea input-large">
                      <textarea class="text input-large" name="desc" ></textarea>
                      </label>
                    </div>
                  </li>  
                   <li class="form-item cf">
                  		<label class="item-label"><span class="need_flag">*</span>主题图片<span class="check-tips"></span></label>
                		<div class="controls uploadrow2" title="点击修改图片" rel="cover">
                            <input type="file" id="upload_picture_cover">
                            <input type="hidden" name="cover" id="cover_id_cover" value="<?php echo ($data["cover"]); ?>"/>
                            <div class="upload-img-box" rel="img">
                              <?php if(!empty($data[cover])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($data["cover"])); ?>"/></div>
                                <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
                            </div>
                      </div>
                  </li> 
                  <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>有效期<span class="check-tips"></span></label>
                    <div class="controls">
                       <input type="datetime" name="start_time" class="text time" value="" placeholder="请选择时间" /> - 
                       <input type="datetime" name="end_time" class="text time" value="" placeholder="请选择时间" />
                    </div>
                  </li>   
                 
                  <!--选项 -->
                 <li class="form-item cf">
                    <label class="item-label">添加竞猜选项<span class="check-tips"> </span></label>
                    <div class="controls">
                        <table id="option_list" class="add_list_table" cellpadding="0" cellspacing="1">
                          
                          <tr class="add_list add_list_head" <?php if(empty($option_list)): ?>style="display:none"<?php endif; ?>>
                            <td class="pic_td">图片(上传正方形最佳)</td>
                            <td>标题</td>
                            <td>排序</td>
                            <td>操作</td>
                          </tr>
                          
                          <?php if(is_array($option_list)): $i = 0; $__LIST__ = $option_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="add_list">
                            <td class="pic_td">
                            <div class="uploadrow" title="更改图片">
                            <input type="file" class="uploadImage" id="uploadImage_exist_<?php echo ($vo["id"]); ?>" rel="<?php echo ($vo["id"]); ?>">
                            <input type="hidden" name="image[<?php echo ($vo["id"]); ?>]" id="cover_id_<?php echo ($vo["id"]); ?>"/>
                            <div class="upload-img-box">
                              <?php if(!empty($vo["image"])): ?><div class="upload-pre-item"><img width="120" height="120" src="<?php echo (get_cover_url($vo["image"])); ?>"/></div><?php endif; ?>
                            </div>
                            </div>
                            </td>
                            <td>
                            <input type="text" value="" name="name[<?php echo ($vo["id"]); ?>]" class="text input-large" style="width:250px">&nbsp;
                            </td>
                            <td>
                            <input type="text" value="" name="order[<?php echo ($vo["id"]); ?>]" class="optionSort text input-large" style="width:80px">&nbsp;
                            </td>
                            <td>
                            <a href="javascript:;" onClick="delOpt(this)" class="fr btn btn-yellow" >删除</a>
                            </td>
                           </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                          </table>
                      </div>
                      <p><a href="javascript:;" class="btn btn-yellow mt_10 mb_10" onClick="addOpt()" >增加选项</a></p>
                  </li>       
            </ul>
          	<div class="form-item form_bh">
            	<button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            </div>
        </form>
      </div>
    </section>
  </div>

  </div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/weiphp3.0", //当前网站地址
		"APP"    : "/weiphp3.0/index.php?s=", //当前项目地址
		"PUBLIC" : "/weiphp3.0/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

  <link href="/weiphp3.0/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <?php if(C('COLOR_STYLE')=='blue_color') echo '
    <link href="/weiphp3.0/Public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/weiphp3.0/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/weiphp3.0/Public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script> 
  <script type="text/javascript" src="/weiphp3.0/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
<script type="text/javascript">
//上传图片
/* 初始化上传插件 */
var node = '';
function initPuls(){
	$(".uploadImage").each(function(index, obj) {
		var id = $(obj).attr('rel');
		if(id>0)
			node = '#uploadImage_exist_'+id;
		else
		    node = '#uploadImage_'+(0-id);
		$(node).uploadify({
			"height"          : 120,
			"swf"             : "/weiphp3.0/Public/static/uploadify/uploadify.swf",
			"fileObjName"     : "download",
			"buttonText"      : "上传图片",
			"uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
			"width"           : 120,
			'removeTimeout'	  : 1,
			'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
			"onUploadSuccess" : function(file, data, response) {
                uploadPictureimage(file, data, id);
            }
	    });
	});
}

function uploadPictureimage(file, data, id){
	var data = $.parseJSON(data);
	var src = '';
	if(data.status){
		$("#cover_id_"+id).val(data.id);
		src = data.url || '/weiphp3.0' + data.path;
		$("#cover_id_"+id).parent().find('.upload-img-box').html(
			'<div class="upload-pre-item"><img width="120" height="120" src="' + src + '"/></div>'
		);
	} else {
		updateAlert(data.info);
		setTimeout(function(){
			$('#top-alert').find('button').click();
			$(that).removeClass('disabled').prop('disabled',false);
		},1500);
	}
}

function addOpt(){
	var i = 1;
	$('.optionSort').each(function(){i++;});
	var id = 0-i;
	
	var html = '<tr class="add_list"><td class="pic_td"><div class="uploadrow" title="更改图片">'
		+'<input type="file" class="uploadImage" id="uploadImage_'+i+'" rel="'+id+'"/>'
		+'<input type="hidden" name="image['+id+']" id="cover_id_'+id+'"/>'
		+'<div class="upload-img-box"></div>'
		+'</div></td><td>'
		+'<input type="text" value="" name="name['+id+']" class="text input-large" style="width:250px">'
		+'</td><td>'
		+'<input type="text" value="'+i+'" name="order['+id+']" class="optionSort text input-large" style="width:80px">&nbsp;'
		+'</td><td>'
		+'<a href="###" onClick="delOpt(this)" class="fr btn btn-yellow" >删除</a></td></tr>';
	$('#option_list').append(html);
	initPuls(); 
	$('.add_list_head').show();
}
function delOpt(obj){
	$(obj).parents('tr').remove();
}
$(function(){ 
	initUploadImg();
   initPuls(); 
});
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });	
    showTab();
	
	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;		
		
	     if($(this).is(":selected") || $(this).is(":checked")){
			 change_event(this)
		 }
	});
	
	$('.toggle-data').bind("click",function(){ change_event(this) });
});
</script> 
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div style='display:none'><?php echo ($tongji_code); ?></div>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>