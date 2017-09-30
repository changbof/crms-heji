<?php /* Smarty version Smarty-3.1.15, created on 2016-03-23 21:21:16
         compiled from "D:\Server\www\crms\include\template\crms\products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1686056f2984cd16373-19218038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a1c87c547d089cde474a23010966a0918d423e4' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\products.tpl',
      1 => 1408338392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1686056f2984cd16373-19218038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'products' => 0,
    'product' => 0,
    'user_info' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56f2984ce38f83_53591026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f2984ce38f83_53591026')) {function content_56f2984ce38f83_53591026($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="product-form">
		<div style="float:left;margin-right:5px">
			<input type="text" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['keyword'];?>
" class="input-medium"></input>
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
			<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?> 
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['product']->value['product_code'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['product']->value['product_spec'];?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['unit'];?>
</td>
					<!--td><?php echo $_smarty_tpl->tpl_vars['product']->value['place_origin'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['product']->value['superiority'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['product']->value['usage'];?>
</td-->
					<td><?php echo $_smarty_tpl->tpl_vars['product']->value['product_price'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['product']->value['product_type']=='suite') {?>套餐<?php } else { ?>营养素<?php }?></td>
					<td><?php if ($_smarty_tpl->tpl_vars['product']->value['online']=="online") {?>上线<?php } else { ?>下线<?php }?></td>
					<td>
					<a href="product_modify.php?a=view&p=_blk&product_id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" target="_blank" title= "查看" ><i class="icon-eye-open"></i></a>&nbsp;&nbsp;
					<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==1) {?>
						<a href="product_modify.php?p=_blk&product_id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" target="_blank" title= "修改" ><i class="icon-pencil"></i></a>&nbsp;&nbsp;
						<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="products.php?method=del&product_id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
#myModal" data-toggle="modal" ></i></a>
					<?php }?>
					</td>
				</tr>
			<?php } ?>
		  </tbody>
		</table>
			<!-- START 分页模板 -->
				<?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

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
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>

	
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
