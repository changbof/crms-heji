<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- TPLSTART 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<style type="text/css">
	.btn-group small.btn{padding:4px 6px;}
    .popover{
        z-index:1060;
        width:500px;
        min-height:300px;
        overflow:auto;
    }
</style>
<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="myorders-form">
		<div style="float:left;margin-right:5px">
			<label>时间: 从</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="sdate" value="<{$_GET.sdate}>" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div style="float:left;margin-right:5px">
			<label>到</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd" type="text" name="edate" value="<{$_GET.edate}>" class="input-small"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
			<input type="hidden" name="search" value="1" > 
		</div>
		<div style="float:left;margin-right:5px">
			<label>状态</label>
			<{html_options name=status class="input-small" options=$ordersstatus_options selected=$_GET.status}>
		</div>
		<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
			<button type="submit" class="btn btn-primary">检索</button>
            <a href="" target="_blank" class="btn" id="orders_hba_export"><i class="icon-share"></i> 导出已审核订单</a>
		</div>
		<div style="clear:both;"></div>
	</form>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">订单</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped table-condensed table-hover">
			<thead>
				<tr>
					<th class="hide">id</th>
                    <th>订购时间</th>
                    <th>姓名</th>
                    <th>金额(元)</th>
					<th>客户方案</th>
					<th>订单状态</th>
                    <th>更新时间</th>
					<{if $user_info.user_group == 5 || $user_info.user_group == 1}>
					<td>病症</td>
					<td>工号</td>
					<{/if}>
					<th width="140px">操作</th>
				</tr>
			</thead>
			<tbody>							  
				<{foreach name=myods from=$myorders item=myods}>
				<tr>
					<td class="hide"><{$myods.id}></td>
                    <td><{$myods.orders_date}></td>
                    <td><a href="customer_modify.php?a=view&p=_blk&ordersId=<{$myods.id}>&customerId=<{$myods.customer_id}>" target="_blank" title="查看客户资料"><{$myods.name}></a></td>
                    <td><{$myods.payment_sum}></td>
					<td><a href="product_modify.php?a=view&p=_blk&product_id=<{$myods.product_id}>" target="_blank" title="查看产品详细介绍"><{$myods.orders_title}></a></td>
					<td><{if !$myods.finished=='' }>已结束<{else}><{$ordersstatus_options[$myods.status]}><{/if}></td>
                    <td><{$myods.update_time}></td>
					<{if $user_info.user_group == 5 || $user_info.user_group == 1}>
					<td><{$myods.health_diagnosis}></td>
					<td title="<{$myods.user_name}>"><{$myods.real_name}></td>
					<{/if}>
					<td>
						<div class="btn-group">
							<small class="btn btn-link oitem-view" data-url="orders_verify.php?a=view&customerId=<{$myods.customer_id}>&ordersId=<{$myods.id}>" title= "查看订单明细"><i class="icon-eye-open"></i></small>
							<{if $myods.finished=='' }>
								<{if $myods.vested == $user_info.user_id}>
									<{if in_array($myods.status,array('determine','unaudited'))}>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "确认客户订单"><i class="icon-pencil"></i></small>
									<{elseif ! in_array($myods.status, $orders_list) }>
									<small class="btn btn-link oitem-cancel" data-url="orders_process.php?a=canceling&ordersId=<{$myods.id}>" title= "取消订单"><i class="icon-remove-sign"></i></small>
									<{/if}>
								<{elseif $user_info.user_group==5 && in_array($myods.status,array('new','renew')) }>
									<small class="btn btn-link oitem-add" data-url="orders_item_add.php?customerId=<{$myods.customer_id}>&ordersId=<{$myods.id}>" title= "组方"><i class="icon-wrench"></i></small>
								<{elseif $user_info.user_group == 6}>
									<{if $myods.status=='verifying'}>
									<small class="btn btn-link oitem-process" data-url="orders_verify.php?ordersId=<{$myods.id}>" title= "审核客户订单"><i class="icon-check"></i></small>
									<{elseif $myods.status=='shipped'}>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "已达当地"><i class="icon-map-marker"></i></small>
									<{elseif $myods.status=='reach'}>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "确认签收"><i class="icon-edit"></i></small>
									<small class="btn btn-link oitem-process2" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "退签确认"><i class="icon-retweet"></i></small>
									<{/if}>
								<{elseif $user_info.user_group==8 && $myods.status=='audited'}>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "确认发货"><i class="icon-plane"></i></small>
								<{elseif $user_info.user_group==7 && $myods.status=='canceling' }>
									<small class="btn btn-link oitem-process" data-url="orders_process.php?ordersId=<{$myods.id}>" title= "取消确认"><i class="icon-warning-sign"></i></small>
								<{/if}>
							<{/if}>
						</div>
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
<!-- 操作的确认层，相当于javascript:confirm函数 -->
<{$osadmin_action_confirm}>
<script type="text/javascript">
	//刷新页面
	function myrefresh(){
		if(!$('#modal-process,#modal-orders-item,#modal-orders-verify').closest('div.bootbox').hasClass('in')){
			window.location.reload(true);
		}else{
			setInterval(function(){myrefresh();},30000);
		}
	}
	//组方
	function openModalforOrdersItem(url){
		var btn = [{"label" : "关闭"}];
		if(url.indexOf('a=view')<0){
			btn = [{
				"label" : "组方完成",
				"class" : "btn-primary",
				"callback": function(ev) {
					var gift = $('#gift').val();
					var formData = "status=determine&ordersId="+$('#ordersId').val()+"&gift="+gift+"&method=ajax_processOrders";
					$.ajax({
						type: 'GET',
						url: $('#orders_item_form').attr('action'),
						data: formData,
						dataType:'json',
						success: function(json, status) {
							if(json.result==1){
								bootbox.alert(json.msg,function(){
									window.location.reload(true);
								});
							}else{
								bootbox.alert(json.msg);
							}

						}
					});
					ev.preventDefault();
				}
			},{"label" : "关闭", "class" : "btn"}]
		}
		jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(rspDate) {
			var bbd=bootbox.dialog(rspDate,	btn, {"classes": "modal-large"});
			bbd.find(".spinner").spinner();
			bbd.find('textarea').autosize();
			bbd.find('.selectpicker').selectpicker();
			//产品change事件
			bbd.find('#product_id').on('change',function(){
				var pName = $(this).find('option:selected').text();
				$('#productName').val(pName);
				var pSpec = $(this).find('option:selected').attr('data-spec');
				$('#item_spec').val(pSpec);
                var pRemark = $(this).find('option:selected').attr('data-remark');
                $('#item_remark').val(pRemark);
			});
			bbd.find('#orders_item_list').on('click', 'tbody tr', function(event) {
			    $(this).addClass('highlight').siblings().removeClass('highlight');
                $this = $(this);
			    $('#method','#orders_item_form').val('ajax_modifyOrdersItem');
			    $('#ordersItemId','#orders_item_form').val($this.find('td:first').text());
			    $('#productName','#orders_item_form').val($this.find('td:eq(1)').text());
			    $('#item_spec','#orders_item_form').val($this.find('td:eq(2)').text());
			    $('#item_num','#orders_item_form').val($this.find('td:eq(3)').text());
			    $('#item_remark','#orders_item_form').val($this.find('td:eq(4)').text());
			    $('#product_id','#orders_item_form').selectpicker('val', $this.find('td:last').text());
			    $('#orders_item_form .btn-primary').html('<i class="icon-edit"></i> 修改');
			});
            bbd.find('#orders_item_list').on('dblclick','tbody tr',function(event){
                $this = $(this);
                if( ! $this.hasClass('highlight') ){
                    bootbox.alert("您没有选中任何营养载素,请确认!");
                    return;
                }
                bootbox.confirm("您确定要删除选中的组方营养素吗?", function(result) {
                    if(result){
                        var ordersItemId = $this.find('td:first').text();
                        var formData = 'method=ajax_deleteOrdersItem&ordersItemId='+ordersItemId ;
                        $.ajax({
                            type: 'post',
                            url: '<{$smarty.const.ADMIN_URL}>/ajax/orders.php',
                            data: formData,
                            dataType:'json',
                            success: function(json, status) {
                                bootbox.alert(json.msg,function(){
                                    if(json.result==1){
                                        //成功则删除选中的行
                                        $this.remove();
                                    }
                                });
                            }
                        });
                    }
                });
            });
            //添加不在产品库的产品
            bbd.find("input.input-block-level.form-control").on('dblclick',function(event){
                var n = 0-getRandom(100);
                var str = "<option value='"+n+"'>"+$(this).val()+"</option>";
                $(str).appendTo($("#product_id"));
                $('.selectpicker','#orders_item_form').selectpicker('val',n);
            });
			//表单提交
			bbd.find('#orders_item_form').on('submit', function(event) {
				var $form = $(this);
				var target = $form.attr('data-target');
				var formData = $form.serialize();
				var formJson = DataDeal.formToJson(formData);
				$.ajax({
					type: $form.attr('method'),
					url : $form.attr('action'),
					data: formData,
					dataType:"json",
					success: function(json, status) {
						bootbox.alert(json.msg,function(){
							if(json.result==1){
								var row = '<tr><td class="hide">'+json.newId+'</td><td>'+formJson['productName']+'</td><td>'+formJson['item_spec']+'</td><td>'+formJson['item_num']+'</td><td>'+formJson['item_remark']+'</td><td class="hide">'+formJson['product_id']+'</td></tr>';
								if(formJson['method'].indexOf('_add')>-1){
									if($('#'+target+' tbody').children().length < 1){
										$('#'+target+' tbody').append(row);
									}else{
										$('#'+target+' tbody tr:first').before(row);
									}
								}else if(formJson['method'].indexOf('_modify')>-1){
									$('#'+target+' tbody tr.highlight').replaceWith(row);
								}
							}
							//成功则将表单清空
							$form[0].reset();
						});
					}
				});		        
				event.preventDefault();
			}).on('reset',function(){
		    	$('#productName','#orders_item_form').val('');
		    	$('#ordersItemId','#orders_item_form').val('');
		    	$('#method','#orders_item_form').val('ajax_addOrdersItem');
		    	$('#product_id','#orders_item_form').selectpicker('val','-1');
		    	$('#orders_item_form .btn-primary').html('<i class="icon-save"></i> 添加');
		    	$('#orders_item_list tbody tr.highlight').removeClass('highlight');
		    });
		}});
	}

    var getWlMidtrace = function(data,nu) {
        var str_html = '<div id="wl-midtrace"><ul>';
        jQuery.each( data, function( i, json ) {
            str_html += '<li><span class="wl-stream-time">'+json['time']+'</span>';
            str_html += '<span class="wl-stream-text">'+json['context']+'</span></li>';
        });
        str_html += '</ul></div>';
        return str_html;
    };

	//跟踪处理订单状态及明细查看
	function openModalforProcess(url,title){
		var header = url.indexOf('_verify')>0?(url.indexOf('a=view')>0?'查看订单: ':'订单审核: '):'订单跟踪处理: ';
		var formId = url.split(".")[0];
		var btn = [{"label" : "关闭","class" : "btn",}];
		if(url.indexOf('a=view')<0){
			btn = [{
				"label" : "确定",
				"class" : "btn-primary",
				"callback": function(ev) {
					var $form = $('#'+formId+'_form');
					$.ajax({
						type: $form.attr('method'),
						url: $form.attr('action'),
						data: $form.serialize(),
						dataType:'json',
						success: function(json, status) {
							if(json.result==1){
								bootbox.alert(json.msg,function(){
									window.location.reload(true);
								});
							}else{
								bootbox.alert(json.msg);
							}
						}
					});
					ev.preventDefault();
				}
			},{"label" : "关闭", "class" : "btn"}]
		}
		jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(rspDate){
			var bbd=bootbox.dialog(rspDate,	btn, {"header":header + title,"classes": "modal-large"});
			bbd.on('hide',function(){
			    $('#example').popover('destroy');
			});
			//订单change事件
			bbd.find('input:radio[name=status]').on('change',function(){
				if( $.inArray( $(this).val(),['canceling','refused']) >=0 ){
					$('#cancelNote').attr("required","true").show();
				}else{
					$('#cancelNote').removeAttr("required").hide();
				}
			});
            bbd.find("#example").on('mouseenter',function(){
                $this = $(this);
                if($(this).attr('data-show')!=1) {
                    $this.popover({content:'正在努力加载中...'}).popover('show');
                    var expressNo = $(this).attr("data-v");
                    var formData = 'method=ajax_expresstrack&express_no=' + expressNo;
                    jQuery.ajax({
                        type: 'get',
                        url: '<{$smarty.const.ADMIN_URL}>/ajax/orders.php',
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
                            if (data['status'] > 0) {
                                $this.attr('data-show', '1');
                                if($this.data('popover')!=null){
                                    $this.popover('hide');
                                    $this.removeData('popover');
                                }
                                $this.attr('data-content', getWlMidtrace(data['data'], expressNo));
                                $this.popover('show');
                            }else {
                                $this.attr('data-show', '0');
                                $this.attr('data-content','还没有物流信息哦!');
                                $this.popover('show');
                            }
                        }
                    });
                }else {
                    $this.popover('show');
                }
            }).on('mouseleave',function(event) {
                $(this).popover('hide');
            });
        }});
	}


	$(document).ready(function() {

		//指定600秒刷新一次
		setTimeout(function(){myrefresh();},600000);
		//日期时间选择器
		$('.datetimepicker').datetimepicker({
			language: 'zh-CN',
			pickTime: false
		});	
		//订单组方按钮事件
		$('.oitem-add').on('click',function(event){
			event.preventDefault();
			var url = $(this).attr('data-url') ;
			openModalforOrdersItem(url);
		});
		//处理订单状态
		$('.oitem-process,.oitem-process2,.oitem-view,.oitem-cancel').on('click',function(){
			var url = $(this).attr('data-url') ;
			var _title = $(this).closest('tr').find('td:eq(2)').text();
			openModalforProcess(url,_title);
		});
		//导出已审核订单
        $('#orders_hba_export').on('click',function(){
            var url = "<{$smarty.const.ADMIN_URL}>/ajax/exportCsv_orders.php?n="+Math.random();
            var $form = $("#myorders-form");
            var formData = $form.serialize();
            $(this).attr("href", url+"&"+formData);
        });
	});
</script>
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>