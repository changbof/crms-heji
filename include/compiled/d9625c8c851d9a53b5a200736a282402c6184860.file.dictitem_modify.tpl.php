<?php /* Smarty version Smarty-3.1.15, created on 2017-09-20 22:45:16
         compiled from "D:\Server\www\crms\include\template\admin\dictitem_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1569759c27efccb5307-09211749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9625c8c851d9a53b5a200736a282402c6184860' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\dictitem_modify.tpl',
      1 => 1407255155,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1569759c27efccb5307-09211749',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dictItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59c27efccfc644_27918939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c27efccfc644_27918939')) {function content_59c27efccfc644_27918939($_smarty_tpl) {?><div class="container-fluid">
	<form data-async class="form-horizontal" id="dictitem_modify_form" action="<?php echo @constant('ADMIN_URL');?>
/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label">字典项编码</label>
				<div class="controls">
					<input type="text" name="item_id" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['dictItem']->value['item_id'];?>
" required="true">
					<input type="hidden" name="method" value="ajax_updateItemById" />
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['dictItem']->value['id'];?>
" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="item_name" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['dictItem']->value['item_name'];?>
" required="true">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">排序</label>
				<div class="controls">
					<input type="number" min="1" max="100" name="item_sort" class="input-medium"  value="<?php echo $_smarty_tpl->tpl_vars['dictItem']->value['item_sort'];?>
" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="item_status" value="enable" <?php if ($_smarty_tpl->tpl_vars['dictItem']->value['item_status']=='enable') {?>checked="true"<?php }?>>启用
					</label>
					<label class="radio inline">
						<input type="radio" name="item_status" value="disable" <?php if ($_smarty_tpl->tpl_vars['dictItem']->value['item_status']=='disable') {?>checked="true"<?php }?>>停用
					</label>
				</div>
			</div>
		</div>
	</form>
</div><?php }} ?>
