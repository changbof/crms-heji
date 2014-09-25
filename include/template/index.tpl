<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!-- - START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="container-fluid">
	<div class="block span9">
		<a href="#xtgg" class="block-heading" data-toggle="collapse">系统公告</a>
        <div id="xtgg" class="block-body collapse in">
        	<table class="table table-striped table-condensed table-hover" id="tb-sysnote">
				<!--thead>
					<tr>
					    <th class="hide"></th>
						<th width="30px">#</th>
						<th>内容</th>
						<th width="80px">时间</th>				
					</tr>
				</thead -->
				<tbody>							  
					<{foreach name=sysnote from=$sysNotes item=sysnote}>
					<tr>
					    <td class="hide">{$sysnote.note_id}</td>
						<td width="20px"><{$smarty.foreach.sysnote.index + 1}></td>
						<td><{if $sysnote.status=='new'}><sup>[new]</sup>&nbsp;&nbsp;<{/if}><{$sysnote.note_content}></td>
						<td width="90px"><{$sysnote.note_date|date_format:'%m-%d %H:%M'}></td>
					</tr>
					<{/foreach}>
				</tbody>
			</table>
        </div>		
	</div>
	<div class="block span3" style="border:none;maring:0;padding:0;">
		<div id="date-picker" style="margin-right:0px;"></div>
	</div>
</div>
<div class="container-fluid">
	<div class="block span8">
		<a href="#xttx" class="block-heading" data-toggle="collapse">系统提醒</a>
        <div id="xttx" class="block-body collapse in">
        	<table class="table table-striped table-condensed table-hover">
			<thead>
				<tr>
					<th class="hide">id</th>
					<th>产品描述</th>
					<th>姓名</th>
					<th>订购时间</th>
					<th>金额(元)</th>
					<th>赠品</th>
					<th>订单状态</th>
					<{if $user_info.user_group == 5}>
					<td>病症</td>
					<td>工号</td>
					<{/if}>
					<th width="140px">操作</th>
				</tr>
			</thead>
			<tbody>							  
				<{foreach name=myods from=$myorders item=myods}>
				<tr>
					<td class="hide"><{$myods.id}></td>
					<{if $myods.status!="new"}>
					<td><a href="product_modify.php?a=view&product_id=<{$myods.orders_id}>" target="_blank" title="查看产品明细"><{$myods.orders_title}></a></td>
					<{else}>
					<td><{$myods.orders_title}></td>
					<{/if}>
					<td><a href="customer_modify.php?a=view&ordersId=<{$myods.id}>&customerId=<{$myods.customer_id}>" target="_blank"><{$myods.name}></a></td>
					<td><{$myods.orders_date}></td>
					<td><{$myods.payment_sum}></td>
					<td><{$myods.gift}></td>
					<td><{if !$myods.finished=='' }>已结束<{else}><{$ordersstatus_options[$myods.status]}><{/if}></td>
					<{if $user_info.user_group == 5}>
					<td><{$myods.health_diagnosis}></td>
					<td><{$myods.real_name}></td>
					<{/if}>
					<td>
						<div class="btn-group">
							<small class="btn btn-link" data-url="orders_verify.php?a=view&customerId=<{$myods.customer_id}>&ordersId=<{$myods.id}>" title= "查看订单明细" id="oitem-view"><i class="icon-eye-open"></i></small>
							<{if $myods.finished=='' }>
								<{if $myods.vested == $user_info.user_id}>
									<{if in_array($myods.status,array('determine','unaudited'))}>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "确认客户订单" id="oitem-process"><i class="icon-pencil"></i></small>
									<{elseif ! in_array($myods.status, $orders_list) }>
									<small class="btn btn-link" data-url="orders_process.php?a=canceling&ordersId=<{$myods.id}>" title= "取消订单" id="oitem-process"><i class="icon-remove-sign"></i></small>
									<{/if}>
								<{elseif $user_info.user_group==5 && in_array($myods.status,array('new','renew')) }>
									<small class="btn btn-link" data-url="orders_item_add.php?customerId=<{$myods.customer_id}>&ordersId=<{$myods.id}>" title= "组方" id="oitem-add"><i class="icon-wrench"></i></small>
								<{elseif $user_info.user_group == 6}>
									<{if $myods.status=='verifying'}>
									<small class="btn btn-link" data-url="orders_verify.php?ordersId=<{$myods.id}>" title= "审核客户订单" id="oitem-process"><i class="icon-check"></i></small>
									<{elseif $myods.status=='audited'}>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "确认发货" id="oitem-process"><i class="icon-road"></i></small>
									<{elseif $myods.status=='shipped'}>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "确认签收" id="oitem-process"><i class="icon-edit"></i></small>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "退签确认" id="oitem-process2"><i class="icon-retweet"></i></small>
									<{/if}>
								<{elseif $user_info.user_group==7 && $myods.status=='canceling' }>
									<small class="btn btn-link" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "取消确认" id="oitem-process"><i class="icon-warning-sign"></i></small>
								<{/if}>
							<{/if}>
						</div>
					</td>	
				</tr>
				<{/foreach}>
			</tbody>
		</table>    
        	
        </div>		
	</div>
	<div class="block span4">
		<a href="#wdbq" class="block-heading" data-toggle="collapse">我的便签</a>
        <div id="wdbq" class="block-body collapse in">       	
          <table class="table table-striped table-condensed table-hover" id="tb-sysnote">
			<!--thead>
				<tr>
				    <th style="display: none;"></th>
					<th >#</th>
					<th>内容</th>					
				</tr>
			</thead-->
			<tbody>							  
				<{foreach name=mynote from=$myNotes item=mynote}>
				<tr>
				    <td class="hide">{$mynote.note_id}</td>
					<td width="20px"><{$smarty.foreach.mynote.index + 1}></td>
					<td>[<{$mynote.note_date|date_format:'%m-%d'}>]&nbsp;&nbsp;<{$mynote.note_content}> </td>					
				</tr>
				<{/foreach}>
			</tbody>
		</table> 
        </div>		
	</div>
</div>

<div class="container-fluid">
	<div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">订单统计</a>
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
        </div>
    </div>
</div>	
<script type="text/javascript">
$((function($){
	$.datepicker.regional['zh-CN'] = {
	    clearText: '清除',
	    clearStatus: '清除已选日期',
	    closeText: '关闭',
	    closeStatus: '不改变当前选择',
	    prevText: '<上月',
	    prevStatus: '显示上月',
	    prevBigText: '<<',
	    prevBigStatus: '显示上一年',
	    nextText: '下月>',
	    nextStatus: '显示下月',
	    nextBigText: '>>',
	    nextBigStatus: '显示下一年',
	    currentText: '今天',
	    currentStatus: '显示本月',
	    monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
	    monthNamesShort: ['一','二','三','四','五','六', '七','八','九','十','十一','十二'],
	    monthStatus: '选择月份',
	    yearStatus: '选择年份',
	    weekHeader: '周',
	    weekStatus: '年内周次',
	    dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
	    dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
	    dayNamesMin: ['日','一','二','三','四','五','六'],
	    dayStatus: '设置 DD 为一周起始',
	    dateStatus: '选择 m月 d日, DD',
	    dateFormat: 'yy-mm-dd',
	    firstDay: 1,
	    initStatus: '请选择日期',
	    isRTL: false};
	$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
})(jQuery));
	$(document).ready(function() {
		$('#date-picker').datepicker();
		$('.block-heading').css('line-height','2em');
	});
</script>
<!-- - END 以下内容不需更改，请保证该TPL页内的标签匹配即可 - -->
<{include file="footer.tpl"}>
