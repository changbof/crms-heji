<?php /* Smarty version Smarty-3.1.15, created on 2015-05-22 00:14:28
         compiled from "D:\Server\www\crms\include\template\simple_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15072555e04645149d4-56429854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6cbaa588dcb6d739f0f22d8d37e5a15d2e26118' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\simple_header.tpl',
      1 => 1414431241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15072555e04645149d4-56429854',
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
  'unifunc' => 'content_555e0464561341_74275408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e0464561341_74275408')) {function content_555e0464561341_74275408($_smarty_tpl) {?><!DOCTYPE html>
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
        body.simple_body {
            background: #fff;
            background-image:none  ;
        }
        .simple_body h3{
            font-size: 20px;
            margin:0px;
            color:#49AABF;
            font-family: "Courier New" ;
        }
        .simple_body div.block{
            margin:0;
            padding:20px 20px 20px 0;
        }
        .simple_body .block-body{
            margin:30px 20px;
        }
        .simple_body .control-label{
            width:100px;
        }
        .simple_body .controls{
            margin-left:120px;
        }
        footer{padding:1em 4em;}
        footer hr{margin:1em 0em;}
        footer p span.pull-right{margin:0em 0em 2em;}
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
        .login-panel{margin-top:50px;margin-bottom:20px;}
        img.img-rounded{margin-top:70px;}
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head><?php }} ?>
