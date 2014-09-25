<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="btn-toolbar">
	<a href="quicknote_add.php"  class="btn btn-primary"><i class="icon-plus"></i> 消息</a>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">消息 列表</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>内容</th>
				<th>发布时间</th>
				<th>类型</th>
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<{foreach name=note from=$quicknotes item=note}>				 
				<tr>				 
				<td><{$note.note_id}></td>
				<td><{if $note.status=='new'}><sup>[new]&nbsp;&nbsp;</sup><{/if}><{$note.note_content}></td>
				<td><{$note.note_date|date_format:'%m-%d %H:%M'}></td>
				<td><{if $note.owner_id=='0'}>系统<{else}>个人<{/if}></td>
				<td>
				<a href="javascript:void();" data-url="<{$smarty.const.ADMIN_URL}>/ajax/admin.php?method=ajax_getquicknote&note_id=<{$note.note_id}>" title= "查看明细" class="note-view"><i class="icon-eye-open"></i></a>&nbsp;
				<{if $user_group ==1 || $note.owner_id == $current_user_id }>
				<a href="quicknote_modify.php?note_id=<{$note.note_id}>" title= "修改" ><i class="icon-pencil"></i></a>&nbsp;
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="quicknotes.php?method=del&note_id=<{$note.note_id}>#myModal" data-toggle="modal" ></i></a>
				<{/if}>
				</td>
				</tr>
			<{/foreach}>
		  </tbody>
		</table>
			<!-- START 分页模板 -->				
             <{$page_html}>					
			 <!-- END -->
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		//查看
		$('.note-view').on('click',function(){
			$(this).closest('tr').find('td:eq(1)>sup').remove();
			var url = $(this).attr('data-url') ;
			var header = "<h4 style='margin:-10px 0 10px;padding-bottom:8px;border-bottom:1px solid gray;'>查看消息";
			jQuery.ajax({type:'get', url:url, dataType:'json', success:function(jsonData) {
				header += "<small class='pull-right'>"+(jsonData.owner_id=='0'?'系统公告':'个人便签')+"</small></h4>";
				bootbox.alert(header+$.trim(jsonData.note_content));
			}});
			return false;
		});
	});

</script>
<!--操作的确认层，相当于javascript:confirm函数-->
<{$osadmin_action_confirm}>
	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>