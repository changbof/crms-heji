
<div class="container-fluid" id="modal-orders">
	<div class="bb-alert alert alert-info alert-block" style="display: none;">
		<span>订单修改成功</span>
	</div>

	<form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" class="form-horizontal" name="orders_form" id="orderadd_form" method="post">
		<input type="hidden" name="ordersId" value="<{$orders.id}>">
		<input type="hidden" name="orders_title" id="orders_title" value="<{$orders.$orders_title}>">
		<input type="hidden" name="method" value="ajax_modifyOrders">
		<div class="control-group">
			<label class="control-label">订购产品</label>
			<div class="controls">
				<input type="text" class="input-xlarge" value="<{$orders.orders_title}>" disabled="true" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">单价(元)</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="price">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="<{$orders.orders_price}>" data-rule="currency" data-step="5" name="product_price" id='product_price' class="input-small" required="true">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">数量</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="num">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="<{$orders.orders_num}>" data-rule="day" name="orders_num" id='orders_num' class="input-mini">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">优惠(元)</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="dis">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="<{$orders.discount}>" name="discount" id='discount' class="input-mini">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">小计(元)</label>
			<div class="controls">
				<input type="text" class="input-medium" name="payment_sum" id="payment_sum" readonly="true" value="<{$orders.payment_sum}>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">组方备注</label>
			<div class="controls">
				<input type="text" name="gift" class="input-xlarge" value="<{$orders.gift}>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">收货地址</label>
			<div class="controls">
				<input type="text" name="orders_address" id="orders_address" class="input-xlarge" value="<{$orders.orders_address}>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">联系电话</label>
			<div class="controls">
				<input type="text" name="orders_tel" id="orders_tel" class="input-xlarge" value="<{$orders.orders_tel|substr_replace:'****':'3':'-1'}>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">订单状态</label>
			<div class="controls">
				<input type="text" name="status2" id="status2" class="input-xlarge" value="<{$ordersstatus_array[$orders.status]}>" readonly="true" />
			</div>
		</div>
		<{if $orders.status == 'determine'}>
		<div class="control-group">
			<label class="control-label">确认订单</label>
			<div class="controls">
				<label class="radio inline">
				<input type="radio" name="status" id="status1" value="verifying" checked="true"> 立即确认
			</label>
			<label class="radio inline">
				<input type="radio" name="status" id="status2" value="canceling"> 申请取消
			</label>
			</div>
		</div>
		<!-- 审核未通过订单: 销售代表重新沟通 生成订单/取消订单 -->
		<{else if $orders.status == 'unaudited'}>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
				<input type="radio" name="status" id="status1" value="renew" checked="true"> 重新生成订单
			</label>
			<label class="radio inline">
				<input type="radio" name="status" id="status2" value="canceling"> 申请取消
			</label>
			</div>
		</div>
		<{/if}>		
		<div class="control-group hide" id="cancelNote">
			<label class="control-label">取消备注: </label>
			<div class="controls">
				<input type="text" name="note" class="input-xlarge" value="<{$orders.cancel_note}>" />
			</div>
		</div>
	</form>
</div>