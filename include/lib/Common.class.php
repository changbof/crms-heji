<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Common {

	//获取OSAdmin的action_url，用于权限验证
	public static function getActionUrl(){
		$action_script=$_SERVER['SCRIPT_NAME'];
		$admin_url = strtolower(ADMIN_URL);
		if($admin_url{strlen($admin_url)-1}=="/"){
			$admin_url = substr($admin_url,0,strlen($admin_url)-1);
		}
		 
		$http_pos = strpos($admin_url,'http://');
		
		if($http_pos !== false){
			$admin_url_no_http = substr($admin_url,7);			
		}else{
			$admin_url_no_http=$admin_url;
		}
		$slash = 0;
		$slash=strpos($admin_url_no_http,'/');
		
		if($slash){
			$sub_dir = substr($admin_url_no_http,$slash);
			$action_url = substr($action_script,strlen($sub_dir));
		}else{
			$action_url =$action_script;
		}
		return str_replace('//','/',$action_url);
	}
	public static function exitWithMessage($message_detail, $forward_url, $second = 3,$type="message") {

		switch ($type) {
			case "success" :
			$page_title="操作成功！";
			break;
			case "error":
			$page_title="错误!";
			break;
			default:
			$page_title="嗯!";
			break;
		}
		$temp = explode('?',$forward_url);
		$file_url = $temp[0];
		if($file_url{0} !=="/"){
			$file_url ='/'.$file_url;
			$forward_url ='/'.$forward_url;
		}
		$menu = MenuUrl::getMenuByUrl($file_url);
		$forward_title = "首页";
		if(sizeof($menu)>0){
			$forward_title = $menu['menu_name'];
		}
		if ($forward_url) {
			$message_detail = "$message_detail <script>setTimeout(\"window.location.href ='".ADMIN_URL."$forward_url';\", " . ($second * 1000) . ");</script>";
		}
		Template::assign ( 'type', $type );
		Template::assign ( 'page_title', $page_title );
		Template::assign ( 'message_detail', $message_detail );
		Template::assign ( 'forward_url', $forward_url );
		Template::assign ( 'forward_title', $forward_title);
		Template::Display ( 'message.tpl' );
		exit();
	}
	
	public static function exitWithError($message_detail, $forward_url, $second = 3,$type="error") {
		self::exitWithMessage($message_detail, $forward_url, $second ,$type);
	}
	
	public static function exitWithSuccess($message_detail, $forward_url, $second = 3 ,$type="success") {
		self::exitWithMessage($message_detail, $forward_url, $second, $type);
	}
	
	public static function checkParam($param,$to_url=null){
		
		if($to_url == null ){
			if(array_key_exists('HTTP_REFERER',$_SERVER)){
				$referer = $_SERVER['HTTP_REFERER'];
			}
			if(!empty($referer)){
				$start = strpos($referer,ADMIN_URL);
				$to_url = substr($referer,$start+strlen(ADMIN_URL));
			}else{
				$to_url = 'index.php';
			}
		}
		
		if (empty ( $param )) {
			Common::exitWithError ( '缺少必要的参数', $to_url ,3,"error" );
		}
	}
	
	public static function jumpUrl($url) {
		
		Header ( "Location: ".ADMIN_URL."/$url" );
		return true;
	}
	
	public static function isPost() {
		return $_SERVER ['REQUEST_METHOD'] === 'POST' ? TRUE : FALSE;
	}
	
	public static function isGet() {
		return $_SERVER ['REQUEST_METHOD'] === 'GET' ? TRUE : FALSE;
	}
	
	public static function getIp() {
		if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" )) {
			$ip = getenv ( "HTTP_CLIENT_IP" );
		} elseif (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" )) {
			$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
		} elseif (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" )) {
			$ip = getenv ( "REMOTE_ADDR" );
		} elseif (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" )) {
			$ip = $_SERVER ['REMOTE_ADDR'];
		} else {
			$ip = "unknown";
		}
		return ($ip);
	}
	
	/**
	 * 校验日期格式是否正确
	 * 
	 * @param string $date 日期
	 * @param string $formats 需要检验的格式数组
	 * @return boolean
	 */
	function checkDateIsValid($date, $formats = array("Y-m-d", "Y/m/d")) {
	    $unixTime = strtotime($date);
	    if (!$unixTime) { //strtotime转换不对，日期格式显然不对。
	        return false;
	    }
	    //校验日期的有效性，只要满足其中一个格式就OK
	    foreach ($formats as $format) {
	        if (date($format, $unixTime) == $date) {
	            return true;
	        }
	    }
	    return false;
	}


	public static function getWeek($date=null){
		$WEEKARRAY=array("日","一","二","三","四","五","六"); 
		return '星期'.((!self::checkDateIsValid($date)) ? $WEEKARRAY[date('w')] : $WEEKARRAY[date('w',$date)]);

	}
	public static function getDateTime($time = null) {
		
		return (!is_numeric($time)) ? date ( 'Y-m-d H:i:s' ) : date( 'Y-m-d H:i:s', $time);
	}

	public static function getTime() {
		return strtotime(date( 'Y-m-d H:i:s' ));
	}	

	public static function getSysInfo() {
		$sys_info_array = array ();
		$sys_info_array ['gmt_time'] = gmdate ( "Y年m月d日 H:i:s", time () );
		$sys_info_array ['bj_time'] = gmdate ( "Y年m月d日 H:i:s", time () + 8 * 3600 );
		$sys_info_array ['server_ip'] = gethostbyname ( $_SERVER ["SERVER_NAME"] );
		$sys_info_array ['software'] = $_SERVER ["SERVER_SOFTWARE"];
		$sys_info_array ['port'] = $_SERVER ["SERVER_PORT"];
		$sys_info_array ['admin'] = $_SERVER ["SERVER_ADMIN"];
		$sys_info_array ['diskfree'] = intval ( diskfreespace ( "." ) / (1024 * 1024) ) . 'Mb';
		$sys_info_array ['current_user'] = @get_current_user ();
		$sys_info_array ['timezone'] = date_default_timezone_get();
		$sys_info_array ['client_ip'] = self::getClientIp();
		$db=new Medoo(OSA_DB_ID);
		$mysql_version = $db->query("select version()")->fetchAll();
		$sys_info_array ['mysql_version'] = $mysql_version[0]['version()'];
		return $sys_info_array;
	}
	//
	public static function transact($options) {
		$temp_array = array ();
		foreach ( $options as $k => $v ) {
			if (is_null ( $v ) || (is_string ( $v ) && trim ( $v ) == ''))
				$v = '';
			else
				is_array ( $v ) ? $v = self::transact ( $v ) : $v = ( string ) $v;
			$temp_array [$k] = $v;
		}
		return $temp_array;
	}
	
	public static function getRandomIp() {
		$ip = '';
		for($i = 0; $i < 4; $i ++) {
			$ip_str = rand ( 1, 255 );
			$ip .= ".$ip_str";
		}
		$ip = substr($ip, 1);
		
		return $ip;
	}
	
	public static function filterText($text){
		if(ini_get('magic_quotes_gpc')){
			$text=stripslashes($text);
		}
		return $text;
	}

	public static function getClientIp($type = 0) {
	    $type = $type ? 1 : 0;
	    static $ip = NULL;
	    if ($ip !== NULL) return $ip[$type];
	    if($_SERVER['HTTP_X_REAL_IP']){//nginx 代理模式下，获取客户端真实IP
	        $ip = $_SERVER['HTTP_X_REAL_IP'];     
	    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {//客户端的ip
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {//浏览当前页面的用户计算机的网关
	        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
	        $pos = array_search('unknown',$arr);
	        if(false !== $pos) unset($arr[$pos]);
	        $ip = trim($arr[0]);
	    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
	        $ip = $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    // IP地址合法验证
	    $long = sprintf("%u",ip2long($ip));
	    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
	    return $ip[$type];
	}

	//产生随机字符
	public static function randomkeys($length=4)
	{
		$output='';
		for ($a = 0; $a < $length; $a++) {
			$output .= chr(mt_rand(33, 126));    //生成php随机数
		}
		return $output;
	}
	public static function randomNumber($length=4){
	   $pattern = '1234567890';    //字符池,可任意修改 abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ
	   for($i=0;$i<$length;$i++)    {
	       $output .= $pattern{mt_rand(0,35)};    //生成php随机数
	   }
	   return $output;
	}
	
	//数组乱序排列（完美）
	public static function rand_array($arr)
	{
	    //获得数组大小
		$arr_size=sizeof($arr);
		
	    //初始化结果数组
		$tmp_arr=array();
		
	    //开始乱序排列
		for($i=0;$i<$arr_size;$i++){
			
	        //随机配置种子，减少重复率
			mt_srand((double) microtime()*1000000);
			
	        //获得被配置的下标
			$rd=mt_rand(0,$arr_size-1);
			
	        //下标是否已配置
	        if($tmp_arr[$rd]=="")  //未配置
	        {
	            //进行配置
	        	$tmp_arr[$rd]=$arr[$i];
	        }
	        else  //已配置
	        { 
	            //返回
	        	$i=$i-1;
	        }
	    }
	    return $tmp_arr;
	}
	//根据生日计算年龄
	public static function getAge($birthday){ 
	    $birth=$birthday; 
	    list($by,$bm,$bd)=explode('-',$birth); 
	    $cm=date('n'); 
	    $cd=date('j'); 
	    $age=date('Y')-$by-1; 
	    if ($cm>$bm || $cm==$bm && $cd>$bd) $age++; 
	    return $age; 
	} 
	/**
	 * 将字符串转为Unicode编码
	 *
	 * @author XingDongHai (http://www.xingdonghai.cn)
	 * @version 0.10
	 * @param string $str 要转换的字符串
	 * @param string $encoding 源字符串的编码
	 * return string
	 */
	public static function str2Unicode($str, $encoding = 'GBK') {
	    $str = iconv($encoding, 'UCS-2', $str);
	    $arr = str_split($str, 2);
	    $unicode = '';
	    foreach ($arr as $tmp) {
	        $dec = hexdec(bin2hex($tmp));
	        $unicode .= $dec . ' ';
	    }
	    return $unicode;
	}
	/**
	 * 获得指定日期所在星期的第一天和最后一天
	 *
	 * @param string $day 日期字符,如'2014-04-20'
	 * return array()
	 */	
	public static function getDaysOfWeek($day){
		$lastday=date('Y-m-d',strtotime("$day Saturday"));
		$firstday=date('Y-m-d',strtotime("$lastday -6 days"));
		return array($firstday,$lastday);
	}

	/**
	 * 秒转时间，格式 (年 月 日) 时 分 秒
	 * 
	 * @param int $time
	 * @return array|boolean
	 */
	public static function seconds2Date($size){
		if(is_numeric($size)){
			$rst = '';
			$time = array(3600,60,1);
			$dw = array(' 时', ' 分', ' 秒');
			for ($i = 0; $size >= $time[$i] && $i <= 2; $i++){
				$rst .= floor($size/$time[$i]).$dw[$i];
				$size %= $time[$i];
			}
			return $rst;
		}else{
			return false;
		}
	}
    /**
     * 查找字符串第n次出现的位置
     * @param $str
     * @param $find
     * @param $n
     * @return int
     */
    public static function str_n_pos($str,$find,$n){
        $pos_val = 0;
        for ($i=1;$i<=$n;$i++){
            $pos = mb_strpos($str,$find);
            $str = mb_substr($str,$pos+1);
            $pos_val=$pos+$pos_val+1;
        }
        return $pos_val-1;
    }
    /** 
	* $sourceArr 原来的数组 
	* $key 主键 
	* $parentKey 与主键关联的父主键 
	* $childrenKey 生成的孩子的键名 
	* 
	*/  
	  
	public static function arrayToTree($sourceArr, $key, $parentKey, $childrenKey)  
	{  
	    $tempSrcArr = array();  
	    foreach ($sourceArr as  $v)  
	    {  
	        $tempSrcArr[$v[$key]] = $v;  
	    }  
	    $i = 0;  
	    $count = count($sourceArr);  
	    for($i = ($count - 1); $i &gt;=0; $i--)  
	    {  
	        if (isset($tempSrcArr[$sourceArr[$i][$parentKey]]))  
	        {  
	           $tArr = array_pop($tempSrcArr);  
	           $tempSrcArr[$tArr[$parentKey]][$childrenKey] = (isset($tempSrcArr[$tArr[$parentKey]][$childrenKey]) &amp;&amp; is_array($tempSrcArr[$tArr[$parentKey]][$childrenKey])) ? $tempSrcArr[$tArr[$parentKey]][$childrenKey] : array();  
	           array_push ($tempSrcArr[$tArr[$parentKey]][$childrenKey], $tArr);  
	        }  
	    }  
	    return $tempSrcArr;  
	} 
}