
<div class="container-fluid" id="modal-process">
	<div class="bb-alert alert alert-info alert-block" style="display: none;">
		<span>操作成功</span>
	</div>

	<form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" class="form-horizontal" name="orders_process_form" id="orders_process_form" method="post">
        <input type="hidden" name="customerId" value="<{$orders.customer_id}>">
        <input type="hidden" name="ordersId" value="<{$orders.id}>">
		<input type="hidden" name="method" value="ajax_processOrders">
		<div class="control-group">
			<label class="control-label">订购产品:</label>
			<div class="controls">
				<span class="input-medium uneditable-input"><{$orders.orders_title}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">数量</label>
			<div class="controls">
				<span class="input-medium uneditable-input"><{$orders.orders_num}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">总金额(元)</label>
			<div class="controls">
				<span class="input-medium uneditable-input"><{$orders.payment_sum}></span>
			</div>
		</div>
		<{if $orders.status=='determine' }>
		<div class="control-group">
			<label class="control-label">备注: </label>
			<div class="controls">
				<input type="text" name="gift" class="input-medium" value="<{$orders.gift}>" />
			</div>
		</div>
		<{/if}>
		<!--div class="control-group">
			<label class="control-label">订单状态</label>
			<div class="controls">
				<span class="input-medium uneditable-input input-underline"><{$ordersstatus_array[$orders.status]}></span>
			</div>
		</div-->

        <div class="control-group">
            <label class="control-label">速递公司: </label>
            <div class="controls">
                <{if ($orders.status == 'verifying' && $user_info.user_group == 6) || ($orders.status == 'audited' && $user_info.user_group == 8) }>
                    <{html_options name="shipped_express" class="input-medium" options=$expressCompany_options selected=$orders.shipped_express }>
                <{else}>
                    <{html_options name="shipped_express" class="input-medium" disabled="disabled" options=$expressCompany_options selected=$orders.shipped_express }>
                <{/if}>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">快递单号: </label>
            <div class="controls">
                <input type="text" name="express_no" class="input-medium" value="<{$orders.express_no}>" <{if $orders.status != 'audited' || $user_info.user_group != 8 }> disabled="disabled" <{/if}> />
            </div>
        </div>

		<!-- 确认订单: 销售代表处理 -->
		<{if $user_info.user_id==$orders.vested && $orders.status == 'determine'}>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="verifying" checked="true"> 立即确认
				</label>
			</div>
		</div>
		<!-- 审核未通过订单: 销售代表重新沟通 生成订单/取消订单 -->
		<{elseif $user_info.user_id==$orders.vested && $orders.status =='unaudited' }>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="renew" checked="true"> 重新生成订单
				</label>
			</div>
		</div>
		<!-- 确认发货: 仓储部填写快递公司及快运单号 -->
		<{elseif $orders.status == 'audited' && $user_info.user_group == 8 }>
		<div class="control-group">
			<label class="control-label">确认订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="shipped" checked="true"> 确认发货
				</label>
			</div>
		</div>

		<!-- 确认到达当地: 物流部确认是否已达当地-->
		<{elseif $orders.status == 'shipped' && $user_info.user_group == 6 }>
		<div class="control-group">
			<label class="control-label">跟踪订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="reach" checked="true"> 到达当地
				</label>
			</div>
		</div>
		<!-- 确认签收: 物流部填写签收或退签  -->
		<{elseif $orders.status == 'reach' && $user_info.user_group == 6 }>
		<div class="control-group">
			<label class="control-label">跟踪订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="received" checked="true"> 客户已签收
				</label>
				<label class="radio inline">
					<input type="radio" name="status" id="status2" value="refused"> 客户退签
				</label>
			</div>
		</div>		
		<!-- 订单取消: 销售经理审核 -->
		<{elseif $orders.status == 'canceling' && $user_info.user_group == 7 }>
		<div class="control-group">
			<label class="control-label">取消原因</label>
			<div class="controls">
				<span class="input-medium uneditable-input"><{$orders.cancel_note}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">取消时间</label>
			<div class="controls">
				<span class="input-medium uneditable-input"><{$orders.cancel_date}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">订单取消确认: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status1" value="cancel" checked="true"> 确认取消
				</label>
			</div>
		</div>
		<{/if}>

		<!-- 订单取消: 销售代表可取消订单的情况: -->
		<{if ! in_array($orders.status, $orders_list) && $user_info.user_id == $orders.vested }>
		<div class="control-group">
			<label class="control-label">取消订单: </label>
			<div class="controls">
				<label class="radio inline">
					<input type="radio" name="status" id="status2" value="canceling"> 申请取消
				</label>
			</div>
		</div>
		<{/if}>

		<div class="control-group hide" id="cancelNote">
			<label class="control-label">处理备注: </label>
			<div class="controls">
				<input type="text" name="note" class="input-medium" value="<{$orders.cancel_note}>" />
			</div>
		</div>


	</form>
</div>