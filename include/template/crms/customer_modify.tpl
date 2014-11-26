<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<style type="text/css">
	blockquote{
		border-bottom: 1px dotted #F79B25;
		margin-top:10px;
		border-color:#F79B25;
	}
	blockquote p{
		margin-bottom: 0;
		font-size: 18px;
		font-weight: bold;
		line-height: 25px;
		color:#F79B25;
	}
	blockquote p a{font-size: 12px;font-weight: normal;color:gray;margin-left: 10px;}
	table.table td{
		padding:4px;
		text-align:center;
	}
	table.table th{
		text-align:center;
	}
	
	input[type="radio"], input[type="checkbox"] {
		width:16px;
		height:16px;
		margin-top:2px;
	}
	.help-block, .help-inline {
		color: #A0A7AF;
	}

	form.form-horizontal .control-group{margin-bottom:10px;}
	form.form-horizontal .control-group .control-label{width:100px;}
	form.form-horizontal .control-group .controls{margin-left:110px;}

	blockquote + div.block-body{
		min-height: 0;
	}
	h4{border-bottom:1px solid gray;}
	#modal-orders i{margin-left:4px;color:#08c;}

	a.anchor-fix {
	    position: relative;
	    top: -40px; 
	    display: block;
	    height: 0;
	    overflow: hidden;
	}
	ul.fast-bar {
	    display: block;
	    position: fixed;
	    top: 40%;
	    right: 1px;
	    border-style: solid;
	    border-color: #CFCECA;
	    -moz-border-top-colors: none;
	    -moz-border-right-colors: none;
	    -moz-border-bottom-colors: none;
	    -moz-border-left-colors: none;
	    border-image: none;
	    border-width: 1px 1px 0px 0px;
	    list-style-type: none;
	    padding: 0px;
	    margin: 0px;
	    font: 12px/25px Helvetica Neue,Helvetica,Arial,Calibri,Tahoma,Verdana,sans-serif;
	    color: #222;
	    z-index: 99999999;
	    background: #fff;
	}
	ul.fast-bar li{
		position: relative;
        width: 60px;
        border-left: 1px solid #cecece;
        border-bottom: 1px solid #cecece;
        padding: 4px 10px;
        text-shadow: 0 1px 0 #fff;
	}
	ul.fast-bar > li:hover {
        background: #fff;
    }

	<{if $p}>
      /* 隐藏头,右侧,内容头部 */
	  body{background: none;}

	  .sidebar-nav { display:none; }
	  .sidebar-nav{width:0;}
	  .content{margin-left: 0;}
	<{/if}>
</style>
<div id='loading'>正在拨号中...</div>
<ul class="fast-bar">
	<li><a href="#baseinfo_anchor">1.基本信息</a></li>
	<li><a href="#dietinfo_anchor">2.饮食情况</a></li>
	<li><a href="#healthinfo_anchor">3.健康信息</a></li>
	<li><a href="#salelog_anchor">4.沟通日志</a></li>
	<li><a href="#orders_anchor">5.消费记录</a></li>
</ul>
<ul class="nav nav-tabs" id="myTab">
	<small class="pull-right">提示:双击有电话号码的文本框,即可外呼!</small>
	<li class="active"><a href="#customerInfo" data-toggle="tab">客户信息</a></li>
	<!-- li><a href="#salelog" data-toggle="tab">销售记录</a></li>
	<li><a href="#orders" data-toggle="tab">消费记录</a></li -->
