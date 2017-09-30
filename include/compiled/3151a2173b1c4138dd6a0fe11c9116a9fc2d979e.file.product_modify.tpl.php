<?php /* Smarty version Smarty-3.1.15, created on 2017-09-20 22:51:56
         compiled from "D:\Server\www\crms\include\template\crms\product_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1991559c2808ce7bf68-61817598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3151a2173b1c4138dd6a0fe11c9116a9fc2d979e' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\product_modify.tpl',
      1 => 1408340449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1991559c2808ce7bf68-61817598',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'p' => 0,
    'product' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59c2808cef5be8_15665000',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c2808cef5be8_15665000')) {function content_59c2808cef5be8_15665000($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<style type="text/css">
	#ht{line-height:20px;font-size: 3em;font-weight: bolder;margin-top:5px; }
	.product-form label{font-weight: bold;margin-top: 10px;}
	blockquote p a{font-size: 12px;font-weight: normal;color:gray;margin-left: 10px;}
	<?php if ($_smarty_tpl->tpl_vars['p']->value) {?>
  	  /* 隐藏头,右侧,内容头部 */
	  body{background: none;}
	  .sidebar-nav { display:none; }
	  .sidebar-nav{width:0;}
	  .content{margin-left: 0;}
	<?php }?>
</style>
<div class="well">
	<ul class="nav nav-tabs">
		<small class="pull-right"><h2 id="ht"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</h2></small>
		<li class="active"><a href="#home" data-toggle="tab">编辑/查看产品信息</a></li>
	</ul>	

	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active in" id="home">
			<form id="tab" method="post" action="" class="product-form">
				<div class="row-fluid">
					<div class="span6">
						<label>产品名称</label>
						<input type="text" name="product_name" class="span12" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
" autofocus="true" required="true" />
						<label>产品代码</label>
						<input type="text" name="product_code" class="span12" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_code'];?>
" />
						<label>单价(元)</label>
						<input type="text" name="product_price" class="span12" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_price'];?>
" />
						
						<label>常见规格</label>
						<input type="text" name="product_spec" class="span12" required="true" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_spec'];?>
" />
						<label>单位</label>
						<input type="text" name="unit" class="span12" required="true" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['unit'];?>
" />
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
						<input type="text" name="usage" class="span12" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['usage'];?>
" />
						<label>最佳服用时间</label>
						<input type="text" name="product_use_time" class="span12" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_use_time'];?>
" />
						<label>推荐品牌</label>
						<input type="text" name="brand" class="span12" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['brand'];?>
" />
						<label>原产地</label>
						<input type="text" name="place_origin" class="span12" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['place_origin'];?>
" />
						<label>优势 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="superiority" class="span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['superiority'];?>
</textarea>
					</div>
				</div>
				<blockquote>
					<p>详细信息<a href="#product-details" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
				</blockquote>
				<div id="product-details" class="collapse in">
					<div class="row-fluid">
						<div class="span6">
							<label>功能 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_effect" rows="3" class="span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_effect'];?>
</textarea>
							<label>症状  <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_symptom" rows="3" class="span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_symptom'];?>
</textarea>
							<label>帮助吸收的物质 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="help_factor" rows="3" class="span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['help_factor'];?>
</textarea>
							<label>抑制吸收的物质<span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="inhibiting_factor" rows="3" class="span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['inhibiting_factor'];?>
</textarea>
						</div>
						<div class="span6">
							<label>最佳食物来源 <span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="food_sources" rows="3" class="span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['food_sources'];?>
</textarea>
							<label>毒性说明<span class="label label-info"> 不支持HTML代码</span></label>
							<textarea name="product_side_effect" rows="3" class="span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_side_effect'];?>
</textarea>
							<label>状态 </label>
							<label class="radio inline">
								<input type="radio" name="online" value="online">立即上架
							</label>
							<label class="radio inline">
								<input type="radio" name="online" value="underline">下架
							</label>
							<label>上架时间 </label>
							<span class="input uneditable-input span12"><?php echo $_smarty_tpl->tpl_vars['product']->value['added_time'];?>
</span>
							<input type="hidden" name="online_o" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['online'];?>
" />
						</div>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['a']->value!='view') {?>
					<div class="btn-toolbar">
						<input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" />
						<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
					</div>
					<?php }?>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	var a = '<?php echo $_smarty_tpl->tpl_vars['a']->value;?>
';
	$(document).ready(function() {
		if(a=='view'){
			$(':input').attr('readonly','true');
			$('.btn-toolbar').hide();
		}
		$('textarea').autosize();

		$("input:radio[name='online'][value='<?php echo $_smarty_tpl->tpl_vars['product']->value['online'];?>
']").attr('checked',true);
		$("input:radio[name='product_type'][value='<?php echo $_smarty_tpl->tpl_vars['product']->value['product_type'];?>
']").attr('checked',true);
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
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
