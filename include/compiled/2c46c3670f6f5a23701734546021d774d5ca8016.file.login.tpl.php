<?php /* Smarty version Smarty-3.1.15, created on 2014-08-22 03:37:34
         compiled from "D:\Server\www\crms\include\template\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2471853f64a7eb382d5-33332888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c46c3670f6f5a23701734546021d774d5ca8016' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\login.tpl',
      1 => 1406819066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2471853f64a7eb382d5-33332888',
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
  'unifunc' => 'content_53f64a7ebdfac3_24962370',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f64a7ebdfac3_24962370')) {function content_53f64a7ebdfac3_24962370($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("simple_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 <script> if(self!=top){ window.open(self.location,'_top'); } </script>
  <body class="simple_body"> 
  <!--<![endif]-->
    
  <div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
        </ul>
        <a class="brand" href="<?php echo @constant('ADMIN_URL');?>
/index.php"><span class="first"><?php echo @constant('COMPANY_NAME');?>
</span> <span class="second"><?php echo @constant('ADMIN_TITLE');?>
</span></a>
    </div>
</div>
<div>
<div class="container-fluid">	    
    <div class="row-fluid">	
	
    <div class="dialog">
		<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>
	
        <div class="block">
            <p class="block-heading">登入</p>
            <div class="block-body">
                <form name="loginForm" method="post" action="">
                    <label>账号</label>
                    <input type="text" class="span12" name="user_name" id="userName" value="<?php echo $_smarty_tpl->tpl_vars['_POST']->value['user_name'];?>
" required="true" autofocus="true">
                    <label>密码</label>
                    <input type="password" class="span12" name="password" value = "<?php echo $_smarty_tpl->tpl_vars['_POST']->value['password'];?>
" required="true" >
                    <label>坐席分机</label>
                    <input type="text" class="span12" name="ext" id="ext" value = "<?php echo $_smarty_tpl->tpl_vars['_POST']->value['ext'];?>
" required="true" >                    
                     <label>验证码</label>
					<input type="text" name="verify_code" class="span4" placeholder="输入验证码" autocomplete="off" required="required">
					<a href="#"><img title="验证码" id="verify_code" src="<?php echo @constant('ADMIN_URL');?>
/verify_code_cn.php" style="vertical-align:top"></a>
					<div class="clearfix"><input type="checkbox" name="remember" value="remember-me"> 记住我 
					<!-- span class="label label-info">一个月内不用填写用户名密码</span -->
					<input type="submit" class="btn btn-primary pull-right" name="loginSubmit" value="登入"/></div>
					
                </form>
            </div>
        </div>
        <p class="pull-right" style=""><a href="http://www.jozoo.net" target="blank"></a></p>
    </div>
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