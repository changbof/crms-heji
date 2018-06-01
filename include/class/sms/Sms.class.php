<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Sms extends Base {
	// 表名
	private static $table_name = 'sms';
	// 查询字段
	private static $columns = 'sms_id,sms_subject,sms_content,sms_category,sms_to,sms_to_vip,creator,create_time,status,send_time';

	//类型
	public static $category = array("普通短信","定时短信","群发短信");

	public static function getTableName(){
		return parent::$table_prefix.self::$table_name;
	}
	
	//列表 
	public static function getSmss($sdate='',$edate='',$status='',$cate='',$ext='', $to='',$content='',$start ='' ,$page_size='') {
		$db=self::__instance();
		$limit ="";
		$where = " where 1=1 ";
		if($status!=''){
			$where .= " and status = '".$status."' ";
		}
		if($cate!=''){
			$where .= " and sms_category = '".$cate."' ";
		}
		if($ext!=''){ //发送人,这里指操作员分机号
			$where .= " and creator = '".$ext."' ";
		}
		if($to!=''){ //发送人,这里指操作员分机号
			$where .= " and sms_to = '".$to."' ";
		}
		if($sdate!=''){ //创建短信时间,不是短信发送时间
			$where .= " and create_time >= UNIX_TIMESTAMP('".$sdate."')";
		}
		if($edate!=''){ 
			$where .= " and create_time = UNIX_TIMESTAMP('".$edate."')";
		}
		if($page_size){
			$limit =" limit $start,$page_size ";
		}
		$sql="select ".self::$columns." from ".self::getTableName()." as t order by t.sms_id desc $limit";
		$list = $db->query($sql)->fetchAll();
		if ($list) {
			foreach ($list as &$item){
				$item['create_time'] = Common::getDateTime($item['create_time']);
				$item['send_time'] = Common::getDateTime($item['send_time']);
			}
			return $list;
		}
		return array ();		
	}
	
	public static function addComplaint($complaint_data) {
		if (! $complaint_data || ! is_array ( $complaint_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $complaint_data );
		
		return $id;
	}

	//增加短信(不是发送短信哦)
	public static function addSms($sms_data) {
		if (! $sms_data || ! is_array ( $sms_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $sms_data );
		return $id;
	}
	//修改短信(主要是发送情况)
	public static function updateSms($sms_id,$sms_data) {
		if (! $sms_data || ! is_array ( $sms_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("sms_id"=>$sms_id);
		$id = $db->update ( self::getTableName(), $sms_data, $condition );
		return $id;
	}


	//-----------------------------------------------------------
	//发送短信

	public static function sendSms2($sms_data) {
		$content = iconv("UTF-8","gb2312",$content);
		$post = array (
			'sn' => 'SDK-CKS-010-00128',
			'pwd' => strtoupper(md5('SDK-CKS-010-00128'.'018827')),
			'mobile' => $callerid,
			'content'=> $content,
		);
		$url = 'http://sdk2.entinfo.cn/z_mdsmssend.aspx';
		$context = array();
		if (is_array($post)) {
			ksort($post);
			$context['http'] = array (
				'method' => 'POST',
				'content' => http_build_query($post, '', '&'),
			);
		}
		return file_get_contents($url, false, stream_context_create($context));
	}
	


	/* 
	 * --------------------------------------
	 * 发送短信(调用http短信接口)
	 *
	 * 返回值:
	 * 		=0 -- 发送失败
	 * 		>1 -- 发送成功
	 *
	 * --------------------------------------
	 */
	public static function sendSms($sms_data){
		$result = 0 ;
		if (! $sms_data || ! is_array ( $sms_data )) {
			return false;
		}
		if( $sms_data['sms_to']=='' || $sms_data['sms_content'] =='' ){
			return false;
		}

		$url = 'http://sdk.entinfo.cn:8060/z_mdsmssend.aspx';
		$data = array(
			'sn'=>'SDK-CKS-010-00285',
			'pwd'=>'9AE1A89BD17688C5D391BB8ECE800672',
			'mobile'=>$sms_data['sms_to'], //接收号码
			'content'=>iconv( "UTF-8", "gb2312//IGNORE" , $sms_data['sms_content']),
			'ext'=>'',
		);
		$json_data = self::postDataByUrl($url, $data);
		//发送成功则
		if (strlen(trim($json_data)) >= 17)
		{
			$sms_data['send_time'] = time();
			$sms_data['status'] = 1;
			$result = 1;
		}else{
			$sms_data['status'] = 9; //发送失败
		}
		//增加短信发送记录
		self::addSms($sms_data);

		return $result;
	}

	/**
	 * @param $sms_data
	 * @return bool|int
	 * 北京容大友信短信接口
	 * 返回值	说明
	 *    -2	提交的号码中包含不符合格式的手机号码
	 *    -1	数据保存失败
	 *    0		成功
	 *    1001	用户名或密码错误
	 *    1002	余额不足
	 *    1003	参数错误，请输入完整的参数
	 *    1004	其他错误
	 *    1005	预约时间格式不正确
	 */
	public static function sendSmsforYX($sms_data){
		$result = 0 ;
		if (! $sms_data || ! is_array ( $sms_data )) {
			return false;
		}
		if( $sms_data['sms_to']=='' || $sms_data['sms_content'] =='' ){
			return false;
		}

		$url = SMS_SEND_URL ;
		$data = array(
			'username'	=> SMS_USERNAME,
			'password'	=> SMS_PASSWORD,
			'mobile'	=> $sms_data['sms_to'], //接收号码
			'content'	=> iconv( "UTF-8", "gb2312//IGNORE" , $sms_data['sms_content']),
			'senddate'	=> '',
			'batchID'	=>''
		);
		$result = self::postDataByUrl($url, $data);
		//添加发送记录
		if(strlen(trim($result)) >= 1) {
			$sms_data['send_time'] = time();
			$sms_data['status'] = $result;
			//增加短信发送记录
			self::addSms($sms_data);
		}
		return $result;
	}
	public static function postDataByUrl($url, $data){     
		$ch = curl_init();
		$timeout = 30000;      
		curl_setopt($ch, CURLOPT_URL, $url);  
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$handles = curl_exec($ch);
		curl_close($ch);
		return $handles;
	}

}

