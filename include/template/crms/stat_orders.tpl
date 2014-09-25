<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div id='loading'>正在处理中...</div>
<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="cdr-record-form">
		<div class="control-inline">
			<label>订单时间: 从</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="sdate" value="<{$_GET.sdate}>" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div class="control-inline">
			<label>到</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="edate" value="<{$_GET.edate}>" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div class="control-inline">
			<label>销售代表</label>
			<{html_options name="vested" id="DropDownSaler" data-action="assign" data-size="10" class="selectpicker" options=$saler_options_list selected=$_GET.vested}>
		</div>
		<div class="control-inline">
			<label>&nbsp;</label>
			<label class="radio inline">
				<input type="checkbox" name="type" id="type" value="1" <{if $_GET.type=='1'}>checked="true"<{/if}>>客户明细
			</label>
		</div>
		<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
			<button type="submit" class="btn btn-primary">检索</button>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>

<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">功能列表</a>
	<div id="page-stats" class="block-body collapse in">

		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>工号/客户id</th>
					<th>单数</th>
					<th>金额</th>
					<th>未审单</th>
					<th>未审金额</th>
					<th>待签单</th>
					<th>待签金额</th>
                    <th>到达单</th>
                    <th>到达金额</th>
					<th>已签单</th>
					<th>已签金额</th>
					<th>退签单</th>
					<th>退签金额</th>
					<!--th>取消单</th>
					<th>取消金额</th-->
				</tr>
			</thead>
			<tbody>							  
				<{foreach name=so from=$statOrders item=so}>

				<tr>
					<td><{$smarty.foreach.so.index + 1}></td>
					<td><{$so.c0}></td>
					<td><{$so.ords_num}></td>
					<td><{$so.ords_sum}></td>
					<td><{$so.ords_num_wsh}></td>
					<td><{$so.ords_sum_wsh}></td>
					<td><{$so.ords_num_dqs}></td>
					<td><{$so.ords_sum_dqs}></td>
                    <td><{$so.ords_num_dd}></td>
                    <td><{$so.ords_sum_dd}></td>
					<td><{$so.ords_num_yqs}></td>
					<td><{$so.ords_sum_yqs}></td>
					<td><{$so.ords_num_tq}></td>
					<td><{$so.ords_sum_tq}></td>
					<!--td><{$so.ords_num_qx}></td>
					<td><{$so.ords_sum_qx}></td-->
				</tr>
				<{/foreach}>
			</tbody>
		</table> 
		<!-- START 分页模板 -->
		<{$page_html}>
		<!-- END 分页-->			   
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.selectpicker').selectpicker();
		$('.datetimepicker').datetimepicker({
	        language: 'zh-CN',
	        pickTime: false
	    });
	});
</script>
<!--操作的确认层，相当于javascript:confirm函数-->
<{$osadmin_action_confirm}>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>