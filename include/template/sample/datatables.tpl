<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<script src="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/jquery.dataTables.rowGrouping.js"></script>
<style type="text/css">
.datatable th, 
.datatable td { white-space: nowrap; }
div.dataTables_wrapper {
        width: 1000px;
        margin: 0 auto;
    }
</style>
<div class="well">
<table id="example" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>id</th>
			<th>订单编号</th>
			<th>订购日期</th>
			<th>金额</th>
			<th>赠品</th>
			<th>状态</th>
		</tr>
	</thead>
    <tfoot>
		<tr>
			<th>id</th>
			<th>订单编号</th>
			<th>订购日期</th>
			<th>金额</th>
			<th>赠品</th>
			<th>状态</th>
		</tr>
    </tfoot>

</table>

</div>

 <script type="text/javascript">
  var status_array = <{$ordersstatus_options|json_encode}>;
  $(document).ready(function() {
	$('.datatable').dataTable( {
		"oLanguage": {
			"sUrl": "<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/zh_CN.json"
		},
		"bFilter": true,
		"bProcessing": true,
	    "bServerSide": true,
	    "sServerMethod": "POST",
	    "sAjaxSource": "<{$smarty.const.ADMIN_URL}>/ajax/orders.php?method=ajax_getOrders",
	    "aoColumns": [
			{"mData":"id","bSearchable": false, "bVisible": false },
			{"mData": "orders_no","bVisible": false},
			{"mData": "orders_date" ,"sClass": "center"},
			{"mData": "orders_sum" },
			{"mData": "gift" },
			{"mData": "status",
			 "mRender": function ( data, type, row ) {
                    return data==''?'新订单':status_array[data];
                } }
		],
  //    "aoColumnDefs": [
  //        { "sTitle": "Column1", "aTargets": [0]},
  //        { "sTitle": "Column2", "aTargets": [1]},
  //        { "sTitle": "Column3", "aTargets": [2]},
  //        { "sTitle": "Column4", "aTargets": [3]},
  //        { "sTitle": "Column5", "aTargets": [4]},
  //        { "sTitle": "Column6", "aTargets": [5]}
  //    ],
	}) .rowGrouping({
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
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>