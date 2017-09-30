<?php /* Smarty version Smarty-3.1.15, created on 2016-03-23 22:18:47
         compiled from "D:\Server\www\crms\include\template\crms\customer_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203256f2a5c730a310-52771765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '185087e90ae6de7937568ee4267c468b6cad8d26' => 
    array (
      0 => 'D:\\Server\\www\\crms\\include\\template\\crms\\customer_modify.tpl',
      1 => 1432222390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203256f2a5c730a310-52771765',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'p' => 0,
    'customer' => 0,
    'saler_options_list' => 0,
    'sex_options' => 0,
    'source_options' => 0,
    'user_info' => 0,
    'income_options' => 0,
    'linkrelation_options' => 0,
    'personalitytype_options' => 0,
    'personalitytraits_options' => 0,
    'dietfoods_options' => 0,
    'dietpreference_options' => 0,
    'diethobby_options' => 0,
    'diettaste_options' => 0,
    'dietsnacks_options' => 0,
    'laborintensity_options' => 0,
    'bmi' => 0,
    'bmin' => 0,
    'salelogs' => 0,
    'sale' => 0,
    'readonly' => 0,
    'customertype_options' => 0,
    'op_disabled' => 0,
    'orders' => 0,
    'order' => 0,
    'ordersstatus_options' => 0,
    'ordersId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_56f2a5c7556e46_90700653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f2a5c7556e46_90700653')) {function content_56f2a5c7556e46_90700653($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\Server\\www\\crms\\include\\config/../../include/lib/Smarty/plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

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
	    z-index: 500;
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

    .btn-group small.btn{padding:4px 6px;}
    .popover{
        z-index:1060;
        width:520px;
        min-height:300px;
        overflow:auto;
    }

	<?php if ($_smarty_tpl->tpl_vars['p']->value) {?>
      /* 隐藏头,右侧,内容头部 */
	  body{background: none;}

	  .sidebar-nav { display:none; }
	  .sidebar-nav{width:0;}
	  .content{margin-left: 0;}
	<?php }?>
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
		<form class="form-horizontal" id="customer-form" data-async method="post" action="<?php echo @constant('ADMIN_URL');?>
/ajax/crms.php">
			<input type="hidden" name="method" value="ajax_updateCustomer" />
			<input type="hidden" name="customerId" id="customerId" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
">
			<a class="anchor-fix" name="baseinfo_anchor"></a>
			<blockquote>
				<p>1. 基本信息 <a href="#base_info" data-toggle="collapse"><i class="icon-chevron-down"></i> </a><span class="pull-right">责任人:  <?php echo $_smarty_tpl->tpl_vars['saler_options_list']->value[$_smarty_tpl->tpl_vars['customer']->value['vested']];?>
</span></p>
			</blockquote>
			<div id="base_info" class="block-body collapse in">        	
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label"><em>*</em>姓名</label>
							<div class="controls">
								<input type="text" name="name" class="input-medium" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
" required="true" /> 
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">性别</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'sex','id'=>"DropDownSex",'class'=>"input-medium",'options'=>$_smarty_tpl->tpl_vars['sex_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['sex']),$_smarty_tpl);?>

							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">出生日期</label>
							<div class="controls">
								<div class="datetimepicker input-prepend input-append date" id="datetimepicker0">
									<input type="text" name="birthday" id="birthday" data-format="yyyy-MM-dd" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customer']->value['birthday'],'%Y-%m-%d');?>
" class="input-small"></input>
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
								<input type="text" name="address" id="address" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['address'];?>
