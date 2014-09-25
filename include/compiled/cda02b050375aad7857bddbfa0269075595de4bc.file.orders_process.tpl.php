<?php /* Smarty version Smarty-3.1.15, created on 2014-09-08 02:19:00
         compiled from "D:\Server\www\crms\include\template\crms\orders_process.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196485404a173c45051-26381760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cda02b050375aad7857bddbfa0269075595de4bc' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\orders_process.tpl',
      1 => 1410113932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196485404a173c45051-26381760',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5404a173cb4210_20988689',
  'variables' => 
  array (
    'orders' => 0,
    'ordersstatus_array' => 0,
    'user_info' => 0,
    'expressCompany_options' => 0,
    'orders_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5404a173cb4210_20988689')) {function content_5404a173cb4210_20988689($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?>
<div class="container-fluid" id="modal-process">
	<div class="bb-alert alert alert-info alert-block" style="display: none;">
		<span>操作成功</span>
	</div>

	<form action="<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php" class="form-horizontal" name="orders_process_form" id="orders_process_form" method="post">
		<input type="hidden" name="ordersId" value="<?php echo $_smarty_tpl->tpl_vars['orders']->value['id'];?>
">
		<input type="hidden" name="method" value="ajax_processOrders">
		<div class="control-group">
			<label class="control-label">订购产品:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?php echo $_smarty_tpl->tpl_vars['orders']->value['orders_title'];?>
</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">数量</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?php echo $_smarty_tpl->tpl_vars['orders']->value['orders_num'];?>
</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">总金额(元)</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?php echo $_smarty_tpl->tpl_vars['orders']->value['payment_sum'];?>
</span>
			</div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['orders']->value['status']=='determine') {?>
		<div class="control-group">
			<label class="control-label">备注: </label>
			<div class="controls">
				<input type="text" name="gift" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['orders']->value['gift'];?>
" />
			</div>
		</div>
		<?php }?>
		<!--div class="control-group">
			<label class="control-label">订单状态</label>
			<div class="controls">
				<span class="input-medium uneditable-input input-underline"><?php echo $_smarty_tpl->tpl_vars['ordersstatus_array']->value[$_smarty_tpl->tpl_vars['orders']->value['status']];?>
</span>
			</div>
		</div-->

        <div class="control-group">
            <label class="control-label">速递公司: </label>
            <div class="controls">
                <?php if ($_smarty_tpl->tpl_vars['orders']->value['status']=='verifying'&&$_smarty_tpl->tpl_vars['user_info']->value['user_group']==6) {?>
                    <?php echo smarty_function_html_options(array('name'=>"shipped_express",'class'=>"input-xlarge",'options'=>$_smarty_tpl->tpl_vars['expressCompany_options']->value,'selected'=>$_smarty_tpl->tpl_vars['orders']->value['shipped_express']),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo smarty_function_html_options(array('name'=>"shipped_express",'class'=>"input-xlarge",'disabled'=>"disabled",'options'=>$_smarty_tpl->tpl_vars['expressCompany_options']->value,'selected'=>$_smarty_tpl->tpl_vars['orders']->value['shipped_express']),$_smarty_tpl);?>

                <?php }?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">快递单号: </label>
            <div class="controls">
                <input type="text" name="express_no" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['orders']->value['express_no'];?>
" <?php if ($_smarty_tpl->tpl_vars['orders']->value['status']=='audited'&&$_smarty_tpl->tpl_vars['user_info']->value['user_group']==8) {?> disabled="disabled" <?php } else { ?> readonly="readonly" <?php }?> />
            </div>
        </div>

		<!-- 确认订单: 销售代表处理 -->
		<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_id']==$_smarty_tpl->tpl_vars['orders']->value['vested']&&$_smarty_tpl->tpl_vars['orders']->value['status']=='determine') {?>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="verifying" checked="true"> 立即确认
				</label>
			</div>
		</div>
		<!-- 审核未通过订单: 销售代表重新沟通 生成订单/取消订单 -->
		<?php } elseif ($_smarty_tpl->tpl_vars['user_info']->value['user_id']==$_smarty_tpl->tpl_vars['orders']->value['vested']&&$_smarty_tpl->tpl_vars['orders']->value['status']=='unaudited') {?>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="renew" checked="true"> 重新生成订单
				</label>
			</div>
		</div>
		<!-- 确认发货: 仓储部填写快递公司及快运单号 -->
		<?php } elseif ($_smarty_tpl->tpl_vars['orders']->value['status']=='audited'&&$_smarty_tpl->tpl_vars['user_info']->value['user_group']==8) {?>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="shipped" checked="true"> 确认发货
				</label>
			</div>
		</div>

		<!-- 确认到达当地: 物流部确认是否已达当地-->
		<?php } elseif ($_smarty_tpl->tpl_vars['orders']->value['status']=='shipped'&&$_smarty_tpl->tpl_vars['user_info']->value['user_group']==6) {?>
		<div class="control-group">
			<label class="control-label">跟踪订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="reach" checked="true"> 到达当地
				</label>
			</div>
		</div>
		<!-- 确认签收: 物流部填写签收或退签  -->
		<?php } elseif ($_smarty_tpl->tpl_vars['orders']->value['status']=='reach'&&$_smarty_tpl->tpl_vars['user_info']->value['user_group']==6) {?>
		<div class="control-group">
			<label class="control-label">跟踪订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="received" checked="true"> 客户已签收
				</label>
				<label class="radio inline">
					<input type="radio" name="status" id="status2" value="refused"> 客户退签
				</label>
			</div>
		</div>		
		<!-- 订单取消: 销售经理审核 -->
		<?php } elseif ($_smarty_tpl->tpl_vars['orders']->value['status']=='canceling'&&$_smarty_tpl->tpl_vars['user_info']->value['user_group']==7) {?>
		<div class="control-group">
			<label class="control-label">取消原因</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?php echo $_smarty_tpl->tpl_vars['orders']->value['cancel_note'];?>
</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">取消时间</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><?php echo $_smarty_tpl->tpl_vars['orders']->value['cancel_date'];?>
</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">订单取消确认: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="cancel" checked="true"> 确认取消
				</label>
			</div>
		</div>
		<?php }?>

		<!-- 订单取消: 销售代表可取消订单的情况: -->
		<?php if (!in_array($_smarty_tpl->tpl_vars['orders']->value['status'],$_smarty_tpl->tpl_vars['orders_list']->value)&&$_smarty_tpl->tpl_vars['user_info']->value['user_id']==$_smarty_tpl->tpl_vars['orders']->value['vested']) {?>
		<div class="control-group">
			<label class="control-label">取消订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status2" value="canceling"> 申请取消
				</label>
			</div>
		</div>
		<?php }?>

		<div class="control-group hide" id="cancelNote">
			<label class="control-label">处理备注: </label>
			<div class="controls">
				<input type="text" name="note" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['orders']->value['cancel_note'];?>
" />
			</div>
		</div>


	</form>
</div><?php }} ?>
