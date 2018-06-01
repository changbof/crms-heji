<style type="text/css">
	.spinner input,
	.spinner .add-on{padding-top:4px;padding-bottom: 4px;}
	h4{margin:-10px 0 10px;padding-bottom:8px;border-bottom:1px solid gray;}
	h5{margin:0;padding-bottom:4px;}
	div.control-inline{margin-bottom: 10px;}
	form{margin-bottom: 10px;}
</style>

<h4>短信发送</h4>
<div class="container-fluid" id="modal-sms-send" style="min-height:300px;margin-bottom: -20px;">
	<form action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" data-async class="form-horizontal margin-top:-10px" name="orders_item_form" id="orders_item_form" method="post" data-target="orders_item_list">
		<input type="hidden" name="sendTo" value="<{$sendTo}>">
		<input type="hidden" name="method" id="method" value="ajax_sendSMS">
		<div class="control-group">
			<label class="control-label">接收人：</label>
			<div class="controls">
				<span class="input-medium uneditable-input"><{$sendTo_name}></span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">手机号码：</label>
			<div class="controls">
				<span class="input-medium uneditable-input"><{$sendTo}></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">短信内容</label>
			<div class="controls">
				<textarea  rows="8" name="sms-content" class="span5"></textarea>
			</div>
		</div>
	</form>
</div>
