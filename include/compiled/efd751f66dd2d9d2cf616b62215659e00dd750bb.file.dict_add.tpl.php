<?php /* Smarty version Smarty-3.1.15, created on 2014-09-03 01:57:20
         compiled from "D:\Server\www\crms\include\template\admin\dict_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21518540605002033c5-92964053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efd751f66dd2d9d2cf616b62215659e00dd750bb' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\dict_add.tpl',
      1 => 1399470210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21518540605002033c5-92964053',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_540605002559b9_39222459',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540605002559b9_39222459')) {function content_540605002559b9_39222459($_smarty_tpl) {?><div class="container-fluid" id="modal-content-dict">
	<form data-async class="form-horizontal" id="dict_add_form" action="<?php echo @constant('ADMIN_URL');?>
/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="name" id="name" class="input-xlarge" required="true" placeholder="字典项名称">
					<input type="hidden" name="method" value="ajax_addDict" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">类型</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="owner" value="system">系统
					</label>
					<label class="radio inline">
						<input type="radio" name="owner" value="user" checked="checked">用户
					</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">备注</label>
				<div class="controls">
					<input type="text" name="remark" class="input-xlarge" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="status" value="enable" checked="true">启用
					</label>
					<label class="radio inline">
						<input type="radio" name="status" value="disable">停用
					</label>
				</div>
			</div>
		</div>	
	</form>
</div><?php }} ?>
