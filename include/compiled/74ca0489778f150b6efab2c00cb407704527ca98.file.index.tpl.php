<?php /* Smarty version Smarty-3.1.15, created on 2015-05-22 00:14:41
         compiled from "D:\Server\www\crms\include\template\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22684555e0471eb1e26-28707342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74ca0489778f150b6efab2c00cb407704527ca98' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\index.tpl',
      1 => 1408902767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22684555e0471eb1e26-28707342',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'sysNotes' => 0,
    'sysnote' => 0,
    'user_info' => 0,
    'myorders' => 0,
    'myods' => 0,
    'ordersstatus_options' => 0,
    'orders_list' => 0,
    'myNotes' => 0,
    'mynote' => 0,
    'statOrders' => 0,
    'so' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_555e0472176717_51003152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e0472176717_51003152')) {function content_555e0472176717_51003152($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- - START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<div class="container-fluid">
	<div class="block span9">
		<a href="#xtgg" class="block-heading" data-toggle="collapse">系统公告</a>
        <div id="xtgg" class="block-body collapse in">
        	<table class="table table-striped table-condensed table-hover" id="tb-sysnote">
				<!--thead>
					<tr>
					    <th class="hide"></th>
						<th width="30px">#</th>
						<th>内容</th>
						<th width="80px">时间</th>				
					</tr>
				</thead -->
				<tbody>							  
					<?php  $_smarty_tpl->tpl_vars['sysnote'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sysnote']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sysNotes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['sysnote']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['sysnote']->key => $_smarty_tpl->tpl_vars['sysnote']->value) {
$_smarty_tpl->tpl_vars['sysnote']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['sysnote']['index']++;
?>
					<tr>
					    <td class="hide">{$sysnote.note_id}</td>
						<td width="20px"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['sysnote']['index']+1;?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['sysnote']->value['status']=='new') {?><sup>[new]</sup>&nbsp;&nbsp;<?php }?><?php echo $_smarty_tpl->tpl_vars['sysnote']->value['note_content'];?>
</td>
						<td width="90px"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['sysnote']->value['note_date'],'%m-%d %H:%M');?>
</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>		
	</div>
	<div class="block span3" style="border:none;maring:0;padding:0;">
		<div id="date-picker" style="margin-right:0px;"></div>
	</div>
</div>
<div class="container-fluid">
	<div class="block span8">
		<a href="#xttx" class="block-heading" data-toggle="collapse">系统提醒</a>
        <div id="xttx" class="block-body collapse in">
        	<table class="table table-striped table-condensed table-hover">
			<thead>
				<tr>
					<th class="hide">id</th>
					<th>产品描述</th>
					<th>姓名</th>
					<th>订购时间</th>
					<th>金额(元)</th>
					<th>赠品</th>
					<th>订单状态</th>
					<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==5) {?>
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
					<?php if ($_smarty_tpl->tpl_vars['myods']->value['status']!="new") {?>
					<td><a href="product_modify.php?a=view&product_id=<?php echo $_smarty_tpl->tpl_vars['myods']->value['orders_id'];?>
" target="_blank" title="查看产品明细"><?php echo $_smarty_tpl->tpl_vars['myods']->value['orders_title'];?>
</a></td>
					<?php } else { ?>
					<td><?php echo $_smarty_tpl->tpl_vars['myods']->value['orders_title'];?>
</td>
					<?php }?>
					<td><a href="customer_modify.php?a=view&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
&customerId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['customer_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['myods']->value['name'];?>
</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['myods']->value['orders_date'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['myods']->value['payment_sum'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['myods']->value['gift'];?>
</td>
					<td><?php if (!$_smarty_tpl->tpl_vars['myods']->value['finished']=='') {?>已结束<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['ordersstatus_options']->value[$_smarty_tpl->tpl_vars['myods']->value['status']];?>
<?php }?></td>
					<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==5) {?>
					<td><?php echo $_smarty_tpl->tpl_vars['myods']->value['health_diagnosis'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['myods']->value['real_name'];?>
</td>
					<?php }?>
					<td>
						<div class="btn-group">
							<small class="btn btn-link" data-url="orders_verify.php?a=view&customerId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['customer_id'];?>
&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "查看订单明细" id="oitem-view"><i class="icon-eye-open"></i></small>
							<?php if ($_smarty_tpl->tpl_vars['myods']->value['finished']=='') {?>
								<?php if ($_smarty_tpl->tpl_vars['myods']->value['vested']==$_smarty_tpl->tpl_vars['user_info']->value['user_id']) {?>
									<?php if (in_array($_smarty_tpl->tpl_vars['myods']->value['status'],array('determine','unaudited'))) {?>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "确认客户订单" id="oitem-process"><i class="icon-pencil"></i></small>
									<?php } elseif (!in_array($_smarty_tpl->tpl_vars['myods']->value['status'],$_smarty_tpl->tpl_vars['orders_list']->value)) {?>
									<small class="btn btn-link" data-url="orders_process.php?a=canceling&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "取消订单" id="oitem-process"><i class="icon-remove-sign"></i></small>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==5&&in_array($_smarty_tpl->tpl_vars['myods']->value['status'],array('new','renew'))) {?>
									<small class="btn btn-link" data-url="orders_item_add.php?customerId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['customer_id'];?>
&ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "组方" id="oitem-add"><i class="icon-wrench"></i></small>
								<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==6) {?>
									<?php if ($_smarty_tpl->tpl_vars['myods']->value['status']=='verifying') {?>
									<small class="btn btn-link" data-url="orders_verify.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "审核客户订单" id="oitem-process"><i class="icon-check"></i></small>
									<?php } elseif ($_smarty_tpl->tpl_vars['myods']->value['status']=='audited') {?>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "确认发货" id="oitem-process"><i class="icon-road"></i></small>
									<?php } elseif ($_smarty_tpl->tpl_vars['myods']->value['status']=='shipped') {?>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "确认签收" id="oitem-process"><i class="icon-edit"></i></small>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "退签确认" id="oitem-process2"><i class="icon-retweet"></i></small>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==7&&$_smarty_tpl->tpl_vars['myods']->value['status']=='canceling') {?>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<?php echo $_smarty_tpl->tpl_vars['myods']->value['id'];?>
" title= "取消确认" id="oitem-process"><i class="icon-warning-sign"></i></small>
								<?php }?>
							<?php }?>
						</div>
					</td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>    
        	
        </div>		
	</div>
	<div class="block span4">
		<a href="#wdbq" class="block-heading" data-toggle="collapse">我的便签</a>
        <div id="wdbq" class="block-body collapse in">       	
          <table class="table table-striped table-condensed table-hover" id="tb-sysnote">
			<!--thead>
				<tr>
				    <th style="display: none;"></th>
					<th >#</th>
					<th>内容</th>					
				</tr>
			</thead-->
			<tbody>							  
				<?php  $_smarty_tpl->tpl_vars['mynote'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mynote']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myNotes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mynote']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['mynote']->key => $_smarty_tpl->tpl_vars['mynote']->value) {
$_smarty_tpl->tpl_vars['mynote']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mynote']['index']++;
?>
				<tr>
				    <td class="hide">{$mynote.note_id}</td>
					<td width="20px"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['mynote']['index']+1;?>
</td>
					<td>[<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mynote']->value['note_date'],'%m-%d');?>
]&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['mynote']->value['note_content'];?>
 </td>					
				</tr>
				<?php } ?>
			</tbody>
		</table> 
        </div>		
	</div>
</div>

<div class="container-fluid">
	<div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">订单统计</a>
        <div id="page-stats" class="block-body collapse in">
           	<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>工号/客户id</th>
					<th>单数</th>
					<th>金额</th>
					<th>未审单</th>
					<th>未审金额</th>
					<th>待签单</th>
					<th>待签金额</th>
                    <th>到达单</th>
                    <th>到达金额</th>
					<th>已签单</th>
					<th>已签金额</th>
					<th>退签单</th>
					<th>退签金额</th>
					<!--th>取消单</th>
					<th>取消金额</th-->
				</tr>
			</thead>
			<tbody>							  
				<?php  $_smarty_tpl->tpl_vars['so'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['so']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['statOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['so']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['so']->key => $_smarty_tpl->tpl_vars['so']->value) {
$_smarty_tpl->tpl_vars['so']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['so']['index']++;
?>

				<tr>
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['so']['index']+1;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['c0'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_wsh'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_wsh'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_dqs'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_dqs'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_dd'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_dd'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_yqs'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_yqs'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_tq'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_tq'];?>
</td>
					<!--td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_qx'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_qx'];?>
</td-->
				</tr>
				<?php } ?>
			</tbody>
		</table> 
        </div>
    </div>
</div>	
<script type="text/javascript">
$((function($){
	$.datepicker.regional['zh-CN'] = {
	    clearText: '清除',
	    clearStatus: '清除已选日期',
	    closeText: '关闭',
	    closeStatus: '不改变当前选择',
	    prevText: '<上月',
	    prevStatus: '显示上月',
	    prevBigText: '<<',
	    prevBigStatus: '显示上一年',
	    nextText: '下月>',
	    nextStatus: '显示下月',
	    nextBigText: '>>',
	    nextBigStatus: '显示下一年',
	    currentText: '今天',
	    currentStatus: '显示本月',
	    monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
	    monthNamesShort: ['一','二','三','四','五','六', '七','八','九','十','十一','十二'],
	    monthStatus: '选择月份',
	    yearStatus: '选择年份',
	    weekHeader: '周',
	    weekStatus: '年内周次',
	    dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
	    dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
	    dayNamesMin: ['日','一','二','三','四','五','六'],
	    dayStatus: '设置 DD 为一周起始',
	    dateStatus: '选择 m月 d日, DD',
	    dateFormat: 'yy-mm-dd',
	    firstDay: 1,
	    initStatus: '请选择日期',
	    isRTL: false};
	$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
})(jQuery));
	$(document).ready(function() {
		$('#date-picker').datepicker();
		$('.block-heading').css('line-height','2em');
	});
</script>
<!-- - END 以下内容不需更改，请保证该TPL页内的标签匹配即可 - -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
