<?php /* Smarty version Smarty-3.1.15, created on 2014-08-25 23:16:52
         compiled from "D:\Server\www\crms\include\template\sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:779853f64a7b4a0f17-81425671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cde4b8e4a5188f78eebd27a32fab3a8bfd153bc' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\sidebar.tpl',
      1 => 1408906852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '779853f64a7b4a0f17-81425671',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53f64a7b551497_51770417',
  'variables' => 
  array (
    'sidebar' => 0,
    'module' => 0,
    'current_module_id' => 0,
    'menu_list' => 0,
    'content_header' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f64a7b551497_51770417')) {function content_53f64a7b551497_51770417($_smarty_tpl) {?>	<div class="sidebar-nav">
		<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sidebar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
		<?php if (count($_smarty_tpl->tpl_vars['module']->value['menu_list'])>0) {?>
		<a href="#sidebar_menu_<?php echo $_smarty_tpl->tpl_vars['module']->value['module_id'];?>
" class="nav-header collapsed" data-toggle="collapse"><i class="<?php echo $_smarty_tpl->tpl_vars['module']->value['module_icon'];?>
"></i><?php echo $_smarty_tpl->tpl_vars['module']->value['module_name'];?>
 <i class="icon-chevron-up"></i></a>
		<?php if ($_smarty_tpl->tpl_vars['module']->value['module_id']==$_smarty_tpl->tpl_vars['current_module_id']->value) {?>
		<ul id="sidebar_menu_<?php echo $_smarty_tpl->tpl_vars['module']->value['module_id'];?>
" class="nav nav-list collapse in">
		<?php } else { ?>
		<ul id="sidebar_menu_<?php echo $_smarty_tpl->tpl_vars['module']->value['module_id'];?>
" class="nav nav-list collapse">
			<?php }?>
			
			<?php  $_smarty_tpl->tpl_vars['menu_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_list']->key => $_smarty_tpl->tpl_vars['menu_list']->value) {
$_smarty_tpl->tpl_vars['menu_list']->_loop = true;
?>
			
			<?php if (strtolower(substr($_smarty_tpl->tpl_vars['menu_list']->value['menu_url'],0,7))=='http://') {?>
			<li><a target=_blank href="<?php echo $_smarty_tpl->tpl_vars['menu_list']->value['menu_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value['menu_name'];?>
</a></li>
			<?php } else { ?>
			<li><a href="<?php echo @constant('ADMIN_URL');?>
<?php echo $_smarty_tpl->tpl_vars['menu_list']->value['menu_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_list']->value['menu_name'];?>
</a></li>
			<?php }?>
			
			<?php } ?>
		</ul>
		<?php }?>
		<?php } ?>
		<!-- a target="_blank" href="http://osadmin.org" class="nav-header" ><i class="icon-question-sign"></i>帮助</a -->
	</div>
	<!-- - 以上为左侧菜单栏 sidebar - -->

	<div class="content">
		<div class="header">
			<div class="stats">
				<p class="stat">今日通话时长 <span class="number" id="duration">0</span></p>
			    <p class="stat"><span class="number" id="type7">53</span>意向客户</p>
			    <p class="stat"><span class="number" id="type0">15</span>所有客户</p>
			</div>

			<h1 class="page-title"><?php echo $_smarty_tpl->tpl_vars['content_header']->value['menu_name'];?>
</h1>
		</div>

		<ul class="breadcrumb">
			<li><a href="<?php echo @constant('ADMIN_URL');?>
<?php echo $_smarty_tpl->tpl_vars['content_header']->value['module_url'];?>
"> <?php echo $_smarty_tpl->tpl_vars['content_header']->value['module_name'];?>
 </a> <span class="divider">/</span></li>

			<?php if ($_smarty_tpl->tpl_vars['content_header']->value['father_menu']) {?>
			<li><a href="<?php echo @constant('ADMIN_URL');?>
<?php echo $_smarty_tpl->tpl_vars['content_header']->value['father_menu_url'];?>
"> <?php echo $_smarty_tpl->tpl_vars['content_header']->value['father_menu_name'];?>
 </a> <span class="divider">/</span></li>
			<?php }?>

			<li class="active"><?php echo $_smarty_tpl->tpl_vars['content_header']->value['menu_name'];?>
</li>
			<!--
			<?php if ($_smarty_tpl->tpl_vars['content_header']->value['shortcut_allowed']) {?>
			<?php if (in_array($_smarty_tpl->tpl_vars['content_header']->value['menu_id'],$_smarty_tpl->tpl_vars['user_info']->value['shortcuts_arr'])) {?>
			<a title= "移除快捷菜单" href="#"><li class="active"><i class="icon-minus" method="del" url="<?php echo @constant('ADMIN_URL');?>
/ajax/shortcut.php?menu_id=<?php echo $_smarty_tpl->tpl_vars['content_header']->value['menu_id'];?>
"></i></li></a>
			<?php } else { ?>
			<a title= "加入快捷菜单" href="#"><li class="active"><i class="icon-plus" method="add" url="<?php echo @constant('ADMIN_URL');?>
/ajax/shortcut.php?menu_id=<?php echo $_smarty_tpl->tpl_vars['content_header']->value['menu_id'];?>
"></i></li></a>
			<?php }?>
			<?php }?>
			-->
		</ul>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="bb-alert alert alert-info" style="display: none;">
					<span>操作成功</span>
				</div><?php }} ?>