<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
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
            <option value="create_date" <{if $_GET.select_dt=='create_date'}>selected="selected"<{/if}>>创建时间</option>
            <option value="assign_date" <{if $_GET.select_dt=='assign_date'}>selected="selected"<{/if}>>分配时间</option>
            <option value="update_date" <{if $_GET.select_dt=='update_date'}>selected="selected"<{/if}>>更新时间</option>
            <option value="return_date" <{if $_GET.select_dt=='return_date'}>selected="selected"<{/if}>>回归时间</option>
        </select>
    </div>
	<div style="float:left;margin-right:5px">
		<label>从</label>
		<div class="input-append datetimepicker" >
		    <input data-format="yyyy-MM-dd" type="text" name="sdate" id="sdate" value="<{$_GET.sdate}>" class="input-small"></input>
		    <span class="add-on">
		    	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
		    </span>
		</div>
	</div>
	<div style="float:left;margin-right:5px">
		<label>到</label>
		<div class="input-append datetimepicker" >
		    <input data-format="yyyy-MM-dd" type="text" name="edate" id="edate" value="<{$_GET.edate}>" class="input-small"></input>
		    <span class="add-on">
		    	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
		    </span>
		</div>
		<input type="hidden" name="search" value="1" > 
	</div>
	<div style="float:left;margin-right:5px">
		<label>客户阶段</label>
		<{html_options name=type id="DropDownTimezone" class="input-small" options=$type_options_list selected=$_GET.type}>
	</div>
	<div style="float:left;margin-right:5px">
		<label>状态</label>
		<{html_options name=status id="DropDownTimezone" class="input-small" options=$status_options_list selected=$_GET.status}>
	</div>
	<{if $current_user_info.user_group != 4}>
   <div style="float:left;margin-right:5px">
        <label>责任人</label>
        <{html_options name="vested" id="DropDownVested" class="input-small" options=$saler_options_list selected=$_GET.vested}>
    </div>
    <{/if}>
    <div style="float:left;margin-right:5px">
        <label>关键字</label>
        <input type="text" name="name" class="input-small" value="<{$_GET.name}>" title="关键字检索支持：客户姓名、联系电话、病症等" />
    </div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
        <span class="pull-right">
            <label>每页显示
            <select name="page_size" class="input-mini" onchange="$('#customer-form').submit();">
                <option value="50" <{if $_GET.page_size=='50'}>selected="selected"<{/if}>>50</option>
                <option value="200" <{if $_GET.page_size=='200'}>selected="selected"<{/if}>>200</option>
                <option value="500" <{if $_GET.page_size=='500'}>selected="selected"<{/if}>>500</option>
                <option value="1000" <{if $_GET.page_size=='1000'}>selected="selected"<{/if}>>1000</option>
            </select>条</label>
        </span>
	</div>
	<div style="clear:both;"></div>
</form>
</div>
<div class="block">
	<form id="caction-form" method="post" action="">
	<input type="hidden" name="method" id="method" value="" />
    <div class="block-heading">&nbsp;&nbsp;客户列表&nbsp;&nbsp;<{$test}>
		<span class="pull-right">
    	<{if $current_user_info.user_group == 1}>
	    	<span class="btn-group">
				<{html_options name="saler" id="DropDownSaler" class="selectpicker" data-size="10" data-action="assign" options=$saler_options_list selected=''}>
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
		<{else if $current_user_info.user_group == 4}>
			<small class="btn" id="customers_add"><i class="icon-plus-sign"></i> 新增</small>
		<{/if}>
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
            <{foreach name=customer from=$customers item=customer}>				 
				<tr>
					<td><input type="checkbox" name="customer_ids[]" value="<{$customer.id}>" ></td>
					<td><{$customer.name}></td>
					<!--td><{$customer.sex}></td>
					<td><{$customer.age}></td>
					<td><{$customer.mobile|substr_replace:'****':'-5':'4'}></td>
					<td><{$customer.telphone|substr_replace:'****':'-5':'4'}></td-->
                    <td><{$customer.address}></td>
					<td><{$customer.health_diagnosis}></td>
					<td><{if $customer.type!=''}><{$type_options_list[$customer.type]}><{/if}></td>
                    <td><{$status_options_list[$customer.status]}></td>
					<td><{if $customer.vested!=''}><{$saler_options_list[$customer.vested]}><{/if}></td>
                    <td><{if $customer.vested!=''}>
                        <small class="view-sale" rel="popover" data-uid="<{$customer.vested}>" data-cid="<{$customer.id}>" data-title="沟通信息" data-placement="left">沟通信息</small>
                        <small class="view-duration" rel="popover" data-ext="<{$customer.ext}>" data-cno="<{$customer.mobile}>" data-title="通话时长" data-placement="left">| 通话时长</small>
                        <{/if }>
                    </td>
					<td>
						<a href="customer_modify.php?p=_blk&customerId=<{$customer.id}>" target="_blank" title= "查看客户信息" ><i class="icon-eye-open"></i></a>
					</td>
				</tr>
			<{/foreach}>
          </tbody>
        </table>
		<!-- START 分页模板 -->
    	<{$page_html}>	
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
                    url: '<{$smarty.const.ADMIN_URL}>/ajax/crms.php',
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
                    url: '<{$smarty.const.ADMIN_URL}>/ajax/crms.php',
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
<{$osadmin_action_confirm}>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>
