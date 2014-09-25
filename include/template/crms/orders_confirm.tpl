
<div class="container-fluid" id="modal-orders">
	<div class="bb-alert alert alert-info alert-block" style="display: none;">
		<span>订单修改成功</span>
	</div>

	<form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" class="form-horizontal" name="orders_form" id="orderadd_form" method="post">
		<input type="hidden" name="ordersItemId" value="<{$orders.id}>">
		<input type="hidden" name="method" value="ajax_modifyOrders">
		<div class="control-group">
			<label class="control-label">订购产品:</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><{$orders.product_name}></span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">单价(元)</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><{$orders.product_price}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">数量</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><{$orders.orders_num}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">优惠(元)</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><{$orders.discount}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">小计(元)</label>
			<div class="controls">
				<span class="input-xlarge uneditable-input"><{$orders.payment_sum}></span>
			</div>
		</div>
		<{if $orders.status == 'determine'}>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status_verifying" value="verifying" checked="true"> 立即确认
				</label>
				<label class="radio inline">
					<input type="radio" name="status" id="status_determine" value="determine"> 客户确认中
				</label>
				<label class="radio inline">
					<input type="radio" name="status" id="status_canceling" value="canceling"> 取消订单
				</label>
			</div>
		</div>
		<{/if}>
		<div class="control-group">
			<label class="control-label">备注: </label>
			<div class="controls">
				<input type="text" name="gift" class="input-xlarge" value="<{$orders.gift}>" />
			</div>
		</div>
	</form>
</div>