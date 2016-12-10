<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>WMS-仓储管理系统</title>
        <link type="text/css" rel="stylesheet" media="all" href="/wms/Public/styles/global.css" />
        <link type="text/css" rel="stylesheet" media="all" href="/wms/Public/styles/global_color.css" /> 
        <script src="/wms/Public/js/jquery-1.9.1.min.js"></script>
        <script src="/wms/Public/layer/layer.js"></script>
        <script src="/wms/Public/js/user.js"></script>
    </head>
    <body>
        <!--Logo区域开始-->
        <div id="header">
            <img src="/wms/Public/images/logo.png" alt="logo" class="left"/>
            <span style="font-weight:bold;">Hi!</span>  
            <span style="color:white;font-weight:bold;"><?php echo ($infos["nickname"]); ?></span> 
            <a href="<?php echo U('Login/loginout');?>" >[退出]</a>            
        </div>
        <!--Logo区域结束-->
        
        <!--导航区域开始-->
        <div id="navi">                        
            <ul id="menu">
                <li><a href="<?php echo U('Index/index');?>" class="index_off"></a></li>
                <li><a href="<?php echo U('Role/index');?>" class="role_off"></a></li>
                <li><a href="<?php echo U('Admin/index');?>" class="admin_off"></a></li>
                <li><a href="<?php echo U('Store/index');?>" class="store_off"></a></li>
                <li><a href="<?php echo U('Account/index');?>" class="emp_off"></a></li>
                <li><a href="<?php echo U('Buy/index');?>" class="buy_off"></a></li>               
                <li><a href="<?php echo U('Sell/index');?>" class="sell_off"></a></li>
                <li><a href="<?php echo U('Goods/index');?>" class="warehouse_off"></a></li>
                <li><a href="<?php echo U('User/info');?>" class="information_off"></a></li>
                <li><a href="<?php echo U('User/pwd');?>" class="password_off"></a></li>
            </ul>            
        </div>
        <!--导航区域结束-->
 
     


        <!--主要区域开始-->
        <div id="main">            

            <form action="/wms/index.php/Attribute/add" method="post" class="main_form">
                
                <div class="text_info clearfix"><span>属性名称：</span></div>
                <div class="input_info">
                    <input type="text" class="width200" name="name" value=''/>
                    <span class="required">*</span>
                    <div class="validate_msg_medium">不能为空，且为20长度的字母、数字和汉字的组合</div>
                </div>                    

                <div class="text_info clearfix"><span>商品类型：</span></div>
                <div class="input_info">
  
                        <select name="category_id">
<!--遍历类型-->                            
<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> 
                        </select>  
                    <span class="required">
<input type="button" value="增加" class="btn_add" onclick="location.href='<?php echo U('Category/add');?>';" />
                    </span>
                    <div class="validate_msg_tiny">至少选择一个类型</div>
                </div>                
                          
                
                
                    <div class="text_info clearfix"><span>按钮类型：</span></div>
                    <div class="input_info">
                        <select name="type">
                            <option value="text">文本框</option>
                            <option value="textarea">内容框</option>
                            <option value="checkbox">多选框</option>
                            <option value="radio">单选框</option>
                            <option value="select">下拉框</option>
                            <option value="number">数字框</option>
                            <option value="range">滑动条</option>
                            <option value="date">日期</option>
                            <option value="time">时间</option>
                            <option value="email">邮箱</option>
                        </select>  
                    </div>                  
                
                <div class="text_info clearfix"><span>内容：</span></div>
                <div class="input_info_high">
                    <textarea class="width300 height70" name='content'></textarea>
                    <div class="validate_msg_short ">100长度的字母、数字、汉字和下划线的组合</div>
                </div>                                               
                
                <div class="text_info clearfix"><span>备注：</span></div>
                <div class="input_info_high">
                    <textarea class="width300 height70" name='note'></textarea>
                    <div class="validate_msg_short ">100长度的字母、数字、汉字和下划线的组合</div>
                </div>  
                
                <div class="button_info clearfix">
                    <input type="button" value="保存" class="btn_save" onclick="send()" />
                    <input type="button" value="取消" class="btn_save" />
                </div>
            </form>
        </div>
        <!--主要区域结束-->

        
<script type="text/javascript">
    function send(){

                $.ajax({
                    url: '/wms/index.php/Attribute/add',
                    type: 'post',
                    dataType:'json',
                    data: $(".main_form").serializeArray(),
                    success: function(data) {

                        //判断是否添加成功！
                        if(data.status==0){
                            layer.msg(data.info,{icon: 5});
                        }else{
                            layer.msg(data.info,{icon: 6});

                            //延迟跳转
                            setTimeout(function () {
                                location.href = "<?php echo U('Attribute/index');?>";
                            }, <?php echo C('AJAX_TIME');?>);


                        }

                    }
                });

            
    }
</script>   
<script type="text/javascript">
    $(function(){
        //点击之后的图标
        $('.bill_off').addClass('bill_on').removeClass('bill_off');
    }); 
    
</script>        


        <div id="footer">
            <p>[ 源自技昂，专注WMS，TMS，POD的解决方案 ]</p>
            <p>版权所有(C)苏州技昂信息技术有限公司 </p>
        </div>
    </body>
</html>