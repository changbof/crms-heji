<div class="container-fluid" id="modal-content-dictitem">
	<form data-async class="form-horizontal" id="dictitem_add_form" action="<{$smarty.const.ADMIN_URL}>/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
			<label class="control-label">字典项编码</label>
			<div class="controls">
				<input type="text" name="item_id" class="input-xlarge" value="" required="true">
				<input type="hidden" name="method" value="ajax_addItemForDict" />
				<input type="hidden" name="dictId" value="<{$dictId}>" />
			</div>
		</div>
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="item_name" class="input-xlarge" required="true" placeholder="子项名称">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">排序</label>
				<div class="controls">
					<input type="number" min="1" max="100" name="item_sort" class="input-medium" value="1" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="item_status" value="enable" checked="true">启用
					</label>
					<label class="radio inline">
						<input type="radio" name="item_status" value="disable">停用
					</label>
				</div>
			</div>
		</div>
	</form>
</div>