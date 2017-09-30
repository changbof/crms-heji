<?php /* Smarty version Smarty-3.1.15, created on 2016-03-23 22:18:34
         compiled from "D:\Server\www\crms\include\template\crms\orders_verify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:619556f2a5ba5bfe44-58091270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45d5a272416386e62da86cd67a055ec01fb3a2e3' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\orders_verify.tpl',
      1 => 1416156607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '619556f2a5ba5bfe44-58091270',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orders' => 0,
    'a' => 0,
    'expressCompany_options' => 0,
    'user_info' => 0,
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56f2a5ba840318_94233872',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f2a5ba840318_94233872')) {function content_56f2a5ba840318_94233872($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?><style type="text/css">
	h5{margin:0;padding-bottom:4px;}
    #wl-midtrace{
        width:500px;
        height:300px;
    }
    #wl-midtrace ul li{
        list-style: none;
    }
    #wl-midtrace li span.wl-stream-time{
        display:inline-block;
        color: darkgreen;
        margin-right:15px;
    }
</style>
<div class="container-fluid" id="modal-orders-verify" style="margin:-20px -20px -10px -30px;min-height:360px">
	<div class="row-fluid">
        <form action="<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php" data-async class="form-horizontal margin-top:-10px" name="orders_verify_form" id="orders_verify_form" method="post">
		<div class="span5">
				<input type="hidden" name="customerId" value="<?php echo $_smarty_tpl->tpl_vars['orders']->value['customer_id'];?>
">
				<input type="hidden" name="ordersId" id="ordersId" value="<?php echo $_smarty_tpl->tpl_vars['orders']->value['id'];?>
">
				<input type="hidden" name="method" value="ajax_processOrders">

				<div class="control-group">
					<label class="control-label">出单时间</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['orders']->value['orders_date'],'%Y-%m-%d %H:%M:%S');?>
</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">营养顾问</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><?php echo $_smarty_tpl->tpl_vars['orders']->value['real_name'];?>
</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">客户电话</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline">
                            <?php if ($_smarty_tpl->tpl_vars['orders']->value['mobile']!='') {?><?php echo substr_replace($_smarty_tpl->tpl_vars['orders']->value['mobile'],'****','3','-1');?>

                            <a href="javascript:void();" onclick="reqAutoDial('<?php echo $_smarty_tpl->tpl_vars['orders']->value['mobile'];?>
');return false;" title="呼叫"><i class="icon-share-alt"></i></a>&nbsp;&nbsp;<?php }?>
                       </span>
					</div>
				</div>
                <div class="control-group">
                    <label class="control-label">客户电话2</label>
                    <div class="controls">
						<span class="input-medium uneditable-input input-underline">
                            <?php if ($_smarty_tpl->tpl_vars['orders']->value['telphone']!='') {?><?php echo substr_replace($_smarty_tpl->tpl_vars['orders']->value['telphone'],'****','3','-1');?>

                            <a href="javascript:void();" onclick="reqAutoDial('<?php echo $_smarty_tpl->tpl_vars['orders']->value['telphone'];?>
');return false;" title="呼叫"><i class="icon-share-alt"></i></a><?php }?>
                        </span>
                    </div>
                </div>
				<?php if (!$_smarty_tpl->tpl_vars['a']->value) {?>
				<div class="control-group">
					<label class="control-label">确认订单</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="status" id="status1" value="unaudited"> 未通过
						</label>
						<label class="radio inline">
							<input type="radio" name="status" id="status2" value="audited"> 已通过
						</label>
					</div>
				</div>
				<?php }?>
                <div class="control-group">
                    <label class="control-label">审核备注</label>
                    <div class="controls">
                        <textarea rows="2" name="note" class="input-medium" <?php if ($_smarty_tpl->tpl_vars['a']->value) {?> disabled="disabled"<?php }?>> <?php echo $_smarty_tpl->tpl_vars['orders']->value['verify_note'];?>
</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">速递公司</label>
                    <div class="controls">
                        <?php if ($_smarty_tpl->tpl_vars['orders']->value['status']!='verifying') {?>
                            <?php echo smarty_function_html_options(array('name'=>"shipped_express",'class'=>"input-small",'disabled'=>"disabled",'options'=>$_smarty_tpl->tpl_vars['expressCompany_options']->value,'selected'=>$_smarty_tpl->tpl_vars['orders']->value['shipped_express']),$_smarty_tpl);?>

                        <?php } else { ?>
                            <?php echo smarty_function_html_options(array('name'=>"shipped_express",'class'=>"input-medium",'options'=>$_smarty_tpl->tpl_vars['expressCompany_options']->value,'selected'=>$_smarty_tpl->tpl_vars['orders']->value['shipped_express']),$_smarty_tpl);?>

                        <?php }?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <span class="">
                            <?php if ($_smarty_tpl->tpl_vars['orders']->value['express_no']!='') {?><a href="#" id="example" data-v="<?php echo $_smarty_tpl->tpl_vars['orders']->value['express_no'];?>
" rel="popover" data-title="运单号:<?php echo $_smarty_tpl->tpl_vars['orders']->value['express_no'];?>
">查看物流</a><?php }?>

                        </span>
                    </div>
                </div>
		</div>
		<div class="span7">
            <div class="control-group">
                <label class="control-label" style="text-align: left;width:70px;">收货地址</label>
                <div class="controls" style="margin-left:80px;">
                    <input type="text" name="orders_address" class="span12" <?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']!=6) {?>readonly="readonly"<?php }?> value="<?php if ($_smarty_tpl->tpl_vars['orders']->value['orders_address']=='') {?><?php echo $_smarty_tpl->tpl_vars['orders']->value['address'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['orders']->value['orders_address'];?>
<?php }?>" />
                </div>
            </div>
			<h5>订单明细:<span class="pull-right">订单金额：<strong style="color:red;">￥<?php echo $_smarty_tpl->tpl_vars['orders']->value['payment_sum'];?>
元</strong></span></h5>
            <div style="height:230px;overflow: auto;">
			<table class="table table-condensed" id="orders_item_list" style="margin-top:-4px;white-space:nowrap;">
				<thead>
					<tr>
						<th class="hide">#</th>
						<th>产品名称</th>
						<th>规格</th>
						<th>数量</th>
						<th>说明</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>				 
					<tr>
						<td class="hide"><?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_spec'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['item_num'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['remark'];?>
</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
            <div style="padding-top:15px;">
                <div>
                    <label class="pull-right"><input type="checkbox" name="nutrientscase" id="nutrientscase" value="1" <?php if ($_smarty_tpl->tpl_vars['orders']->value['nutrientscase']==1) {?>checked="checked"<?php }?> <?php if ($_smarty_tpl->tpl_vars['orders']->value['status']!='verifying') {?>disabled="disabled "<?php }?> />营养方案 </label>
                    <label class="control-label" style="text-align: left;width:70px;">组方备注 </label>
                </div>
                <textarea rows="2" name="gift" class="span12"><?php echo $_smarty_tpl->tpl_vars['orders']->value['gift'];?>
</textarea>
            </div>
		</div>
	</div>
</form>
</div>
<?php }} ?>
