<div class="container-fluid" id="modal-comecall" style="margin:-10px;min-height:200px">
	<div class="row-fluid">
		<div class="span12">
			<form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" data-async class="form-horizontal margin-top:-10px" name="comecall_form" id="comecall_form" method="post">
				<input type="hidden" name="customerId" id="comecell_customerId" value="<{$customer.id}>">

				<div class="control-group">
					<label class="control-label">来电号码</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><{$customer.mobile|substr_replace:'****':'-5':'4'}></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">客户姓名</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><{$customer.name}>
						</span>
						<{if $customer.name=='新客户'}><a id="addc" data-original-title="Tooltip" href="<{$smarty.const.ADMIN_URL}>/crms/customer_add.php?p=_blk&cometel=<{$customer.mobile}>" target="_blank" class="tooltip-new" title="马上创建客户资料信息?"><i class="icon-plus"></i></a><{/if}>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">性别</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><{$sex_options[$customer.sex]}></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">客户类型</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><{$customertype_options[$customer.type]}></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">责任人</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><{$user_options_list[$customer.vested]}></span>
					</div>
				</div>
				<!-- div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<a class="btn btn-primary" href="<{$smarty.const.ADMIN_URL}>/crms/customer_modify.php?a=view&customerId=<{$customer.id}>" target="_blank">查看客户信息</a>
					</div>
				</div -->
			</form>
		</div>
	</div>
</div>