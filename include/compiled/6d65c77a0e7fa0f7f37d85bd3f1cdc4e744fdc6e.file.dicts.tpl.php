<?php /* Smarty version Smarty-3.1.15, created on 2014-08-27 00:50:21
         compiled from "D:\Server\www\crms\include\template\admin\dicts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3252953fcbacd664df6-43902691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d65c77a0e7fa0f7f37d85bd3f1cdc4e744fdc6e' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\admin\\dicts.tpl',
      1 => 1407255213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3252953fcbacd664df6-43902691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'dicts' => 0,
    'dict' => 0,
    'dictitems' => 0,
    'dictitem' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53fcbacd74e2d8_72174963',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fcbacd74e2d8_72174963')) {function content_53fcbacd74e2d8_72174963($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="row-fluid">
	<div class="span5">
		<div class="block">
			<a href="#page-dicts" class="block-heading btn-toolbar" data-toggle="collapse">字典列表
				<div class="pull-right btn-group">
					<small class="btn btn_dict" o-target="tb_dicts" data-action="add" id="dict_add">添加</small> |
					<small class="btn btn_dict" o-target="tb_dicts" data-action="modify" id="dict_modify">修改</small> |
					<small class="btn btn_dict" o-target="tb_dicts" data-action="remove" id="dict_remove" data-target="#myModal" data-toggle="modal">删除</small>
				</div>
			</a>
			<div id="page-dicts" class="block-body collapse in">
				<table class="table table-striped table-bordered" id="tb_dicts">
					<thead>
					<tr>
						<th>#</th>
						<th>字典名</th>
						<th>类型</th>
						<th>状态</th>
					</tr>
					</thead>
					<tbody>							  
					<?php  $_smarty_tpl->tpl_vars['dict'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dict']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dicts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dict']->key => $_smarty_tpl->tpl_vars['dict']->value) {
$_smarty_tpl->tpl_vars['dict']->_loop = true;
?>
						<tr>
						<td><input type="radio" name="dict_id" value="<?php echo $_smarty_tpl->tpl_vars['dict']->value['id'];?>
" /></td>
						<td><?php echo $_smarty_tpl->tpl_vars['dict']->value['name'];?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['dict']->value['owner']=="system") {?>系统<?php } else { ?>用户<?php }?></td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['dict']->value['status']=="enable") {?>
								启用
							<?php } else { ?>
								停用
							<?php }?>
						</td>
						</tr>
					<?php } ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="span7">
		<div class="block">
			<a href="#page-items" class="block-heading btn-toolbar" data-toggle="collapse"><strong id="dictName"></strong>子项目列表
				<div class="pull-right btn-group" id="widget-group">
					<small class="btn btn_item" o-target="tb_items" id="dictitem_add" data-action="add">添加</small> |
					<small class="btn btn_item" o-target="tb_items" id="dictitem_modify" data-action="modify">修改</small> |
					<small class="btn btn_item" o-target="tb_items" data-target="#myModal" id="dictitem_remove" data-action="remove" data-toggle="modal">删除</small>
				</div>
			</a>
			<div id="page-items" class="block-body collapse in">
				<input type="hidden" name="dictid" value="" />
				<table class="table table-striped table-bordered" id="tb_items">
					<thead>
					<tr>
						<th></th>
						<th class="hide">id</th>
						<th>子项目代码</th>
						<th>子项目名称</th>
						<th>排序</th>
						<th>状态</th>
					</tr>
					</thead>
					<tbody>							  
					<?php  $_smarty_tpl->tpl_vars['dictitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dictitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dictitems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dictitem']->key => $_smarty_tpl->tpl_vars['dictitem']->value) {
$_smarty_tpl->tpl_vars['dictitem']->_loop = true;
?>
					<tr>
						<td><input type="checkbox" name="itemIds[]" value="<?php echo $_smarty_tpl->tpl_vars['dictitem']->value['id'];?>
" ></td>
						<td class="hide"><?php echo $_smarty_tpl->tpl_vars['dictitem']->value['id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dictitem']->value['item_id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dictitem']->value['item_name'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dictitem']->value['item_sort'];?>
</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['dictitem']->value['item_status']=="enable") {?>
								启用
							<?php } else { ?>
								禁用
							<?php }?>
						</td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function openModalforDict($ele){
		var act = $ele.attr("id");
		var target = $ele.attr("o-target");
		var url = act+".php";
		var headerText = "添加";
		
		if(act.indexOf('_modify')>-1){
			headerText = "修改";
			url +="?dictId=" + $("input[name='dict_id']:checked").val();
		}
		jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(data) {
			var bbd=bootbox.dialog(data,
				[
					{
						"label" : "确定",
						"class" : "btn-success",
						"callback": function(event) {
							var $form = $('#'+act+'_form');
							var formData = $form.serialize();
							var formJson = DataDeal.formToJson(formData);//转化为json 
							var url = $form.attr('action');
							$.getJSON(url,formData,function(json){
								if(json.result > 0){
									if(act.indexOf('_add')>-1){
										bootbox.alert(json.msg,function(){
											window.location.reload(true);
										});
									}else if(act.indexOf('_modify')>-1){
										var $row = $('#'+target+' tbody tr.highlight');
										$row.find('td:eq(1)').text(formJson['name']);
										$row.find('td:eq(2)').text(formJson['owner']=="system"?"系统":"用户");
										$row.find('td:eq(3)').text(formJson['status']=="enable"?"启用":"禁用");
            							
            							$('#dictName').text("["+formJson['name']+"] ");

										bootbox.alert(json.msg,function(){
											bootbox.hideAll();
										});
									}
								}
							});
							event.preventDefault();
						}
					}, 
					{"label" : "关闭"}
				], 
				{
					"header": headerText+"字典项",
					"onEscape": function() {
						console.log("dialog dismissed by escape key");
					},
					"classes": "modal-medium"
				}
			);
		}});
	}
	//打开
	function openModalforDictItem($ele){
		var act = $ele.attr("id");
		var target = $ele.attr("o-target");
		var url = act+".php";

		var dictId = $("input[name='dict_id']:checked").val();
		var dictName = $('#tb_dicts tbody tr.highlight').find('td:eq(1)').text();

		var headerText = "";

		if(act.indexOf('_modify')>0){
			if( ! $('#tb_items tbody tr').hasClass('highlight') ){
				bootbox.alert("您没有选中任何记录,请确认!");
				return;
			}
			var itemId = $('#tb_items tbody tr.highlight').find('td:eq(1)').text();
			headerText = "修改["+dictName+"]字典项明细";
			url +="?itemId=" + itemId;
		}else{
			url +="?dictId=" + dictId;
			headerText = "为["+dictName+"]添加子项";
		}
		jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(data) {
			var bbd=bootbox.dialog(data,
				[
					{
						"label" : "确定",
						"class" : "btn-success",
						"callback": function(event) {
							var $form = $('#'+act+'_form');
							var formData = $form.serialize();
							var formJson = DataDeal.formToJson(formData);//转化为json 
							var url2 = $form.attr('action');
							$.getJSON(url2,formData,function(json){
								if(json.result=='1'){
									if(act.indexOf('_add')>-1){
										bootbox.alert(json.msg,function(){
											window.location.reload(true);
										});
									}else if(act.indexOf('_modify')>-1){
										var $row = $('#'+target+' tbody tr.highlight');
										$row.find('td:eq(2)').text(formJson['item_id']);
										$row.find('td:eq(3)').text(formJson['item_name']);
										$row.find('td:eq(4)').text(formJson['item_sort']);
										$row.find('td:eq(5)').text(formJson['item_status']=="enable"?"启用":"禁用");
										bootbox.alert(json.msg,function(){
											bootbox.hideAll();
										});
									}
								}
							});
							event.preventDefault();
						}
					}, 
					{"label" : "关闭"}
				], 
				{
					"header": headerText,
					"onEscape": function() {
						console.log("dialog dismissed by escape key");
					},
					"classes": "modal-medium"
				}
			);
		}});
	}
	//获取字典子项列表
	var getItemsForDictId = function(dictid){
		var tableRows = "";
		$.ajax({
            type: "GET",
            url: "../ajax/sys.php?method=ajax_getItemForDictId",
            data: "dictId="+dictid,
 			dataType:'json',
            success: function(json, status) {
            	$('#tb_items tbody').empty();
            	if(!json.result){
	            	$.each(json, function(i, item) {
						tableRows += '<tr><td><input type="checkbox" name="itemIds[]" value="'+item['id']+'" ></td>';
						tableRows += '<td class="hide">'+item['id']+'</td>';
						tableRows += '<td>'+item['item_id']+'</td>';
						tableRows += '<td>'+item['item_name']+'</td>';
						tableRows += '<td>'+item['item_sort']+'</td>';
						tableRows += '<td>'+(item['item_status']=="enable"?"启用":"禁用")+'</td>';
	            	});
	            	$('#tb_items tbody').append(tableRows);
	            }
            }
        });
	};

	$(document).ready(function() {
		//表格选中行高亮
		$('.table-striped').on('click', 'tbody tr', function(event) {
		    $(this).addClass('highlight').siblings().removeClass('highlight');
		    if($(this).closest('table').attr('id')=="tb_dicts"){
		    	$(this).find("input[name=dict_id]").attr("checked",true);
		    	$('#widget-group').removeClass('hidden');
		    	$('#dictid').val(dictId);
		    	$('#dictName').text("["+$(this).find('td:eq(1)').text()+"] ");
		    	if($(this).find('td:eq(2)').text()=='系统'){
		    		$('#widget-group').addClass('hidden');
		    	}
		    	var dictId = $(this).find("input[name=dict_id]").val();
		    	getItemsForDictId(dictId);
		    }else{
		    	//$(this).find("input[name='itemIds[]']").attr("checked",true);
		    }
		});
		//按钮事件
		$('.btn_dict').on('click',function(){
			if($(this).attr('data-action')=='remove'){
				if( ! $('#tb_dicts tbody tr').hasClass('highlight') ){
					bootbox.alert("您没有选中任何记录,请确认!");
					return;
				}

				var $target = $(this).attr("o-target");
				bootbox.confirm("您确定要删除选中的记录?", function(result) {
					if(result){
						window.location.href="dicts.php?method=del&dictId="+$("input[name='dict_id']:checked").val()+"#myModal"
					}
				});
			}
			openModalforDict($(this));
			return false;
		});
		$('.btn_item').on('click',function(){
			if($(this).attr('data-action')=='remove'){
				if( ! $('#tb_items tbody tr').hasClass('highlight') ){
					bootbox.alert("您没有选中任何记录,请确认!");
					return;
				}
				var itemIds =[];//定义一个数组    
	            $('input[name="itemIds[]"]:checked').each(function(){//遍历每一个名字为interest的复选框，其中选中的执行函数    
	            	itemIds.push($(this).val());//将选中的值添加到数组chk_value中    
	            });
				bootbox.confirm("您确定要删除选中的记录?", function(result) {
					if(result){
						window.location.href="dicts.php?method=delItem&itemIds="+itemIds+"#myModal"
					}
				});
			}else{
				openModalforDictItem($(this));
			}			
			return false;
		});
	});

</script>

<!--操作的确认层，相当于javascript:confirm函数-->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>

	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
