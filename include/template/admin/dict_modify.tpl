<div class="container-fluid">
	<form data-async class="form-horizontal" id="dict_modify_form" action="<{$smarty.const.ADMIN_URL}>/ajax/sys.php" method="POST">
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label">字典项名称</label>
				<div class="controls">
					<input type="text" name="name" id="name" value="<{$dict.name}>" class="input-xlarge" required="true" placeholder="字典项名称">
					<input type="hidden" name="method" value="ajax_modifyDict" />
					<input type="hidden" name="id" value="<{$dict.id}>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">类型</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="owner" value="system" <{if $dict.owner=='system'}>checked="checked"<{/if}>>系统
					</label>
					<label class="radio inline">
						<input type="radio" name="owner" value="user" <{if $dict.owner=='user'}>checked="checked"<{/if}>>用户
					</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">备注</label>
				<div class="controls">
					<input type="text" name="remark" value="<{$dict.remark}>" class="input-xlarge" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">状态</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="status" value="enable"  <{if $dict.status=='enable'}>checked="checked"<{/if}>>启用
					</label>
					<label class="radio inline">
						<input type="radio" name="status" value="disable" <{if $dict.status=='disable'}>checked="checked"<{/if}>>停用
					</label>
				</div>
			</div>
		</div>	
	</form>
</div>