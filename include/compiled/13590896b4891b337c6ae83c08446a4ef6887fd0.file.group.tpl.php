<?php /* Smarty version Smarty-3.1.15, created on 2017-09-20 22:45:42
         compiled from "D:\Server\www\crms\include\template\admin\group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2394959c27f16d313e2-80807930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13590896b4891b337c6ae83c08446a4ef6887fd0' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\group.tpl',
      1 => 1399141210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2394959c27f16d313e2-80807930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'user_infos' => 0,
    'user_info' => 0,
    'groupOptions' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59c27f16d81d36_02623648',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c27f16d81d36_02623648')) {function content_59c27f16d81d36_02623648($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">账号组成员列表</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="">
				 <table class="table table-striped">
              <thead>
                <tr>
					<th><input type="checkbox" id="checkAll" >全选</th>
					<th>#</th>
					<th>登录名</th>
					<th>姓名</th>
					<th>手机</th>
					<th >邮箱</th>
					<th >登录时间</th>
					<th >登录IP</th>
					<th >Group#</th>
					<th>描述</th>
                </tr>
              </thead>
              <tbody>							  
                <?php  $_smarty_tpl->tpl_vars['user_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user_info']->key => $_smarty_tpl->tpl_vars['user_info']->value) {
$_smarty_tpl->tpl_vars['user_info']->_loop = true;
?>
					 
					<tr>
					 
					
					<td><input type="checkbox" name="user_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_id']==1) {?>disabled<?php }?>></td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['real_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['email'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['login_time'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['login_ip'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_group'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_desc'];?>
</td>
					</tr>
				<?php } ?>
              </tbody>
            </table> 
		
			<label>选择账号组</label>
				<?php echo smarty_function_html_options(array('name'=>'user_group','id'=>"DropDownTimezone",'class'=>"input-xlarge",'options'=>$_smarty_tpl->tpl_vars['groupOptions']->value,'selected'=>0),$_smarty_tpl);?>

				<div class="btn-toolbar">
					<button type="submit" class="btn btn-primary"><strong>修改账号组</strong></button>
				</div>
			</form>
        </div>
    </div>
	
<!--操作的确认层，相当于javascript:confirm函数-->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>


<script type="text/javascript">
$("#checkAll").click(function(){
     if($(this).attr("checked")){
		$("input[name='user_ids[]']").attr("checked",$(this).attr("checked"));
	 }else{
		$("input[name='user_ids[]']").attr("checked",false);
	 }
});
</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