</ul>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane active in" id="customerInfo">
		<form class="form-horizontal" id="customer-form" data-async method="post" action="<{$smarty.const.ADMIN_URL}>/ajax/crms.php">
			<input type="hidden" name="method" value="ajax_updateCustomer" />
			<input type="hidden" name="customerId" id="customerId" value="<{$customer.id}>">
			<a class="anchor-fix" name="baseinfo_anchor"></a>
			<blockquote>
				<p>1. 基本信息 <a href="#base_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a><span class="pull-right">责任人:  <{$saler_options_list[$customer.vested]}></span></p>
			</blockquote>
			<div id="base_info" class="block-body collapse in">        	
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label"><em>*</em>姓名</label>
							<div class="controls">
								<input type="text" name="name" class="input-medium" value="<{$customer.name}>" required="true" /> 
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">性别</label>
							<div class="controls">
								<{html_options name=sex id="DropDownSex" class="input-medium" options=$sex_options selected=$customer.sex }>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">出生日期</label>
							<div class="controls">
								<div class="datetimepicker input-prepend input-append date" id="datetimepicker0">
									<input type="text" name="birthday" id="birthday" data-format="yyyy-MM-dd" value="<{$customer.birthday|date_format:'%Y-%m-%d'}>" class="input-small"></input>
									<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
									<span class="add-on" id="age"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span8">
						<div class="control-group">
							<label class="control-label"><em>*</em>地址</label>
							<div class="controls">
								<input type="text" name="address" id="address" value="<{$customer.address}>" class="input span12" required="true" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">客户来源</label>
							<div class="controls">
								<{html_options name='source' class="input-small" options=$source_options selected=$customer.source}>
							</div>
						</div>
					</div>
				</div>		
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group info">
							<label class="control-label"><em>*</em>联系电话</label>
							<div class="controls">
								<input type="text" class="input-medium" name="mobile_0" id="mobile_0" required="true" <{if $user_info.user_group!=1}>readonly="true"<{/if}> value="<{$customer.mobile|substr_replace:'****':'3':'-1'}>" rel="tooltip" title="双击此处'电话号码'即可外拨电话!" /><input type="hidden" name="mobile" id="mobile"  value="<{$customer.mobile}>" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">联系电话2</label>
							<div class="controls">
								<input type="text" class="input-medium" name="telphone_0" id="telphone_0" <{if $user_info.user_group!=1}>readonly="true"<{/if}> value="<{$customer.telphone|substr_replace:'****':'3':'-1'}>" rel="tooltip" title="双击此处'电话号码'即可外拨电话!" /><input type="hidden" name="telphone" id="telphone" value="<{$customer.telphone}>" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">介绍人</label>
							<div class="controls">
								<input type="text" class="input-small" name="referrals" value="<{$customer.referrals}>" />
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">职业</label>
							<div class="controls">
								<input type="text" name="health_profession" value="<{$customer.health_profession}>" class="input-medium" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">收入情况</label>
							<div class="controls">
								<{html_options name=income id="DropDownIncome" class="input-medium" options=$income_options selected=$customer.income }>
							</div>
						</div>
					</div>	
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">联系人</label>
							<div class="controls">
								<input type="text" name="link_man" value="<{$customer.link_man}>" class="input linkgroup" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">关系</label>
							<div class="controls">
								<{html_options name=link_relation id="DropDownLinkRelation" class="input linkgroup" options=$linkrelation_options selected=$customer.link_relation }>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">联系人电话</label>
							<div class="controls">
								<input type="text" name="link_phone" id="link_phone" class="input-small linkgroup" value="<{$customer.link_phone}>" <{if $user_info.user_group!=1}>readonly="true"<{/if}> rel="tooltip" title="双击此处'电话号码'即可外拨电话!" />
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">性格类型</label>
							<div class="controls">
								<{html_options name=personality_type class="input-medium" options=$personalitytype_options selected=$customer.personality_type }>
							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">性格特点</label>
							<div class="controls">
								<{html_options name="personality_traits[]" id="DropDownpt" class="selectpicker" multiple="true" data-container="body" title="请描述性格特点" options=$personalitytraits_options selected=explode(',',$customer.personality_traits) }>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="anchor-fix" name="dietinfo_anchor"></a>
			<blockquote>
				<p>2. 饮食情况 <a href="#diet_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
			</blockquote>
			<div id="diet_info" class="block-body collapse in">  
				<div class="row-fluid">
					<div class="span12">
						<div class="control-group">
							<label class="control-label">正餐情况</label>
							<div class="controls">
								<{html_options name="diet_foods[]" class="selectpicker" multiple="true" data-container="body" title="请描述正餐情况" options=$dietfoods_options selected=explode(',',$customer.diet_foods) }>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">偏好</label>
							<div class="controls">
								<{html_options name=diet_preference class="input-medium" options=$dietpreference_options selected=$customer.diet_preference }>
							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">嗜好</label>
							<div class="controls">
								<{html_options name="diet_hobby[]" class="selectpicker" multiple="true" data-container="body" title="请描述嗜好情况" options=$diethobby_options selected=explode(',',$customer.diet_hobby) }>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">口味</label>
							<div class="controls">
								<{html_options name=diet_preference class="input-medium" options=$diettaste_options selected=$customer.diet_preference }>
							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">非主食情况</label>
							<div class="controls">
								<{html_options name="diet_snacks[]" class="selectpicker" multiple="true" data-container="body" title="请描述非主食情况" options=$dietsnacks_options selected=explode(',',$customer.diet_snacks) }>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="anchor-fix" name="healthinfo_anchor"></a>
			<blockquote>
				<p>3. 健康信息 <a href="#health_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
			</blockquote>
			<div id="health_info" class="block-body collapse in">  
				<div class="row-fluid">
					<div class="span2">
						<div class="control-group">
							<label class="control-label">身高(cm)</label>
							<div class="controls">
								<div class="input-append spinner" data-trigger="spinner" id="price">
									<input type="text" value="<{$customer.health_height}>" data-min="100" data-min="250" data-step="5" name="health_height" class="input-mini">
									  <div class="add-on">
									    <a href="javascript:;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a>
									    <a href="javascript:;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a>
									  </div>
								</div>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<label class="control-label">体重(kg)</label>
							<div class="controls">
								<input type="text" name="health_body_weight" value="<{$customer.health_body_weight}>" class="input-mini" pattern="\d+(.[0-9]{1,2})?" title="数字(可带两位小数)" />
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">劳动强度</label>
							<div class="controls">
								<{html_options name=labor_intensity class="input-medium" options=$laborintensity_options selected=$customer.labor_intensity }>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">BMI(体质指数)</label>
							<div class="controls">
								<span class="input uneditable-input input-underline" id="bmi">
								<{if $bmi=($customer.health_body_weight/pow($customer.health_height/100, 2))<18.5}>&lt;18.5<{$bmin = "过低"}>
								<{else if $bmi<23.9}>18.5-23.9<{$bmin = '正常'}>
								<{else if $bmi<26.9}>&gt;24-26.9<{$bmin = '超重'}>
								<{else if $bmi<29.9}>27-29.9<{$bmin = 'Ⅰ度肥胖'}>
								<{else if $bmi>30 && $bmi<40}>≥30<{$bmin = 'Ⅱ度肥胖'}>
								<{else if $bmi>40}>≥40<{$bmin = 'Ⅲ度肥胖'}>
								<{/if}>
								</span>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">肥胖程度</label>
							<div class="controls">
								<div class="input-append spinner" data-trigger="spinner">
									<span class="input uneditable-input input-underline" id="bmi2"><{$bmin}></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">血压</label>
							<div class="controls">
								<input type="text" name="health_blood_pressure" value="<{$customer.health_blood_pressure}>" class="input-mini" pattern="\d*" /> / <input type="text" name="health_blood_pressure_height" value="<{$customer.health_blood_pressure_height}>" class="input-mini" pattern="\d*" /><span>mmHg</span>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">血糖</label>
							<div class="controls">
								<span>餐前 </span><input type="text" name="health_gi_preprandial" value="<{$customer.health_gi_preprandial}>" class="input-mini" pattern="\d*" /> / <span>餐后 </span><input type="text" name="health_gi_postprandial" value="<{$customer.health_gi_postprandial}>" class="input-mini" pattern="\d*" /><span>mol/L</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">疾病</label>
							<div class="controls">
								<input type="text" name="health_diagnosis" id="health_diagnosis" value="<{$customer.health_diagnosis}>" class="input-large" />
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<label class="control-label">确诊时间</label>
							<div class="controls">
								<div class="datetimepicker input-prepend input-append date">
									<input type="text" name="health_diagnosis_time" id="health_diagnosis_time" data-format="yyyy-MM-dd" value="<{$customer.health_diagnosis_time|date_format:'%Y-%m-%d'}>" class="input-small"></input>
									<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">化验单</label>
							<div class="controls">
								<label class="radio inline">
									<input type="radio" name="health_has_biochemical_indicators" id="check1" value="1"> 有
								</label>
								<label class="radio inline">
									<input type="radio" name="health_has_biochemical_indicators" id="check2" value="2"> 无
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">其它疾病</label>
							<div class="controls">
								<textarea name="health_diagnosis_other" rows="3" class="input-large"><{$customer.health_diagnosis_other}></textarea>
								<p class="help-block"> 不支持HTML代码</p>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">症状描述</label>
							<div class="controls">
								<textarea name="health_symptom" rows="3" class="input-xlarge"><{$customer.health_symptom}></textarea>
								<p class="help-block"> 不支持HTML代码</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">异常指标</label>
							<div class="controls">
								<input type="text" name="health_anomaly_indicators" value="<{$customer.health_anomaly_indicators}>" class="input-large" />
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">曾用药</label>
							<div class="controls">
								<input type="text" name="health_had_medication" value="<{$customer.health_had_medication}>" class="input-large" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="btn-toolbar" style="padding-left:60px;">
			<{if $user_info.user_group==1 || $customer.vested == $user_info.user_id}>
				<button type="submit" class="btn btn-primary" id="postme"><strong>修改</strong></button>
				<a class="btn" href="customers.php">返回</a>
			<{/if}>
			</div>
		</form>
		<p style="height:30px;"></p>
		<a class="anchor-fix" name="salelog_anchor"></a>
		<blockquote>
			<p>4. 沟通日志 <a href="#salelog_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
		</blockquote>
		<div id="salelog_info" class="block-body collapse in">  

			<div class="row-fluid">
				<div class="span8">
					<table class="table table-striped table-bordered table-hover" id="salelog_list" style="margin-top:30px;">
						<thead>
							<tr>
								<th class="hide">#</th>
								<th>沟通日期</th>
								<th>沟通内容</th>
								<th>客户分析</th>
								<th>备注</th>
							</tr>
						</thead>
						<tbody>
							<{foreach name=sale from=$salelogs item=sale}>				 
							<tr>
								<td class="hide"><{$sale.id}></td>
								<td><{$sale.sale_date}></td>
								<td><{$sale.sale_content}></td>
								<td><{$sale.sale_analysis}></td>
								<td>[<{$sale.sale_effect}>] <{$sale.remark}></td>
							</tr>
							<{/foreach}>
						</tbody>
					</table>
				</div>
				<div class="span4">
					<h4> 沟通记录:</h4>
					<form data-async action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" method="post" name="form2" id="salelog-form" data-target="salelog_list">
						<label>沟通简要</label>	
						<textarea class="input input-xlarge" name="sale_content" id="sale_content" rows="3" required="true"></textarea>
						<label>客户分析</label>	
						<textarea class="input input-xlarge" name="sale_analysis" id="sale_analysis" rows="2"></textarea>
						<label>备注</label>	
						<textarea class="input input-xlarge" name="remark" id="remark" rows="1"></textarea>
						<label>沟通情况</label>
						<{html_options name="customer_type" id="customer_type" title="请描述本次沟通情况"  readonly=$readonly options=$customertype_options strict='1' odisabled=$op_disabled selected=$customer.type }>
						<input type="hidden" name="method" id="method" value="ajax_addSaleLog" />
						<input type="hidden" name="sale_id" id="saleId" value="" />
						<div class="btn-toolbar">
						<{if $customer.vested == $user_info.user_id}>
							<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
							<input type="reset" class="btn" value="取消" />
							<a href="" class="btn hide" id="btn-addOrders"><i class="icon-plus-sign"></i> 新增订购 </a>
						<{/if}>
						</div>
					</form>
				</div>
			</div>

		</div>
		<a class="anchor-fix" name="orders_anchor"></a>
		<blockquote>
			<p>5. 消费记录 <a href="#orders_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
		</blockquote>
		<div id="orders_info" class="block-body collapse in">  
			<div class="block-heading"><strong><{$customer.name}></strong> 最近10次消费记录:
				<span class="pull-right btn-group ctl-group">
				<{if $customer.vested == $user_info.user_id}>
					<small class="btn hide" id="orders_add" style="display:inline;"><i class="icon-plus-sign"></i> 新增订购</small>
					<small class="btn hide" id="orders_modify"><i class="icon-edit"></i> 修改</small>
					<small class="btn hide" id="orders_cancel"><i class="icon-ban-circle"></i> 取消</small>
					<small class="btn hide" id="orders_process "><i class="icon-ok-circle"></i> 确认订单</small>
					<!-- small class="btn" id="orders_remove"><i class="icon-trash"></i> 删除</small -->
				<{/if}>
				<{if $user_info.user_group == '5' }>
					<small class="btn hide" id="orders_additem"><i class="icon-wrench"></i> 组方</small>
				<{/if}>
				</span>
			</div>
			<table class="table table-striped table-bordered table-hover" id="orders_list">
				<thead>
					<tr>
						<th class="hide">id</th>
						<th>订单编号</th>
						<th>订购日期</th>
						<th>订单标题</th>
						<th>数量</th>
						<th>金额(元)</th>
						<th>赠品</th>
						<th>状态</th>
					</tr>
				</thead>
				<tbody>
					<{foreach name=order from=$orders item=order}>				 
					<tr>
						<td class="hide"><{$order.id}></td>
						<td><{$order.orders_no}></td>
						<td><{$order.orders_date}></td>
						<td><{$order.orders_title}></td>
						<td><{$order.orders_num}></td>
						<td><{$order.payment_sum}></td>
						<td><{$order.gift}></td>
						<td><{$ordersstatus_options[$order.status]}></td>
					</tr>
					<{/foreach}>
				</tbody>
			</table>
		</div>
	</div>
	<!-- div class="tab-pane" id="salelog">
		<div class="row-fluid">
			<div class="span8">
				<table class="table table-striped table-bordered table-hover" id="salelog_list" style="margin-top:30px;">
					<thead>
						<tr>
							<th class="hide">#</th>
							<th>沟通日期</th>
							<th>沟通内容</th>
							<th>客户分析</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody>
						<{foreach name=sale from=$salelogs item=sale}>				 
						<tr>
							<td class="hide"><{$sale.id}></td>
							<td><{$sale.sale_date}></td>
							<td><{$sale.sale_content}></td>
							<td><{$sale.sale_analysis}></td>
							<td>[<{$sale.sale_effect}>] <{$sale.remark}></td>
						</tr>
						<{/foreach}>
					</tbody>
				</table>
			</div>
			<div class="span4">
				<h4> 沟通记录:</h4>
				<form data-async action="<{$smarty.const.ADMIN_URL}>/ajax/orders.php" method="post" name="form2" id="salelog-form" data-target="salelog_list">
					<label>沟通简要</label>	
					<textarea class="input input-xlarge" name="sale_content" id="sale_content" rows="3" required="true"></textarea>
					<label>客户分析</label>	
					<textarea class="input input-xlarge" name="sale_analysis" id="sale_analysis" rows="2"></textarea>
					<label>备注</label>	
					<textarea class="input input-xlarge" name="remark" id="remark" rows="1"></textarea>
					<label>沟通情况</label>
					<{html_options name="customer_type" id="customer_type" title="请描述本次沟通情况" options=$customertype_options selected=$customer.type }>
					<input type="hidden" name="method" id="method" value="ajax_addSaleLog" />
					<input type="hidden" name="sale_id" id="saleId" value="" />
					<div class="btn-toolbar">
					<{if $customer.vested == $user_info.user_id}>
						<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
						<input type="reset" class="btn" value="取消" />
						<a href="" class="btn hide" id="btn-addOrders"><i class="icon-plus-sign"></i> 新增订购 </a>
					<{/if}>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="orders">
		<div class="block-heading"><strong><{$customer.name}></strong> 最近10次消费记录:
		<{if $customer.vested == $user_info.user_id}>
			<span class="pull-right btn-group">
				<small class="btn" id="orders_add"><i class="icon-plus-sign"></i> 新增订购</small>
				<small class="btn" id="orders_modify"><i class="icon-edit"></i> 修改</small>
				<small class="btn" id="orders_cancel"><i class="icon-ban-circle"></i> 取消</small>
				<small class="btn" id="orders_process"><i class="icon-ok-circle hide"></i> 确认订单</small>
				<small class="btn" id="orders_remove"><i class="icon-trash"></i> 删除</small>
			</span>
		<{/if}>
		</div>
		<table class="table table-striped table-bordered table-hover" id="orders_list">
			<thead>
				<tr>
					<th class="hide">id</th>
					<th>订单编号</th>
					<th>订购日期</th>
					<th>订单标题</th>
					<th>数量</th>
					<th>金额(元)</th>
					<th>赠品</th>
					<th>状态</th>
				</tr>
			</thead>
			<tbody>
				<{foreach name=order from=$orders item=order}>				 
				<tr>
					<td class="hide"><{$order.id}></td>
					<td><{$order.orders_no}></td>
					<td><{$order.orders_date}></td>
					<td><{$order.orders_title}></td>
					<td><{$order.orders_num}></td>
					<td><{$order.payment_sum}></td>
					<td><{$order.gift}></td>
					<td><{$ordersstatus_options[$order.status]}></td>
				</tr>
				<{/foreach}>
			</tbody>
		</table>
	</div -->
