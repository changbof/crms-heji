<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="well">
	<table id="myorders" class="table table-striped table-bordered datatable" width="100%">
		<thead>
		<tr>
			<th>id</th>
			<th>订单编号</th>
			<th>订购时间</th>
			<th>姓名</th>
			<th>金额(元)</th>
			<th>产品</th>
			<th>赠品</th>
			<th>订单状态</th>
			<td>病症</td>
			<th width="80px">操作</th>
		</tr>
		</thead>

	</table>
</div>
<script type="text/javascript">
var current_user_id = <{$current_user_info.user_id}>;
var user_group = <{$current_user_info.user_group}>;
var status_array = <{$ordersstatus_options|json_encode}>;
  $(document).ready(function() {
	$('.datatable').dataTable( {
		"oLanguage": {
			"sUrl": "<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/zh_CN.json"
		},
		"bLengthChange": false,
		"bProcessing": true,
	    "bServerSide": true,
	    "sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
	      aoData.push( { 
	      	"sdate": $('#sdate').val(), 
	      	"edate": $('#edate').val() ,
	      	"status": $('#status').val()
	      });
	    },
	    "sAjaxSource": "<{$smarty.const.ADMIN_URL}>/ajax/myorders.php?method=ajax_getMyOrders",
	    "aoColumns": [
			{"mData":"id","bSearchable": false, "bVisible": false },
			{"mData": "orders_no","bVisible": false},
			{"mData": "orders_date" ,"sClass": "center"},
			{"mData": "name"},
			{"mData": "orders_title"},
			{"mData": "payment_sum" },
			{"mData": "vested" },
			{"mData": "gift" },
			{"mData": "status",
			 "mRender": function ( data, type, row ) {
                    return data==''?'新订单':status_array[data];
                } },
            {"mData": null,"mRender":function(data,type,row){
            	//if(current_user_id==row[])
            	//if(user_group==4){
            		return "edit";
            	//}
            }}

		],
	})
	 .rowGrouping({
		"iGroupingColumnIndex"	: 1,
		"bExpandableGrouping"	: true,
		"sGroupLabelPrefix" 	: "订单编号: ",
		fnOnGroupCompleted: function( oGroup ) {
			var length = $('#example tr' + oGroup.groupItemClass).length;
			$(oGroup.nGroup).find("td").append(" <small>"+length+"项</small>");
		},
		fnGroupLabelFormat: function(label, oGroup) {
			return " <i>"+ label + "</i>";
		} 
	})
  });
</script>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/jquery.dataTables.rowGrouping.js"></script>
<!-- 操作的确认层，相当于javascript:confirm函数 -->
<{$osadmin_action_confirm}>
	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>