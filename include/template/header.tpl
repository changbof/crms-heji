<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><{$page_title}> - <{$smarty.const.ADMIN_TITLE}> </title>
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/bootstrap-select/bootstrap-select.min.css">
  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/stylesheets_<{$user_info.template}>/theme.css">
  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/css/other.css">
  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/css/jquery-ui.css" />
  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-spinner/bootstrap-spinner.css">
  <!-- link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/bootstrap-responsiv.css" -->
  <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/plugins/jquery-dataTables/dataTables.bootstrap.css">

  <script src="<{$smarty.const.ADMIN_URL}>/assets/lib/jquery-1.8.3.min.js" ></script>
  <script src="<{$smarty.const.ADMIN_URL}>/assets/lib/jquery.form.js"></script>
  <script src="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/js/bootbox.min.js"></script>

  <script src="<{$smarty.const.ADMIN_URL}>/assets/js/other.js"></script>
  <script src="<{$smarty.const.ADMIN_URL}>/assets/js/jquery-ui.js"></script>
  <script src="<{$smarty.const.ADMIN_URL}>/assets/js/jquery.autosize.js"></script>

  <script src="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/js/bootstrap-datetimepicker.zh-CN.js"></script>
  
  <!--script src="<{$smarty.const.ADMIN_URL}>/assets/interface/jquery-min.js"></script -->
  <script src="<{$smarty.const.ADMIN_URL}>/assets/interface/potato.js"></script>
  <!-- Demo page code -->

  <style type="text/css">
    body{padding-top:40px;}
    footer{padding:1em;}
    footer hr{margin:1em 0em;}
    footer p span.pull-right{margin:0em 0em 1em;}
    #line-chart {
      height:300px;
      width:800px;
      margin: 0px auto;
      margin-top: 1em;
    }
    .brand { 
      font-family: georgia, serif; 
    }
    .brand .first,
    .brand .second  {
      font-family: georgia, serif; 
      color: #F79B25;
      font-weight: bold;
    }
    .brand .second {
      color: #fff;
      margin-left: 5px;
    }
    .input-underline{
      border-width:0 0 1px 0;
      background:none;
    }
    option.btn{display: block;}
    label em{color:red;font-style: normal;margin: 4px;}
  </style>

  <style type="text/css">
    /*rule of Modal for bootbox*/
    body .modal-medium {
      width: 50%; /* desired relative width */
      left: 25%;  /* (100%-width)/2 */
      min-width: 660px; 
      /* place center */
      margin:auto;
    }
    body .modal-large {
      width: 60%; /* desired relative width */
      left: 20%;  /* (100%-width)/2 */
      min-width: 760px; 
      /* place center */
      margin:auto;
    }
    .bootbox.modal.fade.modal-medium.in,
    .bootbox.modal.fade.modal-large.in{top:43px;}
    .bootbox .form-horizontal .control-group{margin-bottom:10px;}
    form.form-horizontal .control-group .control-label{width:100px;}
    form.form-horizontal .control-group .controls{margin-left:120px;}
    .bootbox.modal.fade.modal-medium .tooltip{z-index: 9999;}

  </style>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="<{$smarty.const.ADMIN_URL}>/assets/js/html5.js"></script>
<![endif]-->

<!-- 呼叫中心在线呼叫设置 -->
<script>
    //弹屏初始化
    function init_cc(){
      connect("<{$smarty.const.CALLCENTER_IP}>",function(msg){
        //log(msg);
        });
        setPop('<{$user_info.ext}>',function(msg){
        var jsonobj = eval('('+msg+')');
        var extension = jsonobj.extension;
        var ext_no = '<{$user_info.ext}>';
        if (extension == ext_no && extension != jsonobj.callerid){
          listenPop(jsonobj.callerid, jsonobj.uniqueid, jsonobj.orientation);
        }
      });
    }

	//初始化呼叫中心在线电话控件
	init_cc();

	//弹屏
	var listenPop = function(callerid,uniqueid,orientation){
		openModal(callerid);
	}
    //置闲
    var setbusy = function(queue){
        if (queue == "") {
            alert('请输入话务组');
            return ;
        }
      addQueue(queue,function(msg){
		//handler code
		alert(msg);
      });
    };

    //置忙
    var setfree = function(queue){
        if (queue == "") {
            alert('请输入话务组');
            return ;
        }
        removeQueue(queue,function(msg){
            //handler code
            alert(msg);
        });
    };

    //软拨号
    var reqAutoDial = function(callerid){
        if (callerid == "") {
            alert('请输入呼出号码');
            return ;
        }
		callerid = callerid.replace(/-/g,'');
		if(callerid.length>9 && callerid.substr(0,1)!='9'){
            callerid = '9'+callerid;
        }
        autoDial(callerid,function(msg){
			var json = eval("("+msg+")");
            if(json['Response']=='Success'){
				$('#loading').delay(5000).html('正在接通中...').delay(20000).fadeOut("slow",function(){$('#loading').html('正在拨号中...')});
				return;
			}
        });
    };

    //挂断
    var hangup = function () {
        hangupCall(function (msg) {
            $('#loading').text('通话结束!').delay(2000).fadeOut("slow",function(){$('#loading').html('正在拨号中...')});
        }) 
    };

    //所有队列信息
    var queuestatus = function () {
        queueStatus(function (msg) {
            alert(msg);
        }) 
    };

    //我的状态
    var myStatus = function (queue) {
        if (queue == "") {
            alert('请输入话务组');
            return ;
        }
        myStatus(queue, function (msg) {
            alert(msg);
        }) 
    };

    //监听
    var spyExt = function(){
        var target =  $('#param').val();
        if (target == "") {
            alert('请输入监听分机');
            return ;
        }
        spyExtension(target,function(msg){
            //handler code
            alert( msg);
        });
    };
</script>
<script type="text/javascript">
  //刷新iframe页面
  var refreshInner=function(e){
    e=e||window.event; 
    //alert(e.which||e.keyCode);
    if((e.which||e.keyCode)==116){
      if(e.preventDefault){
        e.preventDefault();
        window.top.frames["main"].location.reload(); 
      } else{
        event.keyCode = 0; 
        e.returnValue=false;
        window.top.frames["main"].location.reload();
      }
    }
  };

//来电弹屏
var bb_ct = null;
function openModal(cometel){
  var url = "<{$smarty.const.ADMIN_URL}>/crms/comecall.php?cometel="+cometel;
  jQuery.ajax({type:'GET',url:url,dataType:'html',success:function(data) {
    bb_ct = bootbox.dialog(data, [{
      "label" : "查看客户详细信息",
      "class" : "btn-primary",
      "callback": function() {
        var customerId=$('#comecell_customerId').val();
		var url = '<{$smarty.const.ADMIN_URL}>/crms/customer_modify.php?a=view&customerId='+customerId;
		window.open(url, "_blank");
      }
    },{"label" : "关闭","class" : "btn",}],
    {
      "header":'来电客户信息',
      "onEscape": function() {
        console.log("dialog dismissed by escape key");
      },
      "classes": "modal-medium"
    }
    );
	bb_ct.find('#addc').on('click',function(){bootbox.hideAll();});
  }});
}


</script>
</head>

<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
