<?php /* Smarty version Smarty-3.1.15, created on 2014-09-03 02:03:46
         compiled from "D:\Server\www\crms\include\template\admin\dictitem_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:896754060682433674-76933585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e241e43b7ca5c204c60785757b119290b57e3999' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\dictitem_add.tpl',
      1 => 1407255134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '896754060682433674-76933585',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dictId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5406068247f469_51781319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5406068247f469_51781319')) {function content_5406068247f469_51781319($_smarty_tpl) {?><div class="container-fluid" id="modal-content-dictitem">
	<form data-async class="form-horizontal" id="dictitem_add_form" action="<?php echo @constant('ADMIN_URL');?>
/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
			<label class="control-label">字典项编码</label>
			<div class="controls">
				<input type="text" name="item_id" class="input-xlarge" value="" required="true">
				<input type="hidden" name="method" value="ajax_addItemForDict" />
				<input type="hidden" name="dictId" value="<?php echo $_smarty_tpl->tpl_vars['dictId']->value;?>
" />
			</div>
		</div>
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="item_name" class="input-xlarge" required="true" placeholder="子项名称">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">排序</label>
				<div class="controls">
					<input type="number" min="1" max="100" name="item_sort" class="input-medium" value="1" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="item_status" value="enable" checked="true">启用
					</label>
					<label class="radio inline">
						<input type="radio" name="item_status" value="disable">停用
					</label>
				</div>
			</div>
		</div>
	</form>
</div><?php }} ?>
