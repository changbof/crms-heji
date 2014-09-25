<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>

<div class="">
	<form class="form_search" action="" method="GET" style="margin-bottom:0px" id="cdr-misslist-form">
        <div style="float:left;margin-right:5px;padding-top:25px;padding-bottom:0px;margin-bottom:0px">
            <label class="radio inline">
                <input type="radio" name="type" value="missed" <{if $_GET.type=='missed'}>checked="true"<{/if}>> 未接通
            </label>
            <label class="radio inline">
                <input type="radio" name="type" value="answer" <{if $_GET.type=='answer'}>checked="true"<{/if}>> 已接通
            </label>
        </div>
		<div style="float:left;margin-right:5px">
			<label>电话号码</label>
			<input type="text" name="keyword" id="keyword" class="input-medium" value="<{$_GET.keyword}>" />
		</div>
		<div style="float:left;margin-right:5px">
			<label>通话时间: 从</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="sdate" value="<{$sdate}>" class="input-medium"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
		<div style="float:left;margin-right:5px">
			<label>到</label>
			<div class="input-append datetimepicker" >
				<input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="edate" value="<{$edate}>" class="input-medium"></input>
				<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				</span>
			</div>
		</div>
        <div style="float:left;margin-right:5px;padding-top:25px;padding-bottom:0px;margin-bottom:0px">
            <label class="checkbox inline"><input name="duration" type="checkbox" value="90" <{if $_GET.duration==90}> checked="checked"<{/if}> />通话时长大于90秒?</label>
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

		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>通话时间</th>
					<th>主叫号码</th>
					<th>被叫号码/分机</th>
					<th>通话时长</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>							  
				<{foreach from=$myMisses name=myMiss item=myMiss}>
				<tr>
					<td><{$start+1 + $smarty.foreach.myMiss.index}></td>
					<td><{$myMiss.calldate}></td>
					<td><{if $user_info.user_group==1}><{$myMiss.src}><{else}><{if $myMiss.src|mb_strlen <5}><{$myMiss.src}><{else}><{$myMiss.src|substr_replace:'****':'3':'-1'}><{/if}><{/if}></td>
					<td><{if $user_info.user_group!=1}><{$myMiss.dst}><{else}><{if $myMiss.dst|mb_strlen <5}><{$myMiss.dst}><{else}><{$myMiss.dst|substr_replace:'****':'3':'-1'}><{/if}><{/if}></td>
					<td><{$myMiss.duration}></td>
					<td><a href="#" onclick="autoDial('<{$myMiss.src}>');return false;" title="回拨"><i class="icon-share-alt"></i> </a>
					</td>
				</tr>
				<{/foreach}>
			</tbody>
		</table> 
		<!-- START 分页模板 -->
		<{$page_html}>
		<!-- END 分页-->			   
	</div>
</div>
<script type="text/javascript">
	$('.datetimepicker').datetimepicker({
		language: 'zh-CN'
	});
</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>