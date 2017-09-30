<?php /* Smarty version Smarty-3.1.15, created on 2015-05-22 00:14:28
         compiled from "D:\Server\www\crms\include\template\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:227555e04643c4e20-68708029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c46c3670f6f5a23701734546021d774d5ca8016' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\login.tpl',
      1 => 1415111469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '227555e04643c4e20-68708029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    '_POST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_555e04644a14d5_53122392',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e04644a14d5_53122392')) {function content_555e04644a14d5_53122392($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("simple_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script> if(self!=top){ window.open(self.location,'_top'); } </script>
<body class="simple_body">
<!--<![endif]-->

<!--div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
        </ul>
        <a class="brand" href="<?php echo @constant('ADMIN_URL');?>
/index.php"><span class="first"><?php echo @constant('COMPANY_NAME');?>
</span> <span class="second"><?php echo @constant('ADMIN_TITLE');?>
</span></a>
    </div>
</div-->
<div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span10 offset1">
                <img src="<?php echo @constant('ADMIN_URL');?>
/assets/images/logo-heji.png" class="img-rounded">
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 login-panel">
                <div class="span4 offset2">
                    <div class="span12" style="text-align: center;">
                        <img src="<?php echo @constant('ADMIN_URL');?>
/assets/images/login-pi.jpg" class="img-rounded">
                    </div>
                    <div class="span12" style="text-align: center;padding-top:20px;"><span style="font-size: 1.2em;color:dimgray;display:inline-block;">仁爱 | 求实 | 进取 | 分享</span></div>
                </div>
                <div class="span4">
                    <div class="span11">
                        <?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

                        <h3>NCD· 预防营养客户管理系统</h3>
                        <div class="block">
                            <div class="block-body">
                                <form name="loginForm" method="post" action="" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">账号</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="user_name" id="userName" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['user_name'];?>
" required="true" autofocus="true">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">密码</label>
                                        <div class="controls">
                                            <input type="password" class="span10" name="password" value = "<?php echo $_smarty_tpl->tpl_vars['_POST']->value['password'];?>
" required="true" >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">坐席号</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="ext" id="ext" value = "<?php echo $_smarty_tpl->tpl_vars['_POST']->value['ext'];?>
" required="true" >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">验证码</label>
                                        <div class="controls">
                                            <input type="text" name="verify_code" class="span4" placeholder="输入验证码" autocomplete="off" required="required">
                                            <a href="#"><img title="验证码" id="verify_code" src="<?php echo @constant('ADMIN_URL');?>
/verify_code_cn.php" style="vertical-align:top"></a>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="checkbox" name="remember" value="remember-me"> 记住我
                                            <!-- span class="label label-info">一个月内不用填写用户名密码</span -->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="submit" class="btn btn-primary span5" name="loginSubmit" value="登入"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <p class="pull-right" style=""><a href="" target="blank"></a></p>
                    </div>
                </div>
            </div>
            <div class=" clearfix"></div>
            <script type="text/javascript">
                $("#verify_code").click(function(){
                    var d = new Date()
                    var hour = d.getHours();
                    var minute = d.getMinutes();
                    var sec = d.getSeconds();
                    $(this).attr("src","<?php echo @constant('ADMIN_URL');?>
/verify_code_cn.php?"+hour+minute+sec);
                });
                $('#userName').on('blur',function(){
                    if( $.isNumeric($(this).val()) ){
                        $('#ext').val($(this).val());
                    }
                });
            </script>

            <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php }} ?>
