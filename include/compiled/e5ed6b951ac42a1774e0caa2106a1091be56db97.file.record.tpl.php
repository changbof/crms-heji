<?php /* Smarty version Smarty-3.1.15, created on 2014-09-25 01:41:35
         compiled from "D:\Server\www\crms\include\template\cdr\record.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1175054032848c0faf9-64675758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5ed6b951ac42a1774e0caa2106a1091be56db97' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\cdr\\record.tpl',
      1 => 1410195095,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1175054032848c0faf9-64675758',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54032848cfaa84_59586274',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'sdate' => 0,
    'edate' => 0,
    'myRecords' => 0,
    'start' => 0,
    'user_info' => 0,
    'myRecord' => 0,
    'page_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54032848cfaa84_59586274')) {function content_54032848cfaa84_59586274($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="cdr-record-form">
		<div style="float:left;margin-right:5px">
			<label>呼叫方向</label>
			<select class="input-small" name="dcontext">
				<option value="">请选择</option>
				<option value="from-internal" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['dcontext']=='from-internal') {?>selected="selected"<?php }?>>呼出</option>
				<option value="ext-queues" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['dcontext']=='ext-queues') {?>selected="selected"<?php }?>>呼入</option>
			</select>
		</div>
		<div style="float:left;margin-right:5px">
			<label>电话号码</label>
			<input type="text" name="keyword" id="keyword" class="input-medium" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['keyword'];?>
" />
		</div>
		<div style="float:left;margin-right:5px">
			<label>通话时间: 从</label>
			<div class="input-append datetimepicker">
				<input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="sdate" value="<?php echo $_smarty_tpl->tpl_vars['sdate']->value;?>
" class="input-medium"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div style="float:left;margin-right:5px">
			<label>到</label>
			<div class="input-append datetimepicker">
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
		<table class="table able-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>主叫号码</th>
					<th>被叫号码</th>
					<th>通话时间</th>
					<th>通话时长</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>							  
			<?php  $_smarty_tpl->tpl_vars['myRecord'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['myRecord']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myRecords']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myRecord2']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['myRecord']->key => $_smarty_tpl->tpl_vars['myRecord']->value) {
$_smarty_tpl->tpl_vars['myRecord']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myRecord2']['index']++;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['start']->value+1+$_smarty_tpl->getVariable('smarty')->value['foreach']['myRecord2']['index'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==1) {?><?php echo $_smarty_tpl->tpl_vars['myRecord']->value['src'];?>
<?php } else { ?><?php if (mb_strlen($_smarty_tpl->tpl_vars['myRecord']->value['src'])<5) {?><?php echo $_smarty_tpl->tpl_vars['myRecord']->value['src'];?>
<?php } else { ?><?php echo substr_replace($_smarty_tpl->tpl_vars['myRecord']->value['src'],'****','3','-1');?>
<?php }?><?php }?></td>
					<td><?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==1) {?><?php echo $_smarty_tpl->tpl_vars['myRecord']->value['src'];?>
<?php } else { ?><?php if (mb_strlen($_smarty_tpl->tpl_vars['myRecord']->value['dst'])<5) {?><?php echo $_smarty_tpl->tpl_vars['myRecord']->value['dst'];?>
<?php } else { ?><?php echo substr_replace($_smarty_tpl->tpl_vars['myRecord']->value['dst'],'****','3','-1');?>
<?php }?><?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['myRecord']->value['calldate'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['myRecord']->value['duration'];?>
</td>
					<td><a href="http://<?php echo @constant('CALLCENTER_IP');?>
/records/<?php echo $_smarty_tpl->tpl_vars['myRecord']->value['audio'];?>
" target="_blank" title="播放"><i class="icon-play"></i> </a>
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
	$(document).ready(function(){
		$('#cdr-record-form .datetimepicker').datetimepicker({
	        language: 'zh-CN',
			pickTime: true
	    });
	});
</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
