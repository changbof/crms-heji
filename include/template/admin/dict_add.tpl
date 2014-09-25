<div class="container-fluid" id="modal-content-dict">
	<form data-async class="form-horizontal" id="dict_add_form" action="<{$smarty.const.ADMIN_URL}>/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="name" id="name" class="input-xlarge" required="true" placeholder="字典项名称">
					<input type="hidden" name="method" value="ajax_addDict" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">类型</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="owner" value="system">系统
					</label>
					<label class="radio inline">
						<input type="radio" name="owner" value="user" checked="checked">用户
					</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">备注</label>
				<div class="controls">
					<input type="text" name="remark" class="input-xlarge" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="status" value="enable" checked="true">启用
					</label>
					<label class="radio inline">
						<input type="radio" name="status" value="disable">停用
					</label>
				</div>
			</div>
		</div>	
	</form>
</div>