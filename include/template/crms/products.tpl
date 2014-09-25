<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="product-form">
		<div style="float:left;margin-right:5px">
			<input type="text" name="keyword" value="<{$_GET.keyword}>" class="input-medium"></input>
		</div>
		<div class="btn-toolbar" style="padding-bottom:0px;margin-bottom:0px">
			<button type="submit" class="btn btn-primary">检索</button>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>
<div class="block">
	<a href="#" class="block-heading"> 产品列表
		<div class="pull-right">
	    	<div class="btn-group">
	    		<small class="btn" id="product_add"><i class="icon-plus"></i> 产品</small>
				<small class="btn" id="products_import"><i class="icon-random"></i> 导入</small>
			</div>
		</div>
	</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>产品名称</th>
				<th>产品代码</th>
				<th>规格/单位</th>
				<!--th>出产地</th>
				<th>优势</th>
				<th>使用方法</th-->
				<th>单价(元)</th>
				<th>类型</th>
				<th>状态</th>
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<{foreach name=product from=$products item=product}> 
				<tr>
					<td><{$product.id}></td>
					<td><{$product.product_name}></td>
					<td><{$product.product_code}></td>
					<td><{$product.product_spec}>/<{$product.unit}></td>
					<!--td><{$product.place_origin}></td>
					<td><{$product.superiority}></td>
					<td><{$product.usage}></td-->
					<td><{$product.product_price}></td>
					<td><{if $product.product_type=='suite'}>套餐<{else}>营养素<{/if}></td>
					<td><{if $product.online == "online"}>上线<{else}>下线<{/if}></td>
					<td>
					<a href="product_modify.php?a=view&p=_blk&product_id=<{$product.id}>" target="_blank" title= "查看" ><i class="icon-eye-open"></i></a>&nbsp;&nbsp;
					<{if $user_info.user_group == 1 }>
						<a href="product_modify.php?p=_blk&product_id=<{$product.id}>" target="_blank" title= "修改" ><i class="icon-pencil"></i></a>&nbsp;&nbsp;
						<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="products.php?method=del&product_id=<{$product.id}>#myModal" data-toggle="modal" ></i></a>
					<{/if}>
					</td>
				</tr>
			<{/foreach}>
		  </tbody>
		</table>
			<!-- START 分页模板 -->
				<{$page_html}>
			<!-- END -->
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		//新增
		$('#product_add').on('click',function(){
			window.location.href="product_add.php";
		})
		//导入
		$('#products_import').on('click',function(){
			window.location.href='product_import.php';
		});
	});

</script>
<!-- 操作的确认层，相当于javascript:confirm函数 -->
<{$osadmin_action_confirm}>
	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>