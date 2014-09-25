
<div class="container-fluid" id="modal-orders">
	<div class="bb-alert alert alert-info alert-block" style="display: none;">
		<span>新增订购成功</span>
	</div>

	<form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" class="form-horizontal" name="orders_form" id="orderadd_form" method="post">
		<input type="hidden" name="customerId" value="<{$customerId}>">
		<input type="hidden" name="saleId" value="<{$saleId}>">
		<input type="hidden" name="o_address" value="<{$address}>">
		<input type="hidden" name="orders_title" id="orders_title" value="">
		<input type="hidden" name="o_mobile" id="o_mobile" value="<{$orders_tel}>">
		<input type="hidden" name="orders_tel" id="orders_tel" value="<{$orders_tel}>" />
		<input type="hidden" name="method" value="ajax_addOrders">
		<div class="control-group">
			<label class="control-label">订购产品:</label>
			<div class="controls">
				<select name="orders_titleId" id="orders_titleId" class="selectpicker show-tick" data-live-search="true" data-header="请选择产品" data-size="10" data-width="150px">
					<option>请选择套餐</option>
					<{foreach name=product from=$products item=product}>	
					<option data-subtext='<i>规格:</i><small><{$product.product_spec}>/<{$product.unit}></small><i>用法:</i><small><{$product.usage}></small><i>品牌:</i><small><{$product.brand}></small><i>原产地:</i><small><{$product.place_origin}></small><i>单价:</i><small>￥<{$product.product_price}>元</small>' data-price="<{$product.product_price}>" value="<{$product.id}>"><{$product.product_name}></option>
					<{/foreach}>
				</select>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">单价(元)</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="price">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="1" data-rule="currency" data-step="5" name="product_price" id='product_price' class="input-small" required="true">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">数量</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="num">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="1" data-rule="day" name="orders_num" id='orders_num' class="input-mini">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">优惠(元)</label>
			<div class="controls">
				<div class="input-append spinner" data-trigger="spinner" id="dis">
					<div class="add-on"><a href="javascript:;" data-spin="down">-</a></div>
					<input type="text" value="0" name="discount" id='discount' class="input-mini">
					<div class="add-on"><a href="javascript:;" data-spin="up">+</a></div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">小计(元)</label>
			<div class="controls">
				<input type="text" class="input-medium" name="payment_sum" id="payment_sum" readonly="true" value="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">备注: </label>
			<div class="controls">
				<textarea  rows="2" name="gift" class="span5"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">收货地址: </label>
			<div class="controls">
				<input type="text" name="orders_address" id="orders_address" class="span5" value="<{$address}>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">联系电话: </label>
			<div class="controls">
				<input type="text" name="orders_tel_0" id="orders_tel_0" class="span5" value="<{$orders_tel|substr_replace:'****':'3':'-1'}>" />
			</div>
		</div>
		<div class="control-group">
            <label class="control-label">联系电话2:</label>
            <div class="controls">
                <input type="text" name="other_tel_0" id="other_tel_0" class="span5" readonly="true" value="<{$other_tel|substr_replace:'****':'3':'-1'}>" />
            </div>
        </div>
	</form>
</div>