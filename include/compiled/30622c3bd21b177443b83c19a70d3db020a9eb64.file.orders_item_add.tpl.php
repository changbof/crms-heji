<?php /* Smarty version Smarty-3.1.15, created on 2014-08-22 03:38:43
         compiled from "D:\Server\www\crms\include\template\crms\orders_item_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1048153f64ac3cb7d52-53766301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30622c3bd21b177443b83c19a70d3db020a9eb64' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\orders_item_add.tpl',
      1 => 1408648429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1048153f64ac3cb7d52-53766301',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'a' => 0,
    'customerId' => 0,
    'ordersId' => 0,
    'products' => 0,
    'product' => 0,
    'items' => 0,
    'item' => 0,
    'remark' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53f64ac3cf86c5_14325221',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f64ac3cf86c5_14325221')) {function content_53f64ac3cf86c5_14325221($_smarty_tpl) {?><style type="text/css">
	.spinner input,
	.spinner .add-on{padding-top:4px;padding-bottom: 4px;}
	h4{margin:-10px 0 10px;padding-bottom:8px;border-bottom:1px solid gray;}
	h5{margin:0;padding-bottom:4px;}
	div.control-inline{margin-bottom: 10px;}
	form{margin-bottom: 10px;}
</style>

<?php if (!$_smarty_tpl->tpl_vars['a']->value) {?>
<h4>新增订单组方</h4>
<div class="container-fluid" id="modal-orders-item" style="min-height:300px;margin-bottom: -20px;">
	<form action="<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php" data-async class="form-horizontal margin-top:-10px" name="orders_item_form" id="orders_item_form" method="post" data-target="orders_item_list">
		<input type="hidden" name="customerId" value="<?php echo $_smarty_tpl->tpl_vars['customerId']->value;?>
">
		<input type="hidden" name="ordersId" id="ordersId" value="<?php echo $_smarty_tpl->tpl_vars['ordersId']->value;?>
">
		<input type="hidden" name="productName" id="productName" value="">
		<input type="hidden" name="ordersItemId" id="ordersItemId" value="">
		<input type="hidden" name="method" id="method" value="ajax_addOrdersItem">

		<div class="control-inline">
			<select name="product_id" id="product_id" class="selectpicker show-tick" data-live-search="true" data-header="搜索产品（搜索不到的营养素，请双击搜索框将其添加到组方中！）" data-size="8" data-width="355px">
				<option value="-1">请选择组方营养素</option>
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
</small>' data-remark="<?php echo $_smarty_tpl->tpl_vars['product']->value['usage'];?>
" data-spec="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_spec'];?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['unit'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</option>
				<?php } ?>
			</select>
		</div>
		<div class="control-inline">
			数量: <div class="input-append spinner" data-trigger="spinner" id="num">
				<input type="text" value="1" data-rule="day" name="item_num" id='item_num' class="input-mini">
				<div class="add-on">
				    <a href="javascript:;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a>
				    <a href="javascript:;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a>
			  	</div>
			</div>
		</div><div class="clearfix"></div>
		<div class="control-inline">
			<input type="text" value="" name="item_spec" id='item_spec' class="input-medium" placeholder="规格" />
		</div>
		<div class="control-inline">
			<input type="text" value="" name="item_remark" id='item_remark' class="input-xlarge"  placeholder="用法: 口服;2次/日;1片/次 " />
		</div>
		<div class="btn-toolbar control-inline">
			<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 添加</button>
			<input type="reset" class="btn" />
		</div><div class="clearfix"></div>
	</form>
<?php }?>
	<h5>订单组方明细:</h5>
    <div style="height:200px;overflow-y: auto;">
	<table class="table table-striped table-bordered table-condensed table-hover" id="orders_item_list" style="margin-top:4px;">
		<thead>
			<tr>
				<th class="hide">#</th>
				<th>产品名称</th>
				<th>规格</th>
				<th>数量</th>
				<th>用法</th>
				<th class="hide">product_id</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>				 
			<tr>
				<td class="hide"><?php echo $_smarty_tpl->tpl_vars['item']->value['item_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_spec'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['item_num'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['remark'];?>
</td>
				<td class="hide"><?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    </div>
	<div style="margin-bottom:0px;">
        <label>备注:
        <textarea rows="1" name="gift" id="gift" class="span6" style="display:inline-block;" placeholder="此处填备注信息，新产品请在上面“选择组方营养素”中搜索框中添加！"><?php echo $_smarty_tpl->tpl_vars['remark']->value;?>
</textarea></label>
    </div>
</div>
<?php }} ?>
