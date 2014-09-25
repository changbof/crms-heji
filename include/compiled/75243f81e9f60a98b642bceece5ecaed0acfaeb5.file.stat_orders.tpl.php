<?php /* Smarty version Smarty-3.1.15, created on 2014-08-22 04:35:55
         compiled from "D:\Server\www\crms\include\template\crms\stat_orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1430753f6582bd3d224-31502615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75243f81e9f60a98b642bceece5ecaed0acfaeb5' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\stat_orders.tpl',
      1 => 1406950864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1430753f6582bd3d224-31502615',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'saler_options_list' => 0,
    'statOrders' => 0,
    'so' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53f6582be2a7c5_79092018',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f6582be2a7c5_79092018')) {function content_53f6582be2a7c5_79092018($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div id='loading'>正在处理中...</div>
<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="cdr-record-form">
		<div class="control-inline">
			<label>订单时间: 从</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="sdate" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['sdate'];?>
" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div class="control-inline">
			<label>到</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="edate" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['edate'];?>
" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div class="control-inline">
			<label>销售代表</label>
			<?php echo smarty_function_html_options(array('name'=>"vested",'id'=>"DropDownSaler",'data-action'=>"assign",'data-size'=>"10",'class'=>"selectpicker",'options'=>$_smarty_tpl->tpl_vars['saler_options_list']->value,'selected'=>$_smarty_tpl->tpl_vars['_GET']->value['vested']),$_smarty_tpl);?>

		</div>
		<div class="control-inline">
			<label>&nbsp;</label>
			<label class="radio inline">
				<input type="checkbox" name="type" id="type" value="1" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['type']=='1') {?>checked="true"<?php }?>>客户明细
			</label>
		</div>
		<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
			<button type="submit" class="btn btn-primary">检索</button>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>

<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">功能列表</a>
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
					<th>已签单</th>
					<th>已签金额</th>
					<th>退签单</th>
					<th>退签金额</th>
					<th>取消单</th>
					<th>取消金额</th>
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
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_yqs'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_yqs'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_tq'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_tq'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_num_qx'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['so']->value['ords_sum_qx'];?>
</td>
				</tr>
				<?php } ?>
			</tbody>
		</table> 
		<!-- START 分页模板 -->
		<?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

		<!-- END 分页-->			   
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.selectpicker').selectpicker();
		$('.datetimepicker').datetimepicker({
	        language: 'zh-CN',
	        pickTime: false
	    });
	});
</script>
<!--操作的确认层，相当于javascript:confirm函数-->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>


<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
