<?php /* Smarty version Smarty-3.1.15, created on 2014-08-22 03:37:30
         compiled from "D:\Server\www\crms\include\template\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:377153f64a7abb8617-04971808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db9912a94fb4727c6a784c11d2b93bb5e37441d2' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\main.tpl',
      1 => 1408640261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '377153f64a7abb8617-04971808',
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
  'unifunc' => 'content_53f64a7ac86606_93546723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f64a7ac86606_93546723')) {function content_53f64a7ac86606_93546723($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
 - <?php echo @constant('ADMIN_TITLE');?>
 </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/jquery-1.8.3.min.js" ></script>
	<link href="<?php echo @constant('WEBIM_URL');?>
/styles/webim.css" type="text/css" rel="stylesheet" media="all">
	<script type="text/javascript" src="<?php echo @constant('WEBIM_URL');?>
/js/webimhelper.js?v=102"></script>
	<script type="text/javascript" src="<?php echo @constant('WEBIM_URL');?>
/js/webim.js?v=102"></script>
	<style type="text/css">
		html,body{
			height:100%;
			margin: 0;
		}
		ul#imjs-bar {
		    display: block;
		    position: fixed;
		    bottom: 1px;
		    left: 70px;
		    height: 25px;
		    border-style: solid;
		    border-color: #CFCECA;
		    -moz-border-top-colors: none;
		    -moz-border-right-colors: none;
		    -moz-border-bottom-colors: none;
		    -moz-border-left-colors: none;
		    border-image: none;
		    border-width: 1px 1px 0px 0px;
		    list-style-type: none;
		    padding: 0px;
		    margin: 0px;
		    font: 12px/25px Helvetica Neue,Helvetica,Arial,Calibri,Tahoma,Verdana,sans-serif;
		    color: #222;
		    background-color: #fff;
		}
		ul#imjs-bar > li {
	        position: relative;
	        float: left;
	        width: 40px;
	        border-left: 1px solid #cecece;
	        padding: 0 10px;
	        cursor: pointer;
	        text-shadow: 0 1px 0 #fff;
	    }
        
        ul#imjs-bar > li:hover {
            background: #fff;
        }
	</style>

    <script type="text/javascript">
	
	//** iframe自动适应页面 **//
　　//输入你希望根据页面高度自动调整高度的iframe的名称的列表
    //用逗号把每个iframe的ID分隔. 例如: ["myframe1", "myframe2"]，如果只有一个窗体，则不用逗号。

　　//定义iframe的ID
	var iframeids=["main"];
　　//如果用户的浏览器不支持iframe是否将iframe隐藏 yes 表示隐藏，no表示不隐藏
	var iframehide="no";
　　
	function dyniframesize()
	{
		var dyniframe=new Array()
		for (i=0; i<iframeids.length; i++)
		{
　 			if (document.getElementById)
　 			{
				//自动调整iframe高度
				dyniframe[dyniframe.length] = document.getElementById(iframeids[i]);
				if (dyniframe[i] && !window.opera)
				{
					dyniframe[i].style.display="block";
					//如果用户的浏览器是NetScape
					if (dyniframe[i].contentDocument && dyniframe[i].contentDocument.body.offsetHeight) 
						dyniframe[i].height = dyniframe[i].contentDocument.body.offsetHeight;
					else if (dyniframe[i].Document && dyniframe[i].Document.body.scrollHeight) //如果用户的浏览器是IE
						dyniframe[i].height = dyniframe[i].Document.body.scrollHeight;
				}
			}
			//根据设定的参数来处理不支持iframe的浏览器的显示问题
			if ((document.all || document.getElementById) && iframehide=="no")
			{
				var tempobj=document.all? document.all[iframeids[i]] : document.getElementById(iframeids[i]);
				tempobj.style.display="block";
			}
		}
	}
	//刷新iframe页面
	var refreshIframe=function(ev){
	    var ev = ev || window.event; 
	    if((ev.which||ev.keyCode)==116){
	      if(ev.preventDefault){
	        ev.preventDefault();
	        window.frames["main"].location.reload(); 
	      } else{
	        event.keyCode = 0; 
	        e.returnValue=false;
	        window.frames["main"].location.reload();
	      }
	    }
	};

	/*----------------------------------
	 *  浏览器关闭监听
	 *
	 */
/*	 
	var _t;
	window.onbeforeunload = function(e)
	{
	    setTimeout(function(){_t = setTimeout(onunloadcancel, 0)}, 0);
	    return "真的离开?";
	}
	window.onunloadcancel = function()
	{
	    clearTimeout(_t);
	}
	window.onunload() = funciton(){
		alert("您正在退出系统...");
	    window.location.href = '<?php echo @constant('ADMIN_URL');?>
/logout.php';
	}
*/

</script>
</head>
<body style="overflow:hidden;">
	<iframe src ="<?php echo @constant('ADMIN_URL');?>
/index.php" frameborder="0" marginheight="0" marginwidth="0" frameborder="0" id="main" name="main" height="100%" width="100%"></iframe>
	<div>
		<ul id="imjs-bar">
			<li><a href="javascript:void();" onclick="autoChat();return false;" id="autoim">webim</a></li>
		</ul>
	</div>
</body>
<script type="text/javascript">
	//自动登录
	function autoChat(){
		Other.SetCookie("stremail",'<?php echo $_smarty_tpl->tpl_vars['user_info']->value['email'];?>
');
		Other.SetCookie("strpass","<?php echo $_smarty_tpl->tpl_vars['user_info']->value['password'];?>
");
		Other.SetCookie("saveemail","1");
		Other.SetCookie("savepass","1");
		Other.SetCookie("autologin","1");
		IntWebIM();
	}
	//autoChat();
	$(document).ready(function() {

		//$('#imjs-bar').hide();
		
		$(document).on('load',function(){dyniframesize()});
		$(document).on('keydown',function(){refreshIframe()});

	});

</script>
</html><?php }} ?>
