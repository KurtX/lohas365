<?php if (!defined('THINK_PATH')) exit();?><meta charset="UTF-8">
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

<body style="background:#fff">
<div class="lists_data">
  <div class="span9 page_message">
    <section id="contents"> 
      <div class="table-bar">
        <div class="search-form fl">
        </div>
        <!-- 高级搜索 -->
        <div class="search-form fr cf">
          <input type="text" placeholder="请输入调研标题搜索" value="<?php echo I('title');?>" class="search-input" name="title">
            <a url="<?php echo U('lists',$get_param);?>" id="search" href="javascript:;" class="sch-btn"><i class="btn-search"></i></a> </div>
        </div>
        <!-- 多维过滤 --> 
      </div>
      <!-- 数据列表 -->
      <div class="data-table">
        <div class="table-striped">
          <table cellspacing="1">
            <!-- 表头 -->
            <thead>
              <tr>
                <th class="row-selected row-selected"> 
                  <?php if(!isRadio): ?><input type="checkbox" class="check-all regular-checkbox" id="checkAll">
                  <label for="checkAll"></label></th><?php endif; ?>
                <th width='8%'>编号</th>
                <th width='40%'>标题</th>
                <th width='40%'>发布时间</th>
              </tr>
            </thead>
            <!-- 列表 -->
            <tbody>
              <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td>
                   <?php if(empty($isRadio)): ?><input type="checkbox" id="check_<?php echo ($vo["id"]); ?>" name="ids[]" value="<?php echo ($vo["id"]); ?>" class="ids regular-checkbox">
                    	<label for="check_<?php echo ($vo["id"]); ?>"></label>
                    <?php else: ?>
                    	<input type="radio" id="check_<?php echo ($vo["id"]); ?>" name="ids[]" value="<?php echo ($vo["id"]); ?>" class="ids regular-radio">
                    	<label for="check_<?php echo ($vo["id"]); ?>"></label><?php endif; ?>
                  </td>
                  <td type="id"><?php echo ($vo["id"]); ?></td>
                  <td type="title"><?php echo ($vo["title"]); ?></td>
                   <td type="cTime"><?php echo (time_format($vo["cTime"])); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div>
    </section>
  </div>
  
<script type="text/javascript">
$(function(){
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
        if(query == '' ){
        	url="<?php echo U('lists',array('isAjax'=>1,'isRadio'=>$isRadio));?>";
        }
		window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });
	$('select[name=group]').change(function(){
		location.href = this.value;
	});	
	
})
</script> 
</body>
</html>