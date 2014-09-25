<?php /* Smarty version Smarty-3.1.15, created on 2014-09-08 01:42:55
         compiled from "D:\Server\www\crms\include\template\crms\myorders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:604553f64a99882169-13817424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e142ff6f961f543710f493f64034091925dc849b' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\myorders.tpl',
      1 => 1410111766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '604553f64a99882169-13817424',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53f64a9990ac31_87255062',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'ordersstatus_options' => 0,
    'user_info' => 0,
    'myorders' => 0,
    'myods' => 0,
    'orders_list' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f64a9990ac31_87255062')) {function content_53f64a9990ac31_87255062($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<style type="text/css">
	.btn-group small.btn{padding:4px 6px;}
</style>
<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="myorders-form">
		<div style="float:left;margin-right:5px">
			<label>时间: 从</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="sdate" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['sdate'];?>
" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div style="float:left;margin-right:5px">
			<label>到</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="edate" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['edate'];?>
" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
			<input type="hidden" name="search" value="1" > 
		</div>
		<div style="float:left;margin-right:5px">
			<label>状态</label>
			<?php echo smarty_function_html_options(array('name'=>'status','class'=>"input-small",'options'=>$_smarty_tpl->tpl_vars['ordersstatus_options']->value,'selected'=>$_smarty_tpl->tpl_vars['_GET']->value['status']),$_smarty_tpl);?>

		</div>
		<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
			<button type="submit" class="btn btn-primary">检索</button>
            <a href="" target="_blank" class="btn" id="orders_hba_export"><i class="icon-share"></i> 导出已审核订单</a>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">订单</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped table-condensed table-hover">
			<thead>
				<tr>
					<th class="hide">id</th>
                    <th>订购时间</th>
                    <th>姓名</th>
                    <th>金额(元)</th>
					<th>客户方案</th>
					<th>订单状态</th>
                    <th>更新时间</th>
					<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==5||$_smarty_tpl->tpl_vars['user_info']->value['user_group']==1) {?>
					<td>病症</td>
					<td>工号</td>
					<?php }?>
					<th width="140px">操作</th>
				</tr>
			</thead>
			<tbody>							  
				<?php  $_smarty_tpl->tpl_vars['myods'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['myods']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myorders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['myods']->key => $_smarty_tpl->tpl_vars['myods']->value) {
$_smarty_tpl->tpl_vars['myods']->_loop = true;
?>
				<tr>
					<td class="hide"><?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['myods']->value['orders_date'];?>
</td>
                    <td><a href="customer_modify.php?a=view&p=_blk&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
&customerId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['customer_id'];?>
" target="_blank" title="查看客户资料"><?php echo $_smarty_tpl->tpl_vars['myods']->value['name'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['myods']->value['payment_sum'];?>
</td>
					<td><a href="product_modify.php?a=view&p=_blk&product_id=<?php echo $_smarty_tpl->tpl_vars['myods']->value['product_id'];?>
" target="_blank" title="查看产品详细介绍"><?php echo $_smarty_tpl->tpl_vars['myods']->value['orders_title'];?>
</a></td>
					<td><?php if (!$_smarty_tpl->tpl_vars['myods']->value['finished']=='') {?>已结束<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['ordersstatus_options']->value[$_smarty_tpl->tpl_vars['myods']->value['status']];?>
<?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['myods']->value['update_time'];?>
</td>
					<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==5||$_smarty_tpl->tpl_vars['user_info']->value['user_group']==1) {?>
					<td><?php echo $_smarty_tpl->tpl_vars['myods']->value['health_diagnosis'];?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['myods']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['myods']->value['real_name'];?>
</td>
					<?php }?>
					<td>
						<div class="btn-group">
							<small class="btn btn-link oitem-view" data-url="orders_verify.php?a=view&customerId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['customer_id'];?>
&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "查看订单明细"><i class="icon-eye-open"></i></small>
							<?php if ($_smarty_tpl->tpl_vars['myods']->value['finished']=='') {?>
								<?php if ($_smarty_tpl->tpl_vars['myods']->value['vested']==$_smarty_tpl->tpl_vars['user_info']->value['user_id']) {?>
									<?php if (in_array($_smarty_tpl->tpl_vars['myods']->value['status'],array('determine','unaudited'))) {?>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "确认客户订单"><i class="icon-pencil"></i></small>
									<?php } elseif (!in_array($_smarty_tpl->tpl_vars['myods']->value['status'],$_smarty_tpl->tpl_vars['orders_list']->value)) {?>
									<small class="btn btn-link oitem-cancel" data-url="orders_process.php?a=canceling&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "取消订单"><i class="icon-remove-sign"></i></small>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==5&&in_array($_smarty_tpl->tpl_vars['myods']->value['status'],array('new','renew'))) {?>
									<small class="btn btn-link oitem-add" data-url="orders_item_add.php?customerId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['customer_id'];?>
&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "组方"><i class="icon-wrench"></i></small>
								<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==6) {?>
									<?php if ($_smarty_tpl->tpl_vars['myods']->value['status']=='verifying') {?>
									<small class="btn btn-link oitem-process" data-url="orders_verify.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "审核客户订单"><i class="icon-check"></i></small>
									<?php } elseif ($_smarty_tpl->tpl_vars['myods']->value['status']=='shipped') {?>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "已达当地"><i class="icon-map-marker"></i></small>
									<?php } elseif ($_smarty_tpl->tpl_vars['myods']->value['status']=='reach') {?>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "确认签收"><i class="icon-edit"></i></small>
									<small class="btn btn-link oitem-process2" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "退签确认"><i class="icon-retweet"></i></small>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==8&&$_smarty_tpl->tpl_vars['myods']->value['status']=='audited') {?>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "确认发货"><i class="icon-plane"></i></small>
								<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==7&&$_smarty_tpl->tpl_vars['myods']->value['status']=='canceling') {?>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "取消确认"><i class="icon-warning-sign"></i></small>
								<?php }?>
							<?php }?>
						</div>
					</td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!-- START 分页模板 -->
		<?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

		<!-- END -->
	</div>
</div>
<!-- 操作的确认层，相当于javascript:confirm函数 -->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>

<script type="text/javascript">
	//刷新页面
	function myrefresh(){
		if(!$('#modal-process,#modal-orders-item,#modal-orders-verify').closest('div.bootbox').hasClass('in')){
			window.location.reload(true);
		}else{
			setInterval(function(){myrefresh();},30000);
		}
	}
	//组方
	function openModalforOrdersItem(url){
		var btn = [{"label" : "关闭"}];
		if(url.indexOf('a=view')<0){
			btn = [{
				"label" : "组方完成",
				"class" : "btn-primary",
				"callback": function(ev) {
					var gift = $('#gift').val();
					var formData = "status=determine&ordersId="+$('#ordersId').val()+"&gift="+gift+"&method=ajax_processOrders";
					$.ajax({
						type: 'GET',
						url: $('#orders_item_form').attr('action'),
						data: formData,
						dataType:'json',
						success: function(json, status) {
							if(json.result==1){
								bootbox.alert(json.msg,function(){
									window.location.reload(true);
								});
							}else{
								bootbox.alert(json.msg);
							}

						}
					});
					ev.preventDefault();
				}
			},{"label" : "关闭", "class" : "btn"}]
		}
		jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(rspDate) {
			var bbd=bootbox.dialog(rspDate,	btn, {"classes": "modal-large"});
			bbd.find(".spinner").spinner();
			bbd.find('textarea').autosize();
			bbd.find('.selectpicker').selectpicker();
			//产品change事件
			bbd.find('#product_id').on('change',function(){
				var pName = $(this).find('option:selected').text();
				$('#productName').val(pName);
				var pSpec = $(this).find('option:selected').attr('data-spec');
				$('#item_spec').val(pSpec);
                var pRemark = $(this).find('option:selected').attr('data-remark');
                $('#item_remark').val(pRemark);
			});
			bbd.find('#orders_item_list').on('click', 'tbody tr', function(event) {
			    $(this).addClass('highlight').siblings().removeClass('highlight');
                $this = $(this);
			    $('#method','#orders_item_form').val('ajax_modifyOrdersItem');
			    $('#ordersItemId','#orders_item_form').val($this.find('td:first').text());
			    $('#productName','#orders_item_form').val($this.find('td:eq(1)').text());
			    $('#item_spec','#orders_item_form').val($this.find('td:eq(2)').text());
			    $('#item_num','#orders_item_form').val($this.find('td:eq(3)').text());
			    $('#item_remark','#orders_item_form').val($this.find('td:eq(4)').text());
			    $('#product_id','#orders_item_form').selectpicker('val', $this.find('td:last').text());
			    $('#orders_item_form .btn-primary').html('<i class="icon-edit"></i> 修改');
			});
            bbd.find('#orders_item_list').on('dblclick','tbody tr',function(event){
                $this = $(this);
                if( ! $this.hasClass('highlight') ){
                    bootbox.alert("您没有选中任何营养载素,请确认!");
                    return;
                }
                bootbox.confirm("您确定要删除选中的组方营养素吗?", function(result) {
                    if(result){
                        var ordersItemId = $this.find('td:first').text();
                        var formData = 'method=ajax_deleteOrdersItem&ordersItemId='+ordersItemId ;
                        $.ajax({
                            type: 'post',
                            url: '<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php',
                            data: formData,
                            dataType:'json',
                            success: function(json, status) {
                                bootbox.alert(json.msg,function(){
                                    if(json.result==1){
                                        //成功则删除选中的行
                                        $this.remove();
                                    }
                                });
                            }
                        });
                    }
                });
            });
            //添加不在产品库的产品
            bbd.find("input.input-block-level.form-control").on('dblclick',function(event){
                var n = 0-getRandom(100);
                var str = "<option value='"+n+"'>"+$(this).val()+"</option>";
                $(str).appendTo($("#product_id"));
                $('.selectpicker','#orders_item_form').selectpicker('val',n);
            });
			//表单提交
			bbd.find('#orders_item_form').on('submit', function(event) {
				var $form = $(this);
				var target = $form.attr('data-target');
				var formData = $form.serialize();
				var formJson = DataDeal.formToJson(formData);
				$.ajax({
					type: $form.attr('method'),
					url : $form.attr('action'),
					data: formData,
					dataType:"json",
					success: function(json, status) {
						bootbox.alert(json.msg,function(){
							if(json.result==1){
								var row = '<tr><td class="hide">'+json.newId+'</td><td>'+formJson['productName']+'</td><td>'+formJson['item_spec']+'</td><td>'+formJson['item_num']+'</td><td>'+formJson['item_remark']+'</td><td class="hide">'+formJson['product_id']+'</td></tr>';
								if(formJson['method'].indexOf('_add')>-1){
									if($('#'+target+' tbody').children().length < 1){
										$('#'+target+' tbody').append(row);
									}else{
										$('#'+target+' tbody tr:first').before(row);
									}
								}else if(formJson['method'].indexOf('_modify')>-1){
									$('#'+target+' tbody tr.highlight').replaceWith(row);
								}
							}
							//成功则将表单清空
							$form[0].reset();
						});
					}
				});		        
				event.preventDefault();
			}).on('reset',function(){
		    	$('#productName','#orders_item_form').val('');
		    	$('#ordersItemId','#orders_item_form').val('');
		    	$('#method','#orders_item_form').val('ajax_addOrdersItem');
		    	$('#product_id','#orders_item_form').selectpicker('val','-1');
		    	$('#orders_item_form .btn-primary').html('<i class="icon-save"></i> 添加');
		    	$('#orders_item_list tbody tr.highlight').removeClass('highlight');
		    });
		}});
	}

	//跟踪处理订单状态及明细查看
	function openModalforProcess(url,title){
		var header = url.indexOf('_verify')>0?(url.indexOf('a=view')>0?'查看订单: ':'订单审核: '):'订单跟踪处理: ';
		var formId = url.split(".")[0];
		var btn = [{"label" : "关闭","class" : "btn",}];
		if(url.indexOf('a=view')<0){
			btn = [{
				"label" : "确定",
				"class" : "btn-primary",
				"callback": function(ev) {
					var $form = $('#'+formId+'_form');
					$.ajax({
						type: $form.attr('method'),
						url: $form.attr('action'),
						data: $form.serialize(),
						dataType:'json',
						success: function(json, status) {
							if(json.result==1){
								bootbox.alert(json.msg,function(){
									window.location.reload(true);
								});
							}else{
								bootbox.alert(json.msg);
							}
						}
					});
					ev.preventDefault();
				}
			},{"label" : "关闭", "class" : "btn"}]
		}
		jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(rspDate) {
			var bbd=bootbox.dialog(rspDate,	btn, {"header":header + title,"classes": "modal-large"});
			//订单change事件
			bbd.find('input:radio[name=status]').on('change',function(){
				if( $.inArray($(this).val(),['canceling','refused']) >=0 ){
					$('#cancelNote').attr("required","true").show();
				}else{
					$('#cancelNote').removeAttr("required").hide();
				}
			});
		}});
	}

	$(document).ready(function() {
		//指定600秒刷新一次
		setTimeout(function(){myrefresh();},600000);
		//日期时间选择器
		$('.datetimepicker').datetimepicker({
			language: 'zh-CN',
			pickTime: false
		});	
		//订单组方按钮事件
		$('.oitem-add').on('click',function(event){
			event.preventDefault();
			var url = $(this).attr('data-url') ;
			openModalforOrdersItem(url);
		});
		//处理订单状态
		$('.oitem-process,.oitem-process2,.oitem-view,.oitem-cancel').on('click',function(){
			var url = $(this).attr('data-url') ;
			var _title = $(this).closest('tr').find('td:eq(2)').text();
			openModalforProcess(url,_title);
		});
		//导出已审核订单
        $('#orders_hba_export').on('click',function(){
            var url = "<?php echo @constant('ADMIN_URL');?>
/ajax/exportCsv_orders.php?n="+Math.random();
            var $form = $("#myorders-form");
            var formData = $form.serialize();
            $(this).attr("href", url+"&"+formData);
        });
	});
</script>
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
