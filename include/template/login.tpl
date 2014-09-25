<{include file = "simple_header.tpl"}>
 <script> if(self!=top){ window.open(self.location,'_top'); } </script>
  <body class="simple_body"> 
  <!--<![endif]-->
    
  <div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
        </ul>
        <a class="brand" href="<{$smarty.const.ADMIN_URL}>/index.php"><span class="first"><{$smarty.const.COMPANY_NAME}></span> <span class="second"><{$smarty.const.ADMIN_TITLE}></span></a>
    </div>
</div>
<div>
<div class="container-fluid">	    
    <div class="row-fluid">	
	
    <div class="dialog">
		<{$osadmin_action_alert}>	
        <div class="block">
            <p class="block-heading">登入</p>
            <div class="block-body">
                <form name="loginForm" method="post" action="">
                    <label>账号</label>
                    <input type="text" class="span12" name="user_name" id="userName" value="<{$_POST.user_name}>" required="true" autofocus="true">
                    <label>密码</label>
                    <input type="password" class="span12" name="password" value = "<{$_POST.password}>" required="true" >
                    <label>坐席分机</label>
                    <input type="text" class="span12" name="ext" id="ext" value = "<{$_POST.ext}>" required="true" >                    
                     <label>验证码</label>
					<input type="text" name="verify_code" class="span4" placeholder="输入验证码" autocomplete="off" required="required">
					<a href="#"><img title="验证码" id="verify_code" src="<{$smarty.const.ADMIN_URL}>/verify_code_cn.php" style="vertical-align:top"></a>
					<div class="clearfix"><input type="checkbox" name="remember" value="remember-me"> 记住我 
					<!-- span class="label label-info">一个月内不用填写用户名密码</span -->
					<input type="submit" class="btn btn-primary pull-right" name="loginSubmit" value="登入"/></div>
					
                </form>
            </div>
        </div>
        <p class="pull-right" style=""><a href="http://www.jozoo.net" target="blank"></a></p>
    </div>
    <script type="text/javascript">
    $("#verify_code").click(function(){
    	var d = new Date()
    	var hour = d.getHours(); 
    	var minute = d.getMinutes();
    	var sec = d.getSeconds();
        $(this).attr("src","<{$smarty.const.ADMIN_URL}>/verify_code_cn.php?"+hour+minute+sec);
    });
    $('#userName').on('blur',function(){
        if( $.isNumeric($(this).val()) ){
            $('#ext').val($(this).val());
        }
    });
    </script>

<{include file = "footer.tpl"}>


