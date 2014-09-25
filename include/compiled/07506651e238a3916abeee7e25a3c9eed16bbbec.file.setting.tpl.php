<?php /* Smarty version Smarty-3.1.15, created on 2014-09-03 01:59:47
         compiled from "D:\Server\www\crms\include\template\admin\setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3180454060593a1f9c0-40112597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07506651e238a3916abeee7e25a3c9eed16bbbec' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\setting.tpl',
      1 => 1400002842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3180454060593a1f9c0-40112597',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'timezone_options' => 0,
    'timezone' => 0,
    'sysparams' => 0,
    'param' => 0,
    'dict_options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54060593a94f28_91079356',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54060593a94f28_91079356')) {function content_54060593a94f28_91079356($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<style type="text/css">
	h4{border-bottom:1px solid gray;}
</style>
<div class="well">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#home" data-toggle="tab">时区设置</a></li>
		<li><a href="#sysparam" data-toggle="tab">系统参数设置</a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active in" id="home">
			<form id="tab" method="post" action="" autocomplete="off">

				<label>选择时区</label>	
				<?php echo smarty_function_html_options(array('name'=>'new_timezone','id'=>"DropDownTimezone",'class'=>"input-xlarge",'options'=>$_smarty_tpl->tpl_vars['timezone_options']->value,'selected'=>$_smarty_tpl->tpl_vars['timezone']->value['key_value']),$_smarty_tpl);?>

				<label>显示名称</label>	
				<input class="input input-xlarge" type="text" name="key_title" value="<?php echo $_smarty_tpl->tpl_vars['timezone']->value['key_title'];?>
" />
				<label>备注</label>	
				<input class="input input-xlarge" type="text" name="remark" value="<?php echo $_smarty_tpl->tpl_vars['timezone']->value['remark'];?>
" />

				<div class="btn-toolbar">
					<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
					<div class="btn-group"></div>
				</div>
			</form>
		</div>
		<div class="tab-pane" id="sysparam">
			<div class="row-fluid">
				<div class="span6">
					<table class="table table-striped table-bordered table-hover" id="param_list" style="margin-top:30px;">
						<thead>
							<tr>
								<th>参数名</th>
								<th>显示名称</th>
								<th>参数值</th>
								<th>备注</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sysparams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->_loop = true;
?>				 
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['param']->value['key_name'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['param']->value['key_title'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['param']->value['key_value'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['param']->value['remark'];?>
</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="span6">
					<h4>参数设置</h4>
					<form data-async action="<?php echo @constant('ADMIN_URL');?>
/ajax/sys.php" method="post" name="form1" id="frm-params" data-target="param_list">
						<label>参数名</label>	
						<input class="input input-xlarge" type="text" name="key_name" id="key_name" value=""  required="true" />
						<label>选择参数值</label>	
						<?php echo smarty_function_html_options(array('name'=>"key_value",'id'=>"key_value",'class'=>"input-xlarge",'options'=>$_smarty_tpl->tpl_vars['dict_options']->value,'selected'=>0,'required'=>"true"),$_smarty_tpl);?>

						<label>显示名称</label>	
						<input class="input input-xlarge" type="text" name="key_title" id="key_title" value="" />
						<label>备注</label>	
						<input class="input input-xlarge" type="text" name="remark" id="remark" value="" />
						<input type="hidden" name="method" value="ajax_setSystemParams" />
						<div class="btn-toolbar">
							<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
							<input type="reset" class="btn" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		//表格选中行高亮
		$('#param_list').on('click', 'tbody tr', function(event) {
			var v = $(this).find('td:eq(2)').text();
		    $(this).addClass('highlight').siblings().removeClass('highlight');
	    	$('h4').text($(this).find('td:eq(1)').text()+' 设置:');
	    	$('#key_name').val($(this).find('td:eq(0)').text()).attr('readonly','true');
	    	$('#key_title').val($(this).find('td:eq(1)').text());
	    	$('#key_value').val(v);
	    	$('#remark').val($(this).find('td:eq(3)').text());

	    	$('#frm-params .btn-primary').html('<i class="icon-edit"></i> 修改');
		});
		//form提交 ajax_setSystemParams
		$('form[data-async]').on('submit', function(event) {
	        var $form = $(this);
	        var target = $form.attr('data-target');
	        var formData = $form.serialize();
	 		var formJson = DataDeal.formToJson(formData);//转化为json 
	        $.ajax({
	            type: $form.attr('method'),
	            url: $form.attr('action'),
	            data: formData,
	            dataType:'json',
	            success: function(data, status) {
	            	if(data.result=="1"){
	            		var row = '<tr><td>'+formJson['key_name']+'</td><td>'+formJson['key_title']+'</td><td>'+formJson['key_value']+'</td><td>'+formJson['remark']+'</td></tr>';
						if($('#param_list tbody').children().length < 1){
							$('#param_list tbody').append(row);
						}else{
							$('#param_list tbody tr').last().after(row);
						}
		                $form[0].reset();
		                $('#frm-params .btn-primary').html('<i class="icon-save"></i> 保存');
		                $('#key_name').removeAttr('readonly');
	            	}
	            	$('.bb-alert.alert').slideUp('fast').delay(3000).fadeOut("fast");
	            }
	        });
	 
	        event.preventDefault();
	    }).on('reset',function(){
	    	$('#key_name').removeAttr('readonly');
	    	$('#frm-params .btn-primary').html('<i class="icon-save"></i> 保存');
	    });

	    $('#key_value').on("change",function(){
	    	$('#key_title').val($(this).find("option:selected").text());
	    })

	});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
