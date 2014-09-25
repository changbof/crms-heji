<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<style type="text/css">
	#ht{line-height:20px;font-size: 3em;font-weight: bolder;margin-top:5px; }
	.product-form label{font-weight: bold;margin-top: 10px;}
	blockquote p a{font-size: 12px;font-weight: normal;color:gray;margin-left: 10px;}
	<{if $p}>
  	  /* 隐藏头,右侧,内容头部 */
	  body{background: none;}
	  .sidebar-nav { display:none; }
	  .sidebar-nav{width:0;}
	  .content{margin-left: 0;}
	<{/if}>
</style>
<div class="well">
	<ul class="nav nav-tabs">
		<small class="pull-right"><h2 id="ht"><{$product.product_name}></h2></small>
		<li class="active"><a href="#home" data-toggle="tab">编辑/查看产品信息</a></li>
	</ul>	

	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active in" id="home">
			<form id="tab" method="post" action="" class="product-form">
				<div class="row-fluid">
					<div class="span6">
						<label>产品名称</label>
						<input type="text" name="product_name" class="span12" value="<{$product.product_name}>" autofocus="true" required="true" />
						<label>产品代码</label>
						<input type="text" name="product_code" class="span12" value="<{$product.product_code}>" />
						<label>单价(元)</label>
						<input type="text" name="product_price" class="span12" value="<{$product.product_price}>" />
						
						<label>常见规格</label>
						<input type="text" name="product_spec" class="span12" required="true" value="<{$product.product_spec}>" />
						<label>单位</label>
						<input type="text" name="unit" class="span12" required="true" value="<{$product.unit}>" />
						<label>类型</label>
						<label class="radio inline">
							<input type="radio" name="product_type" value="single" checked="true">营养素
						</label>
						<label class="radio inline">
							<input type="radio" name="product_type" value="suite">套餐
						</label>
					</div>
					<div class="span6">
						<label>用法</label>
						<input type="text" name="usage" class="span12" value="<{$product.usage}>" />
						<label>最佳服用时间</label>
						<input type="text" name="product_use_time" class="span12" value="<{$product.product_use_time}>" />
						<label>推荐品牌</label>
						<input type="text" name="brand" class="span12" value="<{$product.brand}>" />
						<label>原产地</label>
						<input type="text" name="place_origin" class="span12" value="<{$product.place_origin}>" />
						<label>优势 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="superiority" class="span12"><{$product.superiority}></textarea>
					</div>
				</div>
				<blockquote>
					<p>详细信息<a href="#product-details" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
				</blockquote>
				<div id="product-details" class="collapse in">
					<div class="row-fluid">
						<div class="span6">
							<label>功能 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_effect" rows="3" class="span12"><{$product.product_effect}></textarea>
							<label>症状  <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_symptom" rows="3" class="span12"><{$product.product_symptom}></textarea>
							<label>帮助吸收的物质 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="help_factor" rows="3" class="span12"><{$product.help_factor}></textarea>
							<label>抑制吸收的物质<span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="inhibiting_factor" rows="3" class="span12"><{$product.inhibiting_factor}></textarea>
						</div>
						<div class="span6">
							<label>最佳食物来源 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="food_sources" rows="3" class="span12"><{$product.food_sources}></textarea>
							<label>毒性说明<span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_side_effect" rows="3" class="span12"><{$product.product_side_effect}></textarea>
							<label>状态 </label>
							<label class="radio inline">
								<input type="radio" name="online" value="online">立即上架
							</label>
							<label class="radio inline">
								<input type="radio" name="online" value="underline">下架
							</label>
							<label>上架时间 </label>
							<span class="input uneditable-input span12"><{$product.added_time}></span>
							<input type="hidden" name="online_o" value="<{$product.online}>" />
						</div>
					</div>
					<{if $a!='view'}>
					<div class="btn-toolbar">
						<input type="hidden" name="product_id" value="<{$product.id}>" />
						<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
					</div>
					<{/if}>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	var a = '<{$a}>';
	$(document).ready(function() {
		if(a=='view'){
			$(':input').attr('readonly','true');
			$('.btn-toolbar').hide();
		}
		$('textarea').autosize();

		$("input:radio[name='online'][value='<{$product.online}>']").attr('checked',true);
		$("input:radio[name='product_type'][value='<{$product.product_type}>']").attr('checked',true);
		//
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