" class="input span12" required="true" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">客户来源</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'source','class'=>"input-small",'options'=>$_smarty_tpl->tpl_vars['source_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['source']),$_smarty_tpl);?>

							</div>
						</div>
					</div>
				</div>		
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group info">
							<label class="control-label"><em>*</em>联系电话</label>
							<div class="controls">
								<div class="input-append">
									<input type="text" class="input-medium" name="mobile_0" id="mobile_0" required="true" <?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']!=1) {?>readonly="true"<?php }?> value="<?php echo substr_replace($_smarty_tpl->tpl_vars['customer']->value['mobile'],'****','3','-1');?>
" rel="tooltip" title="双击此处'电话号码'即可外拨电话!" /><input type="hidden" name="mobile" id="mobile"  value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['mobile'];?>
" />
									<span class="add-on btn send-sms" title="给此号码发送短信" data-value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['mobile'];?>
"><i class="icon-envelope"></i> </span>
								</div>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">联系电话2</label>
							<div class="controls">
								<div class="input-append">
									<input type="text" class="input-medium" name="telphone_0" id="telphone_0" <?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']!=1) {?>readonly="true"<?php }?> value="<?php echo substr_replace($_smarty_tpl->tpl_vars['customer']->value['telphone'],'****','3','-1');?>
" rel="tooltip" title="双击此处'电话号码'即可外拨电话!" /><input type="hidden" name="telphone" id="telphone" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['telphone'];?>
" />
									<span class="add-on btn send-sms" title="给此号码发送短信" data-value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['telphone'];?>
"><i class="icon-envelope"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">介绍人</label>
							<div class="controls">
								<input type="text" class="input-small" name="referrals" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['referrals'];?>
" />
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">职业</label>
							<div class="controls">
								<input type="text" name="health_profession" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_profession'];?>
" class="input-medium" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">收入情况</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'income','id'=>"DropDownIncome",'class'=>"input-medium",'options'=>$_smarty_tpl->tpl_vars['income_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['income']),$_smarty_tpl);?>

							</div>
						</div>
					</div>	
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">联系人</label>
							<div class="controls">
								<input type="text" name="link_man" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['link_man'];?>
" class="input linkgroup" />
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group">
							<label class="control-label">关系</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'link_relation','id'=>"DropDownLinkRelation",'class'=>"input linkgroup",'options'=>$_smarty_tpl->tpl_vars['linkrelation_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['link_relation']),$_smarty_tpl);?>

							</div>
						</div>
					</div>
					<div class="span4">
						<div class="control-group info">
							<label class="control-label">联系人电话</label>
							<div class="controls">
								<input type="text" name="link_phone" id="link_phone" class="input-small linkgroup" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['link_phone'];?>
" <?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']!=1) {?>readonly="true"<?php }?> rel="tooltip" title="双击此处'电话号码'即可外拨电话!" />
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">性格类型</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'personality_type','class'=>"input-medium",'options'=>$_smarty_tpl->tpl_vars['personalitytype_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['personality_type']),$_smarty_tpl);?>

							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">性格特点</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>"personality_traits[]",'id'=>"DropDownpt",'class'=>"selectpicker",'multiple'=>"true",'data-container'=>"body",'title'=>"请描述性格特点",'options'=>$_smarty_tpl->tpl_vars['personalitytraits_options']->value,'selected'=>explode(',',$_smarty_tpl->tpl_vars['customer']->value['personality_traits'])),$_smarty_tpl);?>

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
								<?php echo smarty_function_html_options(array('name'=>"diet_foods[]",'class'=>"selectpicker",'multiple'=>"true",'data-container'=>"body",'title'=>"请描述正餐情况",'options'=>$_smarty_tpl->tpl_vars['dietfoods_options']->value,'selected'=>explode(',',$_smarty_tpl->tpl_vars['customer']->value['diet_foods'])),$_smarty_tpl);?>

							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">偏好</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'diet_preference','class'=>"input-medium",'options'=>$_smarty_tpl->tpl_vars['dietpreference_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['diet_preference']),$_smarty_tpl);?>

							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">嗜好</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>"diet_hobby[]",'class'=>"selectpicker",'multiple'=>"true",'data-container'=>"body",'title'=>"请描述嗜好情况",'options'=>$_smarty_tpl->tpl_vars['diethobby_options']->value,'selected'=>explode(',',$_smarty_tpl->tpl_vars['customer']->value['diet_hobby'])),$_smarty_tpl);?>

							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<div class="control-group">
							<label class="control-label">口味</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'diet_preference','class'=>"input-medium",'options'=>$_smarty_tpl->tpl_vars['diettaste_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['diet_preference']),$_smarty_tpl);?>

							</div>
						</div>
					</div>
					<div class="span8">
						<div class="control-group">
							<label class="control-label">非主食情况</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>"diet_snacks[]",'class'=>"selectpicker",'multiple'=>"true",'data-container'=>"body",'title'=>"请描述非主食情况",'options'=>$_smarty_tpl->tpl_vars['dietsnacks_options']->value,'selected'=>explode(',',$_smarty_tpl->tpl_vars['customer']->value['diet_snacks'])),$_smarty_tpl);?>

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
									<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_height'];?>
" data-min="100" data-min="250" data-step="5" name="health_height" class="input-mini">
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
								<input type="text" name="health_body_weight" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_body_weight'];?>
" class="input-mini" pattern="\d+(.[0-9]{1,2})?" title="数字(可带两位小数)" />
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">劳动强度</label>
							<div class="controls">
								<?php echo smarty_function_html_options(array('name'=>'labor_intensity','class'=>"input-medium",'options'=>$_smarty_tpl->tpl_vars['laborintensity_options']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['labor_intensity']),$_smarty_tpl);?>

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
								<?php if (!isset($_smarty_tpl->tpl_vars['bmi'])) $_smarty_tpl->tpl_vars['bmi'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['bmi']->value = ($_smarty_tpl->tpl_vars['customer']->value['health_body_weight']/pow($_smarty_tpl->tpl_vars['customer']->value['health_height']/100,2))<18.5) {?>&lt;18.5<?php $_smarty_tpl->tpl_vars['bmin'] = new Smarty_variable("过低", null, 0);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['bmi']->value<23.9) {?>18.5-23.9<?php $_smarty_tpl->tpl_vars['bmin'] = new Smarty_variable('正常', null, 0);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['bmi']->value<26.9) {?>&gt;24-26.9<?php $_smarty_tpl->tpl_vars['bmin'] = new Smarty_variable('超重', null, 0);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['bmi']->value<29.9) {?>27-29.9<?php $_smarty_tpl->tpl_vars['bmin'] = new Smarty_variable('Ⅰ度肥胖', null, 0);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['bmi']->value>30&&$_smarty_tpl->tpl_vars['bmi']->value<40) {?>≥30<?php $_smarty_tpl->tpl_vars['bmin'] = new Smarty_variable('Ⅱ度肥胖', null, 0);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['bmi']->value>40) {?>≥40<?php $_smarty_tpl->tpl_vars['bmin'] = new Smarty_variable('Ⅲ度肥胖', null, 0);?>
								<?php }?>
								</span>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">肥胖程度</label>
							<div class="controls">
								<div class="input-append spinner" data-trigger="spinner">
									<span class="input uneditable-input input-underline" id="bmi2"><?php echo $_smarty_tpl->tpl_vars['bmin']->value;?>
</span>
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
								<input type="text" name="health_blood_pressure" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_blood_pressure'];?>
" class="input-mini" pattern="\d*" /> / <input type="text" name="health_blood_pressure_height" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_blood_pressure_height'];?>
" class="input-mini" pattern="\d*" /><span>mmHg</span>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">血糖</label>
							<div class="controls">
								<span>餐前 </span><input type="text" name="health_gi_preprandial" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_gi_preprandial'];?>
" class="input-mini" pattern="\d*" /> / <span>餐后 </span><input type="text" name="health_gi_postprandial" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_gi_postprandial'];?>
" class="input-mini" pattern="\d*" /><span>mol/L</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span5">
						<div class="control-group">
							<label class="control-label">疾病</label>
							<div class="controls">
								<input type="text" name="health_diagnosis" id="health_diagnosis" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_diagnosis'];?>
" class="input-large" />
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<label class="control-label">确诊时间</label>
							<div class="controls">
								<div class="datetimepicker input-prepend input-append date">
									<input type="text" name="health_diagnosis_time" id="health_diagnosis_time" data-format="yyyy-MM-dd" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['customer']->value['health_diagnosis_time'],'%Y-%m-%d');?>
" class="input-small"></input>
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
								<textarea name="health_diagnosis_other" rows="3" class="input-large"><?php echo $_smarty_tpl->tpl_vars['customer']->value['health_diagnosis_other'];?>
</textarea>
								<p class="help-block"> 不支持HTML代码</p>
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">症状描述</label>
							<div class="controls">
								<textarea name="health_symptom" rows="3" class="input-xlarge"><?php echo $_smarty_tpl->tpl_vars['customer']->value['health_symptom'];?>
</textarea>
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
								<input type="text" name="health_anomaly_indicators" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_anomaly_indicators'];?>
" class="input-large" />
							</div>
						</div>
					</div>
					<div class="span7">
						<div class="control-group">
							<label class="control-label">曾用药</label>
							<div class="controls">
								<input type="text" name="health_had_medication" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_had_medication'];?>
" class="input-large" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="btn-toolbar" style="padding-left:60px;">
			<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']==1||$_smarty_tpl->tpl_vars['customer']->value['vested']==$_smarty_tpl->tpl_vars['user_info']->value['user_id']) {?>
				<button type="submit" class="btn btn-primary" id="postme"><strong>修改</strong></button>
				<a class="btn" href="customers.php">返回</a>
			<?php }?>
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
							<?php  $_smarty_tpl->tpl_vars['sale'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sale']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salelogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sale']->key => $_smarty_tpl->tpl_vars['sale']->value) {
$_smarty_tpl->tpl_vars['sale']->_loop = true;
?>				 
							<tr>
								<td class="hide"><?php echo $_smarty_tpl->tpl_vars['sale']->value['id'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['sale']->value['sale_date'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['sale']->value['sale_content'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['sale']->value['sale_analysis'];?>
</td>
								<td>[<?php echo $_smarty_tpl->tpl_vars['sale']->value['sale_effect'];?>
] <?php echo $_smarty_tpl->tpl_vars['sale']->value['remark'];?>
</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="span4">
					<h4> 沟通记录:</h4>
					<form data-async action="<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php" method="post" name="form2" id="salelog-form" data-target="salelog_list">
						<label>沟通简要</label>	
						<textarea class="input input-xlarge" name="sale_content" id="sale_content" rows="3" required="true"></textarea>
						<label>客户分析</label>	
						<textarea class="input input-xlarge" name="sale_analysis" id="sale_analysis" rows="2"></textarea>
						<label>备注</label>	
						<textarea class="input input-xlarge" name="remark" id="remark" rows="1"></textarea>
						<label>沟通情况</label>
						<?php echo smarty_function_html_options(array('name'=>"customer_type",'id'=>"customer_type",'title'=>"请描述本次沟通情况",'readonly'=>$_smarty_tpl->tpl_vars['readonly']->value,'options'=>$_smarty_tpl->tpl_vars['customertype_options']->value,'strict'=>'1','odisabled'=>$_smarty_tpl->tpl_vars['op_disabled']->value,'selected'=>$_smarty_tpl->tpl_vars['customer']->value['type']),$_smarty_tpl);?>

						<input type="hidden" name="method" id="method" value="ajax_addSaleLog" />
						<input type="hidden" name="sale_id" id="saleId" value="" />
						<div class="btn-toolbar">
						<?php if ($_smarty_tpl->tpl_vars['customer']->value['vested']==$_smarty_tpl->tpl_vars['user_info']->value['user_id']) {?>
							<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
							<input type="reset" class="btn" value="取消" />
							<a href="" class="btn hide" id="btn-addOrders"><i class="icon-plus-sign"></i> 新增订购 </a>
						<?php }?>
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
			<div class="block-heading"><strong><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</strong> 最近10次消费记录:
				<span class="pull-right btn-group ctl-group">
				<?php if ($_smarty_tpl->tpl_vars['customer']->value['vested']==$_smarty_tpl->tpl_vars['user_info']->value['user_id']) {?>
					<small class="btn hide" id="orders_add" style="display:inline;"><i class="icon-plus-sign"></i> 新增订购</small>
					<small class="btn hide" id="orders_modify"><i class="icon-edit"></i> 修改</small>
					<small class="btn hide" id="orders_cancel"><i class="icon-ban-circle"></i> 取消</small>
					<small class="btn hide" id="orders_process "><i class="icon-ok-circle"></i> 确认订单</small>
					<!-- small class="btn" id="orders_remove"><i class="icon-trash"></i> 删除</small -->
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['user_info']->value['user_group']=='5') {?>
					<small class="btn hide" id="orders_additem"><i class="icon-wrench"></i> 组方</small>
				<?php }?>
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
					<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>				 
					<tr>
						<td class="hide"><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['order']->value['orders_no'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['order']->value['orders_date'];?>
</td>
						<td><small class="btn btn-link oitem-view" data-url="orders_verify.php?a=view&customerId=<?php echo $_smarty_tpl->tpl_vars['order']->value['customer_id'];?>
&ordersId=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" title= "查看订单明细"><?php echo $_smarty_tpl->tpl_vars['order']->value['orders_title'];?>
</small></td>
						<td><?php echo $_smarty_tpl->tpl_vars['order']->value['orders_num'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['order']->value['payment_sum'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['order']->value['gift'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['ordersstatus_options']->value[$_smarty_tpl->tpl_vars['order']->value['status']];?>
</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	var status_array = <?php echo json_encode($_smarty_tpl->tpl_vars['ordersstatus_options']->value);?>
;

    //订单物流状态跟踪
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
                    url: '<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php',
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
	//发短信
	function openModalforSendSMS(url){
		var btn = [{"label" : "关闭"}];
		btn = [{
			"label" : "发送",
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
			// 产品change事件
			bbd.find('#product_id').on('change',function(){
				var pName = $(this).find('option:selected').text();
				$('#productName').val(pName);
				var pSpec = $(this).find('option:selected').attr('data-spec');
				$('#item_spec').val(pSpec);
			});
	}});
	}

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
		var url = "<?php echo @constant('ADMIN_URL');?>
/crms/orders_"+action+".php";

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
				bbd.find('#orders_tel_0').on('change',function(){ //隐藏电话号码后面4位,以"*"代替
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
		$(":radio[name='health_has_biochemical_indicators'][value='<?php echo $_smarty_tpl->tpl_vars['customer']->value['health_has_biochemical_indicators'];?>
']").attr('checked',true);
	}

	var currentOrdersId = '<?php echo $_smarty_tpl->tpl_vars['ordersId']->value;?>
';
	var current_user_id = '<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
';
	var vested = '<?php echo $_smarty_tpl->tpl_vars['customer']->value['vested'];?>
';
	var userGroup = '<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_group'];?>
';

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
						url: "<?php echo @constant('ADMIN_URL');?>
/ajax/orders.php",
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

		//短信发送
		$('span.send-sms').on('click',function(){
			if($(this).attr('data-value')==''){
				bootbox.alert("对方号码不是一个正确的手机号码，不能发送手机短信息！");
				return;
			}
			var sendTo = $(this).attr('data-value') ;
			var url = "sms_send.php?sendTo="+sendTo;
			openModalforSendSMS(url);
			return false;
		});

        //查看订单状态
        var cusName = '<?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
';
        $('.oitem-view').on('click',function(){
            var url = $(this).attr('data-url') ;
            var _title = cusName;
            openModalforProcess(url,_title);
        });
	});

</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
