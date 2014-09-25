<?php /* Smarty version Smarty-3.1.15, created on 2014-09-03 01:57:58
         compiled from "D:\Server\www\crms\include\template\admin\dict_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1591954060526ab8243-39302103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '1591954060526ab8243-39302103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dict' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54060526b56b54_16870352',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54060526b56b54_16870352')) {function content_54060526b56b54_16870352($_smarty_tpl) {?><div class="container-fluid">
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
