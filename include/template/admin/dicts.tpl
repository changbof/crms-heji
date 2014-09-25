<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

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
					<{foreach name=dict from=$dicts item=dict}>
						<tr>
						<td><input type="radio" name="dict_id" value="<{$dict.id}>" /></td>
						<td><{$dict.name}></td>
						<td><{if $dict.owner=="system" }>系统<{else}>用户<{/if}></td>
						<td>
							<{if $dict.status=="enable"}>
								启用
							<{else}>
								停用
							<{/if}>
						</td>
						</tr>
					<{/foreach}>
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
					<{foreach name=dictitem from=$dictitems item=dictitem}>
					<tr>
						<td><input type="checkbox" name="itemIds[]" value="<{$dictitem.id}>" ></td>
						<td class="hide"><{$dictitem.id}></td>
						<td><{$dictitem.item_id}></td>
						<td><{$dictitem.item_name}></td>
						<td><{$dictitem.item_sort}></td>
						<td>
							<{if $dictitem.item_status=="enable"}>
								启用
							<{else}>
								禁用
							<{/if}>
						</td>
					</tr>
					<{/foreach}>
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
<{$osadmin_action_confirm}>
	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>