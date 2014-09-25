<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<style type="text/css">
div.input-prepend span.add-on{display:inline-block;width:60px;}
table tbody th{width:80px;text-align:right;}
</style>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">图表</a>
	<a href="#" class="btn btn-primary" data-toggle="modal" id="booking"><i class="icon-plus"></i> 预约</a>
	<a href="#myModal2" role="button" class="btn" data-toggle="modal">查看演示案例</a>
	<!-- Modal -->
	<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Modal header</h3>
		</div>
		<div class="modal-body">
			<p>One fine body…</p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			<button class="btn btn-primary">Save changes</button>
		</div>
	</div>
	<div id="page-stats" class="block-body collapse in">
	<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>所有者</th>
				
			</tr>
			</thead>
			<tbody>							  
			<{foreach name=sample from=$samples item=sample}>
				<tr>
				<td><{$sample.sample_id}></td>
				<td><{$sample.sample_content}></td>
				</tr>
			<{/foreach}>
		  </tbody>
		</table>						
	</div>
</div>
<script type="text/javascript">
	var tb = [
		'<table>',
		'<thead><tr><th>来电号码</th><td colspan="4">',
			'<input class="input-xlarge" id="prependedInput" type="text" placeholder="phone" value="13875986781" >',
			'</td></tr>',
		'</thead>',
		'<tbody>',
			'<tr><th>姓名</th><td><input type="text" class="input-medium" id="inputEmail" placeholder="姓名"></td>',
			'<th>是否会员</th><td><input type="text" class="input-medium" id="inputError"></td><tr>',
			'<tr><th>姓名</th><td><input type="text" class="input-medium" id="inputEmail" placeholder="姓名"></td>',
			'<th>是否会员</th><td><input type="text" class="input-medium" id="inputError"></td><tr>',
			'<tr><th>姓名</th><td><input type="text" class="input-medium" id="inputEmail" placeholder="姓名"></td>',
			'<th>是否会员</th><td><input type="text" class="input-medium" id="inputError"></td><tr>',
			'<tr><th>姓名</th><td><input type="text" class="input-medium" id="inputEmail" placeholder="姓名"></td>',
			'<th>是否会员</th><td><input type="text" class="input-medium" id="inputError"></td><tr>',
			'<tr><th>姓名</th><td><input type="text" class="input-medium" id="inputEmail" placeholder="姓名"></td>',
			'<th>是否会员</th><td><input type="text" class="input-medium" id="inputError"></td><tr>',
		'</tbody>',
    	'</table>'
	].join('');

	var temp = [
		'<form class="form-horizontal">',
			'<div class="row-fluid">',
				'<div class="span12">',
					'<div class="input-prepend control-group warning">',
						'<span class="add-on"><i class="icon-user"></i></span>',
						'<input class="input-xlarge" id="prependedInput" type="text" placeholder="phone" value="13875986781" >',
					'</div>',
				'</div>',
			'</div>',
			'<div class="row-fluid">',
				'<div class="span6">',
					'<div class="input-prepend control-group">',
						'<span class="add-on">姓名</span>',
						'<input type="text" class="input-medium" id="inputEmail" placeholder="姓名">',
					'</div>',
				'</div>',
				'<div class="span6">',
					'<div class="input-prepend control-group">',
						'<span class="add-on">是否会员</span>',
						'<input type="text" class="input-medium" id="inputError">',
					'</div>',
				'</div>',
			'</div>',
			'<div class="row-fluid">',
				'<div class="span6">',
					'<div class="input-prepend control-group">',
						'<span class="add-on">会员卡号</span>',
						'<input type="text" class="input-medium" id="inputInfo">',
						'<span class="help-inline">info</span>',
					'</div>',
				'</div>',
				'<div class="span6">',
					'<div class="input-prepend control-group">',
						'<span class="add-on">归属分店</span>',
						'<input type="text" class="input-medium" id="inputInfo">',
						'<span class="help-inline">info</span>',
					'</div>',
				'</div>',
			'</div>',
			'<div class="row-fluid">',
				'<div class="span6">',
					'<div class="input-prepend control-group">',
						'<span class="add-on">建卡日期</span>',
						'<input type="text" class="input-medium" id="inputInfo">',
						'<span class="help-inline">info</span>',
					'</div>',
				'</div>',
				'<div class="span6">',
					'<div class="input-prepend control-group">',
						'<span class="add-on">会员生日</span>',
						'<input type="text" class="input-medium" id="inputInfo">',
						'<span class="help-inline">info</span>',
					'</div>',
				'</div>',
			'</div>',
		'</form>'
		].join('');

	$('#booking').click(function(){
		bootbox.dialog(tb, 
			[
				{
					"label" : "接听",
					"class" : "btn-success",
					"callback": function() {
						console.log("great success");
					}
				}, 
				{
					"label" : "预约",
					"class" : "btn-danger",
					"callback": function() {
						console.log("uh oh, look out!");
					}
				}, 
				{
					"label" : "拒接",
					"class" : "btn-primary",
					"callback": function() {
						console.log("Primary button");
					}
				}
			], {
					"header":"来电信息 ",
					"width":"1000px",
					"margin-left": function () {
						return -($(this).width() / 2);
					}
				}
		);
	});
</script>

<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>