<?php /* Smarty version Smarty-3.1.15, created on 2016-03-23 22:27:53
         compiled from "D:\Server\www\crms\include\template\crms\orders_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1260556f2a7e9a80af5-52399179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c41cdd17ef7a13dd28c372122cc3be05bb656a7f' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\orders_add.tpl',
      1 => 1409941234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1260556f2a7e9a80af5-52399179',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'customerId' => 0,
    'saleId' => 0,
    'address' => 0,
    'orders_tel' => 0,
    'products' => 0,
    'product' => 0,
    'other_tel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56f2a7e9ade966_95696630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f2a7e9ade966_95696630')) {function content_56f2a7e9ade966_95696630($_smarty_tpl) {?>
<div class="container-fluid" id="modal-orders">
	<div class="bb-alert alert alert-info alert-block" style="display: none;">
		<span>新增订购成功</span>
	</div>

	<form action="<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php" class="form-horizontal" name="orders_form" id="orderadd_form" method="post">
		<input type="hidden" name="customerId" value="<?php echo $_smarty_tpl->tpl_vars['customerId']->value;?>
">
		<input type="hidden" name="saleId" value="<?php echo $_smarty_tpl->tpl_vars['saleId']->value;?>
">
		<input type="hidden" name="o_address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
">
		<input type="hidden" name="orders_title" id="orders_title" value="">
		<input type="hidden" name="o_mobile" id="o_mobile" value="<?php echo $_smarty_tpl->tpl_vars['orders_tel']->value;?>
">
		<input type="hidden" name="orders_tel" id="orders_tel" value="<?php echo $_smarty_tpl->tpl_vars['orders_tel']->value;?>
" />
		<input type="hidden" name="method" value="ajax_addOrders">
		<div class="control-group">
			<label class="control-label">订购产品:</label>
			<div class="controls">
				<select name="orders_titleId" id="orders_titleId" class="selectpicker show-tick" data-live-search="true" data-header="请选择产品" data-size="10" data-width="150px">
					<option>请选择套餐</option>
					<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>	
					<option data-subtext='<i>规格:</i><small><?php echo $_smarty_tpl->tpl_vars['product']->value['product_spec'];?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['unit'];?>
</small><i>用法:</i><small><?php echo $_smarty_tpl->tpl_vars['product']->value['usage'];?>
</small><i>品牌:</i><small><?php echo $_smarty_tpl->tpl_vars['product']->value['brand'];?>
</small><i>原产地:</i><small><?php echo $_smarty_tpl->tpl_vars['product']->value['place_origin'];?>
</small><i>单价:</i><small>￥<?php echo $_smarty_tpl->tpl_vars['product']->value['product_price'];?>
元</small>' data-price="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_price'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</option>
					<?php } ?>
				</select>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">单价(元)</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="price">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="1" data-rule="currency" data-step="5" name="product_price" id='product_price' class="input-small" required="true">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">数量</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="num">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="1" data-rule="day" name="orders_num" id='orders_num' class="input-mini">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">优惠(元)</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="dis">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="0" name="discount" id='discount' class="input-mini">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">小计(元)</label>
			<div class="controls">
				<input type="text" class="input-medium" name="payment_sum" id="payment_sum" readonly="true" value="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">备注: </label>
			<div class="controls">
				<textarea  rows="2" name="gift" class="span5"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">收货地址: </label>
			<div class="controls">
				<input type="text" name="orders_address" id="orders_address" class="span5" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">联系电话: </label>
			<div class="controls">
				<input type="text" name="orders_tel_0" id="orders_tel_0" class="span5" value="<?php echo substr_replace($_smarty_tpl->tpl_vars['orders_tel']->value,'****','3','-1');?>
" />
			</div>
		</div>
		<div class="control-group">
            <label class="control-label">联系电话2:</label>
            <div class="controls">
                <input type="text" name="other_tel_0" id="other_tel_0" class="span5" readonly="true" value="<?php echo substr_replace($_smarty_tpl->tpl_vars['other_tel']->value,'****','3','-1');?>
" />
            </div>
        </div>
	</form>
</div><?php }} ?>
