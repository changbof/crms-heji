
				<footer>
                    <hr>
                    <p class="pull-right">Customer Management System.</p>
                </footer>
			</div>
		</div>
	</div>
</body>

<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/jquery.dataTables.min.js"></script>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/js/bootstrap.js"></script>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/js/bootstrap-modal.js"></script>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-spinner/jquery.spinner.min.js"></script>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/bootstrap-select/bootstrap-select.min.js" ></script>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/dataTables.bootstrap.js"></script>

<!-- - + -快捷方式的提示 - -->
<script type="text/javascript">
	function getDuration(){
		$.getJSON("<{$smarty.const.ADMIN_URL}>/ajax/crms.php?method=ajax_sumDuration",function(result){
			if(result.result==1){
				$('#duration').text(result.duration);
			}
		});
	}
    function getCustomerInfoForVested(){
        $.getJSON("<{$smarty.const.ADMIN_URL}>/ajax/crms.php?method=ajax_statCustomer",function(result){
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
<!-- script type="text/javascript" src="<{$smarty.const.ADMIN_URL}>/ajaxim/client/js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="<{$smarty.const.ADMIN_URL}>/ajaxim/client/js/md5.js"></script>
<script type="text/javascript" src="<{$smarty.const.ADMIN_URL}>/ajaxim/client/js/store.js"></script>
<script type="text/javascript" src="<{$smarty.const.ADMIN_URL}>/ajaxim/client/js/cookies.js"></script>
<script type="text/javascript" src="<{$smarty.const.ADMIN_URL}>/ajaxim/client/js/dateformat.js"></script>
<script type="text/javascript" src="<{$smarty.const.ADMIN_URL}>/ajaxim/client/js/im.js"></script -->

<!-- WebIM: end -->
</html>