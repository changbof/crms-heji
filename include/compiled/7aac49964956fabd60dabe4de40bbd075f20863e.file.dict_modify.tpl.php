<?php /* Smarty version Smarty-3.1.15, created on 2017-09-20 22:45:27
         compiled from "D:\Server\www\crms\include\template\admin\dict_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3115859c27f079a3998-83905776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7aac49964956fabd60dabe4de40bbd075f20863e' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\dict_modify.tpl',
      1 => 1399474750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3115859c27f079a3998-83905776',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dict' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59c27f079cdfd2_75500992',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c27f079cdfd2_75500992')) {function content_59c27f079cdfd2_75500992($_smarty_tpl) {?><div class="container-fluid">
	<form data-async class="form-horizontal" id="dict_modify_form" action="<?php echo @constant('ADMIN_URL');?>
/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['dict']->value['name'];?>
" class="input-xlarge" required="true" placeholder="字典项名称">
					<input type="hidden" name="method" value="ajax_modifyDict" />
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['dict']->value['id'];?>
" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">类型</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="owner" value="system" <?php if ($_smarty_tpl->tpl_vars['dict']->value['owner']=='system') {?>checked="checked"<?php }?>>系统
					</label>
					<label class="radio inline">
						<input type="radio" name="owner" value="user" <?php if ($_smarty_tpl->tpl_vars['dict']->value['owner']=='user') {?>checked="checked"<?php }?>>用户
					</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">备注</label>
				<div class="controls">
					<input type="text" name="remark" value="<?php echo $_smarty_tpl->tpl_vars['dict']->value['remark'];?>
" class="input-xlarge" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="status" value="enable"  <?php if ($_smarty_tpl->tpl_vars['dict']->value['status']=='enable') {?>checked="checked"<?php }?>>启用
					</label>
					<label class="radio inline">
						<input type="radio" name="status" value="disable" <?php if ($_smarty_tpl->tpl_vars['dict']->value['status']=='disable') {?>checked="checked"<?php }?>>停用
					</label>
				</div>
			</div>
		</div>	
	</form>
</div><?php }} ?>