</div>

<script type="text/javascript">
	var status_array = <{$ordersstatus_options|json_encode}>;

	//组方
	function openModalforOrdersItem(url){
		var btn = [{"label" : "关闭"}];
		btn = [{
			"label" : "组方完成",
			"class" : "btn-primary",
			"callback": function(ev) {
				var formData = "status=determine&ordersId="+$('#ordersId').val()+"&method=ajax_processOrders";
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
		},{"label" : "关闭", "class" : "btn"}];

		jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(rspDate) {
			var bbd=bootbox.dialog(rspDate,	btn, {"classes": "modal-large"});
			bbd.find(".spinner").spinner();
			bbd.find('.selectpicker').selectpicker();
			//产品change事件
			bbd.find('#product_id').on('change',function(){
				var pName = $(this).find('option:selected').text();
				$('#productName').val(pName);
				var pSpec = $(this).find('option:selected').attr('data-spec');
				$('#item_spec').val(pSpec);
			});
			bbd.find('#orders_item_list').on('click', 'tbody tr', function(event) {
			    $(this).addClass('highlight').siblings().removeClass('highlight');
			    $('#method','#orders_item_form').val('ajax_modifyOrdersItem');
			    $('#ordersItemId','#orders_item_form').val($(this).find('td:first').text());
			    $('#productName','#orders_item_form').val($(this).find('td:eq(1)').text());
			    $('#item_spec','#orders_item_form').val($(this).find('td:eq(2)').text());
			    $('#item_num','#orders_item_form').val($(this).find('td:eq(3)').text());
			    $('#item_remark','#orders_item_form').val($(this).find('td:eq(4)').text());
			    $('#product_id','#orders_item_form').selectpicker('val', $(this).find('td:last').text());
			    $('#orders_item_form .btn-primary').html('<i class="icon-edit"></i> 修改');
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
								if(formJson['method'].indexOf('_add')>=0){
									if($('#'+target+' tbody').children().length < 1){
										$('#'+target+' tbody').append(row);
									}else{
										$('#'+target+' tbody tr:first').before(row);
									}
								}else if(formJson['method'].indexOf('_modify')){
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
		    	$('#orders_item_form tbody tr.highlight').removeClass('highlight');
		    });
		}});
	}

	//订单事件
	function openModalforOrders(action,formData){
		var header = (action=='add'?"新增订购":(action=='modify'?"订单修改":"处理订单"));
		var url = "<{$smarty.const.ADMIN_URL}>/crms/orders_"+action+".php";

		jQuery.ajax({type:'GET',url:url,dataType:'html',data:formData,success:function(data) {
			var bbd=bootbox.dialog(data,
				[{
					"label" : "确定",
					"class" : "btn btn-primary",
					"callback": function(event) {
						var $form = $('#orderadd_form');
						var formdata = $form.serialize();
						var formJson = DataDeal.formToJson(formdata);//转化为json 
						$.ajax({
							type: $form.attr('method'),
							url: $form.attr('action'),
							data: formdata,
							dataType:'json',
							success: function(json, status) {
								bootbox.alert(json.msg,function(){
									if(json.result==1){
										if(formJson['method']==='ajax_addOrders'){
											//成功则修改下面表单不能更改
											var row = '<tr><td class="hide">'+json.newId+'</td><td>'+json.ordersNo+'</td><td>'+json.date+'</td><td>'+formJson['orders_title']+'<td>'+formJson['orders_num']+'</td><td>'+formJson['payment_sum']+'</td><td>'+formJson['gift']+'</td><td>新订单</td></tr>';
											if($('#orders_list tbody').children().length < 1){
												$('#orders_list tbody').append(row);
											}else{
												$('#orders_list tbody tr').first().before(row);
											}
										}else{
											var cell4 = '<td>'+formJson['orders_num']+'</td>';
											var cell5 = '<td>'+formJson['payment_sum']+'</td>';
											var cell6 = '<td>'+formJson['gift']+'</td>';
											var cell7 = '<td>'+formJson['status2']+'</td>';
											if(formJson['status']){
												cell7 = '<td>'+status_array[formJson["status"]]+'</td>';
											}
											$('#orders_list tbody tr.highlight td:eq(4)').replaceWith(cell4);
											$('#orders_list tbody tr.highlight td:eq(5)').replaceWith(cell5);
											$('#orders_list tbody tr.highlight td:eq(6)').replaceWith(cell6);
											$('#orders_list tbody tr.highlight td:last').replaceWith(cell7);
										}
										window.setTimeout(function(){
											bootbox.hideAll();
										}, 500);
									}
								});
							}
						});
						event.preventDefault();
					}
				},{"label" : "关闭","class":"btn"}], 
				{
					"header":header,
					"onEscape": function() {
						console.log("dialog dismissed by escape key");
					},
					"classes": "modal-large"
				}
			);
			if(action!='process'){
				bbd.find(".spinner").spinner('changed', function(e, newVal, oldVal){
				    var num = $('#orders_num').val() - 0;
				    var price = $('#product_price').val() - 0;
				    var discount = $('#discount').val() - 0;
				    $('#payment_sum').val((num*price-discount).toFixed(2));
				});
				
				bbd.find('#orders_titleId').on('change',function(event){
					$('#orders_title').val($(this).find('option:selected').text());
					var price = $(this).find('option:selected').attr('data-price');
					$('#product_price').val(price);
					$('#payment_sum').val(price);
				});
				bbd.find('#product_price').on('keyup',function(event){
					var num = $('#orders_num').val() - 0;
				    var price = $(this).val() - 0;
				    var discount = $('#discount').val() - 0;
				    $('#payment_sum').val((num*price-discount).toFixed(2));
				});
				bbd.find('.selectpicker').selectpicker();
				bbd.find('textarea').autosize();
				bbd.find('#orders_tel_0').on('change',function(){//隐藏电话号码后面4位,以"*"代替
					var v = $(this).val();
                    if(v.indexOf('*')==-1){
                        var tmpid = $(this).attr("id");
                        var oid = tmpid.replace("_0","");
                        $('#'+oid).val(v);
                        $(this).val(substr_replace(v,"****",3,-1));
                    }

				});
			}
			bbd.find('input:radio[name=status]').on('change',function(){
				if( $.inArray($(this).val(),['canceling','refused']) >=0 ){
					$('#cancelNote').show();
				}else{
					$('#cancelNote').hide();
				}
			});
		}});
	}
	//表单赋值
	function setFormsData(){
		$(":radio[name='health_has_biochemical_indicators'][value='<{$customer.health_has_biochemical_indicators}>']").attr('checked',true);
	}

	var currentOrdersId = '<{$ordersId}>';
	var current_user_id = '<{$user_info.user_id}>';
	var vested = '<{$customer.vested}>';
	var userGroup = '<{$user_info.user_group}>';

	$(document).ready(function() {
		setFormsData();
		$('.selectpicker').selectpicker();
		//处理联系人表单
		$('.linkgroup').each(function(){
			if($.trim($(this).val())!=""){
				$(this).attr('readonly','readonly');
			}
		});

		$('input[rel="tooltip"]').tooltip({placement: 'top'})
		.data('tooltip')
        .tip()
        .css('z-index',9000);

		$("select[readonly='readonly']").find('option:not(:selected)').attr('disabled', true);
		
		//出生日期及年龄计算
		if(!$.isEmptyObject($('#birthday').val())){
			$('#age').html(calAgeByBirthday($('#birthday').val())+'岁');
		}

		$('#datetimepicker0').on('changeDate', function(e) {
			var d = e.localDate.toString("yyyy-MM-dd");	
			$('#age').html(calAgeByBirthday(d)+'岁');
		});

		//若查看订单,则显示订单信息
		if(currentOrdersId>0){
			location.hash="orders_anchor";
			if(current_user_id!=vested){
				$('.btn-toolbar,.ctl-group.btn').hide();
			}
			//查找是否有当前订单记录,有则打开
			// $('#orders_list tbody tr td:eq(0)').each(function(){
			// 	if($(this).text()==currentOrdersId){
			// 		$(this).parent().addClass('highlight').siblings().removeClass('highlight');
			// 		var formData = 'ordersId='+currentOrdersId ;
			// 		openModalforOrders('modify',formData);
			// 	}
			// });	
		}
		//设置诊断日期
		$('#health_diagnosis').on('change',function(event){
			if($(this).val()!=''){
				$('#health_diagnosis_time').attr('disabled',false);
			}else{
				$('#health_diagnosis_time').attr('disabled',true);
			}
		});

		//监听表单提交,并将其改为ajax提交,以保证提交失败时数据不变
		//form提交:客户信息修改(ajax_updateCustomer)
		$('#customer-form').on('submit', function(event) {
			var $form = $(this);
			$.ajax({
				type: $form.attr('method'),
				url: $form.attr('action'),
				data: $form.serialize(),
				dataType:'json',
				success: function(json, status) {
					bootbox.alert(json.msg,function(){
						if(json.result==1){
							//成功则修改下面表单不能更改
							//$('#mobile').val()
						}
						window.setTimeout(function(){
							bootbox.hideAll();
						}, 2000);
					});
				}
			});
			event.preventDefault();
		});

		//"沟通日志"表格选中行高亮并显示详情
		$('#salelog_list').on('click', 'tbody tr', function(event) {
			var v = $(this).find('td:eq(2)').text();
		    $(this).addClass('highlight').siblings().removeClass('highlight');
	    	$('#salelog h4').html(' 沟通记录:<span class="pull-right">时间:'+$(this).find('td:eq(1)').text()+'</span>');
	    	$('#sale_content').val($(this).find('td:eq(2)').text()).attr('readonly','true');
	    	$('#sale_analysis').val($(this).find('td:eq(3)').text());
	    	$('#remark').val($(this).find('td:eq(4)').text().split(']')[1]);
	    	$('#saleId').val($(this).find('td:eq(0)').text());
	    	if(current_user_id == vested){
		    	$('#salelog-form .btn-primary').html('<i class="icon-edit"></i> 修改');
		    	$('#salelog-form .btn-toolbar a').show();
	    	}
		});
		//form提交: 增加沟通日志(ajax_addSaleLog)
		$('#salelog-form').on('submit', function(event) {
	        var $form = $(this);
	        var target = $form.attr('data-target');
	        var formData = $form.serialize();
	 		var formJson = DataDeal.formToJson(formData);//转化为json 
	        $.ajax({
	            type: $form.attr('method'),
	            url: $form.attr('action')+'?customerId='+$('#customerId').val(),
	            data: formData,
	            dataType:'json',
	            success: function(json, status) {
	            	if(json.result=="1"){
	            		createAutoClosingAlert('.alert-info',3000);
	            		var row = '<tr><td class="hide">'+json.newid+'</td><td>'+json.sale_date+'</td><td>'+formJson['sale_content']+'</td><td>'+formJson['sale_analysis']+'</td><td>'+json.remark+'</td></tr>';
	            		if(formJson['sale_id']>0){
	            			$('#salelog_list tbody tr.highlight').replaceWith(row);
	            		}else{
							if($('#'+target+' tbody').children().length < 1){
								$('#'+target+' tbody').append(row);
							}else{
								$('#'+target+' tbody tr').first().before(row);
							}
						}
		                $form[0].reset();
	            	}
	            	
	            }
	        });
	        event.preventDefault();
	    }).on('reset',function(){
	    	$('#saleId').val('');
	    	$('#sale_content').removeAttr('readonly');
	    	$('#salelog-form .btn-primary').html('<i class="icon-save"></i> 保存');
	    	$('#salelog-form .btn-toolbar a').hide();
	    	$('#salelog h4').html(' 沟通记录:')
	    	$('#salelog_list tbody tr.highlight').removeClass('highlight');
	    });
		//初始化和绑定插件事件
		//日期时间选择器
		$('.datetimepicker').datetimepicker({
			language: 'zh-CN',
			pickTime: false
		});	

		//"订单表格"选中行高亮
		$('#orders_list').on('click', 'tbody tr', function(event) {
			$(this).addClass('highlight').siblings().removeClass('highlight');
			if($(this).find("td:last").text()=='新订单'){
				$('#orders_modify,#orders_cancel').show();
				if( userGroup=='5')
					$('#orders_additem').show();
			}else{
				$('#orders_modify,#orders_cancel').hide();
			}
			if($(this).find("td:last").text()=='客户确定中'){
				$('#orders_cancel,#orders_process').show();
			}else{
				$('#orders_cancel,#orders_process').hide();
			}
		});

		//订单:"增加"按钮事件
		$('#orders_add,#btn-addOrders').on('click',function(){
			var formData = 'customerId='+$('#customerId').val()+'&address='+$('#address').val()+'&mobile='+$('#mobile').val()+'&telphone='+$('#telphone').val() ;
			if(!$(this).closest('form').find('#saleId').val()==''){
				formData += '&saleId='+$('#saleId').val();
				//$('#myTab a:last').tab('show'); 
				location.hash="orders_anchor";
			}
			openModalforOrders('add',formData);
			return false;
		});
		//订单:"修改"按钮事件
		$('#orders_modify').on('click',function(){
			if( ! $('#orders_list tbody tr').hasClass('highlight') ){
				bootbox.alert("您没有选中任何订单,请确认!");
				return;
			}
			var ordersId = $('#orders_list tbody tr.highlight').find('td:eq(0)').text();
			var formData = 'ordersId='+ordersId ;
			openModalforOrders('modify',formData);
			return false;
		});
		//订单:"订单确认"按钮事件
		$('#orders_process').on('click',function(){
			if( ! $('#orders_list tbody tr').hasClass('highlight') ){
				bootbox.alert("您没有选中任何订单,请确认!");
				return;
			}
			var ordersId = $('#orders_list tbody tr.highlight').find('td:eq(0)').text();
			var formData = 'ordersId='+ordersId ;
			openModalforOrders('process',formData);
			return false;
		});
		//订单:"取消"按钮事件
		$("#orders_cancel").on('click',function(){
			if( ! $('#orders_list tbody tr').hasClass('highlight') ){
				bootbox.alert("您没有选中任何订单,请确认!");
				return;
			}
			bootbox.confirm("您确定要取消选中的订单吗?", function(result) {
				if(result){
					var ordersId = $('#orders_list tbody tr.highlight').find('td:eq(0)').text();
					var formData = 'method=ajax_processOrders&status=cancel&ordersId='+ordersId ;
					$.ajax({
						type: 'post',
						url: "<{$smarty.const.ADMIN_URL}>/ajax/orders.php",
						data: formData,
						dataType:'json',
						success: function(json, status) {
							bootbox.alert(json.msg,function(){
								if(json.result==1){
									//成功则修改下面表单不能更改
									$('#orders_list tbody tr.highlight td:last').replaceWith('<td>取消</td>');
								}
								window.setTimeout(function(){
									bootbox.hideAll();
								}, 500);
							});
						}
					});
				}
			});
		});
		//订单:"组方"按钮事件
		$('#orders_additem').on('click',function(){
			if( ! $('#orders_list tbody tr').hasClass('highlight') ){
				bootbox.alert("您没有选中任何订单,请确认!");
				return;
			}
			var ordersId = $('#orders_list tbody tr.highlight').find('td:eq(0)').text();
			var url = 'orders_item_add.php?ordersId='+ordersId+'&customerId='+$('#customerId').val() ;
			openModalforOrdersItem(url);
			return false;
		});

		$('blockquote a').on('click',function(){
			if($(this).hasClass('collapsed')){
				$(this).find('i').removeClass().addClass('icon-chevron-down');
			}else{
				$(this).find('i').removeClass().addClass('icon-chevron-up');
			}
		});

		//隐藏电话号码后面4位,以"*"代替
		$('#mobile_0,#telphone_0').on('change',function(){
			var v = $(this).val();
		    if(v.indexOf('*')==-1){
                var tmpid = $(this).attr("id");
                var oid = tmpid.replace("_0","");
                $('#'+oid).val(v);
                $(this).val(substr_replace(v,"****",3,-1));
            }

		});
		//在线拨号:
		$('#mobile_0,#telphone_0,#link_phone').on('dblclick',function(){
			$('#loading').show();
			var phone = '';
			if($(this).attr("id").indexOf("_0")>0){
				var tempid = $(this).attr("id");
				var oid = tempid.replace("_0","");
				phone = $('#'+oid).val();
			}else{
			 	phone = $(this).val();
			}
			if(!phone || phone.length<3){
				$('#loading').delay(5000).html('号码不正确,请确认!').delay(2000).fadeOut("slow",function(){$('#loading').html('正在拨号中...')});
				return;
			}else{
				reqAutoDial(phone);
			}
		});

	});

</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>