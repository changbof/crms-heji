<?php /* Smarty version Smarty-3.1.15, created on 2014-08-22 03:37:31
         compiled from "D:\Server\www\crms\include\template\simple_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1134053f64a7bc009f6-95609943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6cbaa588dcb6d739f0f22d8d37e5a15d2e26118' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\simple_header.tpl',
      1 => 1406818212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1134053f64a7bc009f6-95609943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53f64a7bc97cf9_36777342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f64a7bc97cf9_36777342')) {function content_53f64a7bc97cf9_36777342($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
 - <?php echo @constant('ADMIN_TITLE');?>
</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/stylesheets_<?php if ($_smarty_tpl->tpl_vars['user_info']->value) {?><?php echo $_smarty_tpl->tpl_vars['user_info']->value['template'];?>
<?php } else { ?>default<?php }?>/theme.css">
    <link rel="stylesheet" href="<?php echo @constant('ADMIN_URL');?>
/assets/lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/jquery-1.8.3.min.js" ></script>
	<script src="<?php echo @constant('ADMIN_URL');?>
/assets/js/other.js" ></script>

    <!-- Demo page code -->
    
    <!-- script> if(self!=top){ window.open(self.location,'_top'); } </script -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { 
          font-family: georgia, serif; 

        }
        .brand .first,
        .brand .second  {
          font-family: georgia, serif; 
          color: #F79B25;
          font-weight: bold;
        }
        .brand .second {
            color:#fff;
            margin-left: 5px;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head><?php }} ?>
