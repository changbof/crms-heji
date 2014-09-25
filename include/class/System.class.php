<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class System extends Base{
	private static $table_name = 'system';
	private static $columns = 'key_name, key_value, key_title, remark';
	
	public static function getTableName(){
		return parent::$table_prefix.self::$table_name;
	}
	
	public static function set($key_name, $key_value,$key_title='', $remark='') {
	
		//$key_value= json_encode($key_value);
		$sql = "insert into ".self::getTableName() ." values ('$key_name', '$key_value', '$key_title', '$remark') on duplicate key update key_value='$key_value',key_title='$key_title', remark='$remark' ";
		$db=self::__instance();
		$id = $db->query ($sql);
		return $id;
	}
	
	public static function get($key_name) {
		$db=self::__instance();
		$condition['key_name'] = $key_name;
		$list = $db->select ( self::getTableName(),self::$columns,$condition );
		if($list){
			//return json_decode($list[0]['key_value']);
			return $list[0];
		}
		return array ();
	}

	public static function getSysParams() {
		$db=self::__instance();
		$list = $db->select ( self::getTableName(),self::$columns,array('key_name[!]'=>'timezone'));
		if($list){
			return $list;
		}
		return array();
	}
	public static function getValue($key_name) {
		$db=self::__instance();
		$condition['key_name'] = $key_name;
		$result = $db->get ( self::getTableName(),'key_value',$condition );
		return isset($result)?$result:false;
	}

}
?>