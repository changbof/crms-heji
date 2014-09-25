<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="hero-unit" style="margin-top:10px;">
	<h3>导入产品资料<small>(只限于xls格式)</small></h3>
	<hr />
	<form method="post" action="" autocomplete="off" ENCTYPE="multipart/form-data">
		<input type="file" name="excel"  id="DropDownExcel"  class="input-xlarge">
		<div class="btn-toolbar">
			<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
			<div class="btn-group"></div>
		</div>
	</form>
	<hr />
	<ul>
		<li><small>导入模板下载,请点击"<a href="../tmp/template_product.xls" target="_blank">产品信息导入模板</a>";</small></li>
		<li><small>注: 请严格按照"导入模板"要求格式进行导入,否则将不能成功导入;</small></li>
	</ul>
</div>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>