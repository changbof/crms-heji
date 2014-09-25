<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<style type="text/css">
	#ht{line-height:20px;font-size: 3em;font-weight: bolder;margin-top:5px; }
	.disease-form label{font-weight: bold;margin-top: 10px;}
	<{if $p}>
      /* 隐藏头,右侧,内容头部 */
	  body{background: none;}
	  .sidebar-nav { display:none; }
	  .sidebar-nav{width:0;}
	  .content{margin-left: 0;}
	<{/if}>
</style>
<div class="well">
    <ul class="nav nav-tabs">
      <small class="pull-right"><h2 id="ht"><{$disease.disease_name}></h2></small>
      <li class="active"><a href="#home" data-toggle="tab">编辑知识库信息</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" class="disease-form">
           		<input type="hidden" name="disease_id" value="<{$disease.id}>" />
           		<input type="hidden" name="disease_name" value="<{$disease.disease_name}>" />
				<div class="row-fluid">
					<div class="span12">
						<label>病因病理 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_pathology" class="span12" required="true"><{$disease.disease_pathology}></textarea>
						<label>预后 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_prognostic" class="span12"><{$disease.disease_prognostic}></textarea>
						<label>表现症状 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_symptom" class="span12" required="true"><{$disease.disease_symptom}></textarea>
						<label>并发症 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="disease_complication" class="span12"><{$disease.disease_complication}></textarea>
						<label>药物治疗</label>
						<textarea name="disease_drug" class="span12" required="true"><{$disease.disease_drug}></textarea>
						<label>其他治疗方式</label>
						<textarea name="disease_therapy" class="span12"><{$disease.disease_therapy}></textarea>
						<label>常规检查项目</label>
						<textarea name="disease_check" class="span12"><{$disease.disease_check}></textarea>
						<label>推荐医院及科室\专家\电话</label>
						<textarea name="rec_hospital" class="span12"><{$disease.rec_hospital}></textarea>
						<label>必需营养素及作用 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="nutrients_effect" class="span12" required="true"><{$disease.nutrients_effect}></textarea>
						<label>建议事项 <span class="label label-info"> 不支持HTML代码</span></label>
						<textarea name="precautions" class="span12" maxlengh="300"><{$disease.precautions}></textarea>
					</div>
				</div>
				<div class="btn-toolbar">
					<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				</div>
			</form>
        </div>
    </div>
</div>
<script type="text/javascript">
	var a = '<{$a}>';
	$(document).ready(function() {
		if(a=='view'){
			$(':input').attr('readonly','true');
			$('.btn-toolbar').hide();
		}
		$('textarea').autosize();
	});

</script>
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>