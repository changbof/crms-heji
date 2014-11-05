<style type="text/css">
	h5{margin:0;padding-bottom:4px;}
</style>
<div class="container-fluid" id="modal-orders-verify" style="margin:-20px -20px -10px -30px;min-height:360px">
	<div class="row-fluid">
        <form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" data-async class="form-horizontal margin-top:-10px" name="orders_verify_form" id="orders_verify_form" method="post">
		<div class="span5">
				<input type="hidden" name="customerId" value="<{$orders.customer_id}>">
				<input type="hidden" name="ordersId" id="ordersId" value="<{$orders.id}>">
				<input type="hidden" name="method" value="ajax_processOrders">

				<div class="control-group">
					<label class="control-label">出单时间</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><{$orders.orders_date|date_format:'%Y-%m-%d %H:%M:%S'}></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">营养顾问</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline"><{$orders.real_name}></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">客户电话</label>
					<div class="controls">
						<span class="input-medium uneditable-input input-underline">
                            <{if $orders.mobile!=''}><{$orders.mobile|substr_replace:'****':'3':'-1'}>
                            <a href="javascript:void();" onclick="reqAutoDial('<{$orders.mobile}>');return false;" title="呼叫"><i class="icon-share-alt"></i></a>&nbsp;&nbsp;<{/if}>
                       </span>
					</div>
				</div>
                <div class="control-group">
                    <label class="control-label">客户电话2</label>
                    <div class="controls">
						<span class="input-medium uneditable-input input-underline">
                            <{if $orders.telphone!=''}><{$orders.telphone|substr_replace:'****':'3':'-1'}>
                            <a href="javascript:void();" onclick="reqAutoDial('<{$orders.telphone}>');return false;" title="呼叫"><i class="icon-share-alt"></i></a><{/if}>
                        </span>
                    </div>
                </div>
				<{if !$a }>
				<div class="control-group">
					<label class="control-label">确认订单</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="status" id="status1" value="unaudited"> 未通过
						</label>
						<label class="radio inline">
							<input type="radio" name="status" id="status2" value="audited"> 已通过
						</label>
					</div>
				</div>
				<{/if}>
                <div class="control-group">
                    <label class="control-label">审核备注</label>
                    <div class="controls">
                        <textarea rows="2" name="note" class="input-medium" <{if $a }> disabled="disabled"<{/if}>> <{$orders.verify_note}></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">速递公司</label>
                    <div class="controls">
                        <{if $orders.status!='verifying'}>
                            <{html_options name="shipped_express" class="input-small" disabled="disabled" options=$expressCompany_options selected=$orders.shipped_express }>
                        <{else}>
                            <{html_options name="shipped_express" class="input-medium" options=$expressCompany_options selected=$orders.shipped_express }>
                        <{/if}>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">订单跟踪</label>
                    <div class="controls">
                        <span class="input-medium uneditable-input input-underline">
                            <{if $orders.express_no!=''}><a href="#" id="example" class="btn btn-success" rel="popover">hover for popover</a><{/if}>

                        </span>
                    </div>
                </div>
		</div>
		<div class="span7">
            <div class="control-group">
                <label class="control-label" style="text-align: left;width:70px;">收货地址</label>
                <div class="controls" style="margin-left:80px;">
                    <input type="text" name="orders_address" class="span12" <{if $user_info.user_group!=6}>readonly="readonly"<{/if}> value="<{if $orders.orders_address==''}><{$orders.address}><{else}><{$orders.orders_address}><{/if}>" />
                </div>
            </div>
			<h5>订单明细:<span class="pull-right">订单金额：<strong style="color:red;">￥<{$orders.payment_sum}>元</strong></span></h5>
            <div style="height:230px;overflow: auto;">
			<table class="table table-condensed" id="orders_item_list" style="margin-top:-4px;white-space:nowrap;">
				<thead>
					<tr>
						<th class="hide">#</th>
						<th>产品名称</th>
						<th>规格</th>
						<th>数量</th>
						<th>说明</th>
					</tr>
				</thead>
				<tbody>
					<{foreach name=item from=$items item=item}>				 
					<tr>
						<td class="hide"><{$item.product_id}></td>
						<td><{$item.product_name}></td>
						<td><{$item.product_spec}></td>
						<td><{$item.item_num}></td>
						<td><{$item.remark}></td>
					</tr>
					<{/foreach}>
				</tbody>
			</table>
			</div>
            <div style="padding-top:15px;">
                <div>
                    <label class="pull-right"><input type="checkbox" name="nutrientscase" id="nutrientscase" value="1" <{if $orders.nutrientscase==1}>checked="checked"<{/if}> <{if $orders.status!='verifying'}>disabled="disabled "<{/if}> />营养方案 </label>
                    <label class="control-label" style="text-align: left;width:70px;">组方备注 </label>
                </div>
                <textarea rows="2" name="gift" class="span12"><{$orders.gift}></textarea>
            </div>
		</div>
	</div>
</form>
</div>
<div id="wl-midtrace">
    <ul>
        <li>
            <span class="wl-stream-time">2014-10-12 13:04:37</span>
            <span class="wl-stream-text">卖家已发货</span>
        </li>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#example").popover({title: 'Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
    });
</script>