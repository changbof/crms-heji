<?php /* Smarty version Smarty-3.1.15, created on 2017-09-20 22:47:27
         compiled from "D:\Server\www\crms\include\template\crms\customers_import.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1261359c27f7f303617-28335026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cc4248427835947d6107637637e2fc2e2099e3d' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\customers_import.tpl',
      1 => 1415383152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1261359c27f7f303617-28335026',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'output' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59c27f7f355c88_63154668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c27f7f355c88_63154668')) {function content_59c27f7f355c88_63154668($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="hero-unit" style="margin-top:10px;">
	<h3>导入客户资料<small>(只限于xls格式)</small></h3>
	<hr />
	<form method="post" action="" autocomplete="off" ENCTYPE="multipart/form-data">
		<input type="file" name="excel"  id="DropDownExcel"  class="input-xlarge">
		<div class="btn-toolbar">
			<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
			<div class="btn-group"></div>
		</div>
	</form>
    <?php if (strlen($_smarty_tpl->tpl_vars['output']->value)>10) {?>
    <div>
        <h6>导入客户信息结果</h6>
        <pre style="color:red;">
		    <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

		</pre>
    </div>
    <?php }?>
    <hr />
	<ul>
		<li><small>导入模板下载,请点击"<a href="../tmp/template_customer.xls" target="_blank">客户信息导入模板</a>";</small></li>
		<li><small>注: 请严格按照"导入模板"要求格式进行导入,否则将不能成功导入;</small></li>
	</ul>
</div>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
