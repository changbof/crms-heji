<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="well">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#home" data-toggle="tab">请填写产品信息</a></li>
	</ul>	

	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active in" id="home">
			<form id="tab" method="post" action="">
				<div class="row-fluid">
					<div class="span6">
						<div class="control-inline">
							<label>产品名称</label>
							<input type="text" name="product_name" class="input-large" value="<{$_POST.product_name}>" autofocus="true" required="true" />
						</div>
						<div class="control-inline">
							<label>产品代码</label>
							<input type="text" name="product_code" class="input-small" value="<{$_POST.product_code}>" />
						</div>
					</div>
					<div class="span6">
						<div class="control-inline">
							<label>单价(元)</label>
							<input type="text" name="product_price" class="input input-small" value="<{$_POST.product_price}>" required="true" />
						</div>
						<div class="control-inline">
							<label>类型</label>
							<label class="radio inline">
								<input type="radio" name="product_type" value="single" checked="true">营养素
							</label>
							<label class="radio inline">
								<input type="radio" name="product_type" value="suite">套餐
							</label>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="control-inline">
							<label>常见规格</label>
							<input type="text" name="product_spec" class="input-large" required="true" value="<{$_POST.product_spec}>" />
						</div>
						<div class="control-inline">
							<label>单位</label>
							<input type="text" name="unit" class="input input-small" required="true" value="<{$_POST.unit}>" />
						</div>
					</div>
					<div class="span6">
						<div class="control-inline">
							<label>用法</label>
							<input type="text" name="usage" class="input input-small" value="<{$_POST.usage}>" />
						</div>
						<div class="control-inline">
							<label>最佳服用时间</label>
							<input type="text" name="product_use_time" class="input-large" value="<{$_POST.product_use_time}>" />
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<label>推荐品牌</label>
						<input type="text" name="brand" class="input span8" value="<{$_POST.brand}>" />
					</div>
					<div class="span6">
						<label>原产地</label>
						<input type="text" name="place_origin" class="input span8" value="<{$_POST.place_origin}>" />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>优势 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="superiority" rows="3" class="input span10"><{$_POST.superiority}></textarea>
					</div>
				</div>
			<blockquote>
				<p>详细信息</p>
				<a href="#product-details" data-toggle="collapse"><i class="icon-chevron-down"></i> </a>
			</blockquote>
					<div id="product-details" class="collapse in">
					<div class="row-fluid">
						<div class="span6">
							<label>功能 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_effect" rows="3" class="input span10"><{$_POST.product_effect}></textarea>
						</div>
						<div class="span6">
							<label>适应症  <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_symptom" rows="3" class="input span10"><{$_POST.product_symptom}></textarea>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">
							<label>帮助吸收的物质 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="help_factor" rows="3" class="input span10"><{$_POST.help_factor}></textarea>
						</div>
						<div class="span6">
							<label>抑制吸收的物质</label>
							<textarea name="inhibiting_factor" rows="3" class="input span10"><{$_POST.inhibiting_factor}></textarea>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">
							<label>最佳食物来源 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="food_sources" rows="3" class="input span10"><{$_POST.food_sources}></textarea>
						</div>
						<div class="span6">
							<label>毒性说明</label>
							<textarea name="product_side_effect" rows="3" class="input-xlarge"><{$_POST.product_side_effect}></textarea>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<label>状态 </label>
							<label class="radio inline">
								<input type="radio" name="online" value="online">立即上架
							</label>
							<label class="radio inline">
								<input type="radio" name="online" value="underline">下架
							</label>
							<label class="radio inline">
								<input type="radio" name="online" value="init">待审核
							</label>
						</div>
					</div>
					</div>
					<div class="btn-toolbar">
						<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
					</div>		
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('blockquote a').on('click',function(){
			if($(this).hasClass('collapsed')){
				$(this).find('i').removeClass().addClass('icon-chevron-down');
			}else{
				$(this).find('i').removeClass().addClass('icon-chevron-up');
			}
		})
	});
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>