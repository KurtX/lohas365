<?php if (!defined('THINK_PATH')) exit(); if(empty($list_data)): ?><div class="empty_container"><p>您的图文素材库为空，<a href="<?php echo U('Home/Material/material_lists');?>">请先增加素材</a></p></div>
<?php else: ?><div class="data_container"><ul class="material_list">
      <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[count]==1): ?><li class="appmsg_li" data-id="<?php echo ($vo["id"]); ?>" data-group_id="<?php echo ($vo["group_id"]); ?>" style="overflow:hidden">
            <div class="appmsg_item">
                <h6><?php echo ($vo["title"]); ?></h6>
                <p class="title"><?php echo (time_format($vo["cTime"])); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($vo["cover_id"])); ?>"/>
                </div>
                <p class="desc"><?php echo ($vo["intro"]); ?></p>
            </div>
            <div class="hover_area"></div>
        </li><?php else: ?><li class="appmsg_li" data-id="<?php echo ($vo["id"]); ?>" data-group_id="<?php echo ($vo["group_id"]); ?>" style="overflow:hidden">
            <div class="appmsg_item">
                <p class="title"><?php echo (time_format($vo["cTime"])); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($vo["cover_id"])); ?>"/>
                    <h6><?php echo ($vo["title"]); ?></h6>
                </div>
                <p class="desc"><?php echo ($vo["intro"]); ?></p>
            </div>
            <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="appmsg_sub_item">
                <p class="title"><?php echo ($vv["title"]); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($vv["cover_id"])); ?>"/>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="hover_area"></div>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?></ul><?php endif; ?>
<div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div></div>