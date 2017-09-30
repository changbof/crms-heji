<?php /* Smarty version Smarty-3.1.15, created on 2015-05-22 00:14:42
         compiled from "D:\Server\www\crms\include\template\navibar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18042555e0472255838-85647001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4710fc4eaf87fe756c2af61824245ba18bd114e8' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\navibar.tpl',
      1 => 1415642353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18042555e0472255838-85647001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_555e047229bfa5_26811737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e047229bfa5_26811737')) {function content_555e047229bfa5_26811737($_smarty_tpl) {?>  <body class=""> 
    <!--<![endif]-->
    <style type="text/css">
        /*a.brand{background: url("<?php echo @constant('ADMIN_URL');?>
/assets/images/logo.png") no-repeat 0 0;padding-left:320px;min-width:330px;}*/
        .navbar-inner .sidebar-toggler {
            cursor: pointer;
            opacity: 0.5;
            filter: alpha(opacity=50);
            margin: 6px 6px 6px -10px;
            width: 29px;
            height: 29px;
            background-repeat: no-repeat;
            background-color: #242424;
            background-image: url(<?php echo @constant('ADMIN_URL');?>
/assets/images/sidebar-toggler.jpg);
            float:left;
        }
        .navbar-inner .sidebar-toggler:hover {
            filter: alpha(opacity=100);
            opacity: 1;
        }
    </style>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <ul class="nav pull-right">                
                <!-- li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">设置模板</a></li -->
                <?php if ($_smarty_tpl->tpl_vars['user_info']->value['setting']) {?>
                <li id="fat-menu" class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cog"></i>设置<i class="icon-caret-down"></i>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/setting.php">系统设置</a></li>
						<li><a href="#" onclick="openModal('13871231111');return false;">测试弹屏</a></li>
                        <li><a href="#" onclick="setfree();return false;">签入</a></li>
                        <li><a href="#" onclick="setbusy();return false;">签出</a></li>
                    </ul>
                </li>
                <?php }?>		
                <li id="fat-menu" class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">选择模板<i class="icon-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=default">默认模板</a></li>
                        <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=blacktie">黑色领结</a></li>
                        <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=wintertide">冰雪冬季</a></li>
                        <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=schoolpainting">青葱校园</a></li>
                    </ul>
                </li>
                <li id="fat-menu" class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i> <?php echo $_smarty_tpl->tpl_vars['user_info']->value['real_name'];?>

                        <i class="icon-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo @constant('ADMIN_URL');?>
/admin/profile.php">我的账号</a></li>
                        <li><a tabindex="-1" href="<?php echo @constant('ADMIN_URL');?>
/logout.php">登出</a></li>
                    </ul>
                </li>                 
            </ul>
            <div class="sidebar-toggler"></div>
            <a class="brand" href="<?php echo @constant('ADMIN_URL');?>
/index.php"><span class="first"><?php echo @constant('COMPANY_NAME');?>
</span> <span class="second"><?php echo @constant('ADMIN_TITLE');?>
</span></a>
            <form class="form-search pull-right" action="<?php echo @constant('ADMIN_URL');?>
/crms/diseases.php" style="margin:6px 10px;">
                <!--input type="text" name="key" class="search-query icon-search" placeholder="Search" / -->
                    <div class="input-append">
                      <input class="span2 search-query" type="text" name="key" placeholder="和济·知道" />
                      <button type="submit" class="btn">Search</button>
                    </div>
            </form>
        </div>
    </div>
<?php }} ?>
