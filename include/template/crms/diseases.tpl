<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="block">
	<a href="#" class="block-heading">知识库列表
		<div class="pull-right">
			<div class="btn-group">
				<small class="btn" id="disease_add"><i class="icon-plus"></i> 知识库</small>
				<small class="btn" id="diseases_import"><i class="icon-random"></i> 导入</small>
			</div>
		</div>
	</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th class="hide">#</th>
				<th>病症</th>
				<th>表现症状</th>
				<!--th>常用药</th-->
				<th>营养素及作用</th>
				<!--th>注意事项</th-->
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<{foreach name=disease from=$diseases item=disease}>			 
				<tr>				 
				<td class="hide"><{$disease.id}></td>
				<td><{$disease.disease_name}></td>
				<td><{$disease.disease_symptom}></td>
				<!--td><{$disease.disease_drug}></td-->
				<td><{$disease.nutrients_effect}></td>
				<!--td><{$disease.precautions}></td-->
				<td>
				<a href="disease_modify.php?a=view&p=_blk&disease_id=<{$disease.id}>" target="_blank" title= "查看" ><i class="icon-eye-open"></i></a>&nbsp;&nbsp;
				<{if $user_group ==1 || $disease.owner_id == $current_user_id }>
				<a href="disease_modify.php?p=_blk&disease_id=<{$disease.id}>" target="_blank" title= "修改" ><i class="icon-pencil"></i></a>&nbsp;&nbsp;
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-trash" href="diseases.php?method=del&disease_id=<{$disease.id}>#myModal" data-toggle="modal" ></i></a>
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
		//新增
		$('#disease_add').on('click',function(){
			window.location.href='disease_add.php';
		});
		//导入disease_add.php
		$('#diseases_import').on('click',function(){
			window.location.href='disease_import.php';
		});
	});

</script>
<!-- 操作的确认层，相当于javascript:confirm函数 -->
<{$osadmin_action_confirm}>
	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>