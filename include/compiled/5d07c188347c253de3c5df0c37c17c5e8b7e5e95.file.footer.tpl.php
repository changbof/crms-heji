<?php /* Smarty version Smarty-3.1.15, created on 2015-05-22 00:14:28
         compiled from "D:\Server\www\crms\include\template\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:409555e04645a72c4-94512301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d07c188347c253de3c5df0c37c17c5e8b7e5e95' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\footer.tpl',
      1 => 1415122620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '409555e04645a72c4-94512301',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_555e04645f0449_33961373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e04645f0449_33961373')) {function content_555e04645f0449_33961373($_smarty_tpl) {?>
				<footer>
                    <p>北京东方和济医疗科技有限公司  版权所有</p>
                    <hr>
                    <p style="text-align: center;">
                        <span class="pull-right">Customer Management System.</span>
                        <span>营养咨询热线：400-0070-100 或 010-8103 1881</span>
                    </p>
                    <p style="text-align: center"><span>医学化验报告接受传真：400-6981-163 转 221542</span></p>
                </footer>
			</div>
		</div>
	</div>
</body>

<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/plugins/jquery-dataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/js/bootstrap-modal.js"></script>
<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/plugins/jquery-spinner/jquery.spinner.min.js"></script>
<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/plugins/bootstrap-select/bootstrap-select.min.js" ></script>
<script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/plugins/jquery-dataTables/dataTables.bootstrap.js"></script>

<!-- - + -快捷方式的提示 - -->
<script type="text/javascript">
	function getDuration(){
		$.getJSON("<?php echo @constant('ADMIN_URL');?>
/ajax/crms.php?method=ajax_sumDuration",function(result){
			if(result.result==1){
				$('#duration').text(result.duration);
			}
		});
	}
    function getCustomerInfoForVested(){
        $.getJSON("<?php echo @constant('ADMIN_URL');?>
/ajax/crms.php?method=ajax_statCustomer",function(result){
            if(result.result==1){
                $('#type7').text(result.yxkh);
                $('#type0').text(result.allkh);
            }
        });
    }
	$(document).ready(function(){
		//F5刷新本页面（iframe内页面）
		$(document).bind('keydown',function(){refreshInner()});

	    //10秒没有操作就自动隐藏弹出框
		/*
		window.setTimeout(function(){
		    bootbox.hideAll();
		}, 10000); // 10 seconds expressed in milliseconds
		*/
		//今日通话时长
		getDuration();
		window.setTimeout(function(){
			getDuration();
		}, 600000); // 600 seconds expressed in milliseconds

	});

	alertDismiss("alert-success",3);
	alertDismiss("alert-info",10);

	alertDismiss("popover",10);

	listenShortCut("icon-plus");
	listenShortCut("icon-minus");

</script>
<!-- WebIM: start -->
<!-- script type="text/javascript" src="<?php echo @constant('ADMIN_URL');?>
/ajaxim/client/js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="<?php echo @constant('ADMIN_URL');?>
/ajaxim/client/js/md5.js"></script>
<script type="text/javascript" src="<?php echo @constant('ADMIN_URL');?>
/ajaxim/client/js/store.js"></script>
<script type="text/javascript" src="<?php echo @constant('ADMIN_URL');?>
/ajaxim/client/js/cookies.js"></script>
<script type="text/javascript" src="<?php echo @constant('ADMIN_URL');?>
/ajaxim/client/js/dateformat.js"></script>
<script type="text/javascript" src="<?php echo @constant('ADMIN_URL');?>
/ajaxim/client/js/im.js"></script -->

<!-- WebIM: end -->
</html><?php }} ?>
