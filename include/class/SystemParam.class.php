<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class SystemParam extends Base{
	private static $table_name = 'system_param';
	private static $columns = 'param_key,param_name,param_value,param_type,status,remark';
	
	public static function getTableName(){
		return parent::$table_prefix.self::$table_name;
	}
	
	public static function get($param_name) {
		$db=self::__instance();
		$condition['param_name'] = $param_name;
		$list = $db->select ( self::getTableName(),self::$columns,$condition );
		if($list){
			return json_decode($list[0]['param_value']);
		}
		return array ();
	}

	public static function getSysParams($param_type='service') {
		$db=self::__instance();
		$list = $db->select ( self::getTableName(),self::$columns,array('status'=>'enable','param_type'=>$param_type));
		if($list){
			return $list;
		}
		return array();
	}
	public static function getValue($param_name) {
		$db=self::__instance();
		$condition['param_name'] = $param_name;
		$result = $db->get ( self::getTableName(),'param_value',$condition );
		return isset($result)?$result+1:0;
	}

	public static function setValue($param_name,$param_value){
		if (! $param_name || ! $param_value ) {
			return false;
		}
		$update_data=array("param_value"=>$param_value);
		$condition=array("param_name"=>$param_name);
		$db=self::__instance();
		$id = $db->update ( self::getTableName(), $update_data, $condition );
		return $id;
	}
}
?>