<?php
error_reporting( E_ALL );
require 'config/config.inc.php';
session_start();
function OSAdminAutoLoad($classname){
	
	$filename = str_replace('_', '/', $classname) . '.class.php';
    // class类
	$filepath = ADMIN_BASE_CLASS . $filename;
	if (file_exists($filepath)) {
		return include $filepath;
	}else{
		//仅对Class仅支持一级子目录
		//如果子目录中class文件与CLASS根下文件同名，则子目录里的class文件将被忽略

		$handle=opendir(ADMIN_BASE_CLASS);
		
		while (false !== ($file = readdir($handle))) {
			if (is_dir(ADMIN_BASE_CLASS. "/" . $file)) {
				$filepath=ADMIN_BASE_CLASS."/".$file."/".$filename;
				if (file_exists($filepath)) {
					return include $filepath;
				}
			}
		}
	}
    //lib库文件
	$filepath = ADMIN_BASE_LIB . $filename;
	if (file_exists($filepath)) {
		return include $filepath;
	}

	throw new Exception( $filepath . ' NOT FOUND!');
}

spl_autoload_register('OSAdminAutoLoad');

if(!isset($_SESSION['osa_timezone'])){
	$timezone = System::get('timezone');
	$_SESSION['osa_timezone']=$timezone['key_value'];
}

date_default_timezone_set($_SESSION['osa_timezone']);

/*
不需要登录就可以访问的链接，也可以是某个目录，不含子目录
如"/nologin/","/nologin/aaa/"
*/

$no_need_login_page=array("/block.php","/login.php","/logout.php","/sample/");

//如果不需要登录就可以访问的话
$action_url = Common::getActionUrl();
if( OSAdmin::checkNoNeedLogin($action_url,$no_need_login_page) ){	
	//for login.php logout.php etc....
	;
}else{
	//else之后 需要验证登录信息
	if(empty($_SESSION[UserSession::SESSION_NAME])){
		$user_id=User::getCookieRemember();
		if($user_id>0){
			User::loginDoSomething($user_id);
		}
	}
	
	User::checkLogin();
	
	User::checkActionAccess();
	$current_user_info=UserSession::getSessionInfo();
	//如果非ajax请求
	if(stripos($_SERVER['SCRIPT_NAME'],"/ajax")===false){
		//显示菜单、导航条、模板
		$sidebar = SideBar::getTree ();
		
		//是否显示quick note
		if($current_user_info['show_quicknote']){
			OSAdmin::showQuickNote();
		}

		$menu = MenuUrl::getMenuByUrl(Common::getActionUrl());
		Template::assign ( 'page_title', $menu['menu_name']);
		Template::assign ( 'content_header', $menu );
		Template::assign ( 'sidebar', $sidebar );
		Template::assign ( 'current_module_id', $menu['module_id'] );
		Template::assign ( 'user_info', UserSession::getSessionInfo());
	}
}

//json_encode for php5.1及以下
/*
function json_encode( $data ) {           
    if( is_array($data) || is_object($data) ) {
        $islist = is_array($data) && ( empty($data) || array_keys($data) === range(0,count($data)-1) );
 
        if( $islist ) {
            $json = '[' . implode(',', array_map('json_encode', $data) ) . ']';
        } else {
            $items = Array();
            foreach( $data as $key => $value ) {
                $items[] = json_encode("$key") . ':' . json_encode($value);
            }
            $json = '{' . implode(',', $items) . '}';
        }
    } elseif( is_string($data) ) {
        # Escape non-printable or Non-ASCII characters.
        # I also put the \\ character first, as suggested in comments on the 'addclashes' page.
        $string = '"' . addcslashes($data, "\\\"\n\r\t/" . chr(8) . chr(12)) . '"';
        $json    = '';
        $len    = strlen($string);
        # Convert UTF-8 to Hexadecimal Codepoints.
        for( $i = 0; $i < $len; $i++ ) {
 
            $char = $string[$i];
            $c1 = ord($char);
 
            # Single byte;
            if( $c1 <128 ) {
                $json .= ($c1 > 31) ? $char : sprintf("\\u%04x", $c1);
                continue;
            }
 
            # Double byte
            $c2 = ord($string[++$i]);
            if ( ($c1 & 32) === 0 ) {
                $json .= sprintf("\\u%04x", ($c1 - 192) * 64 + $c2 - 128);
                continue;
            }
 
            # Triple
            $c3 = ord($string[++$i]);
            if( ($c1 & 16) === 0 ) {
                $json .= sprintf("\\u%04x", (($c1 - 224) <<12) + (($c2 - 128) << 6) + ($c3 - 128));
                continue;
            }
 
            # Quadruple
            $c4 = ord($string[++$i]);
            if( ($c1 & 8 ) === 0 ) {
                $u = (($c1 & 15) << 2) + (($c2>>4) & 3) - 1;
 
                $w1 = (54<<10) + ($u<<6) + (($c2 & 15) << 2) + (($c3>>4) & 3);
                $w2 = (55<<10) + (($c3 & 15)<<6) + ($c4-128);
                $json .= sprintf("\\u%04x\\u%04x", $w1, $w2);
            }
        }
    } else {
        # int, floats, bools, null
        $json = strtolower(var_export( $data, true ));
    }
    return $json;
}

//json_decode for php5.1及以下
function json_decode($json) 
{  
    // Author: walidator.info 2009 
    $comment = false; 
    $out = '$x='; 

    for ($i=0; $i<strlen($json); $i++) 
    { 
        if (!$comment) 
        { 
            if ($json[$i] == '{' || $json[$i] == '[')
            {
            	$out .= ' array('; 
            }else if ($json[$i] == '}' || $json[$i] == ']')
            {
            	$out .= ')'; 
            }
            else if ($json[$i] == ':')
            {
            	$out .= '=>'; 
            }else{
            	$out .= $json[$i];            
            }
        }
        else{
        	$out .= $json[$i]; 
        }
        if ($json[$i] == '"'){
        	$comment = !$comment; 
        }
    } 
    eval($out . ';'); 
    return $x; 
}
*/
	
?>