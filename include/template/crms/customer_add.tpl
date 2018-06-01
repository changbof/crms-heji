<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
<style type="text/css">
	.popover {width:420px;}
	blockquote{
		border-bottom: 1px dotted #F79B25;
		margin-top:20px;
		border-color:#F79B25;
	}
	blockquote p{
		margin-bottom: 0;
		font-size: 24px;
		font-weight: bolder;
		line-height: 30px;
		color:#F79B25;
	}
	blockquote p a{font-size: 14px;font-weight: normal;color:gray;margin-left: 10px;}
	table.table td{
		padding:4px;
		text-align:center;
	}
	table.table th{
		text-align:center;
	}
	.table-striped tbody tr.highlight td
	{
		background-color: #E7F0C2;
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

	.table-striped tbody tr.highlight td
	{
		background-color: #fcf8e3;
	}
	blockquote + div.block-body{
		min-height: 0;
	}
	h4{border-bottom:1px solid gray;}
	#modal-orders i{margin-left:4px;color:#08c;}

	<{if $p}>
      /* 隐藏头,右侧,内容头部 */
	  body{background: none;}

	  .sidebar-nav { display:none; }
	  .sidebar-nav{width:0;}
	  .content{margin-left: 0;}
	<{/if}>

</style>

<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#customerInfo" data-toggle="tab">填写客户信息</a></li>
	<{if $user_info.user_group==4}>
		<li class="brand pull-right"><p class="navbar-text">责任人:  <{$user_info.real_name}></p></li>
	<{/if}>
</ul>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane active in" id="customerInfo">
		<form class="form-horizontal" id="customer-form" data-async method="post" action="<{$smarty.const.ADMIN_URL}>/ajax/crms.php">
			<input type="hidden" name="method" value="ajax_addCustomer" />
			<blockquote>
				<p>1. 基本信息<a href="#base_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
			</blockquote>
			<div id="base_info" class="block-body collapse in">        	
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label"><em>*</em>姓名</label>
							<div class="controls">
								<input type="text" name="name" class="input-medium" required="true" value="" /> 
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">性别</label>
							<div class="controls">
								<{html_options name=sex id="DropDownSex" class="input-medium" options=$sex_options }>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">出生日期</label>
							<div class="controls">
								<div class="datetimepicker input-prepend input-append date" id="datetimepicker0">
									<input type="text" name="birthday" id="birthday" data-format="yyyy-MM-dd" value="" class="input-small" required="true"></input>
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
								<input type="text" name="address" value="" class="input span10" required="true" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">客户来源</label>
							<div class="controls">
								<{html_options name='source' class="input-medium" required="true" options=$source_options }>
							</div>
						</div>
					</div>
				</div>		
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group info">
							<label class="control-label"><em>*</em>联系电话</label>
							<div class="controls">
								<input type="text" class="input-medium" name="mobile" value="<{if $cometel!=''}><{$cometel|substr_replace:'****':'3':'-1'}><{/if}>" required="true"  />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">联系电话2</label>
							<div class="controls">
								<input type="text" class="input-medium" name="telphone" value="" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">介绍人</label>
							<div class="controls">
								<input type="text" class="input-medium" name="referrals" value="" />
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">职业</label>
							<div class="controls">
								<input type="text" name="health_profession" value="" class="input-medium" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">收入情况</label>
							<div class="controls">
								<{html_options name=income id="DropDownIncome" class="input-medium" options=$income_options }>
							</div>
						</div>
					</div>	
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">联系人</label>
							<div class="controls">
								<input type="text" name="link_man" value="" class="input-medium" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">关系</label>
							<div class="controls">
								<{html_options name=link_relation id="DropDownLinkRelation" class="input-medium" options=$linkrelation_options }>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">联系人电话</label>
							<div class="controls">
								<input type="text" name="link_phone" class="input-medium" value="" />
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">性格类型</label>
							<div class="controls">
								<{html_options name=personality_type class="input-medium" options=$personalitytype_options }>
							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">性格特点</label>
							<div class="controls">
								<{html_options name="personality_traits[]" id="DropDownpt" class="selectpicker" multiple="true" data-container="body" options=$personalitytraits_options title="请描述性格特点" }>
							</div>
						</div>
					</div>
				</div>
			</div>
			<blockquote>
				<p>2. 饮食情况<a href="#diet_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
			</blockquote>
			<div id="diet_info" class="block-body collapse in">  
				<div class="row-fluid">
					<div class="span12">
						<div class="control-group">
							<label class="control-label">正餐情况</label>
							<div class="controls">
								<{html_options name="diet_foods[]" class="selectpicker" multiple="true" data-container="body" title="请描述正餐情况" options=$dietfoods_options }>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">偏好</label>
							<div class="controls">
								<{html_options name=diet_preference class="input-medium" options=$dietpreference_options }>
							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">嗜好</label>
							<div class="controls">
								<{html_options name="diet_hobby[]" class="selectpicker" multiple="true" data-container="body" title="请描述嗜好情况" options=$diethobby_options }>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">口味</label>
							<div class="controls">
								<{html_options name=diet_preference class="input-medium" options=$diettaste_options }>
							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">非主食情况</label>
							<div class="controls">
								<{html_options name="diet_snacks[]" class="selectpicker" multiple="true" data-container="body" title="请描述非主食情况" options=$dietsnacks_options }>
							</div>
						</div>
					</div>
				</div>
			</div>
			<blockquote>
				<p>3. 健康信息<a href="#health_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a></p>
			</blockquote>
			<div id="health_info" class="block-body collapse in">  
				<div class="row-fluid">
					<div class="span2">
						<div class="control-group">
							<label class="control-label">身高(cm)</label>
							<div class="controls">
								<div class="input-append spinner" data-trigger="spinner" id="price">
									<input type="text" value="" data-min="100" data-min="250" data-step="5" name="health_height" class="input-mini">
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
								<input type="text" name="health_body_weight" value="" class="input-mini" pattern="\d+(.[0-9]{1,2})?" title="数字(可带两位小数)" />
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">劳动强度</label>
							<div class="controls">
								<{html_options name=labor_intensity class="input-medium" options=$laborintensity_options }>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">BMI(体质指数)</label>
							<div class="controls">
								<span class="input uneditable-input input-underline" id="bmi"></span>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">肥胖程度</label>
							<div class="controls">
								<div class="input-append spinner" data-trigger="spinner">
									<span class="input uneditable-input input-underline" id="bmi2"></span>
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
								<input type="text" name="health_blood_pressure" value="" class="input-mini" title="数字 [舒张压(低)]" pattern="\d*" /><span> / </span><input type="text" name="health_blood_pressure_height" value="" class="input-mini" title="数字 [收缩压(高)]" pattern="\d*" /><span> mmHg</span>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">血糖</label>
							<div class="controls">
								<input type="text" name="health_gi_preprandial" value="" class="input-mini" title="餐前" pattern="\d*" /><span> / </span><input type="text" name="health_gi_postprandial" value="" class="input-mini" title="餐后" pattern="\d*" /><span> mol/L</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">疾病</label>
							<div class="controls">
								<input type="text" name="health_diagnosis" id="health_diagnosis" value="" class="input-large" />
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<label class="control-label">确诊时间</label>
							<div class="controls">
								<div class="datetimepicker input-prepend input-append date">
									<input type="text" name="health_diagnosis_time" id="health_diagnosis_time" data-format="yyyy-MM-dd" value="" class="input-small" disabled="true"></input>
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
								<textarea name="health_diagnosis_other" rows="3" class="input-large"></textarea>
								<p class="help-block"> 不支持HTML代码</p>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">症状描述</label>
							<div class="controls">
								<textarea name="health_symptom" rows="3" class="input-xlarge"></textarea>
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
								<input type="text" name="health_anomaly_indicators" value="" class="input-large" />
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">曾用药</label>
							<div class="controls">
								<input type="text" name="health_had_medication" value="" class="input-large" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary" id="postme"><strong>保存</strong></button>
				<a class="btn" href="customers.php">返回</a>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		if($('#birthday').val()){
			$('#age').html(calAgeByBirthday($('#birthday').val())+'岁');
		}
		$('#datetimepicker0').on('changeDate', function(e) {
			var d = e.localDate.toString("yyyy-MM-dd");	
			$('#age').html(calAgeByBirthday(d)+'岁');
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
								//成功则隐藏“保存”按钮，防止再次保存
                                $('#postme').hide();
							}
							window.setTimeout(function(){
								bootbox.hideAll();
							}, 2000);
						});
				}
			});
			event.preventDefault();
		});
		$('#health_diagnosis').on('change',function(event){
			if($(this).val()!=''){
				$('#health_diagnosis_time').attr('disabled',false);
			}else{
				$('#health_diagnosis_time').attr('disabled',true);
			}
		});
		//初始化和绑定插件事件
		$('.selectpicker').selectpicker();
		//日期时间选择器
		$('.datetimepicker').datetimepicker({
			language: 'zh-CN',
			pickTime: false
		});	

		$('blockquote a').on('click',function(){
			if($(this).hasClass('collapsed')){
				$(this).find('i').removeClass().addClass('icon-chevron-down');
			}else{
				$(this).find('i').removeClass().addClass('icon-chevron-up');
			}
		});
	});

</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>
