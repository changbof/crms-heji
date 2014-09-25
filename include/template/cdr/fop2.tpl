<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 - -->

<div class="well" style="border:none;">
	<div id="myCarousel" class="">
		
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var bro=$.browser;
		var fop2='<div class="item" id="fop2">'+
				 ' <iframe src="http://192.168.6.189/fop2/?exten=8001&pass=jz0203" width="100%" frameborder="0" height="800px"></iframe>'+
			     ' </div> ';
		if(!bro.msie) {
			$('#myCarousel').append(fop2);
		};
	});
</script>

<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>
