<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><{$page_title}> - <{$smarty.const.ADMIN_TITLE}></title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/stylesheets_<{if $user_info}><{$user_info.template}><{else}>default<{/if}>/theme.css">
    <link rel="stylesheet" href="<{$smarty.const.ADMIN_URL}>/assets/lib/font-awesome/css/font-awesome.css">

    <script src="<{$smarty.const.ADMIN_URL}>/assets/lib/jquery-1.8.3.min.js" ></script>
	<script src="<{$smarty.const.ADMIN_URL}>/assets/js/other.js" ></script>

    <!-- Demo page code -->
    
    <!-- script> if(self!=top){ window.open(self.location,'_top'); } </script -->

    <style type="text/css">
        body.simple_body {
            background: #fff;
            background-image:none  ;
        }
        .simple_body h3{
            font-size: 20px;
            margin:0px;
            color:#49AABF;
            font-family: "Courier New" ;
        }
        .simple_body div.block{
            margin:0;
            padding:20px 20px 20px 0;
        }
        .simple_body .block-body{
            margin:30px 20px;
        }
        .simple_body .control-label{
            width:100px;
        }
        .simple_body .controls{
            margin-left:120px;
        }
        footer{padding:1em 4em;}
        footer hr{margin:1em 0em;}
        footer p span.pull-right{margin:0em 0em 2em;}
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
            color:#fff;
            margin-left: 5px;
        }
        .login-panel{margin-top:50px;margin-bottom:20px;}
        img.img-rounded{margin-top:70px;}
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>