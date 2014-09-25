<style type="text/css">
	.spinner input,
	.spinner .add-on{padding-top:4px;padding-bottom: 4px;}
	h4{margin:-10px 0 10px;padding-bottom:8px;border-bottom:1px solid gray;}
	h5{margin:0;padding-bottom:4px;}
	div.control-inline{margin-bottom: 10px;}
	form{margin-bottom: 10px;}
</style>

<{if !$a}>
<h4>新增订单组方</h4>
<div class="container-fluid" id="modal-orders-item" style="min-height:300px;margin-bottom: -20px;">
	<form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" data-async class="form-horizontal margin-top:-10px" name="orders_item_form" id="orders_item_form" method="post" data-target="orders_item_list">
		<input type="hidden" name="customerId" value="<{$customerId}>">
		<input type="hidden" name="ordersId" id="ordersId" value="<{$ordersId}>">
		<input type="hidden" name="productName" id="productName" value="">
		<input type="hidden" name="ordersItemId" id="ordersItemId" value="">
		<input type="hidden" name="method" id="method" value="ajax_addOrdersItem">

		<div class="control-inline">
			<select name="product_id" id="product_id" class="selectpicker show-tick" data-live-search="true" data-header="搜索产品（搜索不到的营养素，请双击搜索框将其添加到组方中！）" data-size="8" data-width="355px">
				<option value="-1">请选择组方营养素</option>
				<{foreach name=product from=$products item=product}>
				<option data-subtext='<i>规格:</i><small><{$product.product_spec}>/<{$product.unit}></small><i>用法:</i><small><{$product.usage}></small><i>品牌:</i><small><{$product.brand}></small><i>原产地:</i><small><{$product.place_origin}></small>' data-remark="<{$product.usage}>" data-spec="<{$product.product_spec}>/<{$product.unit}>" value="<{$product.id}>"><{$product.product_name}></option>
				<{/foreach}>
			</select>
		</div>
		<div class="control-inline">
			数量: <div class="input-append spinner" data-trigger="spinner" id="num">
				<input type="text" value="1" data-rule="day" name="item_num" id='item_num' class="input-mini">
				<div class="add-on">
				    <a href="javascript:;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a>
				    <a href="javascript:;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a>
			  	</div>
			</div>
		</div><div class="clearfix"></div>
		<div class="control-inline">
			<input type="text" value="" name="item_spec" id='item_spec' class="input-medium" placeholder="规格" />
		</div>
		<div class="control-inline">
			<input type="text" value="" name="item_remark" id='item_remark' class="input-xlarge"  placeholder="用法: 口服;2次/日;1片/次 " />
		</div>
		<div class="btn-toolbar control-inline">
			<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 添加</button>
			<input type="reset" class="btn" />
		</div><div class="clearfix"></div>
	</form>
<{/if}>
	<h5>订单组方明细:</h5>
    <div style="height:200px;overflow-y: auto;">
	<table class="table table-striped table-bordered table-condensed table-hover" id="orders_item_list" style="margin-top:4px;">
		<thead>
			<tr>
				<th class="hide">#</th>
				<th>产品名称</th>
				<th>规格</th>
				<th>数量</th>
				<th>用法</th>
				<th class="hide">product_id</th>
			</tr>
		</thead>
		<tbody>
			<{foreach name=item from=$items item=item}>				 
			<tr>
				<td class="hide"><{$item.item_id}></td>
				<td><{$item.product_name}></td>
				<td><{$item.product_spec}></td>
				<td><{$item.item_num}></td>
				<td><{$item.remark}></td>
				<td class="hide"><{$item.product_id}></td>
			</tr>
			<{/foreach}>
		</tbody>
	</table>
    </div>
	<div style="margin-bottom:0px;">
        <label>备注:
        <textarea rows="1" name="gift" id="gift" class="span6" style="display:inline-block;" placeholder="此处填备注信息，新产品请在上面“选择组方营养素”中搜索框中添加！"><{$remark}></textarea></label>
    </div>
</div>
