  <body class=""> 
    <!--<![endif]-->
    <style type="text/css">
        /*a.brand{background: url("<{$smarty.const.ADMIN_URL}>/assets/images/logo.png") no-repeat 0 0;padding-left:320px;min-width:330px;}*/
        .navbar-inner .sidebar-toggler {
            cursor: pointer;
            opacity: 0.5;
            filter: alpha(opacity=50);
            margin: 6px 6px 6px -10px;
            width: 29px;
            height: 29px;
            background-repeat: no-repeat;
            background-color: #242424;
            background-image: url(<{$smarty.const.ADMIN_URL}>/assets/images/sidebar-toggler.jpg);
            float:left;
        }
        .navbar-inner .sidebar-toggler:hover {
            filter: alpha(opacity=100);
            opacity: 1;
        }
    </style>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <ul class="nav pull-right">                
                <!-- li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">设置模板</a></li -->
                <{if $user_info.setting}>
                <li id="fat-menu" class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cog"></i>设置<i class="icon-caret-down"></i>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="<{$smarty.const.ADMIN_URL}>/admin/setting.php">系统设置</a></li>
						<li><a href="#" onclick="openModal('13871231111');return false;">测试弹屏</a></li>
                        <li><a href="#" onclick="setfree();return false;">签入</a></li>
                        <li><a href="#" onclick="setbusy();return false;">签出</a></li>
                    </ul>
                </li>
                <{/if}>		
                <li id="fat-menu" class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">选择模板<i class="icon-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<{$smarty.const.ADMIN_URL}>/admin/set.php?t=default">默认模板</a></li>
                        <li><a href="<{$smarty.const.ADMIN_URL}>/admin/set.php?t=blacktie">黑色领结</a></li>
                        <li><a href="<{$smarty.const.ADMIN_URL}>/admin/set.php?t=wintertide">冰雪冬季</a></li>
                        <li><a href="<{$smarty.const.ADMIN_URL}>/admin/set.php?t=schoolpainting">青葱校园</a></li>
                    </ul>
                </li>
                <li id="fat-menu" class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i> <{$user_info.real_name}>
                        <i class="icon-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<{$smarty.const.ADMIN_URL}>/admin/profile.php">我的账号</a></li>
                        <li><a tabindex="-1" href="<{$smarty.const.ADMIN_URL}>/logout.php">登出</a></li>
                    </ul>
                </li>                 
            </ul>
            <div class="sidebar-toggler"></div>
            <a class="brand" href="<{$smarty.const.ADMIN_URL}>/index.php"><span class="first"><{$smarty.const.COMPANY_NAME}></span> <span class="second"><{$smarty.const.ADMIN_TITLE}></span></a>
            <form class="form-search pull-right" action="<{$smarty.const.ADMIN_URL}>/crms/diseases.php" style="margin:6px 10px;">
                <!--input type="text" name="key" class="search-query icon-search" placeholder="Search" / -->
                    <div class="input-append">
                      <input class="span2 search-query" type="text" name="key" placeholder="和济·知道" />
                      <button type="submit" class="btn">Search</button>
                    </div>
            </form>
        </div>
    </div>
