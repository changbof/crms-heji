<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<style>
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
        width: 80px;
        border-left: 1px solid #cecece;
        border-bottom: 1px solid #cecece;
        padding: 4px 10px;
        text-shadow: 0 1px 0 #fff;
    }
    ul.fast-bar > li:hover {
        background: #fff;
    }

</style>

<ul class="fast-bar">
    <li><a href="#pathology_anchor">1.病因病理</a></li>
    <li><a href="#casetype_anchor">2.疾病类型</a></li>
    <li><a href="#symptom_anchor">3.症状体征</a></li>
    <li><a href="#complication_anchor">4.并发疾病</a></li>
    <li><a href="#drug_anchor">5.常用药物</a></li>
    <li><a href="#dietcare_anchor">6.饮食保健</a></li>
    <li><a href="#precautions_anchor">7.建议事项</a></li>
    <li><a href="#nutrients_anchor">8.必须营养素</a></li>
</ul>
<div class="well">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#home" data-toggle="tab">请填写知识库信息</a></li>
	</ul>	
	
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active in" id="home">

			<form id="tab" method="post" action="" class="form-horizontal">
				<div class="row-fluid">
					<div class="span6">
						<label>病症名称</label>
						<input name="disease_name" class="input input-xlarge" value="<{$_POST.disease_name}>" autofocus="true" required="true" />
					</div>
                    <div class="span6">
                        <label>别名 <span class="label label-info"> 不支持HTML代码</span></label>
                        <input name="disease_alias" class="input input-xlarge" value="<{$_POST.disease_alias}>" />
                    </div>
				</div>
                <div class="row-fluid">
                    <div class="span6">
                        <label>病症类型</label>
                        <input name="disease_type" class="input input-xlarge" value="<{$_POST.disease_type}>" />
                    </div>
                    <div class="span6">
                        <label>就诊科室 <span class="label label-info"> 不支持HTML代码</span></label>
                        <input name="therapy_department" rows="3" class="input-xlarge" value="<{$_POST.therapy_department}>" />
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <label>概述 <span class="label label-info"> 不支持HTML代码</span></label>
                        <textarea name="disease_introduction" rows="3" class="span11" required="true"><{$_POST.disease_introduction}></textarea>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <label>概述 <span class="label label-info"> 不支持HTML代码</span></label>
                        <textarea name="disease_introduction" rows="3" class="input-xlarge" required="true"><{$_POST.disease_introduction}></textarea>
                    </div>
                </div>
				<div class="row-fluid">
					<div class="span6">
						<label>病因病理 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_pathology" rows="3" class="input-xlarge" required="true"><{$_POST.disease_pathology}></textarea>
					</div>
					<div class="span6">
						<label>预后 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_prognostic" rows="3" class="input-xlarge"><{$_POST.disease_prognostic}></textarea>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span6">
						<label>表现症状 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_symptom" rows="3" class="input-xlarge" required="true"><{$_POST.disease_symptom}></textarea>
					</div>
					<div class="span6">
						<label>并发症 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_complication" rows="3" class="input-xlarge"><{$_POST.disease_complication}></textarea>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<label>药物治疗</label>
						<textarea name="disease_drug" rows="3" class="input-xlarge" required="true"><{$_POST.disease_drug}></textarea>
					</div>
					<div class="span6">
						<label>其他治疗方式</label>
						<textarea name="disease_therapy" rows="3" class="input-xlarge"><{$_POST.disease_therapy}></textarea>
					</div>
				</div>
                <div class="row-fluid">
                    <div class="span12">
                        <label>饮食保健 <span class="label label-info"> 不支持HTML代码</span></label>
                        <textarea name="disease_dietcare" rows="3" class="span11" required="true"><{$_POST.disease_dietcare}></textarea>
                    </div>
                </div>
				<div class="row-fluid">
					<div class="span6">
						<label>常规检查项目</label>
						<textarea name="disease_check" rows="3" class="input-xlarge"><{$_POST.disease_check}></textarea>
					</div>
					<div class="span6">
						<label>推荐医院及科室\专家\电话</label>
						<textarea name="rec_hospital" rows="3" class="input-xlarge"><{$_POST.rec_hospital}></textarea>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<label>必需营养素及作用 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="nutrients_effect" rows="3" class="input-xlarge" required="true"><{$_POST.nutrients_effect}></textarea>
					</div>
					<div class="span6">
						<label>建议事项 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="precautions" rows="3" class="input-xlarge" maxlengh="300"><{$_POST.precautions}></textarea>
					</div>
				</div>
				<div class="btn-toolbar">
					<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				</div>
			</form>
		</div>
	</div>
</div>	
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>