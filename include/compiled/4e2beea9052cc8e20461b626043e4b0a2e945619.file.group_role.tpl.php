<?php /* Smarty version Smarty-3.1.15, created on 2017-09-20 22:45:45
         compiled from "D:\Server\www\crms\include\template\admin\group_role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3155459c27f199807d1-45432151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e2beea9052cc8e20461b626043e4b0a2e945619' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\group_role.tpl',
      1 => 1382250680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3155459c27f199807d1-45432151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'group_option_list' => 0,
    'group_id' => 0,
    'role_list' => 0,
    'role' => 0,
    'group_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59c27f19a146a8_63984400',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c27f19a146a8_63984400')) {function content_59c27f19a146a8_63984400($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
if (!is_callable('smarty_function_html_checkboxes')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_checkboxes.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<select name="group_id" onchange="javascript:location.replace('group_role.php?group_id='+this.options[this.selectedIndex].value)" style="margin:5px 0px 0px">
	<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['group_option_list']->value,'selected'=>$_smarty_tpl->tpl_vars['group_id']->value),$_smarty_tpl);?>

</select>
<form method="post" action="">
<?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
?>
	<?php if (count($_smarty_tpl->tpl_vars['role']->value['menu_info'])>0) {?>
		<div class="block">
			<a href="#page-stats_<?php echo $_smarty_tpl->tpl_vars['role']->value['module_id'];?>
" class="block-heading" data-toggle="collapse"><?php echo $_smarty_tpl->tpl_vars['role']->value['module_name'];?>
</a>
			<div id="page-stats_<?php echo $_smarty_tpl->tpl_vars['role']->value['module_id'];?>
" class="block-body collapse in">
			<?php echo smarty_function_html_checkboxes(array('name'=>"menu_ids",'options'=>$_smarty_tpl->tpl_vars['role']->value['menu_info'],'checked'=>$_smarty_tpl->tpl_vars['group_role']->value,'separator'=>"&nbsp;&nbsp;",'labels'=>"1"),$_smarty_tpl);?>
						
			</div>
		</div>
	<?php }?>
<?php } ?>											
	<div>
		<button class="btn btn-primary">更新</button>
	</div>
</form>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
