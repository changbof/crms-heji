<?php /* Smarty version Smarty-3.1.15, created on 2014-09-25 01:36:23
         compiled from "D:\Server\www\crms\include\template\cdr\misslist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178765403294d4b5542-53218227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '650cc203e1ddf89ecafa5524cced546e63a64e2f' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\cdr\\misslist.tpl',
      1 => 1411578900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178765403294d4b5542-53218227',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5403294d556d77_56846163',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'sdate' => 0,
    'edate' => 0,
    'myMisses' => 0,
    'start' => 0,
    'myMiss' => 0,
    'user_info' => 0,
    'page_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5403294d556d77_56846163')) {function content_5403294d556d77_56846163($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="cdr-misslist-form">
        <div style="float:left;margin-right:5px;padding-top:25px;padding-bottom:0px;margin-bottom:0px">
            <label class="radio inline">
                <input type="radio" name="type" value="missed" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['type']=='missed') {?>checked="true"<?php }?>> 未接通
            </label>
            <label class="radio inline">
                <input type="radio" name="type" value="answer" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['type']=='answer') {?>checked="true"<?php }?>> 已接通
            </label>
        </div>
		<div style="float:left;margin-right:5px">
			<label>电话号码</label>
			<input type="text" name="keyword" id="keyword" class="input-medium" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['keyword'];?>
" />
		</div>
		<div style="float:left;margin-right:5px">
			<label>通话时间: 从</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="sdate" value="<?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
" class="input-medium"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div style="float:left;margin-right:5px">
			<label>到</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="edate" value="<?php echo $_smarty_tpl->tpl_vars['edate']->value;?>
" class="input-medium"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
        <div style="float:left;margin-right:5px;padding-top:25px;padding-bottom:0px;margin-bottom:0px">
            <label class="checkbox inline"><input name="duration" type="checkbox" value="90" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['duration']==90) {?> checked="checked"<?php }?> />通话时长大于90秒?</label>
        </div>
		<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
			<button type="submit" class="btn btn-primary">检索</button>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>

<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">功能列表</a>
	<div id="page-stats" class="block-body collapse in">

		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>通话时间</th>
					<th>主叫号码</th>
					<th>被叫号码/分机</th>
					<th>通话时长</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>							  
				<?php  $_smarty_tpl->tpl_vars['myMiss'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['myMiss']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myMisses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myMiss']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['myMiss']->key => $_smarty_tpl->tpl_vars['myMiss']->value) {
$_smarty_tpl->tpl_vars['myMiss']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myMiss']['index']++;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['start']->value+1+$_smarty_tpl->getVariable('smarty')->value['foreach']['myMiss']['index'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['myMiss']->value['calldate'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==1) {?><?php echo $_smarty_tpl->tpl_vars['myMiss']->value['src'];?>
<?php } else { ?><?php if (mb_strlen($_smarty_tpl->tpl_vars['myMiss']->value['src'])<5) {?><?php echo $_smarty_tpl->tpl_vars['myMiss']->value['src'];?>
<?php } else { ?><?php echo substr_replace($_smarty_tpl->tpl_vars['myMiss']->value['src'],'****','3','-1');?>
<?php }?><?php }?></td>
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']!=1) {?><?php echo $_smarty_tpl->tpl_vars['myMiss']->value['dst'];?>
<?php } else { ?><?php if (mb_strlen($_smarty_tpl->tpl_vars['myMiss']->value['dst'])<5) {?><?php echo $_smarty_tpl->tpl_vars['myMiss']->value['dst'];?>
<?php } else { ?><?php echo substr_replace($_smarty_tpl->tpl_vars['myMiss']->value['dst'],'****','3','-1');?>
<?php }?><?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['myMiss']->value['duration'];?>
</td>
					<td><a href="#" onclick="autoDial('<?php echo $_smarty_tpl->tpl_vars['myMiss']->value['src'];?>
');return false;" title="回拨"><i class="icon-share-alt"></i> </a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table> 
		<!-- START 分页模板 -->
		<?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

		<!-- END 分页-->			   
	</div>
</div>
<script type="text/javascript">
	$('.datetimepicker').datetimepicker({
		language: 'zh-CN'
	});
</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
