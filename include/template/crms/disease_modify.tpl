<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->
<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<style type="text/css">
	#ht{line-height:20px;font-size: 3em;font-weight: bolder;margin-top:5px; }
	.disease-form label{font-weight: bold;margin-top: 10px;}

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

	<{if $p}>
      /* 隐藏头,右侧,内容头部 */
	  body{background: none;}
	  .sidebar-nav { display:none; }
	  .sidebar-nav{width:0;}
	  .content{margin-left: 0;}
	<{/if}>
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
      <li class="active  pull-right"><a href="#home" data-toggle="tab">编辑知识库信息</a></li>
      <small class=""><h2 id="ht"><{$disease.disease_name}></h2></small>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" class="disease-form">
           		<input type="hidden" name="disease_id" value="<{$disease.id}>" />
           		<input type="hidden" name="disease_name" value="<{$disease.disease_name}>" />
               <div class="row-fluid">
                   <div class="span2">
                       <img src="<{$smarty.const.ADMIN_URL}>/assets/images/140x140.gif" />
                   </div>
                   <div class="span10">
                       <textarea name="disease_introduction" rows="6" class="span12" required="true"><{$disease.disease_introduction}></textarea>
                   </div>
               </div>
				<div class="row-fluid">
					<div class="span12">
                        <a class="anchor-fix" name="pathology_anchor"></a>
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