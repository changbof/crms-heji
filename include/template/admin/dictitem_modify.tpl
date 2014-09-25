<div class="container-fluid">
	<form data-async class="form-horizontal" id="dictitem_modify_form" action="<{$smarty.const.ADMIN_URL}>/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label">字典项编码</label>
				<div class="controls">
					<input type="text" name="item_id" class="input-xlarge" value="<{$dictItem.item_id}>" required="true">
					<input type="hidden" name="method" value="ajax_updateItemById" />
					<input type="hidden" name="id" value="<{$dictItem.id}>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="item_name" class="input-xlarge" value="<{$dictItem.item_name}>" required="true">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">排序</label>
				<div class="controls">
					<input type="number" min="1" max="100" name="item_sort" class="input-medium"  value="<{$dictItem.item_sort}>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="item_status" value="enable" <{if $dictItem.item_status=='enable'}>checked="true"<{/if}>>启用
					</label>
					<label class="radio inline">
						<input type="radio" name="item_status" value="disable" <{if $dictItem.item_status=='disable'}>checked="true"<{/if}>>停用
					</label>
				</div>
			</div>
		</div>
	</form>
</div>