<?php /* Smarty version Smarty-3.1.15, created on 2015-05-22 00:14:47
         compiled from "D:\Server\www\crms\include\template\crms\customers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25224555e0477f1bed6-77764356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '539fcd4e19ec4b34984567af3b5c026fcd6d7b21' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\customers.tpl',
      1 => 1417624164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25224555e0477f1bed6-77764356',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'type_options_list' => 0,
    'status_options_list' => 0,
    'current_user_info' => 0,
    'saler_options_list' => 0,
    'test' => 0,
    'customers' => 0,
    'customer' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_555e047811dee6_51924260',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e047811dee6_51924260')) {function content_555e047811dee6_51924260($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<style type="text/css">
	small.btn{vertical-align:baseline;}
    .popover{
        width:500px;
        min-height:100px;
    }
    #sale-logs ul li{
        list-style: none;
        margin-left:0;
        padding-left:0;
    }
    #sale-logs li span.stream-time{
        display:inline-block;
        color: darkgreen;
        margin-right:15px;
        width:180px;
    }
    #sale-logs li span.stream-text{
        display:inline-block;
        width:250px;
    }
</style>
<div id='loading'>正在处理中...</div>
<div class="">
<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="customer-form">
    <div style="float:left;padding-top:25px;">
        <select name="select_dt" class="input-small">
            <option value="create_date" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['select_dt']=='create_date') {?>selected="selected"<?php }?>>创建时间</option>
            <option value="assign_date" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['select_dt']=='assign_date') {?>selected="selected"<?php }?>>分配时间</option>
            <option value="update_date" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['select_dt']=='update_date') {?>selected="selected"<?php }?>>更新时间</option>
            <option value="return_date" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['select_dt']=='return_date') {?>selected="selected"<?php }?>>回归时间</option>
        </select>
    </div>
	<div style="float:left;margin-right:5px">
		<label>从</label>
		<div class="input-append datetimepicker" >
		    <input data-format="yyyy-MM-dd" type="text" name="sdate" id="sdate" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['sdate'];?>
" class="input-small"></input>
		    <span class="add-on">
		    	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
		    </span>
		</div>
	</div>
	<div style="float:left;margin-right:5px">
		<label>到</label>
		<div class="input-append datetimepicker" >
		    <input data-format="yyyy-MM-dd" type="text" name="edate" id="edate" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['edate'];?>
" class="input-small"></input>
		    <span class="add-on">
		    	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
		    </span>
		</div>
		<input type="hidden" name="search" value="1" > 
	</div>
	<div style="float:left;margin-right:5px">
		<label>客户阶段</label>
		<?php echo smarty_function_html_options(array('name'=>'type','id'=>"DropDownTimezone",'class'=>"input-small",'options'=>$_smarty_tpl->tpl_vars['type_options_list']->value,'selected'=>$_smarty_tpl->tpl_vars['_GET']->value['type']),$_smarty_tpl);?>

	</div>
	<div style="float:left;margin-right:5px">
		<label>状态</label>
		<?php echo smarty_function_html_options(array('name'=>'status','id'=>"DropDownTimezone",'class'=>"input-small",'options'=>$_smarty_tpl->tpl_vars['status_options_list']->value,'selected'=>$_smarty_tpl->tpl_vars['_GET']->value['status']),$_smarty_tpl);?>

	</div>
	<?php if ($_smarty_tpl->tpl_vars['current_user_info']->value['user_group']!=4) {?>
   <div style="float:left;margin-right:5px">
        <label>责任人</label>
        <?php echo smarty_function_html_options(array('name'=>"vested",'id'=>"DropDownVested",'class'=>"input-small",'options'=>$_smarty_tpl->tpl_vars['saler_options_list']->value,'selected'=>$_smarty_tpl->tpl_vars['_GET']->value['vested']),$_smarty_tpl);?>

    </div>
    <?php }?>
    <div style="float:left;margin-right:5px">
        <label>关键字</label>
        <input type="text" name="name" class="input-small" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['name'];?>
" title="关键字检索支持：客户姓名、联系电话、病症等" />
    </div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
        <span class="pull-right">
            <label>每页显示
            <select name="page_size" class="input-mini" onchange="$('#customer-form').submit();">
                <option value="50" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['page_size']=='50') {?>selected="selected"<?php }?>>50</option>
                <option value="200" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['page_size']=='200') {?>selected="selected"<?php }?>>200</option>
                <option value="500" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['page_size']=='500') {?>selected="selected"<?php }?>>500</option>
                <option value="1000" <?php if ($_smarty_tpl->tpl_vars['_GET']->value['page_size']=='1000') {?>selected="selected"<?php }?>>1000</option>
            </select>条</label>
        </span>
	</div>
	<div style="clear:both;"></div>
</form>
</div>
<div class="block">
	<form id="caction-form" method="post" action="">
	<input type="hidden" name="method" id="method" value="" />
    <div class="block-heading">&nbsp;&nbsp;客户列表&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['test']->value;?>

		<span class="pull-right">
    	<?php if ($_smarty_tpl->tpl_vars['current_user_info']->value['user_group']==1) {?>
	    	<span class="btn-group">
				<?php echo smarty_function_html_options(array('name'=>"saler",'id'=>"DropDownSaler",'class'=>"selectpicker",'data-size'=>"10",'data-action'=>"assign",'options'=>$_smarty_tpl->tpl_vars['saler_options_list']->value,'selected'=>''),$_smarty_tpl);?>

				<small class="btn btn-tool" data-action="autoassign" id="customers_autoassign"><i class="icon-magnet"></i> 自动分配</small>
	    	</span>
	    	<span class="btn-group">
				<small class="btn" id="customers_import"><i class="icon-random"></i> 导入</small>
				<small class="btn" id="customers_export"><i class="icon-share"></i> 导出</small>
			</span>
			<span class="btn-group">
				<small class="btn" id="customers_add"><i class="icon-plus-sign"></i> 新增</small>
				<small class="btn btn-tool" data-action="remove" id="customers_remove" data-target="#myModal" data-toggle="modal"><i class="icon-trash"></i> 删除</small>
			</span>
		<?php } elseif ($_smarty_tpl->tpl_vars['current_user_info']->value['user_group']==4) {?>
			<small class="btn" id="customers_add"><i class="icon-plus-sign"></i> 新增</small>
		<?php }?>
		</span>
	</div>
    <div id="page-customers" class="block-body">
        <table class="table table-striped table-condensed table-hover" id="tb_customers">
          <thead>
            <tr>
            	<th><input type="checkbox" id="checkAll" ></th>
				<th>姓名</th>
				<!--th>性别</th>
				<th>年龄</th>
				<th>手机号码</th>
				<th>电话</th -->
                <th>地址</th>
				<th>病症</th>
				<th>客户阶段</th>
                <th>客户状态</th>
				<th>责任人</th>
                <th>查看</th>
				<th>操作</th>
            </tr>
          </thead>
          <tbody>							  
            <?php  $_smarty_tpl->tpl_vars['customer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customer']->key => $_smarty_tpl->tpl_vars['customer']->value) {
$_smarty_tpl->tpl_vars['customer']->_loop = true;
?>				 
				<tr>
					<td><input type="checkbox" name="customer_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
" ></td>
					<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</td>
					<!--td><?php echo $_smarty_tpl->tpl_vars['customer']->value['sex'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['age'];?>
</td>
					<td><?php echo substr_replace($_smarty_tpl->tpl_vars['customer']->value['mobile'],'****','-5','4');?>
</td>
					<td><?php echo substr_replace($_smarty_tpl->tpl_vars['customer']->value['telphone'],'****','-5','4');?>
</td-->
                    <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['address'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['customer']->value['health_diagnosis'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['customer']->value['type']!='') {?><?php echo $_smarty_tpl->tpl_vars['type_options_list']->value[$_smarty_tpl->tpl_vars['customer']->value['type']];?>
<?php }?></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['status_options_list']->value[$_smarty_tpl->tpl_vars['customer']->value['status']];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['customer']->value['vested']!='') {?><?php echo $_smarty_tpl->tpl_vars['saler_options_list']->value[$_smarty_tpl->tpl_vars['customer']->value['vested']];?>
<?php }?></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['customer']->value['vested']!='') {?>
                        <small class="view-sale" rel="popover" data-uid="<?php echo $_smarty_tpl->tpl_vars['customer']->value['vested'];?>
" data-cid="<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
" data-title="沟通信息" data-placement="left">沟通信息</small>
                        <small class="view-duration" rel="popover" data-ext="<?php echo $_smarty_tpl->tpl_vars['customer']->value['ext'];?>
" data-cno="<?php echo $_smarty_tpl->tpl_vars['customer']->value['mobile'];?>
" data-title="通话时长" data-placement="left">| 通话时长</small>
                        <?php }?>
                    </td>
					<td>
						<a href="customer_modify.php?p=_blk&customerId=<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
" target="_blank" title= "查看客户信息" ><i class="icon-eye-open"></i></a>
					</td>
				</tr>
			<?php } ?>
          </tbody>
        </table>
		<!-- START 分页模板 -->
    	<?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>
	
	   	<!-- END -->
    </div>
	</form>
</div>
<script type="text/javascript">
    var url = '/ajax/exportCsv.php?t=customer&n='+Math.random();
    var getSaleLogs = function(data) {
        //alert(data);
        var str_html = '<div id="sale-logs"><ul>';
        jQuery.each( data, function( i, json ) {
            str_html += '<li><span class="stream-time">'+json['sale_date']+'</span>';
            str_html += '<span class="stream-text">'+json['sale_content']+'</span></li>';
        });
        str_html += '</ul></div>';
        return str_html;
    };

	$(document).ready(function() {
		$('.selectpicker').selectpicker();
		$('.datetimepicker').datetimepicker({
	        language: 'zh-CN',
	        pickTime: false
	    });

        //获取通话时长
        $(".view-duration").on('click',function() {
            var $this = $(this);
            $this.popover({content:'正在努力加载中...'}).popover('show');
            if($(this).attr('data-show')!=1) {
                var _ext = $(this).attr('data-ext');
                var _cno = $(this).attr('data-cno');
                var _sdate = $('#sdate').val();
                var _edate = $('#edate').val();
                jQuery.ajax({
                    type: 'get',
                    url: '<?php echo @constant('ADMIN_URL');?>
/ajax/crms.php',
                    data: 'method=ajax_sumDuration&ext=' + _ext + '&cno=' + _cno + '&sdate=' + _sdate + '&edate=' + _edate,
                    dataType: 'json',
                    success: function (data) {
                        if (data['result'] == 1) {
                            $this.attr('data-show', '1');
                            if($this.data('popover')!=null){
                                $this.popover('hide');
                                $this.removeData('popover');
                            }
                            $this.attr('data-content', data['duration']);
                            $this.popover('show');
                        } else {
                            $this.attr('data-show', '0');
                            $this.attr('data-content', '还没有通话记录哦!');
                            $this.popover('show');
                        }

                        setTimeout(function() {$this.popover('hide');}, 3000);
                    }
                });
            }else{
                $this.popover('show');
            }
        });

        //获取沟通信息
        $(".view-sale").on('click',function() {
            var $this = $(this);
            if($(this).attr('data-show')!=1) {
                $this.popover({content:'正在努力加载中...'}).popover('show');
                var _vested = $(this).attr('data-uid');
                var _customerid = $(this).attr('data-cid');
                var _sdate = $('#sdate').val();
                var _edate = $('#edate').val();
                jQuery.ajax({
                    type: 'get',
                    url: '<?php echo @constant('ADMIN_URL');?>
/ajax/crms.php',
                    data: 'method=ajax_getSaleLog&vested=' + _vested + '&customerId=' + _customerid + '&sdate=' + _sdate + '&edate=' + _edate,
                    dataType: 'json',
                    success: function (data) {
                        if (data['result'] == 1) {
                            $this.attr('data-show', '1');
                            if($this.data('popover')!=null){
                                $this.popover('hide');
                                $this.removeData('popover');
                            }
                            $this.attr('data-content', getSaleLogs(data['data']));
                            $this.popover('show');
                        } else {
                            $this.attr('data-show', '0');
                            $this.attr('data-content', '还没有沟通记录哦!');
                            $this.popover('show');
                        }
                    }
                });
            }else{
                $this.popover('show');
            }
            setTimeout(function() {$this.popover('hide');}, 3000);
        });

		//"全选"
		$("#checkAll").click(function(){
		     if($(this).attr("checked")){
				$("input[name='customer_ids[]']").attr("checked",$(this).attr("checked"));
			 }else{
				$("input[name='customer_ids[]']").attr("checked",false);
			 }
		});
		//选中事件
		/*
        $('#tb_customers tbody input:checkbox').on('click',function(){
            if($(this).attr("checked")=="checked"){
                var vested = $(this).closest("tr").find("td:eq(5)").text();
                if(vested!=''){
                    $('.selectpicker').selectpicker('hide');
                }
            }else{
                $('.selectpicker').selectpicker('show');
            }
        });*/
		//导入
		$('#customers_import').on('click',function(){
			window.location.href='customers_import.php';
		});
		//导出
		$('#customers_export').on('click',function(){
			var url = '/ajax/exportCsv.php?n='+Math.random();
			var $form = $('#customer-form');
			var formData = $form.serialize();
			$(this).attr("href", url+'&'+formData);
		});
		//新增
		$('#customers_add').on('click',function(){
			window.location.href='customer_add.php';
		});
		//分配给
		$('#DropDownSaler').on("change",function(){
			var action = $(this).attr('data-action');
			bootbox.confirm('您正在将选中的客户(请确认选定的客户是否已有责任顾问.)分配给指定的销售代表['+$(this).find("option:selected").text()+'],您确定这样做吗?',function(result){
				if(result){
					$('#method').val( action );
					$('#caction-form').submit();
				}
			})
		});
		//自动随机分配/删除
		$('.btn-tool').on("click",function(){
			$('#loading').show();
			var action = $(this).attr('data-action');
			if(action == 'autoassign'){
				bootbox.confirm('您正在操作客户"自动分配"功能,此功能将会把所有"公海"状态的客户随机分配给前端电话销售代表,您确定这样做吗?',function(result){
					if(result){
						$('#method').val( action );
						$('#caction-form').submit();
					}
				});			
			}else{
				$('#method').val( action );
				$('#caction-form').submit();
			}
		})
	});
</script>

<!--操作的确认层，相当于javascript:confirm函数-->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>


<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
